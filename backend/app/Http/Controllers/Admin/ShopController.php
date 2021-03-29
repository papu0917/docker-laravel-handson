<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $stocks = Stock::Paginate(12);
        return view('admin.shop', compact('stocks'));
    }

    public function create()
    {
        return view('admin.store');
    }

    public function store(Request $request)
    {
        $this->validate($request, Stock::$rules);
        if ($file = $request->imgpath) {
            $fileName = time() . $file->getClientOriginalName();
            $target_path = public_path('image/');
            $file->move($target_path, $fileName);
        } else {
            $fileName = "";
        }

        $stock = new Stock;
        $stock->name = $request->name;
        $stock->fee = $request->fee;
        $stock->detail = $request->detail;
        $stock->imgpath = $fileName;
        $stock->save();

        return view('admin.store');
    }
}
