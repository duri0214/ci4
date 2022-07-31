<?php

namespace App\Models\Domain\Logic\Csv;

abstract class AbstractEntity
{
    /**
     * @var array
     */
    protected array $errors = [];
    
    /**
     * CSVの列編成を決めている配列
     * @return array
     */
    abstract public function toArray(): array;
    
    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
    
    /**
     * $value > $threshold だったらエラーを発生します
     * @param int|null $value
     * @param int $threshold
     * @return void
     */
    protected function checkIfGreaterThan(?int $value, int $threshold = 100): void
    {
        if ($value > $threshold) {
            $this->errors[] = "The limit of up to $threshold is exceeded.";
        }
    }
    
    /**
     * $value < $threshold だったらエラーを発生します
     * @param int|null $value
     * @param int $threshold
     * @return void
     */
    protected function checkIfLessThan(?int $value, int $threshold = 0): void
    {
        if ($value < $threshold) {
            $this->errors[] = "Lower limit is $threshold.";
        }
    }
}
