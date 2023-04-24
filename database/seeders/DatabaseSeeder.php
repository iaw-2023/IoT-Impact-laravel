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
        //Respetar este orden en el seeding para evitar errores con las llaves foraneas.
        $this->call(seederProductCategory::class); // Include the seeder class for the 'items' table
        $this->call(seederProducts::class); // Include the seeder class for the 'items' table
        $this->call(seederOrders::class); // Include the seeder class for the 'items' table
        $this->call(seederItems::class); // Include the seeder class for the 'items' table
    }
}
