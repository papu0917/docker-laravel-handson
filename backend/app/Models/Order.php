<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name', 'email', 'password', 'addres', 'phone', 'postcode', 'total_prices',
        'user_id', 'stock_id', 'order_id',
    ];

    protected $guarded = [
        'id'
    ];

    public function stocks()
    {

        return  $this->belongsToMany('App\Models\Stock', 'order_stock');
    }
    // public function orders()
    // {
    //     return $this->belongsToMany('App\Models\Order', 'order_stock');
    // }




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
        $order->stocks()->attach($request->stock_id);
    }
}
