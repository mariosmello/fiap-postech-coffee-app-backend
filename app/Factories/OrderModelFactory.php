<?php

namespace App\Factories;

use App\Domain\Interfaces\OrderEntity;
use App\Domain\Interfaces\OrderFactory;
use App\Models\Order;

class OrderModelFactory implements OrderFactory
{
    public function make(array $attributes = []): OrderEntity
    {
        return new Order($attributes);
    }
}
