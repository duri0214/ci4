<?php

namespace tests\unit;

use App\Libraries\Slack;
use App\Libraries\Util;
use Exception;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use Tests\Support\Models\PositiveInt;

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
     * @throws Exception
     */
    public function testPositiveInt()
    {
        // x >= 0 だけしか許容しないバリューオブジェクトに想定内の値を入れる
        $actual = new PositiveInt(1234);
        $excepted = 1234;
        $this->assertEquals($excepted, $actual->getValue());
    
        // x >= 0 だけしか許容しないバリューオブジェクトに想定外の値を入れる
        $this->expectException(\Exception::class);
        $actual = new PositiveInt(-1);
    }
    
    /**
     * codeigniter4をWindowsローカルで動かす https://qiita.com/YoshitakaOkada/items/7bdc4906725dab5adca6
     * TODO: エンティティとモデルはまだつくってません
     * @throws ReflectionException
     */
    public function testDbManipulate()
    {
        $blog_id = 1;
        $blog_m = model('App\Models\Blog');
        $blog_m->insertBatch();
        $blog = $blog_m->find($blog_id);
    }
    
    public function testSlack()
    {
        // TODO: まだうまくいってません
        $service = new Slack();
        $actual = $service->sendMessage($service->sampleMessage());
        $excepted = date('Y-m-d').PHP_EOL."晴のち時々曇";
        
        $this->assertEquals($excepted, $actual);
    }
}
