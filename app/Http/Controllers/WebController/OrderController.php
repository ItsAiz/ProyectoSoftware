<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Delivery\DeliveryRequest;
use App\Models\Category;
use App\Models\Client;
use App\Models\DomicileSale;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function getMakeOrder(Category $category): Factory|View|Application
    {
        $products = $category->product()->get();
        return view("components.welcome.makeOrder", ['products' => $products, 'total' => $this->getTotal()]);
    }

    public function addProduct(Product $product): RedirectResponse
    {
        $category = $product->getAttribute('category_id');
        $result = $this->validateStock($product);

        if (!$result) {
            return redirect()->route('makeOrder', $category)->with('errorMessage', 'stockError');
        }

        return $this->addToTheList($product);
    }

    private function getTotal()
    {
        $total = 0;

        foreach ($this->getListProducts() as $item) {
            $total = $total + ($item->stockAmount * $item->price);
        }

        return $total;
    }

    private function validateStock(Product $product): bool
    {
        return ($product->getAttribute('stockAmount') - 1) >= 0;
    }

    private function addToTheList(Product $product): RedirectResponse
    {
        $category = $product->getAttribute('category_id');
        $listOfProducts = $this->getListProducts();

        foreach ($listOfProducts as $item) {
            if ($item->id == $product->getAttribute('id')) {

                if (($item->stockAmount + 1) > $product->getAttribute('stockAmount')) {
                    return redirect()->route('makeOrder', $category)->with('errorMessage', 'stockError');
                }

                $item->stockAmount = ($item->stockAmount + 1);

                return redirect()->route('makeOrder', $category);
            }
        }

        $item = $product;
        $item->setAttribute('stockAmount', 1);

        array_push($listOfProducts, $product);
        $this->saveProducts($listOfProducts);

        return redirect()->route('makeOrder', $category);
    }

    private function getListProducts()
    {
        $listOfProducts = session('listOfProducts');
        if (!$listOfProducts) {
            $listOfProducts = [];
        }
        return $listOfProducts;
    }

    private function saveProducts($listOfProducts)
    {
        session(['listOfProducts' => $listOfProducts]);
    }

    public function removeProduct(Request $request): RedirectResponse
    {
        $index = $request->get('indice');
        $listOfProducts = $this->getListProducts();

        if ($listOfProducts[$index]['stockAmount'] > 1) {
            $listOfProducts[$index]['stockAmount'] = ($listOfProducts[$index]['stockAmount'] - 1);
            return redirect()->route('makeOrder', 1);
        }

        array_splice($listOfProducts, $index, 1);
        $this->saveProducts($listOfProducts);
        return redirect()->route('makeOrder', 1);
    }

    public function finalizeOrder(DeliveryRequest $request): RedirectResponse
    {
        $user = User::all()->find(Auth::id());
        $client = ($user && $user->client) ? Client::all()->find($user->client->id) : null;

        $sale = new DomicileSale();
        $sale->setAttribute('saleDate', Carbon::now());
        $sale->setAttribute('totalCost', $this->getTotal());
        $sale->setAttribute('name', $request->get('name'));
        $sale->setAttribute('address', $request->get('address'));
        $sale->setAttribute('phoneNumber', $request->get('phoneNumber'));
        $sale->setAttribute('client_id', ($client) ? $client->getAttribute('id') : null);
        $sale->save();

        $idSale = $sale->getAttribute('id');

        $products = $this->getListProducts();

        foreach ($products as $product) {

            $productSold = new OrderDetail([
                'domicile_sale_id' => $idSale,
                'name' => $product->getAttribute('name'),
                'price' => $product->getAttribute('price'),
                'amount' => $product->getAttribute('stockAmount'),
                'image' => $product->getAttribute('image')
            ]);
            $productSold->save();

            $updatedProduct = Product::all()->find($product->getAttribute('id'));
            $updatedProduct->stockAmount = ($updatedProduct->stockAmount - $productSold->getAttribute('amount'));
            $updatedProduct->save();
        }

        $this->emptyProductList();
        return redirect()->route('makeOrder', 1)->with('message', 'successfulDelivery');
    }

    private function emptyProductList()
    {
        $this->saveProducts(null);
    }

}
