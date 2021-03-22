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
        $showOrders = Order::where('user_id', $user->id)->get();

        foreach ($showOrders as $order) {
            // TODO: $orderIdsに一致する、stock_idを取得したい
            $orderIds = $order->id;
        }

        $orderList = Stock::whereHas('orders', function ($query) use ($orderIds) {
            $query->where('order_id', $orderIds);
        });

        $ids = $orderList->get();

        return view('/mypage', compact('user', 'ids'));
    }
}
