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
        // $ordersHistory = Order::where('user_id', $user->id);
        // $ordersHistory = Stock::whereHas('orders', function ($query) use ($ordersHistory) {
        //     $ordersHistory->where('order_id', $ordersHistory);
        // })->get();

        $ordersHistory = Stock::all('id');
        foreach ($ordersHistory as $order) {
            $ids[] = $order->id;
        }

        $orders = Stock::whereHas('orders', function ($query) use ($ids) {
            $query->whereIn('stock_id', $ids);
        })->get();

        return view('/mypage', compact('user', 'orders'));
    }
}
