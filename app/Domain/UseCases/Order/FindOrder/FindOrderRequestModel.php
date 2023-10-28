<?php

namespace App\Domain\UseCases\Order\FindOrder;

class FindOrderRequestModel
{

    public function __construct(
        private array $attributes
    ) {
    }

    public function getStatus(): string
    {
        return $this->attributes['status'] ?? '';
    }
}
