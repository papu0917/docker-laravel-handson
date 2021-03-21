@extends('layouts.app')

@section('content')
    <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">基本情報</h1>
    <div style="margin-top: 30px;">

        <table class="table">
            <tr class="text-center">
                <th>氏名</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr class="text-center">
                <th>メールアドレス</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr class="text-center">
                <th>郵便番号</th>
                <td>{{ $user->postcode }}</td>
            </tr>
            <tr class="text-center">
                <th>住所</th>
                <td>{{ $user->addres }}</td>
            </tr>
            <tr class="text-center">
                <th>電話番号</th>
                <td>{{ $user->phone }}</td>
            </tr>
        </table>

    </div>

    <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">注文履歴</h1>
    @foreach ($showOrders as $order)
        {{ $order->id }}
    @endforeach

    {{-- @foreach ($orderHistory as $history)
        {{ $history }}
    @endforeach --}}




@endsection
