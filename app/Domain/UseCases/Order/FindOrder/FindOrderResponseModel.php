<?php

namespace App\Domain\UseCases\Order\FindOrder;

use App\Domain\Interfaces\OrderEntity;
use Illuminate\Database\Eloquent\Collection;

class FindOrderResponseModel
{
    public function __construct(
        private Collection $order
    ) {
    }

    public function getOrder(): Collection
    {
        return $this->order;
    }
}
