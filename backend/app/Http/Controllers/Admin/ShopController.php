<?php

namespace App\Http\Controllers\Admin;

use App\Adapter\Repository\StockRepository;
use App\Http\Controllers\Controller;
use App\Models\Stock;
use Domain\Model\Entity\Stock as StockEntity;
use Domain\Model\ValueObject\StockDetail;
use Domain\Model\ValueObject\StockName;
use Domain\Model\ValueObject\StockFee;
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

    public function store(Request $request, StockRepository $stockRepository)
    {
        // $this->validate($request, Stock::$rules);
        $stockName = new StockName($request->name);
        $stockDetail = new StockDetail($request->detail);
        $stockFee = new StockFee($request->fee);
        $stockImg = null;
        $stock = new StockEntity(
            null,
            $stockName,
            $stockDetail,
            $stockFee,
            $stockImg,

        );
        $stockRepository->save($stock);

        return view('admin.store');
    }
}
