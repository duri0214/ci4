<?php

namespace App\Repository;

abstract class AbstractRepository
{
    /**
     * 集めたデータを返します
     * @return array
     */
    abstract public function list(): array;
    
    /**
     * 集めたデータを保存します
     * @return void
     */
    abstract public function store(): void;
}
