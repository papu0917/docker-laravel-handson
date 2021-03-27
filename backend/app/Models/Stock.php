<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $guarded = [
        'id'
    ];

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order', 'order_stock');
    }
    // public function stocks()
    // {

    //     return  $this->belongsToMany('App\Models\Stock', 'order_stock');
    // }
}
