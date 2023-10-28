<?php

namespace App\Domain\UseCases\Order\FindOrder;

use App\Domain\Interfaces\ViewModel;

interface FindOrderInputPort
{
    public function findOrder(FindOrderRequestModel $model): ViewModel;
}
