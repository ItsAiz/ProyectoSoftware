<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class WelcomeController extends Controller
{
    public function getStart(): Factory|View|Application
    {
        return view("components.start");
    }

    public function getMenu(): string
    {
        return 'False';
    }

}
