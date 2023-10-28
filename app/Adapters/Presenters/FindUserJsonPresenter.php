<?php

namespace App\Adapters\Presenters;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\User\FindUser\FindUserOutputPort;
use App\Domain\UseCases\User\FindUser\FindUserResponseModel;
use App\Http\Resources\UnableToFindResource;
use App\Http\Resources\UserCreatedResource;

class FindUserJsonPresenter implements FindUserOutputPort
{
    public function userFound(FindUserResponseModel $model): ViewModel
    {
        return new JsonResourceViewModel(
            new UserCreatedResource($model->getUser())
        );
    }

    public function unableToFindUser(FindUserResponseModel $model, \Throwable $e): ViewModel
    {
        return new JsonResourceViewModel(
            new UnableToFindResource($e)
        );
    }
}
