<?php

namespace App\Repository;

interface IUserRepository
{
    public function getUserList($school_id): array;
    public function getUserDetail($user_id): array;
}
