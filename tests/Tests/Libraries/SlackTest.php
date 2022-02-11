<?php

namespace Tests\Libraries;

use App\Libraries\Slack;
use PHPUnit\Framework\TestCase;

class SlackTest extends TestCase
{
    
    public function testSampleMessage()
    {
        $service = new Slack();
        $expected = '2022-02-11' . PHP_EOL . '晴時々曇' . PHP_EOL . 'From PHP script';
        $this->assertEquals($expected, $service->sampleMessage() . PHP_EOL . 'From PHP script');
    }
    
    public function testSendMessage()
    {
        $service = new Slack();
        $this->assertEquals('ok', $service->sendMessage('あああ'));
    }
}
