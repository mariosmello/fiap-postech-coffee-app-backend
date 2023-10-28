<?php

namespace App\Domain\Interfaces;

use Illuminate\Support\Collection;

interface OrderRepository
{

    public function create(OrderEntity $order, array $products): OrderEntity;

    public function find(OrderEntity $order): Collection;

}
