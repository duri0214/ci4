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
            'newCertName' => [
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
    
    /**
     * 資格: 一覧表示
     * @return string
     */
    public function certList(): string
    {
        $model = new SchoolCertModel();
    
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
     * 資格: 更新 TODO: 動きを作りたかっただけなのでこの処理自体いらない（Routes.phpから削除済み）
     * @return RedirectResponse
     */
    // public function certInfoRegister(): RedirectResponse
    // {
    //     // ドロップダウン「資格を選択してください」部分
    //     // 2つのドロップダウンをなにか選択して「編集」を押すと登録処理
    //     if ($this->validate($this->validationRules[1])) {
    //         return redirect()->back()->withInput()->with('success', '◯◯ が登録されました（TODO: 処理未作成）');
    //     } else {
    //         return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
    //     }
    // }
    
    /**
     * 資格: 作成
     * @return RedirectResponse
     * @throws ReflectionException
     */
    public function createCert(): RedirectResponse
    {
        $model = new SchoolCertModel();
        $schoolId = $this->login['schoolUser']->school_id;
        $newCertName = $this->request->getPost('newCertName');
        $newCertRemark = $this->request->getPost('newCertRemark');
        if ($this->validate($this->validationRules[0])) {
            if (!$model->exists($schoolId, $newCertName)) {
                $model->save(
                    [
                        'school_id' => $schoolId,
                        'name'  => $newCertName,
                        'remark'  => $newCertRemark,
                    ]
                );
                return redirect()->back()->withInput()->with('success', $newCertName.' が登録されました');
            } else {
                return redirect()->back()->withInput()->with('errors', $newCertName.' はすでに登録されています');
            }
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }
    }
    
    /**
     * 資格内訳: 一覧表示
     * @param int $certId
     * @return string
     */
    public function certItemList(int $certId): string
    {
        $model = new SchoolCertModel();
        $cert['id'] = $certId;
        $cert['name'] = $model->find($certId)->name;
    
        $model = model(SchoolCertItemModel::class);
        $cert['items'] = $model->where('school_cert_id', $certId)->findAll();
        
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
     * 資格内訳: 作成
     * @return RedirectResponse
     */
    public function createCertItem(): RedirectResponse
    {
        return redirect()->back()->withInput()->with('success', '資格内訳アイテムの作成が完了しました（TODO: 処理未作成）');
    }
    
    /**
     * 資格内訳: 更新
     * @param int $certItemId
     * @return RedirectResponse
     */
    public function updateCertItem(int $certItemId): RedirectResponse
    {
        return redirect()->back()->withInput()->with('success', '資格内訳アイテムの更新が完了しました（TODO: 処理未作成）');
    }
    
    /**
     * 資格内訳: 削除
     * @param int $certItemId
     * @return RedirectResponse
     */
    public function deleteCertItem(int $certItemId): RedirectResponse
    {
        return redirect()->back()->withInput()->with('success', '資格内訳アイテムの削除が完了しました（TODO: 処理未作成）');
    }
}
