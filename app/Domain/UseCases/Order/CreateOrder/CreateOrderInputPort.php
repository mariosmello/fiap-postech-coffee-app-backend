<?php

namespace App\Domain\UseCases\Order\CreateOrder;

use App\Domain\Interfaces\ViewModel;

interface CreateOrderInputPort
{
    public function createOrder(CreateOrderRequestModel $model): ViewModel;
}
