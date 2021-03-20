<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name', 'email', 'password', 'addres', 'phone', 'postcode', 'total_prices',
        'user_id',
    ];

    public function completeOrder(Request $request)
    {
        $order = new Order;
        $order->name = $request->name;
        $order->postcode = $request->postcode;
        $order->addres = $request->addres;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->user_id = $request->user_id;
        $order->total_prices = $request->total_prices;
        $order->save();
    }
}
