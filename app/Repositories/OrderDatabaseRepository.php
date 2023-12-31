<?php

namespace App\Repositories;

use App\Domain\Interfaces\OrderEntity;
use App\Domain\Interfaces\OrderRepository;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Collection;

class OrderDatabaseRepository implements OrderRepository
{

    public function create(OrderEntity $order, array $products): OrderEntity
    {
        $price = 0;
        $order = Order::create([
            'user_id' => $order->getUser(),
            'price' => $price,
        ]);

        foreach ($products as $product)
        {
            $item = Product::findOrFail($product['id']);
            $price += $item->getPrice() * $product['qty'];

            $order->products()->create([
                'product_id' => $product['id'],
                'qty' => $product['qty'],
                'price' => $item->getPrice(),
            ]);
        }

        $order->price = $price;
        $order->payment_status = 'paid'; //@todo fake checkout
        $order->save();

        return Order::findOrFail($order->id);
    }

    public function find(OrderEntity $order): Collection
    {
        return Order::orderBy('created_at', 'desc')->get();
    }

}
