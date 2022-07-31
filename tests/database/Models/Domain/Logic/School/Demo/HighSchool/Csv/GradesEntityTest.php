<?php

namespace database\Models\Domain\Logic\School\Demo\HighSchool\Csv;

use App\Models\Domain\Logic\School\Demo\HighSchool\Csv\GradesEntity;
use JetBrains\PhpStorm\NoReturn;
use PHPUnit\Framework\TestCase;

class GradesEntityTest extends TestCase
{
    /**
     * 正常
     * @return void
     */
    #[NoReturn] public function testCreateEntity(): void
    {
        $data = [
            'user_id' => 1,
            'name' => 'yoshitaka',
            'score1' => 100,
            'score2' => 99,
            'score3' => 98,
            'score4' => 97,
            'score5' => 100,
            'score6' => 2,
        ];
        
        $entity = new GradesEntity($data);
        $this->assertCount(0, $entity->getErrors());
    }
    
    /**
     * ビジネスロジックに起因するエラーを確認
     * @return void
     */
    #[NoReturn] public function testErrorsViaByBusinessLogic(): void
    {
        $data = [
            'user_id' => 1,
            'name' => 'yoshitaka',
            'score1' => 100,
            'score2' => 99,
            'score3' => 98,
            'score4' => 97,
            'score5' => 120,    // Errors caused by business logic.
            'score6' => -1,     // Errors caused by business logic.
        ];
    
        $entity = new GradesEntity($data);
        $this->assertCount(2, $entity->getErrors());
    }
    
    /**
     * 未定義項目「score7」を入れてみると無視されることを確認
     * @return void
     */
    public function testAssignmentOfUndefinedItems(): void
    {
        $data = [
            'user_id' => 1,
            'name' => 'yoshitaka',
            'score1' => 100,
            'score2' => 99,
            'score3' => 98,
            'score4' => 97,
            'score5' => 96,
            'score6' => 95,
            'score7' => 95,     // entity has not it
        ];
    
        $entity = new GradesEntity($data);
        $this->assertCount(0, $entity->getErrors());
    }
}
