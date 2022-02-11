<?php

namespace App\Models;

class SchoolCode
{
    /** @var string */
    private $value;
    
    public function __construct(string $schoolCode)
    {
        Assert::containsNumeric($schoolCode);
        $this->value = $schoolCode;
    }
    
    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
