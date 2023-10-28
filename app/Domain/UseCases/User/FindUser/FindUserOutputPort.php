<?php

namespace App\Domain\UseCases\User\FindUser;

use App\Domain\Interfaces\OutputPort;
use App\Domain\Interfaces\ViewModel;

interface FindUserOutputPort
{
    public function userFound(FindUserResponseModel $model): ViewModel;

    public function unableToFindUser(FindUserResponseModel $model, \Throwable $e): ViewModel;
}
