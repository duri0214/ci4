<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class LessonEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [
        'id' => 'integer',
        'homeroom_id' => 'integer',
        'sub_subject_id' => 'integer',
    ];
}
