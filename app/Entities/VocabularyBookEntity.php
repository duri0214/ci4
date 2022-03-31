<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class VocabularyBookEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [
        'id' => 'integer',
        'sentence' => 'string',
    ];
}
