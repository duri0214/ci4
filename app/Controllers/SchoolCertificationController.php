<?php

namespace App\Controllers;

use App\Entities\CertificationEntity;
use App\Libraries\Breadcrumb;
use App\Models\CertificationItemsModel;
use App\Models\CertificationMasterModel;
use App\Models\CertificationModel;
use CodeIgniter\HTTP\RedirectResponse;
use ReflectionException;

class SchoolCertificationController extends BaseController
{
    public function list(): string
    {
        $model = model(CertificationModel::class);
    
        $b = new Breadcrumb();
        $b->add('Home', route_to('school_home'));
        $b->add('資格一覧', null);
    
        $data = [
            'certifications' => $model->findAll(),
            'breadcrumb' => $b->render(),
        ];
    
        return view('school/certification/list', $data);
    }
    
    /**
     * 取扱資格管理画面 初期表示
     * @return string
     */
    public function manageGet(): string
    {
        // TODO: left join っていうかリレーション辿れないの！？
        // certDataのドメインクラスが必要かな
        $certMaster = model(CertificationMasterModel::class);
        $certUsing = model(CertificationModel::class);
    
        // TODO: Demoになってます
        $schoolId = SchoolController::SCHOOL_LIST['Demo'];
        
        $certData = [];
        $m_certification_ids = array_column($certUsing->where('school_id', $schoolId)->findAll(), 'm_certification_id');
        foreach ($certMaster->findAll() as $m_item) {
            $certData[$m_item->id]['name'] = $m_item->name;
            $alreadyManaged = in_array($m_item->id, $m_certification_ids);
            $certData[$m_item->id]['checked'] = $alreadyManaged ? 'checked' : null;
        }
        
        $b = new Breadcrumb();
        $b->add('Home', route_to('school_home'));
        $b->add('資格一覧', route_to('certification_list'));
        $b->add('取扱資格編集', null);
    
        $data = [
            'certifications' => $certData,
            'breadcrumb' => $b->render(),
        ];

        return view('school/certification/manage', $data);
    }
    
    /**
     * 取扱資格管理画面 編集
     * @return RedirectResponse
     * @throws ReflectionException
     */
    public function managePost(): RedirectResponse
    {
        $checks = $this->request->getPost('checked');
        $nameShort = $this->request->getPost('name_short');
    
        // TODO: Demoになってます
        $schoolId = SchoolController::SCHOOL_LIST['Demo'];
    
        $model = model(CertificationModel::class);
        $alreadyExists = $model->where('school_id', $schoolId)->findAll();
    
        $createRecords = [];
        // finding turn on records
        foreach (array_keys($checks) as $certificationId) {
            if (!in_array($certificationId, array_column($alreadyExists, 'm_certification_id'))) {
                $createRecords[] = new CertificationEntity([
                    'school_id' => $schoolId,
                    'm_certification_id' => $certificationId,
                    'name_short' => $nameShort[$certificationId]
                ]);
            }
        }
        if (isset($createRecords) && count($createRecords) > 0) {
            $model->insertBatch($createRecords);
        }
    
        // finding turn off records
        foreach ($alreadyExists as $certification) {
            if (!in_array($certification->m_certification_id, array_keys($checks))) {
                $model->delete($certification->id);
            }
        }
        
        return redirect('certification_list');
    }
    
    /**
     * 資格1つの内訳アイテムを編集
     * @param int $certification_id
     * @return string
     */
    public function detail(int $certification_id): string
    {
        $model = model(CertificationModel::class);
        $certification['name'] = $model->find($certification_id)->name_short;
    
        $model = model(CertificationItemsModel::class);
        $certification['items'] = $model->where('certification_id', $certification_id)->findAll();
        
        $b = new Breadcrumb();
        $b->add('Home', route_to('school_home'));
        $b->add('資格一覧', route_to('certification_list'));
        $b->add('資格編集', null);
    
        $data = [
            'certification' => $certification,
            'breadcrumb' => $b->render(),
        ];
    
        return view('school/certification/detail', $data);
    }
    
    /**
     * 資格のその他情報の登録
     * @return RedirectResponse
     */
    public function infoRegister(): RedirectResponse
    {
        // TODO: validation(callback), redirect
        // dd($this->request->getPost());
        
        return redirect('certification_list');
    }
}
