<?php

namespace App\Controllers;

use App\Domain\SchoolDomain;
use CodeIgniter\Exceptions\PageNotFoundException;
use Exception;

class SchoolController extends BaseController
{
    // TODO: Demoになってます：グローバル定数として school.id のリストを定義しておく（defineに？）
    const SCHOOL_LIST = ['Demo' => 1, 'NihonBunri' => 2];
    
    /**
     * @throws Exception
     */
    public function index(): string
    {
        $school_code_from_login = 'Demo';
    
        // schoolEntityを取得
        $schoolId = self::SCHOOL_LIST[$school_code_from_login];
        $model = service('schoolModel');
        $schoolEntity = $model->find($schoolId);
        
        if (is_null($schoolEntity)) {
            throw PageNotFoundException::forPageNotFound();
        }
        
        // TODO: シェアード化してね（画面が切り替わっても保持できるように）
        $schoolDomain = new SchoolDomain($schoolEntity);
        
        $data = [
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
