<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SchoolExcelController extends BaseController
{
    /**
     * /Home/excelExport/ にアクセスしたときにEXCELがダウンロードされる
     * @return void
     * @throws Exception
     */
    public function excelExport(): void
    {
        // bookを作成
        $book = new Spreadsheet();
        
        // bookのプロパティを設定
        $book->getProperties()->setTitle("aaaタイトル");
        
        // シート作成
        $sheet = $book->getActiveSheet();
        $sheet->UnFreezePane(); // セルの固定を解除
        $sheet->setTitle("aaaシートタイトル");
        
        // 値を設定
        $sheet->setCellValue('A1', 'Hello');
        $sheet->setCellValue('B1', 'PhpSpreadsheet');
        $sheet->setCellValue('C1', 'World');
        
        // テキストの中央寄せ
        $sheet->getStyle('A1:B1')->applyFromArray(['alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER]]);
        
        // 枠線を設定
        $sheet->getStyle('B1')->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN);
        
        // 列の横幅を設定
        $sheet->getColumnDimension('B')->setWidth(8);
        
        // セルを連結
        $sheet->mergeCells('C1:D1');
        
        // テキストの縦寄せ
        $sheet->getStyle('C1:D1')->getAlignment()->setVertical(Alignment::VERTICAL_TOP);
        
        // テキストの折り返しを設定
        $sheet->getStyle('C1')->getAlignment()->setWrapText(true);
        
        // 配列の形で値を設定
        $dataList = [
            ['Happy Bingo!'],
            ['B', 'I', 'N', 'G', 'O'],
            [26, 15, 18, 17, 13],
            ['6', '11', 2, 5, '14'],
            [1, 8, null, 4, 19],
            [21, 27, 3, 20, 24],
            [16, 22, 23, 25, 12],
        ];
        $sheet->fromArray($dataList, null, 'C6', true);
        
        // バッファをクリア
        ob_end_clean();
        
        $fileName = "sample.xlsx";
        
        // ダウンロード
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$fileName.'"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');
        
        $writer = new Xlsx($book);
        $writer->save('php://output');
        
        exit();
    }
}
