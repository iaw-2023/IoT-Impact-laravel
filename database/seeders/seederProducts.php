<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class seederProducts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productsData = [
            [
                'id' => 1,
                'name' => 'Tierra',
                'price' => 1800,
                'stock' => 100,
                'description' => 'Hamburguesa simple clasica con queso cheddar, cebolla, lechuga y tomate con aderezo opcional.',
                'product_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Jupiter',
                'price' => 2350,
                'stock' => 100,
                'description' => 'Hamburguesa triple con queso cheddar, cebolla, panceta, huevo frito y doble aderezo opcional.',
                'product_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Neptuno',
                'price' => 2000,
                'stock' => 100,
                'description' => 'Hamburguesa simple con queso azul, queso de cabra, rucula y tomate con alioli.',
                'product_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Coca Cola',
                'price' => 200,
                'stock' => 100,
                'description' => 'Vaso de 300ml de Coca Cola.',
                'product_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Fanta',
                'price' => 200,
                'stock' => 100,
                'description' => 'Vaso de 300ml de Fanta.',
                'product_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Sprite',
                'price' => 200,
                'stock' => 100,
                'description' => 'Vaso de 300ml de Sprite.',
                'product_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => 'Papas cosmicas',
                'price' => 1700,
                'stock' => 100,
                'description' => 'Papas baston con crema de verdeo y panceta.',
                'product_category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'name' => 'Papas clasicas',
                'price' => 850,
                'stock' => 100,
                'description' => 'Papas baston simples.',
                'product_category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('products')->insert($productsData);
    }
}