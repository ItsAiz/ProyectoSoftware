<?php

namespace App\Http\Controllers\webController;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class welcomeController extends Controller
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

    public function getMakeOrder(): Factory|View|Application
    {
        return view("components.makeOrder");
    }

}
