<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Dto\CartInfo;

class Cart extends Model
{
    protected $guarded = [
        'id'
    ];

    public function makeCartInfo(int $user_id): CartInfo
    {
        $my_carts = $this->where('user_id', $user_id)->get();

        $count = 0;
        $sum = 0;

        foreach ($my_carts as $my_cart) {
            $count++;
            $sum += $my_cart->stock->fee;
        }

        $cartInfo = new CartInfo($my_carts, $count, $sum);
        return $cartInfo;
    }

    public function stock()
    {
        return $this->belongsTo('\App\Models\Stock');
    }

    public function addCart($stock_id)
    {
        $user_id = Auth::id();
        $cart_add_info = Cart::firstOrCreate(['stock_id' => $stock_id, 'user_id' => $user_id]);

        return ($cart_add_info->wasRecentlyCreated)
            ? 'カートに追加しました'
            : 'カートに登録済みです';
    }

    public function deleteCart($stock_id)
    {
        $user_id = Auth::id();
        $delete = $this->where('user_id', $user_id)->where('stock_id', $stock_id)->delete();
        $message = ($delete > 0) ? 'カートから一つの商品を削除しました' : '削除に失敗しました';
        return $message;
    }

    public function checkoutCart(): void
    {
        $user_id = Auth::id();
        $this->where('user_id', $user_id)->delete();
    }
}
