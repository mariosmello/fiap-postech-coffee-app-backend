<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Category::factory()->create([
            'name' => 'Café',
            'sequence' => 1,
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'Acompanhamento',
            'sequence' => 2,
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'Sobremesa',
            'sequence' => 3,
        ]);
    }
}
