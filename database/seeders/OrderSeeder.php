<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            $restaurantId = $faker->numberBetween(1, 10); // Assuming 10 restaurants exist
            $userId = $faker->numberBetween(1, 10); // Assuming 100 users exist
            $status = $faker->randomElement(['pending', 'processing', 'completed']);

            DB::table('orders')->insert([
                'restaurant_id' => $restaurantId,
                'user_id' => $userId,
                'status' => $status,
            ]);
        }
    }
}

