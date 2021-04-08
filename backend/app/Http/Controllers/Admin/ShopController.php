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

    public function store(Request $request, Stock $image)
    {
        $this->validate($request, Stock::$rules);
        $imageInfo = $image->imageInfo($request);

        return view('admin.store');
    }
}
