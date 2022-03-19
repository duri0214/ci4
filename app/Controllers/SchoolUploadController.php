<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\ConvertFile;
use App\Models\LessonModel;
use App\Models\PostalModel;
use CodeIgniter\HTTP\RedirectResponse;
use ReflectionException;

class SchoolUploadController extends BaseController
{
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
        $input = $this->validate(['file' => 'uploaded[file]|ext_in[file,csv]',]);
        if (!$input) {
            // Not valid then return index for upload
            $data['validation'] = $this->validator;
            return view(route_to("postal_upload_get"), $data);
        }
    
        $model = new PostalModel();
        $file = $this->request->getFile('file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // save to writable/uploads then convert to utf8
            $newName = $file->getRandomName();
            $file->move(self::UPLOAD_FOLDER, $newName, true);
            $files["sjis"] = self::UPLOAD_FOLDER.$newName;
            $files["utf8"] = ConvertFile::sjisToUtf8($files["sjis"]);
    
            // process the file
            $records = $model->insertFromCsv($files["utf8"]);
            
            // delete used files
            foreach ($files as $file) {
                unlink($file);
            }
            
            // Set Session: 成功
            session()->setFlashdata('message', $records.' 件 登録されました '.date("Y/m/d H:i:s"));
            session()->setFlashdata('alert-class', 'alert-success');
        } else {
            // Set Session: 失敗
            session()->setFlashdata('message', 'File not imported.');
            session()->setFlashdata('alert-class', 'alert-danger');
        }
        
        return redirect()->route("postal_upload_get");
    }
}
