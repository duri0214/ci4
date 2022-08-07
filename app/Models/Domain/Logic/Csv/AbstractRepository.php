<?php

namespace App\Models\Domain\Logic\Csv;

use App\Entities\IEntity;
use App\Models\Domain\Logic\Csv\Encode\IEncode;

abstract class AbstractRepository
{
    /**
     * データを追加します
     * @param IEntity $entity
     * @return void
     */
    abstract public function addRecord(IEntity $entity): void;
    
    /**
     * 集めたデータを返します
     * @param IEncode|null $encoding 指定がなければ utf-8 です
     * @return array
     */
    abstract public function publish(IEncode $encoding = null): array;
}
