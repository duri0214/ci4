<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class SchoolLessonEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [
        'id' => 'integer',
        'school_homeroom_id' => 'integer',
        'school_sub_subject_id' => 'integer',
    ];
}
