<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;
use DB;

use function Ramsey\Uuid\v1;

class MypageController extends Controller
{
    public function index(Request $request, Order $order)
    {
        $user = Auth::user();
        // 履歴の全件取得できる、さらに絞り込みたい。
        $orderInfo = Order::where('user_id', $user->id);
        $orderInfo = Stock::whereHas('orders', function ($query) use ($orderInfo) {
            $orderInfo->where('order_id', $orderInfo);
        })->get();

        $lists = $orderInfo;

        return view('/mypage', compact('lists', 'user'));
    }

    public function list()
    {
        $user = Auth::user();
        $userInfo = Order::where('user_id', $user->id)->get('id');
        $loop = count($userInfo);
        $ordersHistory = [];
        for ($i = 0; $i < $loop; $i++) {
            $ordersHistory[] = $userInfo[$i]->id;
        }
        // 中間テーブルからのデータ取得がよく分からないので直接取得できないか試してみた。
        $orderInfo = [
            'records' => DB::select('SELECT * FROM order_stock')
        ];

        $count = count($orderInfo['records']);
        $totalOrderIds = [];
        for ($i = 0; $i < $count; $i++) {
            $totalOrdersId[$i] = $orderInfo['records'][$i]->order_id;
        }
        $ordersId = array_intersect($ordersHistory, $totalOrdersId);

        return view('/mypage', $ordersId, compact('user'));
    }
}
