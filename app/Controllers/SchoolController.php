<?php

namespace App\Controllers;

use App\Models\Domain\SchoolDomain;
use CodeIgniter\Exceptions\PageNotFoundException;
use Exception;

class SchoolController extends BaseController
{
    public function __construct()
    {
        $repository = service('schoolLoginRepository');
        $this->login = $repository->getTablesRelatedByLoggedInUser($_SESSION['logged_in']);
    }
    
    /**
     * @throws Exception
     */
    public function index(): string
    {
        // schoolを確定
        $schoolEntity = service('schoolModel')->find($this->login['schoolUser']->school_id);
        
        if (is_null($schoolEntity)) {
            throw PageNotFoundException::forPageNotFound();
        }
        
        // TODO: シェアード化してね（画面が切り替わっても保持できるように）
        $schoolDomain = new SchoolDomain($schoolEntity);
        
        $data = [
            'user' => $this->login['user'],
            'school' => $schoolDomain->getSchoolEntity(),
            'schoolCategory' => $schoolDomain->getSchoolCategory(),
            'curriculumChoices' => $schoolDomain->getCurriculumChoices(),
            'homeroomChoices' => $schoolDomain->getHomeroomChoices(),
            'periods' => null,
            'currentPeriod' => null,
            'attends' => null,
        ];
        
        return view('school/index', $data);
    }
}
