<?php

namespace App\Domain\UseCases\Product\UpdateProduct;

use App\Domain\Interfaces\ViewModel;

interface UpdateProductOutputPort
{
    public function productUpdated(UpdateProductResponseModel $model): ViewModel;

    public function productAlreadyExists(UpdateProductResponseModel $model): ViewModel;

    public function unableToUpdateProduct(UpdateProductResponseModel $model, \Throwable $e): ViewModel;
}
