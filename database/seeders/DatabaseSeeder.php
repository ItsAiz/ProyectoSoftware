<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // Admin
        $user = new User([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789')
        ]);
        $user->save();

    }
}
