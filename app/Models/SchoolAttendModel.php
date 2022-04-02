<?php

namespace App\Models;

use App\Entities\SchoolAttendEntity;
use App\Entities\SchoolHomeroomEntity;
use App\Entities\SchoolLessonEntity;
use CodeIgniter\Model;

/**
 * @method SchoolAttendEntity find($id = null)
 */
class SchoolAttendModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'school_attend';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = SchoolAttendEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['school_user_id', 'school_lesson_id', 'attend_date', 'school_time_id', 'school_attend_status_id', 'school_attend_status_detail_id', 'remark'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    
    /**
     * join でまとめてとった recordset を hr別、lesson別にキーで仕分けたもの
     * @param int $schoolId
     * @return array
     */
    public function getAttendsBySchoolId(int $schoolId)
    {
        $builder = $this->db->table('school_attend');
        $builder->join('school_lesson', 'school_lesson_id = school_lesson.id');
        $builder->join('school_homeroom', 'school_homeroom_id = school_homeroom.id');
        $query = $builder->get();
        
        $resultBox = [];
        foreach ($query->getResultArray() as $record) {
            $hrId = $record['school_homeroom_id'];
            $lessonId = $record['school_lesson_id'];
            $attendId = $record['id'];
            $resultBox[$hrId]['entity'] = $this->extractHomeroomEntity($record);
            $resultBox[$hrId]['lessons'][$lessonId]['entity'] = $this->extractLessonEntity($record);
            $resultBox[$hrId]['lessons'][$lessonId]['attends'][$attendId] = $this->extractAttendEntity($record);
        }
        
        return $resultBox;
    }
    
    /**
     * @param array $record
     * @return SchoolHomeroomEntity
     */
    private function extractHomeroomEntity(array $record): SchoolHomeroomEntity
    {
        $entity = new SchoolHomeroomEntity();
        $entity->id = $record['school_homeroom_id'];
        $entity->school_id = $record['school_id'];
        $entity->hr_grade = $record['hr_grade'];
        $entity->hr_class = $record['hr_class'];
        $entity->name = $record['name'];
        $entity->remark = $record['remark'];
    
        return $entity;
    }
    
    /**
     * @param array $record
     * @return SchoolLessonEntity
     */
    private function extractLessonEntity(mixed $record): SchoolLessonEntity
    {
        $entity = new SchoolLessonEntity();
        $entity->id = $record['school_lesson_id'];
        $entity->school_homeroom_id = $record['school_homeroom_id'];
        $entity->school_sub_subject_id = $record['school_sub_subject_id'];
        $entity->name = $record['name'];
        $entity->remark = $record['remark'];
        
        return $entity;
    }
    
    /**
     * @param array $record
     * @return SchoolAttendEntity
     */
    private function extractAttendEntity(mixed $record): SchoolAttendEntity
    {
        $entity = new SchoolAttendEntity();
        $entity->id = $record['id'];
        $entity->school_user_id = $record['school_user_id'];
        $entity->school_lesson_id = $record['school_lesson_id'];
        $entity->attend_date = $record['attend_date'];
        $entity->school_time_id = $record['school_time_id'];
        $entity->school_attend_status_id = $record['school_attend_status_id'];
        $entity->school_attend_status_detail_id = $record['school_attend_status_detail_id'];
        $entity->remark = $record['remark'];
    
        return $entity;
    }
}
