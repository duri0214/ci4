<?php

namespace App\Models\Domain\Logic\School\Demo\JuniorHighSchool;

use App\Models\Domain\Logic\AbstractGrades;
use App\Models\Domain\Logic\ICsv;
use App\Models\Domain\SchoolDomain;
use JetBrains\PhpStorm\Pure;

class Grades extends AbstractGrades implements ICsv
{
    public const SCHOOL_CODE = 'Demo';
    
    /**
     * @param SchoolDomain $domain
     */
    #[Pure] public function __construct(SchoolDomain $domain)
    {
        $this->school = $domain->getSchoolEntity();
        $this->school_category = $domain->getSchoolCategory();
    }
    
    /**
     * @param int $groupId
     * @return array
     */
    public function autoRating(int $groupId): array
    {
        // TODO: Implement autoRating() method.
    }
    
    /**
     * @param float $score
     * @return float
     */
    public function evaluate(float $score): float
    {
        // TODO: Implement evaluate() method.
    }
}
