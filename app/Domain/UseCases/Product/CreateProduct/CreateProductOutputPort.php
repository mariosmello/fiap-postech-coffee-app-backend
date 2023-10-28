<?php

namespace App\Domain\UseCases\Product\CreateProduct;

use App\Domain\Interfaces\ViewModel;

interface CreateProductOutputPort
{
    public function productCreated(CreateProductResponseModel $model): ViewModel;

    public function productAlreadyExists(CreateProductResponseModel $model): ViewModel;

    public function unableToCreateProduct(CreateProductResponseModel $model, \Throwable $e): ViewModel;
}
