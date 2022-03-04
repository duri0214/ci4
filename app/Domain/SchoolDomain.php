<?php

namespace App\Domain;

use App\Entities\AttendanceEntity;
use App\Entities\HomeroomEntity;
use App\Entities\PeriodEntity;
use App\Entities\SchoolCategoryEntity;
use App\Entities\SchoolEntity;
use App\Models\SchoolCode;
use DateTime;
use Exception;

class SchoolDomain
{
    private SchoolEntity $schoolEntity;
    private SchoolCategoryEntity $schoolCategory;
    private HomeroomEntity $activeHomeroom;
    
    /**
     * @var PeriodEntity[]
     */
    private ?array $periods;
    
    /**
     * @var AttendanceEntity[]|null
     */
    private ?array $attendances;
    
    public function __construct(
        SchoolEntity $schoolEntity
    ) {
        $this->schoolEntity = $schoolEntity;
        
        if ($schoolEntity->id) {
            $model = service('periodModel');
            $this->periods = $model->where('school_id', $schoolEntity->id)->findAll();
            
            $model = service('homeroomModel');
            $this->homerooms = $model->where('school_id', $schoolEntity->id)->findAll();
    
            $model = service('attendanceModel');
            foreach ($this->homerooms as $homeroom) {
                $this->attendances[$homeroom->id] = $model->where('homeroom_id', $homeroom->id)->findAll();
            }
        }
    
        if ($schoolEntity->school_category_id) {
            $model = service('schoolCategoryModel');
            $this->schoolCategory = $model->find($schoolEntity->school_category_id);
        }
    }
    
    /**
     * @return PeriodEntity|null
     * @throws Exception
     */
    public function getCurrentPeriod(): ?PeriodEntity
    {
        $today = new DateTime();
        foreach ($this->periods as $period) {
            $from = new DateTime($period->from_date);
            $to = new DateTime($period->to_date);
            
            if ($from <= $today and $today <= $to) {
                return $period;
            }
        }
        
        return null;
    }
    
    /** いまが仮評定時期（3年生で1学期）かどうか
     * @param $studentId
     * @return bool
     */
    public function isTimeOnTentativeEvaluation($studentId): bool
    {
        foreach ($this->periods as $period) {
            dd($period);
        }
        // TODO: あらかじめ学校の生徒全量に3年生フラグを付与しておく？あんま意味がないような？
        return true;
    }
    
    /**
     * @return SchoolCode
     */
    public function getSchoolCode(): SchoolCode
    {
        return $this->schoolEntity->schoolCode;
    }
    
    /**
     * @return SchoolCategoryEntity
     */
    public function getSchoolCategory(): SchoolCategoryEntity
    {
        return $this->schoolCategory;
    }
    
    /**
     * @return PeriodEntity[]|null
     */
    public function getPeriods(): ?array
    {
        return $this->periods;
    }
    
    /**
     * @return HomeroomEntity[]|null
     */
    public function getHomerooms(): ?array
    {
        return $this->homerooms;
    }
    
    /** いまが学年末学期かどうか
     * @return bool
     * @throws Exception
     */
    public function isTimeOnEvaluation(): bool
    {
        return  $this->getCurrentPeriod()->equalTo(end($this->periods));
    }
    
    /**
     * @return int[] [991, 992, 993]
     */
    public function getPeriodIds(): array
    {
        return array_column($this->periods, 'id');
    }
    
    /**
     * @return DateTime[]
     */
    public function getFullLengthPeriod(): array
    {
        return [reset($this->periods)->from_date, end($this->periods)->to_date];
    }
    
    /**
     * @return array
     */
    public function getMixedOnReference(): array
    {
        // TODO: $referenceValues をミキシングしたperiodsを返す
        // 1学期期初～参照1, 参照1の翌日～参照2, 参照2の翌日～参照3
        // ただ、これは学校ごとに違うから学校のクラスのほうに持ったほうがええかも
    }
    
    /**
     * @param int $homeroomId
     * @return void
     */
    public function setActiveHomeroom(int $homeroomId): void
    {
        foreach ($this->homerooms as $homeroom) {
            if ($homeroom->id == $homeroomId) {
                $this->activeHomeroom = $homeroom;
            }
        }
    }
    
    /**
     * @return HomeroomEntity
     */
    public function getActiveHomeroom(): HomeroomEntity
    {
        return $this->activeHomeroom;
    }
    
    /**
     * @return attendanceEntity[]
     */
    public function getActiveHomeroomAttendances(): array
    {
        return $this->attendances[$this->activeHomeroom->id];
    }
    
    /**
     * @return SchoolEntity
     */
    public function getSchoolEntity(): SchoolEntity
    {
        return $this->schoolEntity;
    }
}
