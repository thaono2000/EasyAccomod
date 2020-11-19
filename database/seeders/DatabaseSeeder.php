<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 1; $i <= 10; $i++)
        {
        	DB::table('admins')->insert([
        		'name' => $faker->name,
            	'email' => $faker->unique()->safeEmail,
            	'email_verified_at' => now(),
            	'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            	'remember_token' => Str::random(10),]);

        	DB::table('owners')->insert([
        		'full_name' => $faker->name,
            	'email' => $faker->unique()->safeEmail,
            	'email_verified_at' => now(),
            	'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            	'address' => $faker->address,
            	'identity' => rand(100000000000,999999999999),
            	'phone' => rand(1000000000,9999999999),
                'status' =>rand(0,1),
            	'remember_token' => Str::random(10),]);

        	DB::table('renters')->insert([
        		'full_name' => $faker->name,
            	'email' => $faker->unique()->safeEmail,
            	'email_verified_at' => now(),
            	'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            	'phone' => rand(1000000000,9999999999),
            	'remember_token' => Str::random(10),]);

        	DB::table('likelists')->insert([
        		'motel_id' => rand(1,10),
            	'remember_token' => Str::random(10),]);

        	// DB::table('motels')->insert([
        	// 	'image' => $faker->img,
         //    	'location' => $faker->address,
         //    	'price' => rand(500000 + 'VND', 10000000 + 'VND'),
         //    	'acreage' => rand(10 + 'm2',90 + 'm2'),
         //    	'remember_token' => Str::random(10),]);

        	DB::table('reports')->insert([
        		'report' => $faker->text,
            	'renter_id' => rand(1, 10),
            	'remember_token' => Str::random(10),]);
        } 
    }
}
