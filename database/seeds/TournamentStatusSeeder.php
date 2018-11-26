<?php

use Illuminate\Database\Seeder;

class TournamentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tournament_statuses')->insert([
	        	'status_type' => "Registered" 
	        ]);
        DB::table('tournament_statuses')->insert([
	        	'status_type' => "Ongoing" 
	        ]);
        DB::table('tournament_statuses')->insert([
	        	'status_type' => "Completed" 
	        ]);
    }
}
