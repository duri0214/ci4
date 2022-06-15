<?php

namespace App\Models\Domain\Logic;

use App\Entities\MSchoolCategoryEntity;
use App\Entities\SchoolEntity;
use App\Entities\SchoolPeriodEntity;

abstract class AbstractGrades
{
    protected SchoolEntity $school;
    protected MSchoolCategoryEntity $school_category;
    
    /**
     * @var SchoolPeriodEntity[]
     */
    protected $periods;
    
    /**
     * @return SchoolEntity
     */
    public function getSchool(): SchoolEntity
    {
        return $this->school;
    }
    
    /**
     * @return MSchoolCategoryEntity
     */
    public function getSchoolCategory(): MSchoolCategoryEntity
    {
        return $this->school_category;
    }
    
    /**
     * @return SchoolPeriodEntity[]
     */
    public function getPeriods(): array
    {
        return $this->periods;
    }
    
    public function autoRating(int $groupId): array
    {
        // TODO: Implement autoRating() method.
    }
    
    public function evaluate(float $score): float
    {
        // TODO: Implement evaluate() method.
    }
}
