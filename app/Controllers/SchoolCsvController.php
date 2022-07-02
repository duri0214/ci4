<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SchoolCsvController extends BaseController
{
    /**
     * /Home/csvExport/ にアクセスしたときにCSVがダウンロードされる
     * @return string
     */
    public function csvExport(): string
    {
        // load from user table into entity
        $user = [
            ['id' => 1, 'name' => 'Aさん', 'email' => 'aaa@a.com', 'password' => 'abcba'],
            ['id' => 2, 'name' => 'Bさん', 'email' => 'bbb@b.com', 'password' => 'bcdcb'],
            ['id' => 3, 'name' => 'Cさん', 'email' => 'ccc@c.com', 'password' => 'cdedc'],
        ];
        // load from grades table into entity
        $grades = [
            ['id' => 1, 'name' => 'Aさん', 'score1' => 100, 'score2' => 70],
            ['id' => 2, 'name' => 'Bさん', 'score1' => 99, 'score2' => 50],
            ['id' => 3, 'name' => 'Cさん', 'score1' => 29, 'score2' => 100],
        ];
        
        // mixing entities
        // ...
        
        $header = ['id', 'name', 'email', 'password', 'score1', 'score2'];
        $csvFileName = 'sample.csv';
    
        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=$csvFileName");
    
        // open stream
        $stream = fopen('php://output', 'w');
        
        // UTF-8 BOM for excel open.
        fputs($stream, (chr(0xEF) . chr(0xBB) . chr(0xBF)));
        
        // write header and data
        fputcsv($stream, $header, ',', '"');
        foreach ($user as $row) {
            fputcsv($stream, $row, ',', '"');
        }
        
        // close stream
        fclose($stream);
        
        // TODO: 出力されたCSVにデバッグ情報がついてしまう
        return view('home/index');
    }
}
