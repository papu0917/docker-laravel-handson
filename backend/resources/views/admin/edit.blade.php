@extends('layouts.app_admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="{{ route('admin.update') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">商品名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $stockInfo->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">金額</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="fee" value="{{ $stockInfo->fee }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">コメント</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="detail" value="{{ $stockInfo->detail }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="imgpath" value="{{ $stockInfo->imgpath }}">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $stockInfo->id }}">
                    <input type="submit" class="btn btn-primary" value="登録">
                    <a href="{{ route('admin.shop') }}" role="button" class="btn btn-primary">戻る</a>
                </form>
            </div>
        </div>
    </div>
@endsection
