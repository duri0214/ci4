<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class SchoolLessonItemEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [
        'id' => 'integer',
        'school_lesson_id' => 'integer',
        'school_lesson_item_segment_id' => 'integer',
    ];
}
