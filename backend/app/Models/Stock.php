<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Test;

class Stock extends Model
{
    protected $guarded = [
        'id'
    ];

    public static $rules = array(
        'name' => 'required',
        'fee' => 'required',
        'detail' => 'required',
        'imgpath' => 'required',
    );

    public function orders()
    {
        return  $this->belongsToMany('App\Models\Order', 'order_stock');
    }

    public function getImage($request)
    {
        if ($file = $request->imgpath) {
            $fileName = time() . $file->getClientOriginalName();
            $target_path = public_path('image/');
            $file->move($target_path, $fileName);
        } else {
            $fileName = "";
        }

        return $fileName;
    }

    public function imageInfo($request)
    {
        $stock = new Stock;
        $stock = new Test;
        $stock->name = $request->name;
        $stock->fee = $request->fee;
        $stock->detail = $request->detail;
        $stock->imgpath = $this->getImage($request);
        $stock->save();
    }
}
