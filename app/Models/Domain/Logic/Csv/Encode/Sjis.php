<?php

namespace App\Models\Domain\Logic\Csv\Encode;

class Sjis implements IEncode
{
    private string $encoding;
    
    public function __construct()
    {
        $this->encoding = 'sjis-win';
    }
    
    public function getType(): string
    {
        return $this->encoding;
    }
}
