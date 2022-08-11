<?php

namespace App\Service;

use App\Repository\SchoolRepository;
use App\Repository\SchoolUserRepository;
use App\Repository\UserRepository;
use Exception;

class LoginService
{
    /**
     * @throws Exception
     */
    public function getTablesRelatedByLoggedInUser($userId): array
    {
        $userRepository = new UserRepository($userId);
        $login['user'] = $userRepository->find($userId);
        
        $schoolUserRepository = new SchoolUserRepository($userRepository->getUser());
        $login['schoolUsers'] = $schoolUserRepository->list();
        $login['schoolUser'] = $schoolUserRepository->getActive();
    
        $schoolRepository = new SchoolRepository($schoolUserRepository->getActive());
        if ($schoolUserRepository->getActive()) {
            $login['school'] = $schoolRepository->find($schoolUserRepository->getActive()->school_id);
        }
        
        return $login;
    }
}
