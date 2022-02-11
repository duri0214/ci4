<?php

namespace App\Entities;

use App\Models\HomeroomModel;
use App\Models\SchoolModel;
use App\Models\StatusDetailModel;
use App\Models\StatusModel;
use App\Models\TimeModel;
use App\Models\UserModel;
use CodeIgniter\Entity\Entity;

class AttendanceEntity extends Entity
{
    protected $datamap = [
        'time_id' => 'm_time_id',
        'status_id' => 'm_status_id',
        'status_detail_id' => 'm_status_detail_id',
    ];
    protected $dates   = ['attendance_date', 'created_at', 'updated_at'];
    protected $casts   = [
        'id' => 'integer',
        'user_id' => 'integer',
        'school_id' => 'integer',
        'homeroom_id' => 'integer',
        'time_id' => 'integer',
        'status_id' => 'integer',
        'status_detail_id' => 'integer',
    ];
    
    /**
     * @return UserModel|null
     */
    public function getUser(): ?UserModel
    {
        if ($this->user_id) {
            $model = service('userModel');
            $model->entity = $model->find($this->user_id);
            
            return $model;
        }
    
        return null;
    }
    
    /**
     * @return SchoolModel|null
     */
    public function getSchool(): ?SchoolModel
    {
        if ($this->school_id) {
            $model = service('schoolModel');
            $model->entity = $model->find($this->school_id);
    
            return $model;
        }
        
        return null;
    }
    
    /**
     * @return HomeroomModel|null
     */
    public function getHomeroom(): ?HomeroomModel
    {
        if ($this->homeroom_id) {
            $model = service('homeroomModel');
            $model->entity = $model->find($this->homeroom_id);
            
            return $model;
        }
        
        return null;
    }
    
    /**
     * @return TimeModel|null
     */
    public function getTime(): ?TimeModel
    {
        if ($this->time_id) {
            $model = service('timeModel');
            $model->entity = $model->find($this->time_id);
            
            return $model;
        }
        
        return null;
    }
    
    /**
     * @return StatusModel|null
     */
    public function getStatus(): ?StatusModel
    {
        if ($this->status_id) {
            $model = service('statusModel');
            $model->entity = $model->find($this->status_id);
            
            return $model;
        }
        
        return null;
    }
    
    /**
     * @return StatusDetailModel|null
     */
    public function getStatusDetail(): ?StatusDetailModel
    {
        if ($this->status_detail_id) {
            $model = service('statusDetailModel');
            $model->entity = $model->find($this->status_detail_id);
            
            return $model;
        }
        
        return null;
    }
}
