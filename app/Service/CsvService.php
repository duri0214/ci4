<?php

namespace App\Service;

use App\Models\Domain\Logic\Csv\Encode\Sjis;
use App\Repository\AbstractRepository;
use JetBrains\PhpStorm\NoReturn;

class CsvService
{
    private AbstractRepository $repository;
    
    /**
     * @param AbstractRepository $repository
     */
    public function __construct(AbstractRepository $repository)
    {
        $this->repository = $repository;
    }
    
    /**
     * ブラウザ経由でコントローラから呼ぶとCSVがダウンロードできる
     * @param string $csvFileName
     * @return void
     */
    #[NoReturn] public function export(string $csvFileName): void
    {
        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=$csvFileName");
        
        // open stream
        $stream = fopen('php://output', 'w');
        
        // write header and data
        foreach ($this->repository->publish(new Sjis()) as $record) {
            fputcsv($stream, $record);
        }
        
        // close stream
        fclose($stream);
        
        exit();
    }
    
    public function import(string $csvFileName): IRepository
    {
        $repository = null;
        // 前処理して TODO: app/Controllers/SchoolUploadController.php, app/Libraries/ConvertFile.php も参考に
        // ...Demo\HighSchool\Csv\Grades::checkValidation($record)
        // if ($numberOfCsvHeaderColumns == $this->numberOfFields) {
        //     // 入力する
        //     $repository = import_from_csv($this->records);
        // }
        
        return $repository;
    }
}
