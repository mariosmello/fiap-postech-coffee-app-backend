<?php

namespace App\Models;

use App\Domain\Interfaces\OrderProductEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderProduct extends Model implements OrderProductEntity
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'price',
        'qty',
    ];

    public function getProduct(): int
    {
        return $this->attributes['product_id'];
    }

    public function setProduct(int $product_id): void
    {
        $this->attributes['product_id'] = $product_id;
    }

    public function getQty(): int
    {
        return $this->attributes['qty'];
    }

    public function setQty(int $qty): void
    {
        $this->attributes['qty'] = $qty;
    }

    public function getPrice(): float
    {
        return $this->attributes['price'];
    }

    public function setPrice(float $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getProductRelationship() {
        return $this->product()->first();
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
