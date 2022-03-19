<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\ConvertFile;
use App\Models\LessonModel;
use App\Models\PostalModel;
use CodeIgniter\HTTP\RedirectResponse;
use ReflectionException;

use SplFileObject;

use function PHPUnit\Framework\fileExists;

class SchoolUploadController extends BaseController
{
    const TRIM_LIST = ["\""];
    const UPLOAD_FOLDER = "../writable/uploads/";
    
    public function indexLesson(): string
    {
        return view(route_to("lesson_upload_get"));
    }
    
    /**
     * Fetch all records
     * @return string
     */
    public function indexPostal(): string
    {
        $model = new PostalModel();
        $data = [
            'postals' => $model->paginate(100),
            'pager' => $model->pager
        ];
    
        return view(route_to("postal_upload_get"), $data);
    }
    
    /**
     * File upload and Insert records
     * @throws ReflectionException
     */
    public function importFile(): string|RedirectResponse
    {
        // Validation
        $input = $this->validate(
            ['file' => 'uploaded[file]|ext_in[file,csv]',]
        );
        
        if (!$input) {
            // Not valid then return index for upload
            $data['validation'] = $this->validator;
            return view(route_to("postal_upload_get"), $data);
        }
    
        // TODO: [$numberOfFields, [['code', 2], ['prefecture', 6], ['municipality', 7], ['town', 8]]]
        $file = $this->request->getFile('file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // store file in writable/uploads
            $newName = $file->getRandomName();
            $file->move(self::UPLOAD_FOLDER, $newName, true);
            $files["sjis"] = self::UPLOAD_FOLDER.$newName;

            // convert to utf8
            $files["utf8"] = ConvertFile::sjisToUtf8($files["sjis"]);
            
            // reading file
            $file = new SplFileObject($files["utf8"]);
            $file->setFlags(
                SplFileObject::READ_AHEAD |    // 先読み/巻き戻しで読み出す
                SplFileObject::SKIP_EMPTY |         // 空行は読み飛ばす
                SplFileObject::DROP_NEW_LINE        // 行末の改行を読み飛ばす
            );

            $i = 0;
            $numberOfFields = 15;  // Total number of fields
            $records = [];

            foreach ($file as $line) {
                $row = str_getcsv(mb_convert_encoding($line, 'UTF-8', 'ASCII, JIS, UTF-8, SJIS-win'));
                if (count($row) == $numberOfFields) {
                    // key name should be same the insert table field names
                    $records[$i]['code'] = str_replace(self::TRIM_LIST, '', $row[2]);
                    $records[$i]['prefecture'] = str_replace(self::TRIM_LIST, '', $row[6]);
                    $records[$i]['municipality'] = str_replace(self::TRIM_LIST, '', $row[7]);
                    $records[$i]['town'] = str_replace(self::TRIM_LIST, '', $row[8]);
                }
                $i++;
            }
            
            // insert data
            if (count($records) > 0) {
                $model = new PostalModel();
                $model->truncate();
                $model->insertBatch($records);
            }
            
            // delete upload files
            foreach ($files as $file) {
                unlink($file);
            }
            
            // Set Session: 成功
            session()->setFlashdata('message', count($records).' 件 登録されました '.date("Y/m/d H:i:s"));
            session()->setFlashdata('alert-class', 'alert-success');
        } else {
            // Set Session: 失敗
            session()->setFlashdata('message', 'File not imported.');
            session()->setFlashdata('alert-class', 'alert-danger');
        }
        
        return redirect()->route("postal_upload_get");
    }
}
