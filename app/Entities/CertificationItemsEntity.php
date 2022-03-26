<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class CertificationItemsEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'the_day_of_the_test'];
    protected $casts   = [
        'id' => 'integer',
        'certification_id' => 'integer',
    ];
}
