<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{

    public function definition(): array
    {
        return [
            'category_id' => fake()->name(),
            'name' => fake()->name(),
            'description' => fake()->text(),
            'price' => 1,
        ];
    }
}
