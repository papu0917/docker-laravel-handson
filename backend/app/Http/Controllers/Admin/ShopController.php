<?php

namespace App\Http\Controllers\Admin;

use App\Adapter\Repository\StockRepository;
use App\Http\Controllers\Controller;
use App\Models\Stock;
use Domain\Model\Entity\Stock as StockEntity;
use Domain\Model\ValueObject\StockDetail;
use Domain\Model\ValueObject\StockName;
use Domain\Model\ValueObject\StockFee;
use Domain\Model\ValueObject\StockId;
use Domain\Model\ValueObject\StockImg;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

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

    public function store(Request $request, StockRepository $stockRepository)
    {
        if ($request->file('imgpath')) {
            //保存するファイルに名前をつける
            $path = $request->file('imgpath')->store('public/image');
            $stockImg = new StockImg($path);
        } else {
            $stockImg = null;
        }

        $stockName = new StockName($request->name);
        $stockDetail = new StockDetail($request->detail);
        $stockFee = new StockFee($request->fee);
        $stock = new StockEntity(
            null,
            $stockName,
            $stockDetail,
            $stockFee,
            $stockImg,
        );

        $stockRepository->save($stock);

        return redirect('admin/shop');
    }

    public function edit(Request $request, StockRepository $stockRepository)
    {
        $stockId = new StockId($request->id);
        $stockInfo = $stockRepository->findById($stockId);
        if (empty($stockInfo)) {
            abort(404);
        }

        return view('admin.edit', compact('stockInfo'));
    }

    public function update(Request $request, StockRepository $stockRepository)
    {
        // dd($request);
        // if (false) {
        //     dd('if');
        // } elseif (null) {
        //     dd('elseif');
        // } else {
        //     dd('else');
        // }

        $formData = $request->all();
        if ($request->remove == 'true') {
            $imgpath = null;
            dd($imgpath);
        } elseif ($request->file('imgpath')) {
            $path = $request->file('imgpath')->store('public/image');
            $imgpath = basename($path);
            // dd($imgpath);
        }


        // dd('hello');
        $stockId = new StockId($request->id);
        $stockName = new StockName($request->name);
        $stockDetail = new StockDetail($request->detail);
        $stockFee = new StockFee($request->fee);
        $stockImg = new StockImg($imgpath);
        $stock = new StockEntity(
            $stockId,
            $stockName,
            $stockDetail,
            $stockFee,
            $stockImg,
        );

        // dd($stock);
        $stockRepository->update($stock);

        return redirect('admin/shop');
    }
}
