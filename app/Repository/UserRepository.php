<?php

namespace App\Repository;

use App\Models\SchoolRoleModel;
use App\Models\SchoolUserModel;
use App\Models\SchoolUserRoleModel;
use App\Models\UserModel;
use Myth\Auth\Entities\User;

class UserRepository implements IUserRepository
{
    private SchoolUserModel $schoolUserModel;
    private UserModel $userModel;
    private SchoolUserRoleModel $schoolUserRoleModel;
    private SchoolRoleModel $schoolRoleModel;
    
    public function __construct()
    {
        $this->schoolUserModel = new SchoolUserModel();
        $this->userModel = new UserModel();
        $this->schoolUserRoleModel = new SchoolUserRoleModel();
        $this->schoolRoleModel = new SchoolRoleModel();
    }
    
    /**
     * @param $school_id
     * @return User[]
     */
    public function getUserList($school_id): array
    {
        $userIds = $this->schoolUserModel->where('school_id', $school_id);
        
        return $this->userModel->find($userIds);
    }
    
    /**
     * @param $user_id
     * @return array
     */
    public function getUserDetail($user_id): array
    {
        // TODO: リポジトリの戻り型を Object（エンティティ？）にしたい
        $aUserDetail = $this->userModel->find($user_id)->toArray();
        $schoolUserRoleModel = $this->schoolUserRoleModel->where('school_user_id', $user_id)->findAll();
        $schoolRoleModel = $this->schoolRoleModel->find(array_column($schoolUserRoleModel, 'school_role_id'));
        $aUserDetail['roles'] = implode(', ', array_column($schoolRoleModel, 'name'));
        $aUserDetail['remark'] = $this->schoolUserModel->where('user_id', $user_id)->first()->remark;
    
        return $aUserDetail;
    }
}
