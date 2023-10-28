<?php

namespace App\Adapters\Presenters;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\Order\FindOrder\FindOrderOutputPort;
use App\Domain\UseCases\Order\FindOrder\FindOrderResponseModel;
use App\Http\Resources\OrderFoundResource;
use App\Http\Resources\UnableToFindResource;

class FindOrderJsonPresenter implements FindOrderOutputPort
{
    public function orderFound(FindOrderResponseModel $model): ViewModel
    {
        return new JsonResourceViewModel(
            new OrderFoundResource($model->getOrder())
        );
    }

    public function unableToFindOrder(FindOrderResponseModel $model, \Throwable $e): ViewModel
    {
        return new JsonResourceViewModel(
            new UnableToFindResource($e)
        );
    }
}
