<?php

namespace App\Domain\Interfaces;

use App\Domain\Interfaces\ProductEntity;

interface ProductRepository
{
    public function exists(ProductEntity $product): bool;

    public function create(ProductEntity $product): ProductEntity;

    public function update(ProductEntity $product): ProductEntity;
}
