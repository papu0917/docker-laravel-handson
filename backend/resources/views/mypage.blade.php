@extends('layouts.app')
@section('content')
    <div class="main">
        <div class="contents">
            <p class="section-title">基本情報</p>
            <table class="table">
                <tr class="name ">
                    <th>氏名</th>
                    <td>{{ $user->name }}</td>
                    <input type="hidden" name="name" value="{{ $user->name }}">
                </tr>
                <tr class="postcode ">
                    <th>郵便番号</th>
                    <td>{{ $user->postcode }}</td>
                    <input type="hidden" name="postcode" value="{{ $user->postcode }}">
                </tr>
                <tr class="addres ">
                    <th>お届け先</th>
                    <td>{{ $user->addres }}</td>
                    <input type="hidden" name="addres" value="{{ $user->addres }}">
                </tr>
                <tr class="phone ">
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
        <div class="">
            <p class="section-title">注文履歴</p>
            @foreach ($orders as $order)
                <div class="order-history">
                    <div class="order">
                        <p>注文日</p>
                        <p>{{ $order->created_at->format('Y年m月d日') }}</p>
                    </div>
                    <div class="total-price">
                        <p>合計金額</p>
                        <p>￥{{ $order->total_prices }}</p>
                    </div>
                    @foreach ($order->stocks as $stock)
                        <div class="">
                            <img src="{{ asset('storage/image/' . $stock->imgpath) }}" class="image">
                            <div class="commodity-name">
                                <p>{{ $stock->name }}</p>
                                <div class="reorder">
                                    <form action="mycart" method="post">
                                        @csrf
                                        <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                                        <input type="submit" value="再度購入する">
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection
