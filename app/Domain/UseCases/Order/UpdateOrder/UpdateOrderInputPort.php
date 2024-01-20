<?php

namespace App\Domain\UseCases\Order\UpdateOrder;

use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\Order\UpdateOrder\UpdateOrderRequestModel;

interface UpdateOrderInputPort
{
    public function updateOrder(UpdateOrderRequestModel $model): ViewModel;
}
