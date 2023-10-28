<?php

namespace App\Http\Resources;

use App\Domain\Interfaces\OrderEntity;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderCreatedResource extends JsonResource
{
    protected OrderEntity $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function toArray($request)
    {
        if ($user = $this->order->getUserRelationship()) {
            $user = new UserCreatedResource($user);
            $user = $user->toArray();
        }

        $products = new OrderProductCollectionResource($this->order->getProducts());

        return [
            'id' => $this->order->getId(),
            'price' => $this->order->getPrice(),
            'status' => $this->order->getStatus(),
            'payment_status' => $this->order->getPaymentStatus(),
            'user' => $user,
            'products' => $products
        ];
    }
}
