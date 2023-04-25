<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class seederOrders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ordersData = [
            [
                'id' => 1,
                'customer_email' => 'carlos@gmail.com',
                'total_amount' => 1000.3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'customer_email' => 'jose@gmail.com',
                'total_amount' => 2552,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'customer_email' => 'julia@hotmail.com',
                'total_amount' => 300.2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('orders')->insert($ordersData);
    }
}