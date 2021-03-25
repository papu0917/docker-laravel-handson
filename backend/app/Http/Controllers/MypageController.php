<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class MypageController extends Controller
{
    public function index(Request $request, Order $order)
    {
        $user = Auth::user();
        $showOrders = Order::where('user_id', $user->id);
        $showOrders = Stock::whereHas('orders', function ($query) use ($showOrders) {
            $showOrders->where('order_id', $showOrders);
        });

        $lists = $showOrders->get();

        return view('/mypage', compact('user', 'lists'));
    }
}
