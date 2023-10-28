<?php

namespace App\Domain\Interfaces;

use App\Models\User;

interface OrderEntity
{

    public function getId(): int;

    public function getUser(): ?int;

    public function setUser(int $user_id): void;

    public function getStatus(): string;

    public function setStatus(string $status): void;

    public function getPaymentStatus(): string;

    public function setPaymentStatus(string $status): void;

    public function getPrice(): float;

    public function setPrice(float $price): void;

    public function getUserRelationship(): ?User;
}
