<?php

namespace App\Domain\UseCases\Product\DeleteProduct;

use App\Domain\Interfaces\ViewModel;

interface DeleteProductInputPort
{
    public function deleteProduct(DeleteProductRequestModel $model): ViewModel;
}
