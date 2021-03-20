@extends('layouts.app')

@section('content')
    <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
        {{ Auth::user()->name }}さん</h1>
@endsection
