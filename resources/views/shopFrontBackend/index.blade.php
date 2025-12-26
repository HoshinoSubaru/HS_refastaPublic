@extends('layouts.shop_front')
@section('title')店頭査定@endsection

@section('description')
    リファスタの店頭入力ページです
@endsection

@section('content')
<!-- Styles -->
<link href="https://rifa.life/refasta_public/public/css/app.css" rel="stylesheet">
<link href="https://rifa.life/refasta_public/public/css/custom.css" rel="stylesheet">

<div id="guestInfoRegistration">
    <form action = "{{ env("APP_URL") }}/shop_front/startPage/start" method = "post" enctype="">
        {{ csrf_field() }}
        <div class="guestInfo_title">
            <h2>顧客SEQを入力し、スタートしてください</h2>
        </div>
        <div class="input_start_box">
            <input class="form-control" type="number" name="ecc_id" placeholder="顧客SEQ">
            <input class="form-control btn btn-primary" type="submit" value="新規入力スタート">
        </div>
    </form>
</div>

{{--    <form action = "{{ env("APP_URL") }}/shop_front/startPage/check_token" method = "post" enctype="">--}}
{{--        {{ csrf_field() }}--}}
{{--        <div>ID入力欄： <input type="text" name="send"></div>--}}
{{--        <div>トークン入力欄： <input type="text" name="send"></div>--}}
{{--        <div><input type="submit" value="ID指定して続きから始める"></div>--}}
{{--    </form>--}}

@endsection

@section('body_last')
<style>
    .input_start_box {
        width: 300px;
        margin: auto;
    }
    .input_start_box .form-control{
        margin: 20px 0;
        font-size: 22px;
    }
</style>
@endsection







