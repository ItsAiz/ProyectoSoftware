<?php

namespace App\Http\Controllers\WebController;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\Booking\BookingRequest;
use Illuminate\Contracts\Foundation\Application;

class BookingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isClient');
    }

    public function index(): Factory|View|Application
    {
        $user = User::all()->find(Auth::id());
        $data['bookings'] = Booking::all()->where('client_id', '=', $user->client->id);
        return view('components.booking.reservationList', $data);
    }

    public function create(): Factory|View|Application
    {
        return view('components.booking.create');
    }

    public function store(BookingRequest $request): Redirector|Application|RedirectResponse
    {
        if (sizeof($this->validateTable($request)) > 0) {
            return redirect()->route('booking/create')->with([
                'errorMessage' => 'Ya hay una reserva con esta mesa para la fecha seleccionada'
            ])->withInput();
        }

        $user = User::all()->find(Auth::id());

        $booking = new Booking([
            'bookingDate' => $request->get('bookingDate'),
            'bookingHour' => $request->get('bookingHour'),
            'description' => $request->get('description'),
            'restaurant_table_id' => $request->get('restaurant_table_id'),
            'status' => 0,
            'client_id' => $user->client->id
        ]);
        $booking->save();

        return redirect('booking')->with('message', 'Solicitud de reserva realizada correctamente');
    }

    private function validateTable($request): Collection
    {
        return Booking::all()
            ->where('bookingDate', '=', $request->get('bookingDate'))
            ->where('restaurant_table_id', '=', $request->get('restaurant_table_id'));
    }

    public function destroy(Booking $booking): Redirector|Application|RedirectResponse
    {
        $booking->delete();
        return redirect('booking')->with('message', 'Reserva cancelada correctamente');
    }

}
