<?php

namespace App\Domain\UseCases\Order\CreateOrder;

class CreateOrderRequestModel
{
    public function __construct(private array $attributes) {
    }

    public function getUser(): ?int
    {
        return auth('api')->user()->getAuthIdentifier();
    }

    public function getProducts(): array
    {
        return $this->attributes['products'] ?? [];
    }

    public function getStatus(): string
    {
        return $this->attributes['status'] ?? '';
    }

    public function getPaymentStatus(): string
    {
        return $this->attributes['payment_status'] ?? '';
    }

    public function getPrice(): float
    {
        return $this->attributes['price'] ?? 0;
    }
}
