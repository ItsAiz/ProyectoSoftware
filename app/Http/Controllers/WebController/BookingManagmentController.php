<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\View\Factory;

class BookingManagmentController extends Controller
{
    public function index(): Factory|View|Application{
        return view('components.booking.index');
    }
}
