<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class SchoolUserRoleEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [
        'id' => 'integer',
        'school_user_id' => 'integer',
        'school_role_id' => 'integer',
    ];
}
