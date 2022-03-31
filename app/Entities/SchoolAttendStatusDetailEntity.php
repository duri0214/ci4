<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class SchoolAttendStatusDetailEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [
        'id' => 'integer',
        'school_id' => 'integer',
        'school_attend_status_id' => 'integer',
    ];
}
