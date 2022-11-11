<?php

namespace App\Http\Controllers\WebController;

use App\Models\User;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\Booking\BookingRequest;
use Illuminate\Contracts\Foundation\Application;
use phpDocumentor\Reflection\Types\False_;

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
                'errorMessage' => 'tableReservationError'
            ])->withInput();
        }

        $user = User::all()->find(Auth::id());
        $dateActual = Carbon::now();
        $dateHour = $dateActual->format('H:i');
        $dateHour = intval(str_replace(":",'',$dateHour));
        $dateHBooking = $request->get('bookingHour');
        $datHeBooking = intval(str_replace(":",'',$dateHBooking));
        $booking = new Booking([
            'bookingDate' => $request->get('bookingDate'),
            'bookingHour' => $request->get('bookingHour'),
            'description' => $request->get('description'),
            'restaurant_table_id' => $request->get('restaurant_table_id'),
            'status' => 0,
            'client_id' => $user->client->id
        ]);
        if($datHeBooking > $dateHour){
            $booking->save();
            return redirect('booking')->with('message', 'SuccessfulReservationCreation');
        }else{
            return redirect('booking/create')->with('errorMessage', 'Error al solicitar la reserva, verifique los datos');
        }

    }

    private function validateTable($request): Collection
    {
        return Booking::all()
            ->where('bookingDate', '=', $request->get('bookingDate'))
            ->where('restaurant_table_id', '=', $request->get('restaurant_table_id'));
    }

    public function destroy(Booking $booking)
    {
        $dateActual = Carbon::now();
        $result = $dateActual->lte(Carbon::create($booking->getAttribute('bookingDate')));
        $dateHour = $dateActual->format('H:i');
        $dateHour = intval(str_replace(":",'',$dateHour));
        $dateHBooking = $booking->getAttribute('bookingHour');
        $datHeBooking = intval(str_replace(":",'',$dateHBooking));
        if ($result) {
            return redirect('booking')->with('errorMessage', 'reservationCancellationError');
        }
        if ($dateHour >= $datHeBooking){
            return redirect('booking')->with('errorMessage', 'reservationCancellationError');
        }
        $booking->delete();
        return redirect('booking')->with('message', 'successfulBookingCancellation');
    }

}
