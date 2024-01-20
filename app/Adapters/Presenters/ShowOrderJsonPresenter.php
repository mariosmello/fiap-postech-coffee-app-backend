<?php

namespace App\Adapters\Presenters;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\Order\ShowOrder\ShowOrderOutputPort;
use App\Domain\UseCases\Order\ShowOrder\ShowOrderResponseModel;
use App\Http\Resources\OrderCreatedResource;
use App\Http\Resources\UnableToCreateResource;

class ShowOrderJsonPresenter implements ShowOrderOutputPort
{
    public function orderFound(ShowOrderResponseModel $model): ViewModel
    {
        return new JsonResourceViewModel(
            new OrderCreatedResource($model->getOrder())
        );
    }

    public function unableToFindOrder(ShowOrderResponseModel $model, \Throwable $e): ViewModel
    {
        return new JsonResourceViewModel(
            new UnableToCreateResource($e)
        );
    }
}
