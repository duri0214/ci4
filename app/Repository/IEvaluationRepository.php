<?php

namespace App\Repository;

use CodeIgniter\Entity\Entity;

interface IEvaluationRepository
{
    /**
     * @param Entity $entity
     * @return array
     */
    public function getDefinition(Entity $entity): array;
}
