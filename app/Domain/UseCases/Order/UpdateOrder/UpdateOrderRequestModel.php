<?php

namespace App\Domain\UseCases\Order\UpdateOrder;

use App\Models\Order;

class UpdateOrderRequestModel
{
    public function __construct(private Order $order, private array $attributes) {
    }

    public function getOrder():Order {
        return $this->order;
    }

    public function getStatus(): string
    {
        return $this->attributes['status'] ?? '';
    }

    public function getPaymentStatus(): string
    {
        return $this->attributes['payment_status'] ?? '';
    }

}
