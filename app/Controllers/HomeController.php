<?php

namespace App\Controllers;

use App\Models\VocabularyBookModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use TCPDF;

class HomeController extends BaseController
{
    /**
     * @return string
     */
    public function index(): string
    {
        $vocabularyBook = new VocabularyBookModel();
    
        $sentences = [];
        foreach ($vocabularyBook->findAll() as $row) {
            var_dump($row->id);  // entityに接続されているか(intになっているか）点検
            $sentenceArray = explode(' ', $row->sentence);
            shuffle($sentenceArray);
            $sentences[] = $sentenceArray;
        }
        $data['vocabulary_book'] = $sentences;
        
        return view('home/index', $data);
    }
    
    /**
     * /Home/store にパラメータつきでアクセスしたときにJsonを返す(APIタイプ)
     * @param string $a
     * @param int $b
     * @return ResponseInterface
     */
    public function store(string $a = 'Home', int $b = 8): ResponseInterface
    {
        helper('text');
        return $this->response->setJSON(
            ["a" => $a, "b" => $b, "c" => random_string('crypto', $b)]
        );
    }
    
    /**
     * dev\ci4> php public/index.php HomeController message
     * @param string $to
     * @return void
     */
    public function message(string $to = 'World')
    {
        echo "Hello $to!" . PHP_EOL;
    }
    
    /**
     * /Home/csvExport/ にアクセスしたときにCSVがダウンロードされる
     * @return string
     */
    public function csvExport(): string
    {
        $user = [
            ['id' => 1, 'name' => 'Aさん', 'email' => 'aaa@a.com', 'password' => 'abcba'],
            ['id' => 2, 'name' => 'Bさん', 'email' => 'bbb@b.com', 'password' => 'bcdcb'],
            ['id' => 3, 'name' => 'Cさん', 'email' => 'ccc@c.com', 'password' => 'cdedc'],
        ];
        $header = ['id', 'name', 'email', 'password'];
        $csvFileName = 'sample.csv';
        
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
        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=$csvFileName");
        header('Content-Transfer-Encoding: binary');
        
        // 出力されたCSVにデバッグ情報がついてしまう
        return view('home/index');
    }
    
    /**
     * /Home/excelExport/ にアクセスしたときにEXCELがダウンロードされる
     * @return string
     * @throws Exception
     */
    public function excelExport(): string
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
        
        // TODO: 出力されたexcelファイルがつねに壊れている？
        return view('home/index');
    }
    
    public function rotatePdf(): RedirectResponse
    {
        // 基本、タテA4の枠組みで出力
        $tcpdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        
        // set document information
        $tcpdf->SetCreator('TCPDF');
        $tcpdf->SetAuthor('yoshi.');
        $tcpdf->SetTitle('TCPDF Title');
        $tcpdf->SetSubject('TCPDF Subject');
        $tcpdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // 標準ではヘッダがつくのでいまは除外
        $tcpdf->setPrintHeader(false);
        $tcpdf->setPrintFooter(false);
    
        // タテA4ページを追加
        $tcpdf->AddPage('P');
        $tcpdf->Cell(0, 0, 'A4 PORTRAIT', 1, 1, 'C');
        
        // ヨコA4ページを追加し、右90度回し
        $tcpdf->AddPage('L', ['Rotate' => 90]);
        $tcpdf->Cell(0, 0, 'A4 LANDSCAPE', 1, 1, 'C');
        
        // from html
        $html = "<h1>Hello World!</h1>";
        $tcpdf->writeHTML($html);
        
        // 保存
        $tcpdf->Output('D:\onedrive\ダウンロード\sample_rotated.pdf', 'F');
    
        // もとのページに戻る
        return redirect()->back();
    }
}
