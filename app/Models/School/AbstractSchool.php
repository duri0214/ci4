<?php

namespace App\Models\School;

use App\Entities\MSchoolCategoryEntity;
use App\Entities\SchoolPeriodEntity;
use App\Entities\SchoolEntity;

abstract class AbstractSchool
{
    /**
     * @var SchoolEntity
     */
    protected $school;
    
    /**
     * @var MSchoolCategoryEntity
     */
    protected $school_category;
    
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
    
    abstract public function autoRating(int $groupId): array;
    abstract protected function evaluate(float $score): float;
}
