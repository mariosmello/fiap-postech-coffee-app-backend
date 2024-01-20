<?php

namespace App\Domain\UseCases\Order\ShowOrder;

use App\Domain\Interfaces\ViewModel;

interface ShowOrderOutputPort
{
    public function orderFound(ShowOrderResponseModel $model): ViewModel;

    public function unableToFindOrder(ShowOrderResponseModel $model, \Throwable $e): ViewModel;
}
