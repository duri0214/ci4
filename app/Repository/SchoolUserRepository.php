<?php

namespace App\Repository;

use App\Entities\SchoolUserEntity;
use App\Models\SchoolUserModel;
use Exception;
use Myth\Auth\Entities\User;

class SchoolUserRepository extends AbstractRepository
{
    private User $user;
    
    /**
     * @var SchoolUserEntity[]
     */
    private array $schoolUsers;
    
    private ?SchoolUserEntity $activeSchoolUser = null;
    
    /**
     * @throws Exception
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    
        // 0以上の所属学校が返ります
        $model = new SchoolUserModel();
        $this->schoolUsers = $model->where('user_id', $this->user->id)->findAll();
        foreach ($this->schoolUsers as $schoolUser) {
            if ($schoolUser->active) {
                // activeフラグが立っている学校がログイン時の学校になります
                $this->activeSchoolUser = $schoolUser;
                break;
            }
        }
        if (!$this->activeSchoolUser) {
            throw new Exception('複数の学校に所属していますがアクティブな学校がありません。管理者に設定を要求してください。');
        }
    }
    
    public function find(int $id): SchoolUserEntity
    {
        $model = new SchoolUserModel();
        return $model->find($id);
    }
    
    /**
     * @inheritDoc
     */
    public function list(): array
    {
        return $this->schoolUsers;
    }
    
    /**
     * @inheritDoc
     */
    public function store(): void
    {
        // TODO: Implement store() method.
    }
    
    /**
     * @return SchoolUserEntity|null
     */
    public function getActive(): ?SchoolUserEntity
    {
        return $this->activeSchoolUser;
    }
}
