<?php

namespace App\Domain\UseCases\Product\CreateProduct;

use App\Domain\Interfaces\ProductEntity;

class CreateProductResponseModel
{
    public function __construct(
        private ProductEntity $product
    ) {
    }

    public function getProduct(): ProductEntity
    {
        return $this->product;
    }
}
