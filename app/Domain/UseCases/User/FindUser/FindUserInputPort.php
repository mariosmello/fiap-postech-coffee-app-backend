<?php

namespace App\Domain\UseCases\User\FindUser;

use App\Domain\Interfaces\ViewModel;

interface FindUserInputPort
{
    public function findUser(FindUserRequestModel $model): ViewModel;
}
