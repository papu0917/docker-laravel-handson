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
        return $this->belongsToMany('App\Models\Order')->withPivot('order_id', 'stock_id');
    }
}
