<?php

namespace App\Domain\UseCases\Product\FindProduct;

use App\Domain\Interfaces\ViewModel;

interface FindProductOutputPort
{
    public function productFound(FindProductResponseModel $model): ViewModel;

    public function unableToFindProduct(FindProductResponseModel $model, \Throwable $e): ViewModel;
}
