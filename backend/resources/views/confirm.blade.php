@extends('layouts.app')

@section('content')


    <div class="main">
        <div style="color:red;">
            @if (count($errors) > 0)
                <ul>
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <form action="/checkout" method="POST">
            <div class="contents">
                <p class="section-title">お届け先・配送方法・お支払い方法</p>
                <table class="table">
                    <tr class="name border-bottom">
                        <th>氏名</th>
                        <td>{{ $user->name }}</td>
                        <input type="hidden" name="name" value="{{ $user->name }}">
                    </tr>
                    <tr class="postcode border-bottom">
                        <th>郵便番号</th>
                        <td>{{ $user->postcode }}</td>
                        <input type="hidden" name="postcode" value="{{ $user->postcode }}">
                    </tr>
                    <tr class="addres border-bottom">
                        <th>お届け先</th>
                        <td>{{ $user->addres }}</td>
                        <input type="hidden" name="addres" value="{{ $user->addres }}">
                    </tr>
                    <tr class="phone border-bottom">
                        <th>電話番号</th>
                        <td>{{ $user->phone }}</td>
                        <input type="hidden" name="phone" value="{{ $user->phone }}">
                    </tr>
                    <tr class="email border-bottom">
                        <th>メールアドレス</th>
                        <td>{{ $user->email }}</td>
                        <input type="hidden" name="email" value="{{ $user->email }}">
                    </tr>
                    <input type="hidden" name='user_id' value="{{ $user->id }}">
                </table>
            </div>
            <table class="table">

                <thead>
                    <tr>
                        <th width="50%">商品名</th>
                        <th>数量</th>
                        <th>金額</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($cartInfo->carts() as $my_cart)
                        <tr>
                            <th>{{ $my_cart->stock->name }}</th>
                            <th>1</th>
                            <th>{{ number_format($my_cart->stock->fee) }}円</th>
                            <input type="hidden" name="stock_id[]" value="{{ $my_cart->stock->id }}">
                            <input type="hidden" name="total_prices" value="{{ $cartInfo->sum() }}">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="text-center p-2">
                個数：{{ $cartInfo->count() }}個<br>
                <p style="font-size:1.2em; font-weight:bold;">合計金額:{{ number_format($cartInfo->sum()) }}円</p>
            </div>

            @csrf
            <button type="submit" class="btn btn-danger btn-lg text-center buy-btn">購入する</button>
        </form>
    </div>
@endsection
