<?php

namespace App\Controllers;

use App\Models\Domain\SchoolDomain;
use CodeIgniter\Exceptions\PageNotFoundException;
use Exception;

class SchoolController extends BaseController
{
    /**
     * @throws Exception
     */
    public function index(): string
    {
        // loginしたuserとschoolを確定
        $userEntity = service('userModel')->find($_SESSION['logged_in']);
        $schoolUserEntity = service('schoolUserModel')->getSchoolUser($userEntity->id);
        $schoolEntity = service('schoolModel')->find($schoolUserEntity->school_id);
        
        if (is_null($schoolEntity)) {
            throw PageNotFoundException::forPageNotFound();
        }
        
        // TODO: シェアード化してね（画面が切り替わっても保持できるように）
        $schoolDomain = new SchoolDomain($schoolEntity);
        
        $data = [
            'user' => $userEntity,
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
