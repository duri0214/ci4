<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Breadcrumb;
use CodeIgniter\HTTP\RedirectResponse;
use TCPDF;

class SchoolReportController extends BaseController
{
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
     * @return RedirectResponse
     */
    public function enrollment(): RedirectResponse
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
    
        // from html
        $html = view('school/report/certificate/school/demo/enrollment');
        $tcpdf->writeHTML($html);
    
        // ヨコA4ページを追加し、右90度回し
        $tcpdf->AddPage('L', ['Rotate' => 90]);
        $tcpdf->Cell(0, 0, 'A4 LANDSCAPE', 1, 1, 'C');
        
        // 保存
        $tcpdf->Output('D:\onedrive\ダウンロード\enrollment.pdf', 'F');
    
        // もとのページに戻る
        return redirect()->back()->with('success', '在籍証明書のダウンロードが完了しました');
    }
}
