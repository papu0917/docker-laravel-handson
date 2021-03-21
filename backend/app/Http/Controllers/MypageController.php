<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class MypageController extends Controller
{
    public function index(Order $order)
    {
        $user = Auth::user();
        $user_id = Auth::id();
        $showOrders = Order::where('user_id', $user_id)->get();

        // $showOrders->whereHas('stocks', function ($query) {
        //     $query->where('stock_id');
        // })->get();

        // dd($orderHistory);

        // $accountbookPrice = $accountbookByTag
        //     ->whereHas('tags', function ($query) use ($request) {
        //         $query->where('tags.id', $request->tags);
        //     })->get()
        //     ->groupBy(function ($row) {
        //         return $row->tag;
        //     })
        //     ->map(function ($value) {
        //         return $value->sum('price');
        //     });




        return view('/mypage', compact('user', 'showOrders'));
    }
}
