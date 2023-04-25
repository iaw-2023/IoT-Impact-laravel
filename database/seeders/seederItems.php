<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class seederItems extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itemsData = [
            [
                'id' => 1,
                'order_id' => 1,
                'quantity' => 2,
                'individual_price' => 1000,
                'product_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'order_id' => 2,
                'quantity' => 1,
                'individual_price' => 1200,
                'product_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'order_id' => 2,
                'quantity' => 3,
                'individual_price' => 1000,
                'product_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'order_id' => 3,
                'quantity' => 1,
                'individual_price' => 1500,
                'product_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('items')->insert($itemsData);
    }
}