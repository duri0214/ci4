<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class SchoolLessonMemberEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [
        'id' => 'integer',
        'school_lesson_id' => 'integer',
        'school_user_id' => 'integer',
    ];
}
