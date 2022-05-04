<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Breadcrumb;

class SchoolAdminController extends BaseController
{
    public function unregisteredList(): string
    {
        $b = new Breadcrumb();
        $b->add('Home', route_to('school_home'));
        $b->add('システム管理', null);
    
        $data = [
            'users' => service('userModel')->getUnregisteredSchoolUsers(),
            'schools' => service('schoolModel')->findAll(),
            'breadcrumb' => $b->render(),
        ];
    
        return view('school/admin/unregistered/list', $data);
    }
}
