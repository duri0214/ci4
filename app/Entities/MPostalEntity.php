<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class MPostalEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [
        'id' => 'integer',
    ];
    
    /**
     * 結合して返す
     * @return string
     */
    public function getConcat(): string
    {
        return $this->prefecture . ' ' . $this->municipality . ' ' . $this->town;
    }
}
