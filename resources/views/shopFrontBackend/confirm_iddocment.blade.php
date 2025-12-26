<body>
<div class="header_shopFront">
    <nav>
        <ul>
            {{-- <li>キャンセル</li> --}}
            <li>ID: 777</li>
            {{-- <li>やり直し</li> --}}
            {{-- <a href="http://localhost/refasta_public/shop_front/iddocment_image_upload?shop_front_id={{ $shop_front_id }}">本人確認書類撮影画面</a>
            <a href="http://localhost/refasta_public/shop_front/confirm_iddocment_image?shop_front_id={{ $shop_front_id }}">本人確認書類確認画面</a>
            <a href="http://localhost/refasta_public/shop_front/products_image_upload?shop_front_id={{ $shop_front_id }}">商品画像撮影画面</a>
            <a href="http://localhost/refasta_public/shop_front/confirm_image?shop_front_id={{ $shop_front_id }}">商品画像確認画面</a> --}}
        </ul>
    </nav>
</div>
<div id="guestInfoRegistration">
    <div class="guestInfo_title">
        <h1>
            画像はこちらでお間違い無いですか？
        </h1>
    </div>

{{--        画像表示の処理--}}
    @foreach($products_image_path_array as $path)
        <img src="{{$path}}">
    @endforeach

    <br>

    <div class="radioWrap">
        <form action = "{{ env("APP_URL") }}/shop_front/confirm_image_yes?shop_front_id={{ $shop_front_id }}" method = "post" enctype="multipart/form-data">            
            {{ csrf_field() }}
            <label class="few_radio guestInfo_checked">
            <input type="submit" value="">
            <input type="hidden" name="shop_front_id" value="{{ $shop_front_id }} ">
                はい
        </label>
        </form>
    </div>

    <ul class="footerMenu">
        <li class="footerMenu_left">
        </li>
    </ul>
</div>

<style>
    .header_shopFront{
        padding-top: 30px;
        font-size: 16px;
        background: rgb(50, 191, 236);
    }

    .header_shopFront nav ul {
        display: flex;
        justify-content: space-around;
        color: rgb(255, 255, 255);
        padding: 20px 0px;
        margin: 0px auto;
    }

    .header_shopFront nav ul li {
        list-style: none;
    }

    .guestInfo_title {
        font-size: 18px;
        margin: 0px auto 30px;
        width: -moz-fit-content;
        width: fit-content;
    }

    .radioWrap label input {
        display: none;
    }

    .radioWrap label.few_radio {
        width: 60%;
        padding: 35px 0px;
        margin: 20px auto;
    }

    .radioWrap label {
        display: block;
        cursor: pointer;
        filter: drop-shadow(rgba(0, 0, 0, 0.3) 0px 0px 3px);
        text-align: center;
        border-width: 1px;
        border-style: solid;
        border-color: rgb(137, 137, 137);
        border-image: initial;
        border-radius: 10px;
    }

    .guestInfo_checked {
        background: rgb(50, 191, 236);
    }

    .radioWrap {
        width: 80%;
        margin: 0px auto;
    }

    .footerMenu li {
        list-style: none;
    }

    ul.footerMenu {
        border-top: solid 1px #cacaca;
        display: flex;
        width: 100%;
        margin: 0 auto;
        padding: 20px 0;
        justify-content: center;
    }

    button {
        border: none;
        background: none;
    }

    input {
        border: none;
        background: none;
    }

    button, input, select, textarea {
        font-size: 100%;
        margin: 0;
    }

    body {
        margin: 0;
        padding: 0;
        font-size: 1em;
        line-height: 1.4;
    }

</style>