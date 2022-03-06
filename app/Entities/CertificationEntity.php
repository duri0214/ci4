<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class CertificationEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [
        'id' => 'integer',
    ];
}
