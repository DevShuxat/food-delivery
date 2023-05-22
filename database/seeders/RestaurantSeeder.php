<?php

namespace Database\Seeders;

use App\Domain\Restaurants\Entities\Restaurant;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RestaurantSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            Restaurant::create([
                'name' => $faker->company,
                'description' => $faker->paragraph,
                'address' => $faker->address,
            ]);
        }
    }
}
