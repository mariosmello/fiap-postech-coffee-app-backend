<?php

namespace App\Domain\UseCases\User\CreateUser;

use App\Domain\Interfaces\ViewModel;

interface CreateUserInputPort
{
    public function createUser(CreateUserRequestModel $model): ViewModel;
}
