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
            本人確認書類の画像をアップロードします。
        </h1>
    </div>

    <br>

    <form action = "{{ env("APP_URL") }}/shop_front/iddocment_image_upload?shop_front_id={{ $shop_front_id }}" method = "post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div><input type="file" name ="file1" accept="image/*" capture="environment" ></div>
        <div><input type="submit" class="btn btn-primary" value="送信"></div>
    </form>

</div>

@endsection

@section('body_last')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection