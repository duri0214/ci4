<?php

namespace App\Models\Domain\Logic\Csv;

use App\Models\Domain\Logic\Csv\Encode\IEncode;

interface IRepository
{
    /**
     * データを追加します
     * @param IEntity $entity
     * @return void
     */
    public function addRecord(IEntity $entity): void;
    
    /**
     * 集めたデータをヘッダーと一緒に返します
     * @param IEncode|null $encoding 指定がなければ utf-8 です
     * @return array
     */
    public function publish(IEncode $encoding = null): array;
}
