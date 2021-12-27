<?php

namespace Tests\Controller;

use CodeIgniter\Router\Exceptions\RedirectException;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;
use Exception;

class HomeTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use FeatureTestTrait;
    
    /**
     * @throws RedirectException
     * @throws Exception
     */
    public function testIndex()
    {
        // Get a simple page
        $result = $this->call('get', '/');
        $result->assertOK();
        
        $result = $this->call('get', '/Home/store');
        $result->assertOK();
    }
}
