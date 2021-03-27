<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Stock;


class MypageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $ordersHistory = Order::where('user_id', $user->id);
        $ordersHistory = Stock::whereHas('orders', function ($query) use ($ordersHistory) {
            $ordersHistory->where('order_id', $ordersHistory);
        })->get();

        return view('/mypage', compact('user', 'ordersHistory'));
    }
}
