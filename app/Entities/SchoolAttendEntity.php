<?php

namespace App\Entities;

use App\Models\HomeroomModel;
use App\Models\SchoolModel;
use App\Models\StatusDetailModel;
use App\Models\StatusModel;
use App\Models\TimeModel;
use App\Models\UserModel;
use CodeIgniter\Entity\Entity;

class SchoolAttendEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['attend_date', 'created_at', 'updated_at'];
    protected $casts   = [
        'id' => 'integer',
        'school_user_id' => 'integer',
        'school_time_id' => 'integer',
        'school_attend_status_id' => 'integer',
        'school_attend_status_detail_id' => 'integer',
    ];
}
