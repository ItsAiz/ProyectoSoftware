<?php

namespace Database\Seeders\Web;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run()
    {
        $user = new User([
            'email' => 'felipeduenas0@gmail.com',
            'password' => bcrypt('123')
        ]);
        $user->save();
    }

}
