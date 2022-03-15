<?php

namespace Tests\Libraries;

use App\Libraries\Postal;
use PHPUnit\Framework\TestCase;

class PostalTest extends TestCase
{
    
    public function testGetByCode()
    {
        $service = new Postal();
        $expected = ['hoge', 'foo', 'bar'];
        $service->getByCode(2040022);
    }
}
