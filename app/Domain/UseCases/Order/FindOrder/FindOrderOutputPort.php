<?php

namespace App\Domain\UseCases\Order\FindOrder;

use App\Domain\Interfaces\ViewModel;

interface FindOrderOutputPort
{
    public function OrderFound(FindOrderResponseModel $model): ViewModel;

    public function unableToFindOrder(FindOrderResponseModel $model, \Throwable $e): ViewModel;
}
