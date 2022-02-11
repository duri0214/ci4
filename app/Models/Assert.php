<?php

namespace App\Models;

use AssertionError;

class Assert
{
    /**
     * @param $value
     * @return void
     */
    public static function isInt($value)
    {
        if (!is_int($value)) {
            throw new AssertionError('Value is not int');
        }
    }
    
    /**
     * @param string $value
     * @return void
     */
    public static function containsNumeric(string $value)
    {
        if (preg_match("/[0-9]/", $value)) {
            throw new AssertionError('Value is contains numeric');
        }
    }
}
