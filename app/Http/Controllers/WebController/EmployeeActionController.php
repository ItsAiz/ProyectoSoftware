<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\DomicileSale;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeActionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isEmployee');
    }

    public function show(): Factory|View|Application
    {
        $user = User::all()->find(Auth::id());
        $employee = $user->employee;
        return view('components.employee.data')->with(['employee' => $employee]);
    }

    public function reservationList(){
        $todayDate = date("y/m/d");
        date_default_timezone_set('america/Bogota');
        $systemHour = date("H:i");
        $bookings['bookings'] = Booking::all()->where('bookingDate', '=', $todayDate)
        ->where('bookingHour','>',$systemHour)
        ->where('status', '=',0);

        return view('components.employee.reservationList',$bookings);
    }

    public function changeStatus(Booking $booking){
        DB::table('bookings')->where('id', '=', $booking->getAttribute('id'))->update(['status' => 1]);
        return back();
    }

    public function domiciles(){
        $todayDate = date("y/m/d");
        $data['domiciles'] = DomicileSale::all()->where('saleDate','=',$todayDate);
        return view('components.domicile.index', $data);
    }
}
