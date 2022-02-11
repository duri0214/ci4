<?php

namespace App\Controllers;

use App\Models\HomeroomModel;
use App\Models\SchoolModel;
use App\Repository\AttendanceRepository;
use App\Repository\PeriodRepository;
use App\Repository\SchoolCategoryRepository;
use CodeIgniter\HTTP\RedirectResponse;

class SchoolController extends BaseController
{
    public function index(): string
    {
        $school_code_from_login = 'NihonBunri';
        // $school_code_from_login = 'Demo';
        // グローバル定数として school.id のリストを定義しておく
        $school_list = ['Demo' => 1, 'NihonBunri' => 2];
        
        $model = new SchoolModel();
        $school = $model->find($school_list[$school_code_from_login]);
        // dd($school);
        
        // TODO: Service層に持ってってね
        // dd($periodRepository->getPeriods($school));
        $periodRepository = new PeriodRepository();
        $periods = [];
        foreach ($periodRepository->getSchoolPeriod($school)->entity as $entity) {
            $periods[] = $entity->toArray();
        }
        
        $schoolCategoryRepository = new SchoolCategoryRepository();
        $schoolCategory = $schoolCategoryRepository->getSchoolCategory($school)->entity;
        
        // TODO: 学校ごとのロジックを流す
        // $school = SchoolFactory::createInstance($school);
    
        $model = new HomeroomModel();
        $homeroom = $model->find(1);  # TODO: ダミー
        $attendanceRepository = new AttendanceRepository();
        $attendances = [];
        foreach ($attendanceRepository->getHomeroomAttendance($homeroom)->entity as $entity) {
            $attendances[] = $entity->toArray();
        }
        
        $data = [
            'school_name' => $school->name,
            'zipcode' => $school->zipcode,
            'address' => $school->address,
            'tel' => $school->tel,
            'prefecture' => $school->prefecture,
            'school_code' => $school->school_code,
            'periods' => $periods,
            'school_category_name' => $schoolCategory->name,
            'attendances' => $attendances,
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
