<?php

namespace App\Factory;

use App\Entities\SchoolEntity;
use App\Models\Domain\Logic\AbstractGrades;

class SchoolFactory
{
    public static function createInstance(SchoolEntity $school): AbstractGrades
    {
        // TODO: ファクトリの実装
        // $schoolRepository = new SchoolRepository();
        // $domain = $schoolRepository->getSchoolDomain($school);
        // switch ($domain->getSchoolCode()) {
        //     case Grades::SCHOOL_CODE:
        //         $school = new Grades($domain);
        //         break;
        //     default:
        //         $school = new Grades($domain);
        // }
        //
        // return $school;
    }
}
