<?php

namespace App\Domain\Interfaces;

interface OrderFactory
{
    public function make(array $attributes = []): OrderEntity;
}
