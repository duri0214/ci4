<?php

namespace App\Repository;

class LoginRepository
{
    public function getTablesRelatedByLoggedInUser($userId): array
    {
        $login['user'] = service('userModel')->find($userId);
        $login['schoolUser'] = service('schoolUserModel')->getSchoolUser($userId);
    
        return $login;
    }
}
