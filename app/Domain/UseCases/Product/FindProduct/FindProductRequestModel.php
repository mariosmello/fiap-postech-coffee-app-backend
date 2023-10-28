<?php

namespace App\Domain\UseCases\Product\FindProduct;

class FindProductRequestModel
{

    public function __construct(
        private array $attributes
    ) {
    }

    public function getCategory(): string
    {
        return $this->attributes['category_id'] ?? '';
    }
}
