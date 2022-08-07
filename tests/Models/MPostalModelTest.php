<?php

namespace Tests\Support\Models;

use App\Models\Domain\Logic\Postal\PostalNumberEntity;
use App\Models\MPostalModel;
use JetBrains\PhpStorm\NoReturn;
use PHPUnit\Framework\TestCase;

class MPostalModelTest extends TestCase
{
    #[NoReturn] public function testGetByCode()
    {
        $postalNumberEntity = new PostalNumberEntity('151-0073');
        $model = new MPostalModel();
        $mPostalEntity = $model->getByCode($postalNumberEntity);
        
        $this->assertEquals('東京都', $mPostalEntity->prefecture);
        $this->assertEquals('渋谷区', $mPostalEntity->municipality);
        $this->assertEquals('笹塚', $mPostalEntity->town);
        $this->assertEquals('東京都 渋谷区 笹塚', $mPostalEntity->getConcat());
    }
}
