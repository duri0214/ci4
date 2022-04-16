<?php

namespace App\Models\Domain;

class SchoolCode
{
    private string $value;
    
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
