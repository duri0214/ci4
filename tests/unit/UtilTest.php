<?php

namespace tests\unit;

use App\Libraries\Slack;
use App\Libraries\Util;
use DateTime;
use Exception;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use Tests\Support\Models\PositiveInt;

class UtilTest extends TestCase
{
    /**
     * @return void
     */
    public function testRanking()
    {
        $ranking = [
            ['name' => '田中', 'point' => 100],
            ['name' => '山本', 'point' => 90],
            ['name' => '佐藤', 'point' => 90],
            ['name' => '真島', 'point' => 100],
            ['name' => '角田', 'point' => 80],
            ['name' => '山田', 'point' => 60],
            ['name' => '坂本', 'point' => 85],
            ['name' => '木村', 'point' => 95],
            ['name' => '細川', 'point' => 85],
            ['name' => '橋本', 'point' => 70],
        ];
        $expect = [
            ['rank' => 1, 'name' => '田中', 'point' => 100],
            ['rank' => 1, 'name' => '真島', 'point' => 100],
            ['rank' => 3, 'name' => '木村', 'point' => 95],
            ['rank' => 4, 'name' => '佐藤', 'point' => 90],
            ['rank' => 4, 'name' => '山本', 'point' => 90],
            ['rank' => 6, 'name' => '坂本', 'point' => 85],
            ['rank' => 6, 'name' => '細川', 'point' => 85],
            ['rank' => 8, 'name' => '角田', 'point' => 80],
            ['rank' => 9, 'name' => '橋本', 'point' => 70],
            ['rank' => 10, 'name' => '山田', 'point' => 60],
        ];
    
        $service = new Util();
        $ranking = $service->ranking($ranking, 'point');
        
        $this->assertEquals($expect, $ranking);
    }
    
    /**
     * @return void
     */
    public function testFrequencyDistributionTable()
    {
        // 100以上、95以上...と処理していく
        $scales = [100, 95, 90, 85, 80, 75, 70, 65, 60, 55, 50, 45, 40, 35, 30, 25, 20, 15, 10, 5, 0];
        $scores = [100, 95, 95, 97, 64, 65, 60, 96, 95, 94, 0, 1, 5, 4];
    
        $service = new Util();
        $actual = $service->frequencyDistributionTable($scales, $scores);
        $expected = array_combine($scales, [1, 5, 1, 0, 0, 0, 0, 1, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 3]);
        
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @return void
     */
    public function testFiscalYear()
    {
        $service = new Util();
        $actual[] = $service->fiscalYear(new DateTime('2021-03-01'));
        $actual[] = $service->fiscalYear(new DateTime('2021-04-01'));
        $expected = ['2020', '2021'];
    
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @return void
     */
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
     * @return void
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
     * @return void
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
