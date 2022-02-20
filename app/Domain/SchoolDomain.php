<?php

namespace App\Domain;

use App\Entities\PeriodEntity;
use App\Entities\SchoolCategoryEntity;
use App\Entities\SchoolEntity;
use App\Models\PeriodModel;
use App\Models\SchoolCode;
use DateTime;
use Exception;

class SchoolDomain
{
    /**
     * @var SchoolEntity
     */
    private $schoolEntity;
    
    /**
     * @var PeriodEntity[]
     */
    private ?array $periods;
    
    public function __construct(
        SchoolEntity $schoolEntity
    ) {
        $this->schoolEntity = $schoolEntity;
        $this->setPeriods($schoolEntity->id);
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
     * @return bool
     */
    public function isTimeOnTentativeEvaluation(): bool
    {
        foreach ($this->periods as $period) {
            dd($period);
        }
        // TODO:
        return true;
    }
    
    /**
     * @return SchoolCode
     */
    public function getSchoolCode(): SchoolCode
    {
        return $this->schoolCode;
    }
    
    /**
     * @param SchoolCode $schoolCode
     */
    public function setSchoolCode(SchoolCode $schoolCode): void
    {
        $this->schoolCode = $schoolCode;
    }
    
    /**
     * @return SchoolCategoryEntity
     */
    public function getSchoolCategory(): SchoolCategoryEntity
    {
        return $this->schoolCategory;
    }
    
    /**
     * @param SchoolCategoryEntity $schoolCategory
     */
    public function setSchoolCategory(SchoolCategoryEntity $schoolCategory): void
    {
        $this->schoolCategory = $schoolCategory;
    }
    
    /**
     * @return array|null
     */
    public function getPeriods(): ?array
    {
        return $this->periods;
    }
    
    /**
     * @param int $school_id
     */
    private function setPeriods(int $school_id): void
    {
        $model = service('periodModel');
        $this->periods = $model->where('school_id', $school_id)->findAll();
    }
}
