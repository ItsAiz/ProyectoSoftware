<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\View\Factory;

class BookingManagmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdministrator');
    }

    public function index(): Factory|View|Application
    {
        $data['bookings'] = Booking::all();
        return view('components.booking.index', $data);
    }

}
