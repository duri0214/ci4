<?php

namespace App\Controllers;

use App\Models\Domain\Logic\School\Demo\HighSchool\Csv\GradesEntity;
use App\Models\Domain\Logic\School\Demo\HighSchool\Csv\GradesRepository;
use App\Models\VocabularyBookModel;
use App\Service\CsvService;
use CodeIgniter\HTTP\ResponseInterface;
use JetBrains\PhpStorm\NoReturn;
use Mpdf\Mpdf;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

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
    public function message(string $to = 'World'): void
    {
        echo "Hello $to!" . PHP_EOL;
    }
    
    #[NoReturn] public function csvExport(): void
    {
        // 配置はガチャガチャにしてある
        $gradesRecords = [
            [
                'score4' => 97,
                'score5' => 100,
                'score6' => 2,
                'user_id' => 1,
                'name' => 'yoshitaka1',
                'score1' => 100,
                'score2' => 99,
                'score3' => 98,
            ],
            [
                'user_id' => 2,
                'name' => 'yoshitaka2',
                'score1' => 100,
                'score2' => 99,
                'score3' => 98,
                'score4' => 97,
                'score5' => 100,
                'score6' => 2,
            ],
            [
                'score2' => 99,
                'score3' => 98,
                'score4' => 97,
                'user_id' => 3,
                'name' => 'yoshitaka3',
                'score1' => 100,
                'score5' => 100,
                'score6' => 2,
            ]
        ];
        
        $repository = new GradesRepository();
        foreach ($gradesRecords as $gradesRecord) {
            $repository->addRecord(new GradesEntity($gradesRecord));
        }
    
        $service = new CsvService($repository);
        $service->export('home_controller.csv');
    }
    
    public function rotatePdf(): string
    {
        // 基本、タテA4の枠組みで出力
        $config = [
            'fontDir' => APPPATH.'../public/assets/font/IPA',
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
            'name' => '大坂学園',
            'numbers' => [1, 2, 3],
            'a_student' => ["name" => "George", "class_room" => "1-A"],
            'has_flg' => false,
        ];
    
        $twig = new Environment(new FilesystemLoader(APPPATH.'Views/home'));
        $html = $twig->render('rotatePdf.html.twig', $data);
        
        // 1ページ目はtemplateからのparse
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
