<?php

namespace App\Domain\Interfaces;

interface ProductEntity
{

    public function getId(): int;

    public function getCategory(): int;

    public function setCategory(int $category_id): void;

    public function getName(): string;

    public function setName(string $name): void;

    public function getDescription(): string;

    public function setDescription(string $description): void;

    public function getPrice(): float;

    public function setPrice(float $price): void;
}
