<?php

namespace App\Models;

use App\Entities\SchoolLessonEvaluationEntity;
use CodeIgniter\Model;

/**
 * @method SchoolLessonEvaluationEntity find($id = null)
 */
class SchoolLessonEvaluationModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'school_lesson_evaluation';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = SchoolLessonEvaluationEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['school_lesson_id', 'm_evaluation_id', 'remarks'];

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
}
