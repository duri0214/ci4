<?php

namespace App\Controllers;

use App\Domain\SchoolDomain;
use App\Models\SchoolModel;
use CodeIgniter\HTTP\RedirectResponse;

class SchoolController extends BaseController
{
    // TODO: グローバル定数として school.id のリストを定義しておく
    const SCHOOL_LIST = ['Demo' => 1, 'NihonBunri' => 2];
    
    public function index(): string
    {
        // $school_code_from_login = 'NihonBunri';
        $school_code_from_login = 'Demo';
        
        $model = new SchoolModel();
        $school = $model->find(self::SCHOOL_LIST[$school_code_from_login]);
        
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
            'school' => $school,
            'homerooms' => $schoolDomain->getHomerooms(),
            'periods' => $schoolDomain->getPeriods(),
            'current_period' => $schoolDomain->getCurrentPeriod(),
            'school_category' => $schoolDomain->getSchoolCategory(),
            'attendances' => $schoolDomain->getActiveHomeroomAttendances(),
        ];
        
        return view('school/index', $data);
    }
    
    public function lessonDetail(int $groupId): string
    {
        $data = ['group_id' => $groupId];
        
        // ある授業の成績の一覧
        return view('school/lesson/detail', $data);
    }
    
    /**
     * @param int $group_id
     * @return RedirectResponse
     */
    public function lessonRegister(int $group_id): RedirectResponse
    {
        // シェアードから取得。app/Config/Services.php
        // $school = service('schoolFactory');
        
        // TODO: $groupId にはセグメントがある（親子関係など）
        // $school->autoRating($group_id);
        
        return redirect("school/lesson/$group_id");
    }
}
