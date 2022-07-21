<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class WelcomeController extends Controller
{
    public function getStart(): Factory|View|Application
    {
        return view("components.start");
    }

    public function getMenu()
    {
        // Pendiente por implementar
        return "Falta implentar el menú";
    }

    public function getMakeOrder($id): Factory|View|Application
    {
        $category = Category::all()->find($id);
        $data['products'] = $category->product;
        return view("components.makeOrder", $data);
    }

}
