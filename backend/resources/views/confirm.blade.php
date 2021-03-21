@extends('layouts.app')

@section('content')
    <div class="alert alert-danger m-2 text-center" role="alert">※ご注文はまだ確定しておりません、お届け先・ご注文内容をご確認ください</div>
    <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
        お届け先・ご注文内容
    </h1>
    </div>
    <form action="/checkout" method="POST">

        <div class="col-md-12">
            <table align="center" width="60%">

                <tr class="name text-center border-bottom" style="padding:50px 10px;">
                    <th>氏名</th>
                    <td>{{ $user->name }}</td>
                    <input type="hidden" name="name" value="{{ $user->name }}">
                </tr>
                <tr class="postcode text-center border-bottom">
                    <th>郵便番号</th>
                    <td>{{ $user->postcode }}</td>
                    <input type="hidden" name="postcode" value="{{ $user->postcode }}">
                </tr>
                <tr class="addres text-center border-bottom">
                    <th>お届け先</th>
                    <td>{{ $user->addres }}</td>
                    <input type="hidden" name="addres" value="{{ $user->addres }}">
                </tr>
                <tr class="phone text-center border-bottom">
                    <th>電話番号</th>
                    <td>{{ $user->phone }}</td>
                    <input type="hidden" name="phone" value="{{ $user->phone }}">
                </tr>
                <tr class="email text-center border-bottom">
                    <th>メールアドレス</th>
                    <td>{{ $user->email }}</td>
                    <input type="hidden" name="email" value="{{ $user->email }}">
                </tr>
                <input type="hidden" name='user_id' value="{{ $user->id }}">
            </table>
        </div>
        <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
            {{-- ご注文内容 --}}
        </h1>
        <div class="col-md-12">
            <div class="row">
                <table class="table table-striped">

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
            </div>
        </div>
        <div class="text-center p-2">
            個数：{{ $cartInfo->count() }}個<br>
            <p style="font-size:1.2em; font-weight:bold;">合計金額:{{ number_format($cartInfo->sum()) }}円</p>
        </div>
        @csrf
        <button type="submit" class="btn btn-danger btn-lg text-center buy-btn">購入する</button>
    </form>


@endsection
