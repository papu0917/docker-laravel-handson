@extends('layouts.app')
@section('content')
    <div class="main">
        <div class="contents">
            <p class="section-title">基本情報</p>
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
            <p class="section-title">注文履歴</p>
            @foreach ($orders as $order)
                @foreach ($order->stocks as $stock)
                    <tr class="">
                        <td>{{ $stock->name }}</td>
                    </tr>
                @endforeach
            @endforeach
        </table>
    </div>
@endsection
