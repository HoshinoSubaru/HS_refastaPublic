@extends('layouts.app')
@section('title')店頭査定@endsection

@section('description')
    リファスタの店頭入力ページです
@endsection

@section('content')

    <form action = "{{ env("APP_URL") }}/shop_front/startPage/create_token" method = "post" enctype="">
        {{ csrf_field() }}
        <div><input type="submit" value="トークンを生成します"></div>
    </form>

    <div>トークン</div>

    <div>残り時間</div>

@endsection

@section('body_last')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

