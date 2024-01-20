<?php

namespace App\Domain\UseCases\Order\ShowOrder;

use App\Domain\Interfaces\ViewModel;

interface ShowOrderInputPort
{
    public function showOrder(ShowOrderRequestModel $model): ViewModel;
}
