<?php

namespace App\Domain\UseCases\Order\CreateOrder;

use App\Domain\Interfaces\ViewModel;

interface CreateOrderOutputPort
{
    public function orderCreated(CreateOrderResponseModel $model): ViewModel;

    public function unableToCreateOrder(CreateOrderResponseModel $model, \Throwable $e): ViewModel;


}
