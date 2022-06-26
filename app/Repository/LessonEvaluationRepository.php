<?php

namespace App\Repository;

use App\Entities\MLessonEvaluationEntity;
use App\Models\MLessonEvaluationModel;
use App\Models\SchoolLessonEvaluationModel;
use CodeIgniter\Entity\Entity;

class LessonEvaluationRepository implements IEvaluationRepository
{
    /**
     * @param Entity $entity
     * @return MLessonEvaluationEntity[]
     */
    public function getDefinition(Entity $entity): array
    {
        $model = new SchoolLessonEvaluationModel();
        $schoolLessonEvaluations = $model->where('school_lesson_id', $entity->id)->findAll();
        $mLessonEvaluationIds = array_column($schoolLessonEvaluations, 'm_lesson_evaluation_id');
        $model = new MLessonEvaluationModel();
        
        return $model->find($mLessonEvaluationIds);
    }
}
