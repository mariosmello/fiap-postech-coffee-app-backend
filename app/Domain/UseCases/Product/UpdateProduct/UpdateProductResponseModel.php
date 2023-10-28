<?php

namespace App\Domain\UseCases\Product\UpdateProduct;

use App\Domain\Interfaces\ProductEntity;

class UpdateProductResponseModel
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
