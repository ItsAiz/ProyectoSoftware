<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ClientRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{

    public function store(ClientRequest $request): RedirectResponse
    {
        $user = new User([
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'rol_id' => 3
        ]);
        $user->save();

        $client = new Client([
            'name' => $request->get('name'),
            'lastName' => $request->get('lastName'),
            'documentType' => $request->get('documentType'),
            'documentNumber' => $request->get('documentNumber'),
            'user_id' => $user->getAttribute('id')
        ]);
        $client->save();

        Auth::login($user);

        return redirect()->route('home');
    }

}
