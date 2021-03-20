<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class ShopController extends Controller
{
    public function index()
    {
        $stocks = Stock::Paginate(12);
        return view('shop', compact('stocks'));
    }

    public function myCart(Cart $cart)
    {
        $data = $cart->showCart();
        return view('mycart', $data);
    }

    public function addMycart(Request $request, Cart $cart)
    {
        $stock_id = $request->stock_id;
        $message = $cart->addCart($stock_id);
        $data = $cart->showCart();

        return view('mycart', $data)->with('message', $message);
    }

    public function confirm(Cart $cart)
    {
        $user_id = Auth::id();
        $data = $cart->showCart();
        return view('confirm', $data);
    }

    public function deleteCart(Request $request, Cart $cart)
    {

        $stock_id = $request->stock_id;
        $message = $cart->deleteCart($stock_id);
        $data = $cart->showCart();

        return view('mycart', $data)->with('message', $message);;
    }

    public function checkout(Request $request, Cart $cart, Order $order)
    {
        $completeOrder = $order->completeOrder($request);
        $checkout_info = $cart->checkoutCart();
        return view('checkout');
    }
}
