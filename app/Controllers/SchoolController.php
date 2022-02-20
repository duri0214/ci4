<?php

namespace App\Controllers;

use App\Domain\SchoolDomain;
use App\Models\HomeroomModel;
use App\Models\SchoolModel;
use App\Repository\AttendanceRepository;
use App\Repository\SchoolCategoryRepository;
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
        $schoolDomain = new SchoolDomain($school);
        // dd($schoolDomain);
        
        // TODO: Service層に持ってってね（日付のフォーマット変更も）
        $periods = [];
        foreach ($schoolDomain->getPeriods() as $entity) {
            $periods[] = $entity->toArray();
        }
        
        // TODO: SchoolDomainへ
        $schoolCategoryRepository = new SchoolCategoryRepository();
        $schoolCategory = $schoolCategoryRepository->getSchoolCategory($school)->entity;
        
        // TODO: Service層に持ってってね（学校ごとのロジックを流す）
        // $school = SchoolFactory::createInstance($school);
        // $school->autoCalculate()
    
        $model = new HomeroomModel();
        $homeroom = $model->find(1);  # TODO: ダミー
        $attendanceRepository = new AttendanceRepository();
        $attendances = [];
        foreach ($attendanceRepository->getHomeroomAttendance($homeroom)->entity as $entity) {
            $attendances[] = $entity->toArray();
        }
        
        $data = [
            'school' => $school,
            'periods' => $periods,
            'current_period' => $schoolDomain->getCurrentPeriod()->toArray(),
            'school_category' => $schoolCategory,
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
