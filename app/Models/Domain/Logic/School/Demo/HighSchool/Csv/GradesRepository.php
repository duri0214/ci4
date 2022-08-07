<?php

namespace App\Models\Domain\Logic\School\Demo\HighSchool\Csv;

use App\Entities\IEntity;
use App\Models\Domain\Logic\Csv\Encode\IEncode;
use App\Models\Domain\Logic\Csv\AbstractRepository;

class GradesRepository extends AbstractRepository
{
    public const HEADERS = [
        ['属性', '属性', 'スコア', 'スコア', 'スコア', 'スコア', 'スコア', 'スコア'],
        ['ユーザーID', '名前', '素点1', '素点2', '素点3', '素点4', '素点5', '素点6']
    ];
    
    /**
     * @var IEntity[]
     */
    private array $grades;
    
    /**
     * @inheritDoc
     */
    public function addRecord(IEntity $entity): void
    {
        $this->grades[] = $entity;
    }
    
    /**
     * @inheritDoc
     */
    public function publish(IEncode $encoding = null): array
    {
        $header = self::HEADERS;
        $data = [];
    
        foreach ($this->grades as $record) {
            $data[] = $record->toArray();
        }
    
        if ($encoding) {
            $header = mb_convert_encoding($header, $encoding->getType());
            $data = mb_convert_encoding($data, $encoding->getType());
        }
    
        return array_merge($header, $data) ;
    }
}
