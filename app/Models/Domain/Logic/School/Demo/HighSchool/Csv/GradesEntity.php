<?php

namespace App\Models\Domain\Logic\School\Demo\HighSchool\Csv;

use App\Models\Domain\Logic\Csv\AbstractEntity;

class GradesEntity extends AbstractEntity
{
    // 任意の属性を定義し、setメソッドで値の点検の仕組みをそれぞれつくる
    private ?int $userId;
    private ?string $name;
    private ?int $score1;
    private ?int $score2;
    private ?int $score3;
    private ?int $score4;
    private ?int $score5;
    private ?int $score6;
    
    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->setUserId($data['user_id'] ?? null);
        $this->setName($data['name'] ?? null);
        $this->setScore1($data['score1'] ?? null);
        $this->setScore2($data['score2'] ?? null);
        $this->setScore3($data['score3'] ?? null);
        $this->setScore4($data['score4'] ?? null);
        $this->setScore5($data['score5'] ?? null);
        $this->setScore6($data['score6'] ?? null);
    }
    
    /**
     * @param int|null $user_id
     */
    public function setUserId(?int $user_id): void
    {
        $this->userId = $user_id;
    }
    
    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }
    
    /**
     * @param int|null $value
     */
    public function setScore1(?int $value): void
    {
        $this->checkIfGreaterThan($value);
        $this->checkIfLessThan($value);
        $this->score1 = $value;
    }
    
    /**
     * @param int|null $value
     */
    public function setScore2(?int $value): void
    {
        $this->checkIfGreaterThan($value);
        $this->checkIfLessThan($value);
        $this->score2 = $value;
    }
    
    /**
     * @param int|null $value
     */
    public function setScore3(?int $value): void
    {
        $this->checkIfGreaterThan($value);
        $this->checkIfLessThan($value);
        $this->score3 = $value;
    }
    
    /**
     * @param int|null $value
     */
    public function setScore4(?int $value): void
    {
        $this->checkIfGreaterThan($value);
        $this->checkIfLessThan($value);
        $this->score4 = $value;
    }
    
    /**
     * @param int|null $value
     */
    public function setScore5(?int $value): void
    {
        $this->checkIfGreaterThan($value);
        $this->checkIfLessThan($value);
        $this->score5 = $value;
    }
    
    /**
     * @param int|null $value
     */
    public function setScore6(?int $value): void
    {
        $this->checkIfGreaterThan($value);
        $this->checkIfLessThan($value);
        $this->score6 = $value;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'user_id' => $this->userId,
            'name' => $this->name,
            'score1' => $this->score1,
            'score2' => $this->score2,
            'score3' => $this->score3,
            'score4' => $this->score4,
            'score5' => $this->score5,
            'score6' => $this->score6,
        ];
    }
}
