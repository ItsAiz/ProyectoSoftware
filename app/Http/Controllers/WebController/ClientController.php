<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ClientRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{

    public function store(ClientRequest $request)
    {
        $client = new Client([
            'name'=> $request->get('name'),
            'lastName' => $request->get('lastName'),
            'documentType' => $request->get('documentType'),
            'documentNumber' => $request->get('documentNumber')
        ]);

        if ($client->save()) {
            $this->saveClientUser($request);
        }
    }

    private function saveClientUser($request)
    {
        $user = new User([
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);
        $user->save();
        Auth::login($user);
    }

}
