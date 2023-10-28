<?php

namespace App\Domain\UseCases\Product\FindProduct;

use App\Domain\Interfaces\ViewModel;

interface FindProductInputPort
{
    public function findProduct(FindProductRequestModel $model): ViewModel;
}
