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

        \App\Models\Product::factory()->create([
            'category_id' => 1,
            'name' => 'CAFÉ DA RAIMUNDA',
            'description' => 'Raimunda, nossa faxineira, chega todos os dias na cafeteria e prepara seu café, apreciado diariamente por toda a equipe. Gostamos tanto do blend que ela faz, que resolvemos dividir este café com você. Como Raimunda muda sua mistura todos os dias, cada lote de seus pacotinhos terá uma composição única.',
            'price' => 8.00,
        ]);

        \App\Models\Product::factory()->create([
            'category_id' => 1,
            'name' => 'ELZIO SARTORI',
            'description' => 'Variedade: Catucaí 785, Processo: Cereja descascado, Safra: 2024. Boca: acidez cítrica, corpo alto e untuoso. Nariz: açúcar mascavo, pitanga, flor branca.',
            'price' => 10.00,
        ]);

        \App\Models\Product::factory()->create([
            'category_id' => 1,
            'name' => 'SIDNEY GRÜNEWALD',
            'description' => 'Variedade: Catucaí Amarelo, Processo: Cereja descascado lavado, Safra: 2022/23. Boca: acidez média, corpo alto e untuoso.. Nariz: floral, lichia, especiarias.',
            'price' => 14.00,
        ]);

        \App\Models\Product::factory()->create([
            'category_id' => 2,
            'name' => 'Bolo de Laranja',
            'description' => 'Bolo de Laranja',
            'price' => 9.00,
        ]);

        \App\Models\Product::factory()->create([
            'category_id' => 2,
            'name' => 'Bolo de Milho',
            'description' => 'Bolo de Milho',
            'price' => 9.00,
        ]);

        \App\Models\Product::factory()->create([
            'category_id' => 3,
            'name' => 'Affogato com Chocolate da Vovó',
            'description' => 'Sorvete afogado em chocolate da vovó.',
            'price' => 23.00,
        ]);

        \App\Models\Product::factory()->create([
            'category_id' => 3,
            'name' => 'Sorvete Soft de Café',
            'description' => 'Sorvete',
            'price' => 42.00,
        ]);
    }
}
