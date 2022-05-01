<?php

namespace App\Controllers;

use App\Libraries\Breadcrumb;
use App\Models\SchoolCertItemModel;
use App\Models\SchoolCertModel;
use CodeIgniter\HTTP\RedirectResponse;
use ReflectionException;

class SchoolCertController extends BaseController
{
    public function certList(): string
    {
        // 動作確認OK！
        // TODO: certの柄編集削除のPOST処理もここに入ります
        
        $model = service('schoolCertModel');
    
        $b = new Breadcrumb();
        $b->add('Home', route_to('school_home'));
        $b->add('資格一覧', null);
    
        $data = [
            'certs' => $model->findAll(),
            'breadcrumb' => $b->render(),
        ];
    
        return view(route_to('cert_list'), $data);
    }
    
    /**
     * 資格1つの内訳アイテムを編集
     * @param int $cert_id
     * @return string
     */
    public function certItemList(int $cert_id): string
    {
        // 動作確認OK！
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
     * @return void
     */
    public function certInfoRegister(): void
    {
        // 動作確認OK！
        
        // TODO: validation(callback) and redirect
        helper(['form', 'url']);
        if ($this->validate([
            'selected_cert_single' => 'required',
            'selected_cert_multi'  => 'required',
        ])) {
            // can register
            // dd(['validate成功', $this->request->getPost()]);
            $this->certList();
        }
        $this->certList();
    }
    
    /**
     * @return string|RedirectResponse
     * @throws ReflectionException
     */
    public function addNewItem(): string|RedirectResponse
    {
        $model = model(SchoolCertModel::class);
        if ($this->validate($this->getValidationRules())) {
            $model->save(
                [
                    'school_id' => 1,
                    'name'  => $this->request->getPost('newItemName'),
                    'remark'  => 'hello!',
                ]
            );
            // success: listに戻る
            session()->setFlashdata('success', $this->request->getPost('newItemName').' が登録されました');
            return redirect()->route('cert_list');
        } else {
            // error
            $model = service('schoolCertModel');
            $b = new Breadcrumb();
            $b->add('Home', route_to('school_home'));
            $b->add('資格一覧', null);
            $data = [
                'certs' => $model->findAll(),
                'breadcrumb' => $b->render(),
                'validation' => $this->validator,
            ];
            return view(route_to('cert_list'), $data);
        }
    }
    
    /**
     * バリデーションルールの配列を取得
     * @return array
     */
    private function getValidationRules(): array
    {
        return [
            'newItemName' => [
                'label'  => '資格名',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} は必須入力です'
                ]
            ],
        ];
    }
}
