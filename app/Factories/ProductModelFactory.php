<?php

namespace App\Factories;

use App\Domain\Interfaces\ProductEntity;
use App\Domain\Interfaces\ProductFactory;
use App\Models\Product;

class ProductModelFactory implements ProductFactory
{
    public function make(array $attributes = []): ProductEntity
    {
        return new Product($attributes);
    }
}
