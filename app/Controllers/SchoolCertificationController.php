<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CertificationMasterModel;

class SchoolCertificationController extends BaseController
{
    public function index()
    {
        // certification にレコードがなかったらマスタの全量を表示する
        $model = model(CertificationMasterModel::class);
        $data['certification'] = $model->findAll();
    
        return view("school/certification/list", $data);
    }
}
