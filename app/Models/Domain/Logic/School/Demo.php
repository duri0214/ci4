<?php

namespace App\Models\Domain\Logic\School;

use App\Models\Domain\SchoolDomain;

class Demo extends AbstractSchool
{
    public const SCHOOL_CODE = 'Demo';
    
    /**
     * @param SchoolDomain $domain
     */
    public function __construct(SchoolDomain $domain)
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
    protected function evaluate(float $score): float
    {
        // TODO: Implement evaluate() method.
    }
}
