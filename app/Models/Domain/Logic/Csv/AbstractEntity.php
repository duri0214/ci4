<?php

namespace App\Models\Domain\Logic\Csv;

abstract class AbstractEntity implements IEntity
{
    /**
     * @var array
     */
    protected array $errors = [];
    
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
