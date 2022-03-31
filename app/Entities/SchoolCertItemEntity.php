<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class SchoolCertItemEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['the_day_of_the_test', 'created_at', 'updated_at'];
    protected $casts   = [
        'id' => 'integer',
        'school_cert_id' => 'integer',
    ];
}
