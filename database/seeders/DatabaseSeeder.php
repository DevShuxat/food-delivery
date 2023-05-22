<?php

namespace Database\Seeders;

use App\Models\User;
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
        $this->call(MenuItemSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(MoneySeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(RestaurantSeeder::class);
    }
}
