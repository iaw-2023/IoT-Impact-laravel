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
                'name' => 'BigMac',
                'price' => 500.15,
                'stock' => 150,
                'description' => 'Hamburguesa BigMac con 4 panes.',
                'product_category_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Cuarto de libra',
                'price' => 800.5,
                'stock' => 20,
                'description' => 'Hamburguesa Cuarto de libra con 2 panes.',
                'product_category_id' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Nugget',
                'price' => 300.2,
                'stock' => 300,
                'description' => 'Pieza de pollo nugget.',
                'product_category_id' => 2,
            ],
            [
                'id' => 4,
                'name' => 'Coca Cola',
                'price' => 150.5,
                'stock' => 10,
                'description' => 'Vaso de Coca Cola.',
                'product_category_id' => 3,
            ],
        ];

        DB::table('products')->insert($productsData);
    }
}