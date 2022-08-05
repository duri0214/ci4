<?php

namespace App\Models\Domain\Logic\Csv;

interface IRepository
{
    /**
     * リポジトリにエンティティを追加して集めます
     * @param IEntity $entity
     * @return void
     */
    public function addRecord(IEntity $entity): void;
    
    /**
     * 集めたエンティティ群を返します
     * @return IEntity[]
     */
    public function getRecords(): array;
    
    /**
     * CSVとして出力します
     * @return void
     */
    public function export(): void;
    
    /**
     * CSVから取り込みます
     * @return void
     */
    public function import(): void;
}
