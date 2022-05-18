<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function prueba(){
        $cliente = Client::all();
        return view('Welcome',$cliente);
    }
}
