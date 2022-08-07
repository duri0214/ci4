<?php

namespace tests\controller;

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
        // Get a simple page（CSVとかPDFとか「MIMEダウンロード系」はできないようだ）
        $path_list = [
            '/',
            '/home/store',
            // '/home/csv_export',
            // '/home/excel_export',
            // '/home/rotate_pdf',
            '/school',
            '/school/admin/user/list',
            '/school/admin/lesson/list',
            '/school/cert/list',
            '/school/report/menu',
            '/school/admin/menu',
            '/school/admin/user/1/detail',
            '/school/admin/user/create',
            '/school/admin/user/list',
            '/school/admin/lesson/1/evaluation/list',
            '/school/admin/lesson/create',
            '/school/upload/lesson',
            '/school/cert/1/item/list',
            '/school/report/enrollment',
            '/school/admin/unregistered/list',
        ];
        foreach ($path_list as $item) {
            $result = $this->call('get', $item);
            $result->assertOK();
        }
    }
}
