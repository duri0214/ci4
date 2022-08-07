<?php

namespace Models\Domain\Logic\Postal;

use App\Models\Domain\Logic\Postal\PostalNumberEntity;
use Exception;
use PHPUnit\Framework\TestCase;

class PostalNumberEntityTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGetPostalNumber()
    {
        // 想定内の値を入れる
        $entity = new PostalNumberEntity('0000000');
        $this->assertEquals('0000000', $entity->getPostalNumber());
        $this->assertEquals('000-0000', $entity->getPostalNumber(true));
        $entity = new PostalNumberEntity('000-0000');
        $this->assertEquals('0000000', $entity->getPostalNumber());
        $this->assertEquals('000-0000', $entity->getPostalNumber(true));
        
        // 想定外の値を入れる
        $this->expectException(Exception::class);
        new PostalNumberEntity('12345678');
    }
}
