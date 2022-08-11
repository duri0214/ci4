<?php

namespace App\Repository;

use App\Entities\SchoolEntity;
use App\Entities\SchoolUserEntity;
use App\Models\SchoolModel;

class SchoolRepository extends AbstractRepository
{
    private SchoolEntity $school;
    private ?SchoolModel $schoolModel = null;
    
    public function __construct(SchoolUserEntity $schoolUserEntity)
    {
        $model = new SchoolModel();
        $this->school = $model->find($schoolUserEntity->school_id);
    }
    
    public function find(int $schoolId): SchoolEntity
    {
        if (is_null($this->schoolModel)) {
            $this->schoolModel = new SchoolModel();
        }
        
        return $this->schoolModel->find($schoolId);
    }
    
    /**
     * @inheritDoc
     */
    public function list(): array
    {
        // TODO: Implement list() method.
    }
    
    /**
     * @inheritDoc
     */
    public function store(): void
    {
        // TODO: Implement store() method.
    }
    
    /**
     * @return SchoolEntity
     */
    public function getSchool(): SchoolEntity
    {
        return $this->school;
    }
}
