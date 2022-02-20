<?php

namespace unit;

use App\Models\Assert;
use PHPUnit\Framework\TestCase;

class AssertTest extends TestCase
{
    
    public function testIsInt()
    {
        $this->expectErrorMessage('Value is not int');
        $this->assertEquals(true, Assert::isInt(1));
        $this->assertEquals(true, Assert::isInt('1'));
    }
}
