@extends('layouts.shop_front_image')
@section('title')店頭査定@endsection

@section('description')
    リファスタの店頭入力ページです
@endsection

@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div id="guestInfoRegistration">

    <div class="guestInfo_title">
        <h1>
            ご入力ありがとうございました。
        </h1>
        <h1>
            タブレットをスタッフへお渡しください。
        </h1>
    </div>

</div>

@endsection

@section('body_last')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection