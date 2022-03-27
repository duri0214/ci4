<?php

namespace App\Controllers;

use App\Libraries\Breadcrumb;
use App\Libraries\ConvertFile;
use App\Models\PostalModel;
use CodeIgniter\HTTP\RedirectResponse;
use ReflectionException;

class SchoolUploadController extends BaseController
{
    public const UPLOAD_FOLDER = "../writable/uploads/";
    
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
    
        return view(route_to('lesson_upload_get'), $data);
    }
    
    /**
     * Fetch all records
     * @return string
     */
    public function indexPostal(): string
    {
        $model = new PostalModel();
        
        $b = new Breadcrumb();
        $b->add('Home', route_to('school_home'));
        $b->add('アップロード管理', null);
    
        $data = [
            'postals' => $model->paginate(100),
            'pager' => $model->pager,
            'breadcrumb' => $b->render(),
        ];
    
        return view(route_to('postal_upload_get'), $data);
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
            return view(route_to('postal_upload_get'), $data);
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
        
        return redirect('postal_upload_get');
    }
}
