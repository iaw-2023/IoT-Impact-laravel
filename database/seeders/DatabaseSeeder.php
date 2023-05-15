<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // permite llamar a DB para solucionar el SETVAL


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


        /**
         * Start fix SETVAL problem
         */
        $tables = \DB::select('SELECT table_name 
                                FROM information_schema.tables 
                                WHERE table_schema = \'public\' 
                                ORDER BY table_name;');

        $ignores = array('users', 'personal_access_tokens', 'failed_jobs', 'migrations', 'admin_setting', 'sessions',
                        'model_has_permissions', 'model_has_roles', 'password_reset_tokens', 'role_has_permissions');

        foreach ($tables as $table) {
            if (!in_array($table->table_name, $ignores)) {
                $seq = \DB::table($table->table_name)->max('id') + 1;
                \DB::select('ALTER SEQUENCE ' . $table->table_name . '_id_seq RESTART WITH ' . $seq);
            }
        }
        /**
         * End fix SETVAL problem
         */
        
    }
}
