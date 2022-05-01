<?php

namespace App\Controllers;

use App\Libraries\Breadcrumb;
use App\Libraries\ConvertFile;
use App\Models\MPostalModel;
use CodeIgniter\HTTP\RedirectResponse;
use ReflectionException;

class SchoolUploadController extends BaseController
{
    public const UPLOAD_FOLDER = "../writable/uploads/";
    
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
    
        return view(route_to('lesson_upload_get'), $data);
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
    
        return view(route_to('postal_upload_get'), $data);
    }
    
    /**
     * File upload and Insert records
     * @throws ReflectionException
     */
    public function importFile(): string|RedirectResponse
    {
        $model = new MPostalModel();
    
        // Validation
        $input = $this->validate($this->getValidationRules());
        if (!$input) {
            // Not valid then return index for upload
            $b = new Breadcrumb();
            $b->add('Home', route_to('school_home'));
            $b->add('アップロード管理', null);
    
            $data = [
                'postals' => $model->paginate(15),
                'pager' => $model->pager,
                'breadcrumb' => $b->render(),
                'validation' => $this->validator,
            ];
            return view(route_to('postal_upload_get'), $data);
        }
    
        $model = new MPostalModel();
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
            session()->setFlashdata('success', $records.' 件 登録されました '.date("Y/m/d H:i:s"));
        }
        
        return redirect()->route('postal_upload_get');
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
