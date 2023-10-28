<?php

namespace App\Domain\UseCases\Product\CreateProduct;

class CreateProductRequestModel
{
    public function __construct(private array $attributes) {
    }

    public function getCategory(): int
    {
        return $this->attributes['category_id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'] ?? '';
    }

    public function getDescription(): string
    {
        return $this->attributes['description'] ?? '';
    }

    public function getPrice(): float
    {
        return $this->attributes['price'] ?? 0;
    }
}
