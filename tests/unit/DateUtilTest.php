<?php

namespace tests\unit;

use App\Libraries\DateUtil;
use DateTime;
use PHPUnit\Framework\TestCase;

class DateUtilTest extends TestCase
{
    public function testFiscalYear()
    {
        $service = new DateUtil();
        $actual[] = $service->fiscalYear(new DateTime('2021-03-01'));
        $actual[] = $service->fiscalYear(new DateTime('2021-04-01'));
        $expected = ['2020', '2021'];
    
        $this->assertEquals($expected, $actual);
    }
}
