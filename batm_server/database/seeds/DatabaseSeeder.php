<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 20;

        for ($i = 0; $i < $limit; $i++) {
        	DB::table('customers')->insert([ 
	            'name' => $faker->name,
	            'email' => $faker->unique()->email, 
	            'phone' => $faker->phoneNumber,
	            'address' => $faker->address,
	        ]);
	    }
	}
}
