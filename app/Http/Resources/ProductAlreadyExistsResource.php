<?php

namespace App\Http\Resources;

use App\Domain\Interfaces\ProductEntity;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductAlreadyExistsResource extends JsonResource
{
    protected ProductEntity $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    public function toArray($request)
    {
        return [
            'name' => $this->product->getName(),
        ];
    }
}
