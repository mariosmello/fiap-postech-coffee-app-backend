<?php

namespace App\Domain\UseCases\Product\DeleteProduct;

use App\Domain\Interfaces\ViewModel;

interface DeleteProductOutputPort
{
    public function productDeleted(DeleteProductResponseModel $model): ViewModel;

    public function unableToDeleteProduct(DeleteProductResponseModel $model, \Throwable $e): ViewModel;
}
