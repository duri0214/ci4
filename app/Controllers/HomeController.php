<?php

namespace App\Controllers;

use App\Models\VocabularyBookModel;
use CodeIgniter\HTTP\ResponseInterface;
use Mpdf\Mpdf;

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
    
    public function rotatePdf(): string
    {
        // 基本、タテA4の枠組みで出力
        $config = [
            'fontDir' => __DIR__.'/../../public/assets/font/IPA',
            'fontdata' => [
                'ipafont-m' => [
                    'R' => 'ipamp.ttf',  // regular
                ],
                'ipafont-g' => [
                    'R' => 'ipagp.ttf',  // regular
                ],
            ],
            'mode' => 'ja+aCJK',
            'format' => 'A4-P', // or 'A4-L'
        ];
        $mPdf = new mPDF($config);
        
        $data = [
            'name' => '十文字学園（大坂）'
        ];
        
        // 1ページ目はtemplateからのparse
        $parser = service('parser');
        $html = $parser->setData($data)->render('home/rotatePdf');
        $mPdf->WriteHTML($html);
        
        // 2ページ目はヨコA4の枠組みで出力
        $mPdf->AddPage('L');
        $mPdf->WriteHTML('Hello page 2');
        
        // pdfとして出力
        $mPdf->Output('estimate.pdf', 'D');
        
        // もとのページに戻る
        return view('home/index');
    }
}
