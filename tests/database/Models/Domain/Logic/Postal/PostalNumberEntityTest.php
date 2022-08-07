<?php

namespace database\Models\Domain\Logic\Postal;

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
        $data = ['0000000', '000-0000'];
        foreach ($data as $aData) {
            $entity = new PostalNumberEntity($aData);
            $this->assertEquals($aData, $entity->getPostalNumber());
        }
        
        // 想定外の値を入れる
        $this->expectException(Exception::class);
        new PostalNumberEntity('12345678');
    }
}
