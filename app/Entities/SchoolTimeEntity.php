<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class SchoolTimeEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [
        'id' => 'integer',
        'school_id' => 'integer',
    ];
}