<?php

namespace App\Controllers;

use App\Models\VocabularyBookModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
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
