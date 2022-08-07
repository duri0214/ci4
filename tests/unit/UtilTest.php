<?php

namespace tests\unit;

use App\Libraries\Slack;
use App\Libraries\Util;
use Exception;
use PHPUnit\Framework\TestCase;
use Tests\Support\database\Models\PositiveInt;

class UtilTest extends TestCase
{
    public function testNecessaryMembers()
    {
        // マイルストーン1: タスク量の合計が93h×1.1で、あと10日(80h)しかない。 102.3h÷80h＝1.28人必要
        // マイルストーン2: タスク量の合計が42h×1.2で、あと6日(48h)しかない。 50.4h÷48h＝1.05人必要
        $param = [
            ["tasks" => 93, "ratio" => 1.1, "days" => 10],
            ["tasks" => 42, "ratio" => 1.2, "days" => 6]
        ];
    
        $service = new Util();
        $actual = $service->necessaryMembers($param);
        $expected = 1.28 + 1.05;
    
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * x >= 0 だけしか許容しないことをテストする
     * @throws Exception
     */
    public function testPositiveInt()
    {
        // 想定内の値を入れる
        $actual = new PositiveInt(1234);
        $excepted = 1234;
        $this->assertEquals($excepted, $actual->getValue());
    
        // 想定外の値を入れる
        $this->expectException(Exception::class);
        new PositiveInt(-1);
    }
    
    /**
     * slackに投稿できることをテストする
     * @return void
     */
    public function testSlack(): void
    {
        $service = new Slack();
        $actual = $service->sendMessage($service->sampleMessage());
        
        $this->assertEquals('ok', $actual);
    }
}
