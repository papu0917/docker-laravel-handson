<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Cart;
use App\Models\Order;
use DB;
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
        $user_id = Auth::id();
        $cartInfo = $cart->makeCartInfo($user_id);
        return view('mycart', compact('cartInfo'));
    }

    public function addMycart(Request $request, Cart $cart)
    {
        $user_id = Auth::id();
        $stock_id = $request->stock_id;
        $message = $cart->addCart($stock_id);
        $cartInfo = $cart->makeCartInfo($user_id);

        return view('mycart', compact('cartInfo'))->with('message', $message);
    }

    public function confirm(Cart $cart)
    {
        $user_id = Auth::id();
        $user = Auth::user();
        $cartInfo = $cart->makeCartInfo($user_id);
        return view('confirm', compact('cartInfo', 'user'));
    }

    public function deleteCart(Request $request, Cart $cart)
    {
        $user_id = Auth::id();
        $stock_id = $request->stock_id;
        $message = $cart->deleteCart($stock_id);
        $cartInfo = $cart->makeCartInfo($user_id);

        return view('mycart', compact('cartInfo'))->with('message', $message);;
    }

    public function checkout(Request $request, Cart $cart, Order $order)
    {
        DB::transaction(function () use ($request, $order) {
            $completeOrder = $order->completeOrder($request);
        });

        $checkout_info = $cart->checkoutCart();
        return view('checkout');
    }

    public function vue()
    {
        return view('index');
    }
}
