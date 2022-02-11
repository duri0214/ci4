<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class HomeroomEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [
        'id' => 'integer',
        'hr_grade' => 'integer',
        'hr_class' => 'integer',
        'school_id' => 'integer',
    ];
}
