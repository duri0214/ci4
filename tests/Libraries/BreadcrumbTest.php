<?php

namespace tests\Libraries;

use App\Libraries\Breadcrumb;
use PHPUnit\Framework\TestCase;

class BreadcrumbTest extends TestCase
{
    public const SAMPLE_URL = 'https://www.yahoo.co.jp/';
    
    public function testRender()
    {
        $b = new Breadcrumb();
        $b->add('Home1', self::SAMPLE_URL);
        $b->add('Home2', self::SAMPLE_URL);
        $b->add('Home3', self::SAMPLE_URL);
        $expect = '<a href="' . self::SAMPLE_URL . '">Home1</a> / <a href="' . self::SAMPLE_URL .
            '">Home2</a> / <a href="' . self::SAMPLE_URL . '">Home3</a>';
        $this->assertEquals($expect, $b->render());
    
        $b = new Breadcrumb();
        $b->add('Home1', self::SAMPLE_URL);
        $b->add('Home2', self::SAMPLE_URL);
        $b->add('Home3', null);
        $expect = '<a href="' . self::SAMPLE_URL . '">Home1</a> / <a href="' . self::SAMPLE_URL . '">Home2</a> / Home3';
        $this->assertEquals($expect, $b->render());
    
        $b = new Breadcrumb();
        $b->add('Home1', self::SAMPLE_URL);
        $b->add('Home2', null);
        $b->add('Home3', self::SAMPLE_URL);
        $expect = '<a href="' . self::SAMPLE_URL . '">Home1</a> / Home2 / <a href="' . self::SAMPLE_URL . '">Home3</a>';
        $this->assertEquals($expect, $b->render());
    }
}
