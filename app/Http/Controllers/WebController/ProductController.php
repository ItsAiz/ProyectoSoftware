<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): Factory|View|Application
    {
        $data['products'] = Product::paginate(5);
        return view('components.product.index', $data);
    }

    public function create(): Factory|View|Application
    {
        return view('components.product.create');
    }

    public function store(Request $request): Redirector|Application|RedirectResponse
    {
        $product = new Product($request->all());
        $product->save();
        return redirect('product/management')->with('message', 'Producto agregado correctamente');
    }

    public function edit(Product $product): Factory|View|Application
    {
        return view('components.product.edit', compact('product'));
    }

    public function update(Product $product, Request $request): Redirector|Application|RedirectResponse
    {
        $product->update($request->all());
        $product->save();
        return redirect('product/management')->with('message', 'Producto actualizado correctamente');
    }

    public function destroy(Product $product): Redirector|Application|RedirectResponse
    {
        $product->delete();
        return redirect('product/management')->with('message', 'Producto eliminado correctamente');
    }

}
