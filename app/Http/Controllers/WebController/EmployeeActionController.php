<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\DomicileSale;
use App\Models\OrderDetail;
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
        date_default_timezone_set('america/Bogota');
        $todayDate = date("Y-m-d");
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
        $todayDate = date("Y-m-d");
        $data['domiciles'] = DomicileSale::all()->where('saleDate','=',$todayDate);
        return view('components.employee.domiciles', $data);
    }
    public function details(DomicileSale $domicile): \Illuminate\View\Factory|View|Application
    {
        $data['details'] = OrderDetail::all()->where('domicile_sale_id', '=', $domicile->getAttribute('id'));
        return view('components.employee.details', $data);
    }
}
