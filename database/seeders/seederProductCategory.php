<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class seederProductCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productCategoriesData = [
            [
                'id' => 1,
                'name' => 'Hamburguesa',
            ],
            [
                'id' => 2,
                'name' => 'Pollo',
            ],
            [
                'id' => 3,
                'name' => 'Bebida',
            ],
        ];

        DB::table('product_category')->insert($productCategoriesData);
    }
}