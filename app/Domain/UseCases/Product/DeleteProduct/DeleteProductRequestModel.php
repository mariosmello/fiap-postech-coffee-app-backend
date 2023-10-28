<?php

namespace App\Domain\UseCases\Product\DeleteProduct;

use App\Models\Product;

class DeleteProductRequestModel
{
    public function __construct(private Product $product) {
    }

    public function getProduct():Product {
        return $this->product;
    }

}
