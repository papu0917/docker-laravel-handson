<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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

    private function makeImageFileName($request)
    {
        $file = $request->imgpath;
        if (!$file) {
            return "";
        }

        $fileName = time() . $file->getClientOriginalName();
        $target_path = public_path('image/');
        $file->move($target_path, $fileName);

        return $fileName;
    }

    public function saveWithImage($request): void
    {
        $stock = new Stock;
        $stock->name = $request->name;
        $stock->fee = $request->fee;
        $stock->detail = $request->detail;
        $stock->imgpath = $this->makeImageFileName($request);
        $stock->save();
    }
}
