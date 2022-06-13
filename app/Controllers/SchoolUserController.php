<?php

namespace App\Controllers;

use App\Libraries\Breadcrumb;
use App\Models\SchoolRoleModel;
use App\Models\SchoolSubSubjectModel;
use App\Repository\LoginRepository;
use App\Repository\UserRepository;
use CodeIgniter\HTTP\RedirectResponse;

class SchoolUserController extends BaseController
{
    private LoginRepository $loginRepository;
    private UserRepository $userRepository;
    private SchoolRoleModel $schoolRoleModel;
    private SchoolSubSubjectModel $schoolSubSubjectModel;
    
    public function __construct()
    {
        $this->loginRepository = new LoginRepository();
        $this->userRepository = new UserRepository();
        $this->schoolRoleModel = new SchoolRoleModel();
        $this->schoolSubSubjectModel = new SchoolSubSubjectModel();
        
        $this->login = $this->loginRepository->getTablesRelatedByLoggedInUser($_SESSION['logged_in']);
    }
    
    /**
     * @return string
     */
    public function userList(): string
    {
        $b = new Breadcrumb();
        $b->add('Home', route_to('school_home'));
        $b->add('ユーザー管理', null);

        $data = [
            'users' => $this->userRepository->getUserList($this->login['school']->id),
            'breadcrumb' => $b->render(),
        ];
        
        return view('school/admin/user/list', $data);
    }
    
    public function userDetail(int $userId): string
    {
        $b = new Breadcrumb();
        $b->add('Home', route_to('school_home'));
        $b->add('ユーザー管理', route_to('user_list'));
        $b->add('ユーザー詳細', null);
    
        $user = $this->userRepository->getUserDetail($userId);

        $data = [
            'user' => $user,
            'breadcrumb' => $b->render(),
        ];
    
        return view('school/admin/user/detail', $data);
    }
    
    /**
     * ユーザー管理｜新規作成画面
     * @return string
     */
    public function userCreate(): string
    {
        $b = new Breadcrumb();
        $b->add('Home', route_to('school_home'));
        $b->add('ユーザー管理', route_to('user_list'));
        $b->add('新規作成', null);

        $data = [
            'roles' => $this->schoolRoleModel->where('school_id', $this->login['school']->id)->findAll(),
            'subsubjects' => $this->schoolSubSubjectModel->findAll(),
            'breadcrumb' => $b->render()
        ];
        
        return view('school/admin/user/create', $data);
    }
    
    /**
     * ユーザー管理｜新規作成画面｜登録
     * @return RedirectResponse
     */
    public function userRegister(): RedirectResponse
    {
        if ($this->validate(
            [
                'user_name' => ['label' => 'タイトル', 'rules' => 'required'],
            ]
        )) {
            // valid
            // dd('登録処理を作ってください！');
            // $this->schoolUserModel->save($data);
            // 連続で作る場合は create に、そうでない場合は list に redirect。
            $isContinuous = $this->request->getPost('is_continuous');
            $userName = $this->request->getPost('user_name');
            if (isset($isContinuous)) {
                // 続けてレッスン作成
                return redirect()->back()->with('success', $userName.' の登録が成功しました。続けてレッスン作成ができます');
            } else {
                // レッスン一覧にもどる
                return redirect('user_list');
            }
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }
    }
    
    /**
     * @param int $userId
     * @return RedirectResponse
     */
    public function userEdit(int $userId): RedirectResponse
    {
        // シェアードから取得。app/Config/Services.php
        // $school = service('schoolFactory');
        // TODO: $userId にはセグメントがある（親子関係など）
        // $school->autoRating($userId);
        
        return redirect("school/admin/user/$userId");
    }
}
