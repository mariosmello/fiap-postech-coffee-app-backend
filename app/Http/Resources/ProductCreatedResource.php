<?php

namespace App\Http\Resources;

use App\Domain\Interfaces\ProductEntity;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductCreatedResource extends JsonResource
{
    protected ProductEntity $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    public function toArray($request)
    {
        return [
            'id' => $this->product->getId(),
            'name' => $this->product->getName(),
            'description' => $this->product->getDescription(),
            'price' => $this->product->getPrice(),
        ];
    }
}
