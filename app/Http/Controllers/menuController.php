<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class menuController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view("components.menu");
    }

}