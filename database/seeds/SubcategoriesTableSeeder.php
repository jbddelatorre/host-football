<?php

use Illuminate\Database\Seeder;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($x = 10; $x <= 18; $x++) {
        	DB::table('subcategories')->insert([
	        	'id' => 'U'.$x,
	        	'subcategory' => "Under ".$x 
	        ]);
        }

        DB::table('subcategories')->insert([
        	'id' => 'MO',
        	'subcategory' => "Men's Open" 
        ]);
    }
}
