<?php

namespace App\Domain\UseCases\Order\UpdateOrder;

use App\Domain\Interfaces\ViewModel;

interface UpdateOrderOutputPort
{
    public function orderUpdated(UpdateOrderResponseModel $model): ViewModel;

    public function unableToUpdateOrder(UpdateOrderResponseModel $model, \Throwable $e): ViewModel;
}
