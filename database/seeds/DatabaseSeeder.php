<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TamanhoTableSeeder::class);
        $this->call(SaborTableSeeder::class);
        $this->call(AdicionalTableSeeder::class);
    }
}
