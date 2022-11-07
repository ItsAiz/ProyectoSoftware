<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Mail\ListOfOrders;
use App\Models\DomicileSale;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class AdministratorActionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdministrator');
    }

    public function sendOrders(): RedirectResponse
    {
        $orders = DomicileSale::orderBy('saleDate', 'DESC')->get();

        $pdf = Pdf::loadView('components.email.orderList', ['orders' => $orders]);
        $pdf->setPaper('A3');

        $newEmail = new ListOfOrders();
        $newEmail->attachData($pdf->output(), 'Listado_Domicilios.pdf');

        Mail::to('11y6gastropub@gmail.com')->send($newEmail);

        return redirect()->route('domiciles/management')->with('message', 'informationSavedSuccessfully');
    }

}
