<?php

namespace tests\unit;

use App\Models\Domain\Logic\School\Demo\HighSchool\Rank;
use PHPUnit\Framework\TestCase;

class AbstractRankTest extends TestCase
{
    
    public function testRanking()
    {
        $rank = new Rank();
        $ranker = [
            ['id' => 1, 'name' => '田中', 'point' => 100],
            ['id' => 2, 'name' => '山本', 'point' => 90],
            ['id' => 3, 'name' => '佐藤', 'point' => 90],
            ['id' => 4, 'name' => '真島', 'point' => 100],
            ['id' => 5, 'name' => '角田', 'point' => 80],
            ['id' => 6, 'name' => '山田', 'point' => 60],
            ['id' => 7, 'name' => '坂本', 'point' => 85],
            ['id' => 8, 'name' => '木村', 'point' => 95],
            ['id' => 9, 'name' => '細川', 'point' => 85],
            ['id' => 10, 'name' => '橋本', 'point' => 70]
        ];
        $expect = [
            ['id' => 1, 'name' => '田中', 'point' => 100, 'rank' => 1],
            ['id' => 4, 'name' => '真島', 'point' => 100, 'rank' => 1],
            ['id' => 8, 'name' => '木村', 'point' => 95, 'rank' => 3],
            ['id' => 2, 'name' => '山本', 'point' => 90, 'rank' => 4],
            ['id' => 3, 'name' => '佐藤', 'point' => 90, 'rank' => 4],
            ['id' => 7, 'name' => '坂本', 'point' => 85, 'rank' => 6],
            ['id' => 9, 'name' => '細川', 'point' => 85, 'rank' => 6],
            ['id' => 5, 'name' => '角田', 'point' => 80, 'rank' => 8],
            ['id' => 10, 'name' => '橋本', 'point' => 70, 'rank' => 9],
            ['id' => 6, 'name' => '山田', 'point' => 60, 'rank' => 10]
        ];
        
        $this->assertEquals($expect, $rank->ranking($ranker, 'point'));
    }
    
    public function testFrequencyDistributionTable()
    {
        // 100以上、95以上...と処理していく
        $scales = [100, 95, 90, 85, 80, 75, 70, 65, 60, 55, 50, 45, 40, 35, 30, 25, 20, 15, 10, 5, 0];
        $scores = [100, 95, 95, 97, 64, 65, 60, 96, 95, 94, 0, 1, 5, 4];
        
        $service = new Rank();
        $actual = $service->frequencyDistributionTable($scales, $scores);
        $expected = array_combine($scales, [1, 5, 1, 0, 0, 0, 0, 1, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 3]);
        
        $this->assertEquals($expected, $actual);
    }
}
