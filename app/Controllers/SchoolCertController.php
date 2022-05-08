<?php

namespace App\Controllers;

use App\Libraries\Breadcrumb;
use App\Models\SchoolCertItemModel;
use App\Models\SchoolCertModel;
use CodeIgniter\HTTP\RedirectResponse;
use ReflectionException;

class SchoolCertController extends BaseController
{
    private $validationRules = [
        [
            'newItemName' => [
                'label'  => '資格名',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} は必須入力です'
                ]
            ]
        ],
        [
            'selected_cert_single' => [
                'label'  => '資格名（単数）',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} は必須入力です'
                ]
            ],
            'selected_cert_multi' => [
                'label'  => '資格名（複数）',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} は必須入力です'
                ]
            ]
        ]
    ];
    
    public function __construct()
    {
        $repository = service('schoolLoginRepository');
        $this->login = $repository->getTablesRelatedByLoggedInUser($_SESSION['logged_in']);
    }
    
    public function certList(): string
    {
        // TODO: certの柄編集削除のPOST処理もここに入ります
        
        $model = service('schoolCertModel');
    
        $b = new Breadcrumb();
        $b->add('Home', route_to('school_home'));
        $b->add('資格一覧', null);
    
        $data = [
            'certs' => $model->findAll(),
            'breadcrumb' => $b->render(),
        ];
    
        return view('school/cert/list', $data);
    }
    
    /**
     * 資格1つの内訳アイテムを編集
     * @param int $cert_id
     * @return string
     */
    public function certItemList(int $cert_id): string
    {
        // TODO: itemの柄編集削除のPOST処理もここに入ります
        
        $model = model(SchoolCertModel::class);
        $cert['name'] = $model->find($cert_id)->name;
    
        $model = model(SchoolCertItemModel::class);
        $cert['items'] = $model->where('school_cert_id', $cert_id)->findAll();
        
        $b = new Breadcrumb();
        $b->add('Home', route_to('school_home'));
        $b->add('資格一覧', route_to('cert_list'));
        $b->add('資格編集', null);
    
        $data = [
            'cert' => $cert,
            'breadcrumb' => $b->render(),
        ];
    
        return view('school/cert/item/list', $data);
    }
    
    /**
     * 資格のその他情報の登録（資格一覧のドロップダウン部分）
     * @return RedirectResponse
     */
    public function certInfoRegister(): RedirectResponse
    {
        if ($this->validate($this->validationRules[1])) {
            // TODO: 登録時の処理
            return redirect()->back()->withInput()->with('success', '◯◯ が登録されました（処理未作成）');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }
    }
    
    /**
     * @return RedirectResponse
     * @throws ReflectionException
     */
    public function addNewItem(): RedirectResponse
    {
        $model = model(SchoolCertModel::class);
        $schoolId = $this->login['schoolUser']->school_id;
        $itemName = $this->request->getPost('newItemName');
        if ($this->validate($this->validationRules[0])) {
            if (!$model->exists($schoolId, $itemName)) {
                $model->save(
                    [
                        'school_id' => $schoolId,
                        'name'  => $itemName,
                        'remark'  => 'hello!',
                    ]
                );
                return redirect()->back()->withInput()->with('success', $itemName.' が登録されました');
            } else {
                return redirect()->back()->withInput()->with('errors', $itemName.' はすでに登録されています');
            }
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }
    }
}
