<?php

namespace Database\Seeders;

use Database\Seeders\Web\CategorySeeder;
use Database\Seeders\Web\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
    }

}
