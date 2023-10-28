<?php

namespace App\Http\Resources;

use App\Domain\Interfaces\OrderProductEntity;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderProductResource extends JsonResource
{
    protected OrderProductEntity $orderProduct;

    public function __construct($orderProduct)
    {
        $this->orderProduct = $orderProduct;
    }

    public function toArray($request)
    {

        $product = new ProductCreatedResource($this->orderProduct->getProductRelationship());
        $product = $product->toArray();

        return [
            'price' => $this->orderProduct->getPrice(),
            'qty' => $this->orderProduct->getQty(),
            'product' => $product,
        ];
    }
}
