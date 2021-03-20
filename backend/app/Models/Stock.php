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
        return $this->belongsToMany('App\Models\Order', 'order__xref_stock');
    }
}
