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

    public function toArray($request = [])
    {
        $category = new CategoryResource($this->product->category()->first());
        $category = $category->toArray();

        return [
            'id' => $this->product->getId(),
            'name' => $this->product->getName(),
            'description' => $this->product->getDescription(),
            'price' => $this->product->getPrice(),
            'category' => $category,
        ];
    }
}
