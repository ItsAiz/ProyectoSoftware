<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Client;
use App\Models\DomicileSale;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ActivityHistoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isClient');
    }

    public function index(): Factory|View|Application
    {
        $user = User::all()->find(Auth::id());
        return view('components.client.domiciles')->with(['domiciles' => $user->client->domicileSale, 'client' => $user->client]);
    }

    public function details(DomicileSale $domicile): Factory|View|Application
    {
        $data['details'] = OrderDetail::all()->where('domicile_sale_id', '=', $domicile->getAttribute('id'));
        return view('components.client.details', $data);
    }

    public function bookings(Client $client): Factory|View|Application
    {
        $bookings = Booking::all()->where('client_id', '=', $client->getAttribute('id'));
        return view('components.client.booking')->with(['bookings' => $bookings, 'client' => $client]);
    }

}
