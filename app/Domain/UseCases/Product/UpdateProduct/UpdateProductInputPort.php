<?php

namespace App\Domain\UseCases\Product\UpdateProduct;

use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\Product\UpdateProduct\UpdateProductRequestModel;

interface UpdateProductInputPort
{
    public function updateProduct(UpdateProductRequestModel $model): ViewModel;
}
