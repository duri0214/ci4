<?php

namespace App\Controllers;

use App\Domain\SchoolDomain;
use App\Models\SchoolModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use Exception;

class SchoolController extends BaseController
{
    // TODO: Demoになってます：グローバル定数として school.id のリストを定義しておく（defineに？）
    public const SCHOOL_LIST = ['Demo' => 1, 'NihonBunri' => 2];
    
    /**
     * @throws Exception
     */
    public function index(): string
    {
        $school_code_from_login = 'Demo';
        
        $model = model(SchoolModel::class);
        $school = $model->find(self::SCHOOL_LIST[$school_code_from_login]);
        
        if (is_null($school)) {
            throw PageNotFoundException::forPageNotFound();
        }
        
        // TODO: シェアード化してね（画面が切り替わっても保持できるように）
        $schoolDomain = new SchoolDomain($school);
        
        // TODO: Service層に持ってってね（学校ごとのロジックを流す）
        // $school = SchoolFactory::createInstance($school);
        // $school->autoCalculate()
        
        // TODO: pagination
        // https://codeigniter.com/user_guide/libraries/pagination.html
    
        // TODO: homeroomはschoolDomainからスピンオフして、クラスがクリックされて、コントローラが変わってからでいいのかも（レッスンも）
        $schoolDomain->setActiveHomeroom(1);
        // $schoolDomain->setActiveLesson(1);
        
        $data = [
            'school' => $schoolDomain->getSchoolEntity(),
            'homerooms' => $schoolDomain->getHomerooms(),
            'periods' => $schoolDomain->getPeriods(),
            'current_period' => $schoolDomain->getCurrentPeriod(),
            'school_category' => $schoolDomain->getSchoolCategory(),
            'attendances' => $schoolDomain->getActiveHomeroomAttendances(),
        ];
        
        return view('school/index', $data);
    }
}
