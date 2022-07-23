<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Breadcrumb;
use Mpdf\Mpdf;
use Mpdf\MpdfException;

class SchoolReportController extends BaseController
{
    public const SCHOOL_REPORT = [
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
     * @throws MpdfException
     */
    public function enrollment(): string
    {
        $mPdf = new mPDF(self::PDF_CONFIG);
        
        // from html
        $schoolCode = $this->login['school']->code;
        $viewPaths = [
            'file' => self::SCHOOL_REPORT['enrollment']."/$schoolCode/enrollment.php",
            'default' => 'school/report/enrollment/school/default/enrollment',
            'mySchool' => "school/report/enrollment/school/$schoolCode/enrollment",
        ];
        $data = [
            'school_attr' => [
                ['name' => $this->login['school']->name, 'headmaster' => 'こうちょうう']
            ],
            'student_attr' => [
                ['name' => '岡田義隆', 'name_kana' => 'おかだよしたか', 'birthday' => '1982-2-14']
            ],
            'publish' => [
                ['number' => random_int(1, 999),'date' => date('Y-m-d')]
            ],
        ];
    
        // TODO: Bootstrapが効かないので生CSSで書き直し Twigにする？ https://twig.symfony.com/
        // 1ページ目はtemplateからのparse
        $parser = service('parser');
        $html = $parser->setData($data)
            ->render(file_exists($viewPaths['file']) ? $viewPaths['mySchool'] : $viewPaths['default']);
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
