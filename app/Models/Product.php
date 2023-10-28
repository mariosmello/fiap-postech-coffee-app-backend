<?php

namespace App\Models;

use App\Domain\Interfaces\ProductEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model implements ProductEntity
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getCategory(): int
    {
        return $this->attributes['category_id'];
    }

    public function setCategory(int $category_id): void
    {
        $this->attributes['category_id'] = $category_id;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getPrice(): float
    {
        return $this->attributes['price'] / 100;
    }

    public function setPrice(float $price): void
    {
        $this->attributes['price'] = $price * 100;
    }
}
