<?php

namespace App\Controllers;

use App\Libraries\Breadcrumb;
use App\Libraries\ConvertFile;
use App\Models\MPostalModel;
use CodeIgniter\HTTP\RedirectResponse;
use ReflectionException;
use SplFileObject;

class SchoolUploadController extends BaseController
{
    public const TRIM_LIST = ["\""];
    public const UPLOAD_FOLDER = "../writable/uploads/";
    
    public function __construct()
    {
        $repository = service('schoolLoginRepository');
        $this->login = $repository->getTablesRelatedByLoggedInUser($_SESSION['logged_in']);
    }
    
    /**
     * 授業アップロード画面
     * @return string
     */
    public function indexLesson(): string
    {
        $b = new Breadcrumb();
        $b->add('Home', route_to('school_home'));
        $b->add('授業管理', route_to('lesson_list'));
        $b->add('アップロード管理', null);
    
        $data = [
            // 'postals' => $model->paginate(100),
            // 'pager' => $model->pager,
            'breadcrumb' => $b->render(),
        ];
    
        return view('school/upload/lesson', $data);
    }
    
    /**
     * 郵便番号アップロード画面
     * Fetch all records
     * @return string
     */
    public function indexPostal(): string
    {
        $model = new MPostalModel();
        
        $b = new Breadcrumb();
        $b->add('Home', route_to('school_home'));
        $b->add('アップロード管理', null);
    
        $data = [
            'postals' => $model->paginate(15),
            'pager' => $model->pager,
            'breadcrumb' => $b->render(),
        ];
    
        return view('school/upload/postal', $data);
    }
    
    /**
     * File upload and Insert records
     * @throws ReflectionException
     */
    public function importFile(): RedirectResponse
    {
        if (!$this->validate($this->getValidationRules())) {
            // Not valid
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }
    
        $file = $this->request->getFile('file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // save to writable/uploads then convert to utf8
            $newName = $file->getRandomName();
            $file->move(self::UPLOAD_FOLDER, $newName, true);
            $files["sjis"] = self::UPLOAD_FOLDER.$newName;
            $files["utf8"] = ConvertFile::sjisToUtf8($files["sjis"]);
            
            // 先読み/巻き戻しで読み出す, 空行は読み飛ばす, 行末の改行を読み飛ばす
            $file = new SplFileObject($files["utf8"]);
            $file->setFlags(
                SplFileObject::READ_AHEAD |
                SplFileObject::SKIP_EMPTY |
                SplFileObject::DROP_NEW_LINE
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
            $model = new MPostalModel();
            if (count($records) > 0) {
                $model->builder()->truncate();
                $model->insertBatch($records);
            }
    
            // delete temp file
            foreach ($files as $file) {
                unlink($file);
            }
            
            return redirect()->back()->withInput()->with('success', count($records).' 件 登録されました '.date("Y/m/d H:i:s"));
        } else {
            return redirect()->back()->withInput()->with('errors', 'アップロードが失敗しました '.date("Y/m/d H:i:s"));
        }
    }
    
    /**
     * バリデーションルールの配列を取得
     * @return array
     */
    private function getValidationRules(): array
    {
        return [
            'file' => [
                'label'  => 'ファイル',
                'rules'  => 'uploaded[file]|ext_in[file,csv]',
                'errors' => [
                    'uploaded' => '{field} のアップロードが失敗しました',
                    'ext_in' => '{field} の拡張子はCSVのみです',
                ]
            ],
        ];
    }
}
