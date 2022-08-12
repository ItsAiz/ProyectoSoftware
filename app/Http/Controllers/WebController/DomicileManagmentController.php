<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Models\DomicileSale;
use App\Models\OrderDetail;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\View\Factory;

class DomicileManagmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdministrator');
    }

    public function index(): Factory|View|Application
    {
        $data['domiciles'] = DomicileSale::all();
        return view('components.domicile.index', $data);
    }

    public function details(DomicileSale $domicile): Factory|View|Application
    {
        $data['details'] = OrderDetail::all()->where('domicile_sale_id', '=', $domicile->getAttribute('id'));
        return view('components.details.index', $data);
    }

}
