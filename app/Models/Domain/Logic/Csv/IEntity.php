<?php

namespace App\Models\Domain\Logic\Csv;

interface IEntity
{
    /**
     * エンティティごとに発生したエラーを返します
     * @return array
     */
    public function getErrors(): array;
    
    /**
     * CSVの列編成を決めている配列
     * @return array
     */
    public function toArray(): array;
}
