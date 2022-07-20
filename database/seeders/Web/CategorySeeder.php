<?php

namespace Database\Seeders\Web;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run()
    {
        $categoryOne = new Category([
            'name' => 'Comida rápida',
            'description' => 'Productos de comida rápida'
        ]);
        $categoryOne->save();

        $categoryTwo = new Category([
            'name' => 'Bebidas',
            'description' => 'Bebidas libres de alcohol'
        ]);
        $categoryTwo->save();

        $categoryThree = new Category([
            'name' => 'Cafés',
            'description' => 'Productos y bebidas a base de café'
        ]);
        $categoryThree->save();

        $categoryFour = new Category([
            'name' => 'Helados',
            'description' => 'Productos basados en helados y similares'
        ]);
        $categoryFour->save();

        $categoryFive = new Category([
            'name' => 'Bebidas alcoholicas',
            'description' => 'Bebidas con diversas concentraciones de alcohol'
        ]);
        $categoryFive->save();
    }

}
