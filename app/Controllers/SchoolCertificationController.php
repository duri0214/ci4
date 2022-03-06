<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Breadcrumb;
use App\Models\CertificationMasterModel;
use App\Models\CertificationModel;

class SchoolCertificationController extends BaseController
{
    public function index(): string
    {
        $model = model(CertificationModel::class);
    
        $b = new Breadcrumb();
        $b->add('Home', route_to('school_home'));
        $b->add('資格一覧', null);
    
        $data = [
            'certifications' => $model->findAll(),
            'breadcrumb' => $b->render(),
        ];
    
        return view("school/certification/list", $data);
    }
    
    /** 取扱資格編集画面 初期表示
     * @return string
     */
    public function editGet(): string
    {
        // TODO: left join っていうかリレーション辿れないの！？
        // certDataのドメインクラスが必要かな
        $certMaster = model(CertificationMasterModel::class);
        $certUsing = model(CertificationModel::class);
    
        // TODO: Demoになってます
        $schoolId = SchoolController::SCHOOL_LIST['Demo'];
        
        $certData = [];
        foreach ($certMaster->findAll() as $m_item) {
            $certData[$m_item->id]['name'] = $m_item->name;
            foreach ($certUsing->where('school_id', $schoolId)->findAll() as $u_item) {
                $certData[$m_item->id]['id'] = $u_item['id'];
                $certData[$m_item->id]['m_certification_id'] = $m_item['id'];
                $certData[$m_item->id]['name_short'] = $u_item['name_short'];
            }
        }
        
        $b = new Breadcrumb();
        $b->add('Home', route_to('school_home'));
        $b->add('資格一覧', route_to('certification_list'));
        $b->add('取扱資格編集', null);
    
        $data = [
            'certifications' => $certData,
            'breadcrumb' => $b->render(),
        ];

        return view("school/certification/edit", $data);
    }
    
    /** 取扱資格編集画面 編集
     * @return string
     */
    public function editPost(): string
    {
    
    }
}
