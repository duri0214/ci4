<?php

namespace App\Entities;

interface IEntity
{
    /**
     * エンティティに発生したエラーを返します
     * @return array
     */
    public function getErrors(): array;
    
    /**
     * CSVの列編成を決めているメソッドです
     * @return array
     */
    public function toArray(): array;
}
