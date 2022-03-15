<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\ConvertFile;
use App\Models\LessonModel;
use App\Models\PostalModel;
use CodeIgniter\HTTP\RedirectResponse;
use ReflectionException;

use function PHPUnit\Framework\fileExists;

class SchoolUploadController extends BaseController
{
    const TRIM_LIST = ["\""];
    
    public function indexLesson(): string
    {
        return view(route_to("lesson_upload_get"));
    }
    
    /** Fetch all records
     * @return string
     */
    public function indexPostal(): string
    {
        $model = new PostalModel();
        $data['postals'] = $model->findAll();
    
        return view(route_to("postal_upload_get"), $data);
    }
    
    /** File upload and Insert records <br>
     * https://qiita.com/shosho/items/b38d653a960bbbc010d6 PHPでSJISのデカイCSVデータを扱った時に困ったこと
     * @throws ReflectionException
     */
    public function importFile(): string|RedirectResponse
    {
        // Validation
        // $input = $this->validate(
        //     ['file' => 'KEN_ALL[file]|ext_in[file,csv],']
        // );
        //
        // if (!$input) {
        //     // Not valid then return index for upload
        //     $data['validation'] = $this->validator;
        //     return view("school/lesson/upload", $data);
        // }
        
        // TODO: サイズオーバーを対処して
        // Valid
        if ($file = $this->request->getFile('file')) {
            if ($file->isValid() && !$file->hasMoved()) {
                // Store file in public/csvfile/ folder
                $file->move("../writable/uploads/", $file->getName(), true);
                $files["sjis"] = "../writable/uploads/".$file->getName();
    
                // convert to utf8
                $files["utf8"] = ConvertFile::sjisToUtf8($files["sjis"]);
                
                // Reading file
                $file = fopen($files["utf8"], "r");
                $i = 0;
                $numberOfFields = 15; // Total number of fields
                
                $records = [];
                
                // Initialize $lessons Array
                while (($fileData = fgetcsv($file, 1000, ",")) !== false) {
                    $num = count($fileData);
                    
                    // Check number of fields
                    if ($num == $numberOfFields) {
                        echo implode(',', $fileData);
                        // Key names are the insert table field names
                        $records[$i]['code'] = str_replace(self::TRIM_LIST, '', $fileData[2]);
                        $records[$i]['prefecture'] = str_replace(self::TRIM_LIST, '', $fileData[6]);
                        $records[$i]['municipality'] = str_replace(self::TRIM_LIST, '', $fileData[7]);
                        $records[$i]['town'] = str_replace(self::TRIM_LIST, '', $fileData[8]);
                    }
                    $i++;
                }
                fclose($file);
                
                // Insert data
                if (count($records) > 0) {
                    $model = new PostalModel();
                    $model->truncate();
                    $model->insertBatch($records);
                }
                
                // Delete upload files
                foreach ($files as $file) {
                    unlink($file);
                }
                
                // Set Session
                session()->setFlashdata('message', count($records).' Record inserted successfully!');
                session()->setFlashdata('alert-class', 'alert-success');
            } else {
                // Set Session
                session()->setFlashdata('message', 'File not imported.');
                session()->setFlashdata('alert-class', 'alert-danger');
            }
        } else {
            // Set Session
            session()->setFlashdata('message', 'File not imported.');
            session()->setFlashdata('alert-class', 'alert-danger');
        }
        
        return redirect()->route("postal_upload_get");
    }
}
