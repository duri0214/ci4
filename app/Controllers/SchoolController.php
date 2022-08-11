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
        if (!isset($this->login['school'])) {
            throw PageNotFoundException::forPageNotFound('現在のログインユーザには所属する学校がありません。管理者に要求してください。');
        }
        
        // TODO: シェアード化してね（画面が切り替わっても保持できるように）
        $schoolDomain = new SchoolDomain($this->login['school']);
        
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
