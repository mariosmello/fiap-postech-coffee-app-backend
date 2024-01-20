<?php

namespace App\Domain\UseCases\Order\ShowOrder;

use App\Domain\Interfaces\OrderEntity;

class ShowOrderResponseModel
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
