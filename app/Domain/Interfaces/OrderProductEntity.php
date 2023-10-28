<?php

namespace App\Domain\Interfaces;

interface OrderProductEntity
{

    public function getProduct(): int;

    public function setProduct(int $product_id): void;

    public function getQty(): int;

    public function setQty(int $qty): void;

    public function getPrice(): float;

    public function setPrice(float $price): void;

    public function getProductRelationship();
}
