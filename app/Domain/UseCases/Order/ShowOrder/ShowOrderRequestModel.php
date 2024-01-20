<?php

namespace App\Domain\UseCases\Order\ShowOrder;

use App\Models\Order;

class ShowOrderRequestModel
{
    public function __construct(private Order $order) {}

    public function getOrder() {
        return $this->order;
    }

}
