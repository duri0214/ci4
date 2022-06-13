<?php

namespace App\Repository;

use App\Models\SchoolModel;
use App\Models\SchoolUserModel;
use App\Models\UserModel;

class LoginRepository
{
    private UserModel $userModel;
    private SchoolUserModel $schoolUserModel;
    private SchoolModel $schoolModel;
    
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->schoolUserModel = new SchoolUserModel();
        $this->schoolModel = new SchoolModel();
    }
    
    public function getTablesRelatedByLoggedInUser($userId): array
    {
        $login['user'] = $this->userModel->find($userId);
        $login['schoolUser'] = $this->schoolUserModel->getSchoolUser($userId);
        $login['school'] = $this->schoolModel->find($login['schoolUser']->school_id);
    
        return $login;
    }
}
