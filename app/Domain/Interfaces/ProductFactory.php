<?php

namespace App\Domain\Interfaces;

interface ProductFactory
{
    public function make(array $attributes = []): ProductEntity;
}
