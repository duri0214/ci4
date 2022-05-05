<?php

namespace App\Models\Domain;

use App\Entities\MSchoolCategoryEntity;
use App\Entities\SchoolCurriculumEntity;
use App\Entities\SchoolHomeroomEntity;
use App\Entities\SchoolPeriodEntity;
use App\Entities\SchoolEntity;
use DateTime;
use Exception;

class SchoolDomain
{
    private SchoolEntity $schoolEntity;
    private MSchoolCategoryEntity $schoolCategory;
    private SchoolHomeroomEntity $activeHomeroom;
    private array $periods;
    private array $curriculumChoices;
    private array $homeroomChoices;
    private array $lessons;
    private array $attends;
    
    public function __construct(SchoolEntity $schoolEntity)
    {
        $this->schoolEntity = $schoolEntity;
    
        $model = service('schoolCurriculumModel');
        $this->curriculumChoices = $model->where('school_id', $schoolEntity->id)->orderBy('id', 'ASC')->findAll();
    
        $model = service('schoolHomeroomModel');
        $this->homeroomChoices = $model->where('school_id', $schoolEntity->id)->orderBy('id', 'ASC')->findAll();

        if ($schoolEntity->m_school_category_id) {
            $model = service('mSchoolCategoryModel');
            $this->schoolCategory = $model->find($schoolEntity->m_school_category_id);
        }
    }
    
    /**
     * @return SchoolPeriodEntity|null
     * @throws Exception
     */
    public function getCurrentPeriod(): ?SchoolPeriodEntity
    {
        if (!$this->curriculums) {
            return null;
        }
        
        $today = new DateTime();
        foreach ($this->periods as $period) {
            $from = new DateTime($period->from_date);
            $to = new DateTime($period->to_date);
            
            if ($from <= $today and $today <= $to) {
                return $period;
            }
        }
        
        // 該当する学期がない
        return null;
    }
    
    /** （未完）いまが仮評定時期（3年生で1学期）かどうか
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
     * カリキュラムが使う学期情報をセットする
     * @param $curriculumId
     * @return void
     */
    public function setPeriodsByCurriculum($curriculumId)
    {
        $model = service('schoolPeriodModel');
        $this->periods = $model
            ->where('school_id', $this->schoolEntity->id)
            ->where('school_curriculum_id', $curriculumId)
            ->findAll();
    }
    
    /**
     * @return SchoolCode
     */
    public function getSchoolCode(): SchoolCode
    {
        return $this->schoolEntity->schoolCode;
    }
    
    /**
     * @return MSchoolCategoryEntity
     */
    public function getSchoolCategory(): MSchoolCategoryEntity
    {
        return $this->schoolCategory;
    }
    
    /**
     * @return SchoolCurriculumEntity[]|null
     */
    public function getCurriculumChoices(): ?array
    {
        return $this->curriculumChoices;
    }
    
    /**
     * @return SchoolPeriodEntity[]|null
     */
    public function getPeriods(): ?array
    {
        return $this->periods;
    }
    
    /**
     * @return SchoolHomeroomEntity[]|null
     */
    public function getHomeroomChoices(): ?array
    {
        return $this->homeroomChoices;
    }
    
    /** （未完）いまが学年末学期かどうか
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
     * @param int $homeroomId
     * @return void
     */
    public function setActiveHomeroom(int $homeroomId): void
    {
        $model = service('schoolHomeroomModel');
        $this->activeHomeroom = $model->find($homeroomId);
    }
    
    /**
     * @return SchoolHomeroomEntity
     */
    public function getActiveHomeroom(): SchoolHomeroomEntity
    {
        return $this->activeHomeroom;
    }
    
    /**
     * @return SchoolEntity
     */
    public function getSchoolEntity(): SchoolEntity
    {
        return $this->schoolEntity;
    }
}
