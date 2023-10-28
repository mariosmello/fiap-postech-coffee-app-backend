<?php

namespace App\Repositories;

use App\Domain\Interfaces\ProductEntity;
use App\Domain\Interfaces\ProductRepository;
use App\Models\Product;
use Illuminate\Support\Collection;

class ProductDatabaseRepository implements ProductRepository
{
    public function exists(ProductEntity $product): bool
    {
        return Product::where([
            'name' => $product->getName(),
        ])->exists();
    }

    public function findByCategory(ProductEntity $product): Collection
    {
        return Product::where([
            'category_id' => $product->getCategory(),
        ])->orderBy('name')->get();
    }

    public function create(ProductEntity $product): ProductEntity
    {
        return Product::create([
            'category_id' => $product->getCategory(),
            'name' => $product->getName(),
            'description' => $product->getDescription(),
            'price' => $product->getPrice(),
        ]);
    }

    public function update(ProductEntity $product): ProductEntity
    {
        $product->save();

        return $product;
    }

    public function delete(ProductEntity $product): ProductEntity
    {
        $product->delete();

        return $product;
    }
}
