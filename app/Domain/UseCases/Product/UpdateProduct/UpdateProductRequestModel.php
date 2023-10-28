<?php

namespace App\Domain\UseCases\Product\UpdateProduct;

use App\Models\Product;

class UpdateProductRequestModel
{
    public function __construct(private Product $product, private array $attributes) {
    }

    public function getProduct():Product {
        return $this->product;
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
