<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class SchoolPeriodEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['from_date', 'to_date', 'created_at', 'updated_at'];
    protected $casts   = [
        'id' => 'integer',
        'school_id' => 'integer',
    ];
}
