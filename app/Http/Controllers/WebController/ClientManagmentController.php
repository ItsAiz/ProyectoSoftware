<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\View\Factory;

class ClientManagmentController extends Controller
{
    public function index(): Factory|View|Application{
        $data['clients'] = Client::paginate(5);
        return view('components.client.index', $data);
    }
    public function domiciles(): Factory|View|Application{
        return view('components.client.domiciles');
    }
    public function bookings(): Factory|View|Application{
        return view('components.client.booking');
    }
}
