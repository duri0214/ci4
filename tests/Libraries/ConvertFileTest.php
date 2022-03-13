<?php

namespace Tests\Libraries;

use App\Libraries\ConvertFile;
use PHPUnit\Framework\TestCase;

class ConvertFileTest extends TestCase
{
    public function testSjisToUtf8()
    {
        $expected = "D:\OneDrive\ダウンロード\KEN_ALL_utf8.CSV";
        $actual = ConvertFile::sjisToUtf8("D:\OneDrive\ダウンロード\KEN_ALL.CSV");
        
        $this->assertEquals($expected, $actual);
    }
}
