<?php

namespace App\Domain\UseCases\Order\UpdateOrder;

use App\Domain\Interfaces\OrderEntity;

class UpdateOrderResponseModel
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
