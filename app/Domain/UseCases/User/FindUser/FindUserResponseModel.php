<?php

namespace App\Domain\UseCases\User\FindUser;

use App\Domain\Interfaces\UserEntity;

class FindUserResponseModel
{
    public function __construct(
        private UserEntity $user
    ) {
    }

    public function getUser(): UserEntity
    {
        return $this->user;
    }
}
