<?php

namespace App\Domain\Interfaces;

use App\Domain\Interfaces\UserEntity;

interface UserRepository
{
    public function exists(UserEntity $user): bool;

    public function create(UserEntity $user): UserEntity;
}
