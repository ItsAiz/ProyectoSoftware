<?php

namespace Database\Seeders\Web;

use App\Models\RestaurantTable;
use Illuminate\Database\Seeder;

class RestaurantTableSeeder extends Seeder
{

    public function run()
    {
        $tableOne = new RestaurantTable([
            'chairNumbers' => 1,
            'available' => 1
        ]);

        $tableTwo = new RestaurantTable([
            'chairNumbers' => 2,
            'available' => 1
        ]);

        $tableThree = new RestaurantTable([
            'chairNumbers' => 3,
            'available' => 1
        ]);

        $tableFour = new RestaurantTable([
            'chairNumbers' => 4,
            'available' => 1
        ]);

        $tableFive = new RestaurantTable([
            'chairNumbers' => 5,
            'available' => 1
        ]);

        $tableOne->save();
        $tableTwo->save();
        $tableThree->save();
        $tableFour->save();
        $tableFive->save();
    }

}
