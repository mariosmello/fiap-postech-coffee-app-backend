<?php

namespace App\Models;

use App\Domain\Interfaces\OrderEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Order extends Model implements OrderEntity
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'payment_status',
        'price',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getUser(): ?int
    {
        return $this->attributes['user_id'];
    }

    public function setUser(int $user_id): void
    {
        $this->attributes['user_id'] = $user_id;
    }

    public function getStatus(): string
    {
        return $this->attributes['status'];
    }

    public function setStatus(string $status): void
    {
        $this->attributes['status'] = $status;
    }

    public function getPaymentStatus(): string
    {
        return $this->attributes['payment_status'];
    }

    public function setPaymentStatus(string $payment_status): void
    {
        $this->attributes['payment_status'] = $payment_status;
    }

    public function getPrice(): float
    {
        return $this->attributes['price'];
    }

    public function setPrice(float $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getUserRelationship() :?User {
        return $this->user()->first();
    }

    public function getProducts() {
        return $this->products;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
