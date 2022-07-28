<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Breadcrumb;
use Mpdf\Mpdf;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class SchoolReportController extends BaseController
{
    public const DIRECTORY = [
        'enrollment' => APPPATH.'Views/school/report/enrollment/school'
    ];
    public const PDF_CONFIG = [
        'fontDir' => __DIR__.'/../../public/assets/font/IPA',
        'fontdata' => [
            'ipafont-m' => [
                'R' => 'ipamp.ttf',
            ],
            'ipafont-g' => [
                'R' => 'ipagp.ttf',
            ],
        ],
        'mode' => 'ja+aCJK',
        'format' => 'A4-P', // or 'A4-L'
    ];
    public const TEMPLATE_NAME = '/enrollment.html.twig';
    
    public function __construct()
    {
        $repository = service('schoolLoginRepository');
        $this->login = $repository->getTablesRelatedByLoggedInUser($_SESSION['logged_in']);
    }
    
    public function menu(): string
    {
        $b = new Breadcrumb();
        $b->add('Home', route_to('school_home'));
        $b->add('証明書管理｜メニュー', null);
        
        $data = [
            'breadcrumb' => $b->render(),
        ];
        
        return view('school/report/menu', $data);
    }
    
    /**
     * 在籍証明書
     * @return string
     */
    public function enrollment(): string
    {
        $mPdf = new mPDF(self::PDF_CONFIG);
        
        // TODO: helper化すべきか？
        $schoolCode = mb_strtolower($this->login['school']->code);
        $folder = self::DIRECTORY['enrollment']."/$schoolCode";
        if (!file_exists($folder.self::TEMPLATE_NAME)) {
            $folder = self::DIRECTORY['enrollment']."/default";
        }

        $data = [
            'school_attr' => [
                'name' => $this->login['school']->name,
                'headmaster' => '佐伯 十四夫'
            ],
            'student_attr' => [
                'name' => '岡田義隆',
                'name_kana' => 'おかだよしたか',
                'birthday' => '1982-2-14'
            ],
            'publish' => [
                'caption' => 'デモ高証',
                'number' => random_int(1, 999),
                'date' => date('Y-m-d')
            ],
        ];
    
        // 1ページ目はtemplateからのparse
        $twig = new Environment(new FilesystemLoader($folder));
        $html = $twig->render(self::TEMPLATE_NAME, $data);
        $mPdf->WriteHTML($html);
        
        // 2ページ目はヨコA4の枠組みで出力
        $mPdf->AddPage('L');
        $mPdf->WriteHTML('Hello page 2');
        
        // pdfとして出力
        $mPdf->Output('estimate.pdf', 'D');
    
        // もとのページに戻る
        return view('school/report/menu');
    }
}
