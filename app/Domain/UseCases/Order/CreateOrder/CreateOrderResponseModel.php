<?php

namespace App\Domain\UseCases\Order\CreateOrder;

use App\Domain\Interfaces\OrderEntity;

class CreateOrderResponseModel
{
    public function __construct(
        private OrderEntity $order
    ) {
    }

    public function getOrder(): OrderEntity
    {
        return $this->order;
    }
}
