@extends('layouts.app_admin')
@section('content')
    <div class="text-center">
        {{-- <img src="/image/e_sale_460_1.jpg"> --}}
    </div>
    <div class="container-fluid">
        <div class="">
            <div class="mx-auto" style="max-width:1200px">
                <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
                <div class="">
                    <div class="d-flex flex-row flex-wrap">
                        @foreach ($stocks as $stock)
                            <div class="col-xs-6 col-sm-4 col-md-3" style="padding: 24px 8px;">
                                <div class="card" style="width:17rem;">
                                    <img src="{{ asset('storage/image/' . $stock->imgpath) }}" alt=""
                                        class="bd-placeholder-img card-img-top" width="100%" height="180">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $stock->name }}</h5>
                                        <p class="text-danger card-price">{{ number_format($stock->fee) }}円</p>
                                        <p class="card-text">{{ $stock->detail }}</p>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ action('Admin\ShopController@edit', ['id' => $stock->id]) }}"><button
                                            type="button"> 編集</a></button>
                                </div>
                            </div>

                        @endforeach
                    </div>
                    <div class="text-center" style="width: 200px;margin: 20px auto;">
                        {{ $stocks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
