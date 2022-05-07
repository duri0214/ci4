<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\SchoolUserEntity;
use App\Libraries\Breadcrumb;
use CodeIgniter\HTTP\RedirectResponse;

class SchoolAdminController extends BaseController
{
    public function menu(): string
    {
        $b = new Breadcrumb();
        $b->add('Home', route_to('school_home'));
        $b->add('システム管理', null);
    
        $data = [
            'breadcrumb' => $b->render(),
        ];
        
        return view('school/admin/menu', $data);
    }
    
    public function unregisteredList(): string
    {
        $b = new Breadcrumb();
        $b->add('Home', route_to('school_home'));
        $b->add('システム管理', route_to('school_admin_menu'));
        $b->add('未登録管理', null);
    
        $data = [
            'users' => service('userModel')->getUnregisteredSchoolUsers(),
            'schools' => service('schoolModel')->findAll(),
            'breadcrumb' => $b->render(),
        ];
    
        return view('school/admin/unregistered/list', $data);
    }
    
    public function userRegister(): RedirectResponse
    {
        $schoolId = $this->request->getPost('school_id');
        $users = $this->request->getPost('registration_users');
        
        if (isset($users)) {
            $list = [];
            foreach ($users as $user_k => $user) {
                $entity = new SchoolUserEntity();
                $entity->school_id = $schoolId;
                $entity->user_id = $user_k;
                $list[] = $entity;
            }
            service('schoolUserModel')->insertBatch($list);
            return redirect()->back()->withInput()->with('success', count($users).' 件の登録が完了しました');
        }
        
        return redirect()->back()->withInput()->with('success', '0 件の登録が完了しました');
    }
}
