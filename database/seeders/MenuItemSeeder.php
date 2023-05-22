<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MenuItemSeeder extends Seeder
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
            $name = $faker->word;
            $restaurantId = $faker->numberBetween(1, 20); // Assuming you have 10 restaurants
            $description = $faker->sentence(10);
            $price = $faker->randomFloat(2, 5, 50); // Assuming price range between 5 and 50

            DB::table('menu_items')->insert([
                'name' => $name,
                'restaurant_id' => $restaurantId,
                'description' => $description,
                'price' => $price,
            ]);
        }
    }
}

