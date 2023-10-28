<?php

namespace App\Adapters\Presenters;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\Order\CreateOrder\CreateOrderOutputPort;
use App\Domain\UseCases\Order\CreateOrder\CreateOrderResponseModel;
use App\Http\Resources\OrderCreatedResource;
use App\Http\Resources\UnableToCreateResource;

class CreateOrderJsonPresenter implements CreateOrderOutputPort
{
    public function orderCreated(CreateOrderResponseModel $model): ViewModel
    {
        return new JsonResourceViewModel(
            new OrderCreatedResource($model->getOrder()), 'Pedido realizado com sucesso'
        );
    }

    public function unableToCreateOrder(CreateOrderResponseModel $model, \Throwable $e): ViewModel
    {
        return new JsonResourceViewModel(
            new UnableToCreateResource($e)
        );
    }
}
