<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'sequence' => 0,
        ];
    }
}
