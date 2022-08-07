<?php

namespace Repository;

use App\Models\Domain\Logic\School\Demo\HighSchool\Csv\GradesEntity;
use App\Models\Domain\Logic\School\Demo\HighSchool\Csv\GradesRepository;
use PHPUnit\Framework\TestCase;

class GradesRepositoryTest extends TestCase
{
    public function testAddGrades()
    {
        // 配置はガチャガチャにしてある
        $a_grades_record = [
            'score4' => 97,
            'score5' => 100,
            'score6' => 2,
            'user_id' => 1,
            'name' => 'yoshitaka',
            'score1' => 100,
            'score2' => 99,
            'score3' => 98,
        ];

        $repository = new GradesRepository();
        $repository->addRecord(new GradesEntity($a_grades_record));
    
        $this->assertCount(3, $repository->publish());
    }
}
