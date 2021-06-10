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
        if ($file = $request->imgpath) {
            //保存するファイルに名前をつける    
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
            $target_path = public_path('/image/');
            $file->move($target_path, $fileName);
        } else {
            //画像が登録されなかった時はから文字をいれる
            $name = "";
        }

        $stockName = new StockName($request->name);
        $stockDetail = new StockDetail($request->detail);
        $stockFee = new StockFee($request->fee);
        $stockImg = new StockImg($fileName);
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

        $stockId = new StockId($request->id);
        $stockName = new StockName($request->name);
        $stockDetail = new StockDetail($request->detail);
        $stockFee = new StockFee($request->fee);
        $stockImg = null;
        $stock = new StockEntity(
            $stockId,
            $stockName,
            $stockDetail,
            $stockFee,
            $stockImg,
        );
        $stockRepository->update($stock);

        return redirect('admin/shop');
    }
}
