<?php

namespace App\Domain\UseCases\Product\FindProduct;

use App\Domain\Interfaces\ProductEntity;
use Illuminate\Database\Eloquent\Collection;

class FindProductResponseModel
{
    public function __construct(
        private Collection $product
    ) {
    }

    public function getProduct(): Collection
    {
        return $this->product;
    }
}
