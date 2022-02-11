<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class SchoolEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [
        'id' => 'integer',
        'school_category_id' => 'integer'
    ];
}
