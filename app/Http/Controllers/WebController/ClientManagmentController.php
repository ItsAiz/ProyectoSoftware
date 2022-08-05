<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Client;
use App\Models\DomicileSale;
use App\Models\OrderDetail;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\View\Factory;

class ClientManagmentController extends Controller
{
    public function index(): Factory|View|Application{
        $data['clients'] = Client::paginate(5);
        return view('components.client.index', $data);
    }
    public function domiciles(Client $client): Factory|View|Application{
        $domiciles = DomicileSale::all()->where('client_id', '=', $client->getAttribute('id'));
        return view('components.client.domiciles')->with(['domiciles'=>$domiciles,'client'=>$client]);
    }

    public function details(DomicileSale $domicile): Factory|View|Application{
        $data['details'] = OrderDetail::all()->where('domicile_sale_id', '=', $domicile->getAttribute('id'));
        return view('components.client.details',$data);
    }

    public function bookings(Client $client){
        $bookings = Booking::all()->where('client_id', '=', $client->getAttribute('id'));
        return view('components.client.booking')->with(['bookings'=>$bookings,'client'=>$client]);
    }
}
