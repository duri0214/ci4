<?php

namespace Tests\Support\database\Models;

use Exception;

class PositiveInt
{
    /**
     * @var int
     */
    private int $value;
    
    /**
     * @throws Exception
     */
    public function __construct(int $value)
    {
        // マイナスが来たらおかしい
        if ($value < 0) {
            throw new Exception();
        }
        $this->value = $value;
    }
    
    public function getValue(): int
    {
        return $this->value;
    }
}
