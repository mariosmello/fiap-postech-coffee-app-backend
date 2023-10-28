<?php

namespace App\Domain\UseCases\Product\CreateProduct;

use App\Domain\Interfaces\ViewModel;

interface CreateProductInputPort
{
    public function createProduct(CreateProductRequestModel $model): ViewModel;
}
