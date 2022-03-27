<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class LessonItemsEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [
        'id' => 'integer',
        'lesson_id' => 'integer',
        'lesson_segment_id' => 'integer',
    ];
}
