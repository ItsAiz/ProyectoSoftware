<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mail\EmailRequest;
use App\Mail\SendMessage;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class WelcomeController extends Controller
{
    public function getStart(): Factory|View|Application
    {
        $details = DB::table('order_details')
            ->select('name', 'image', DB::raw('SUM(amount) as total'))
            ->groupBy('name', 'image')
            ->get()->sortByDesc('total');

        $array = array();

        foreach ($details as $detail) {
            if (Storage::exists('public/' . $detail->image)) {
                array_push($array, $detail);
            }
        }

        return view('components.welcome.start')->with(['products' => $array]);
    }

    public function sendMessage(EmailRequest $request): RedirectResponse
    {
        $newEmail = new SendMessage($request);
        Mail::to('11y6gastropub@gmail.com')->send($newEmail);
        return redirect()->route('start', '#contact')->with('message', 'Mensaje enviado correctamente');
    }

    public function getMenu(): Factory|View|Application
    {
        return view('components.welcome.menu');
    }

    public function downloadMenu(): BinaryFileResponse
    {
        $path = public_path() . '/download/11&6 - Gastro Pub.pdf';
        return response()->download($path);
    }

}
