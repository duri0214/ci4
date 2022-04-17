<?php

namespace App\Models\Domain;

use AssertionError;

class Assert
{
    /**
     * @param $value
     * @return bool
     */
    public static function isInt($value): bool
    {
        if (!is_int($value)) {
            throw new AssertionError('Value is not int');
        }
        
        return true;
    }
    
    /**
     * @param string $value
     * @return bool
     */
    public static function containsNumeric(string $value): bool
    {
        if (preg_match("/[0-9]/", $value)) {
            throw new AssertionError('Value is contains numeric');
        }
    
        return true;
    }
}
