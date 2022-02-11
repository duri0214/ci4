<?php

namespace App\Models\School;

use App\Entities\PeriodEntity;
use App\Entities\SchoolEntity;
use App\Entities\SchoolCategoryEntity;

abstract class AbstractSchool
{
    /**
     * @var SchoolEntity
     */
    protected $school;
    
    /**
     * @var SchoolCategoryEntity
     */
    protected $school_category;
    
    /**
     * @var PeriodEntity[]
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
     * @return SchoolCategoryEntity
     */
    public function getSchoolCategory(): SchoolCategoryEntity
    {
        return $this->school_category;
    }
    
    /**
     * @return PeriodEntity[]
     */
    public function getPeriods(): array
    {
        return $this->periods;
    }
    
    abstract public function autoRating(int $groupId): array;
    abstract protected function evaluate(float $score): float;
}
