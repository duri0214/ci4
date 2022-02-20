<?php

namespace App\Factory;

use App\Entities\SchoolEntity;
use App\Models\School\AbstractSchool;
use App\Models\School\Demo;
use App\Models\School\NihonBunri;
use App\Repository\SchoolRepository;

class SchoolFactory
{
    public static function createInstance(SchoolEntity $school): AbstractSchool
    {
        $schoolRepository = new SchoolRepository();
        $domain = $schoolRepository->getSchoolDomain($school);
        switch ($domain->getSchoolCode()) {
            case NihonBunri::SCHOOL_CODE:
                $school = new NihonBunri($domain);
                break;
            default:
                $school = new Demo($domain);
        }
        
        return $school;
    }
}
