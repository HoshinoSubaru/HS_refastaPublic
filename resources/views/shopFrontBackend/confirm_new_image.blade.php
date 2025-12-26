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
                画像はこちらでお間違い無いですか？
            </h1>
        </div>

        {{-- 本人確認書類の表示 --}}
        <h3>本人確認書類のお写真</h3>
        <div class="iddocmentImage">
        @foreach($iddocment_image_path_array as $path)
            <img src="{{$path}}">
        @endforeach
        </div>
        
        <br>

        {{-- 商品画像の表示 --}}
        <h3>お品物のお写真</h3>
        <div class="productsImage">
            @foreach($products_image_path_array as $path)
            <img src="{{$path}}">
        @endforeach
        </div>

        <br>
        
        <ul class="footerMenu">
            <li class="footerMenu_left">
            </li>
            {{-- 「はい」ボタン --}}
            <li class="footerMenu_center">
                <form action = "{{ env("APP_URL") }}/shop_front/confirm_new_image?shop_front_id={{ $shop_front_id }}" method = "post" enctype="multipart/form-data">  
                {{ csrf_field() }}          
                    <input type="submit" value="はい">
                    <input type="hidden" name="shop_front_id" value="{{ $shop_front_id }} "> 
                </form>
            </li>
        </ul>

    </div>

<style>
    .iddocmentImage{
        border: 1px solid #ccc;
        padding: 5px;
        width: max-content;
        margin:auto
    }

    .productsImage{
        border: 1px solid #ccc;
        padding: 5px;
        width: max-content;
        margin:auto
    }


    .footerMenu {
        border-top: solid 1px #cacaca;
        display: flex;
        width: 100%;
        margin: 0 auto;
        padding: 20px 0;
    }

    ul {
        display: block;
        list-style-type: disc;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        padding-inline-start: 40px;
    }

    .footerMenu_center input {
        background-image: linear-gradient(180deg, rgb(124, 223, 255), rgb(29, 131, 164));
        color: #ffffff;
        padding: 10px 80px;
        border-radius: 10px;
    }

    input {
        border: none;
        background: none;
    }
</style>
    
@endsection

@section('body_last')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection