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
        //$this->call(SubcategoriesTableSeeder::class);
        $this->call(TournamentStatusSeeder::class);
    }
}
