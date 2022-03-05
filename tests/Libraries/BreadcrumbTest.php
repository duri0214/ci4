<?php

namespace tests\Libraries;

use App\Libraries\Breadcrumb;
use PHPUnit\Framework\TestCase;

class BreadcrumbTest extends TestCase
{
    
    public function testRender()
    {
        $b = new Breadcrumb();
        $b->add('Home1', 'https://www.yahoo.co.jp/');
        $b->add('Home2', 'https://www.yahoo.co.jp/');
        $b->add('Home3', 'https://www.yahoo.co.jp/');
        $expect = '<a href="https://www.yahoo.co.jp/">Home1</a> / <a href="https://www.yahoo.co.jp/">Home2</a> / Home3';

        $this->assertEquals($expect, $b->render());
    }
}
