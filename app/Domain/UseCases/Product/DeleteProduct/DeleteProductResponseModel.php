<?php

namespace App\Domain\UseCases\Product\DeleteProduct;

use App\Domain\Interfaces\ProductEntity;

class DeleteProductResponseModel
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
