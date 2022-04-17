<?php

namespace unit;

use App\Models\Domain\Assert;
use PHPUnit\Framework\TestCase;

class AssertTest extends TestCase
{
    
    public function testIsInt()
    {
        $this->expectErrorMessage('Value is not int');
        Assert::isInt(1);
        Assert::isInt('1');
    }
}
