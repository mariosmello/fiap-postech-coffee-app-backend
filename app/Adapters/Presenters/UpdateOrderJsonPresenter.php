<?php

namespace App\Adapters\Presenters;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\Order\UpdateOrder\UpdateOrderOutputPort;
use App\Domain\UseCases\Order\UpdateOrder\UpdateOrderResponseModel;
use App\Http\Resources\OrderCreatedResource;
use App\Http\Resources\UnableToCreateResource;

class UpdateOrderJsonPresenter implements UpdateOrderOutputPort
{
    public function orderUpdated(UpdateOrderResponseModel $model): ViewModel
    {
        return new JsonResourceViewModel(
            new OrderCreatedResource($model->getOrder()), 'Pedido atualizado com sucesso'
        );
    }

    public function unableToUpdateOrder(UpdateOrderResponseModel $model, \Throwable $e): ViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        return new JsonResourceViewModel(
            new UnableToCreateResource($e)
        );
    }
}
