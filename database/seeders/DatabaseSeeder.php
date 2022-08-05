<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Web\RolSeeder;
use Database\Seeders\Web\UserSeeder;
use Database\Seeders\Web\CategorySeeder;
use Database\Seeders\Web\RestaurantTableSeeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(RestaurantTableSeeder::class);
    }

}
