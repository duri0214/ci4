<?php

namespace App\Repository;

use App\Entities\SchoolEntity;
use App\Models\SchoolCategoryModel;

class SchoolCategoryRepository extends SchoolCategoryModel
{
    /**
     * @param SchoolEntity $school
     * @return SchoolCategoryModel|null
     */
    public function getSchoolCategory(SchoolEntity $school): ?SchoolCategoryModel
    {
        if ($school->school_category_id) {
            $model = service('schoolCategoryModel');
            $model->entity = $model->find($school->school_category_id);
            
            return $model;
        }
        
        return null;
    }
}
