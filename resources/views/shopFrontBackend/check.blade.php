@extends('layouts.app')
{{--@section('title')店頭査定@endsection--}}

{{--@section('description')--}}
{{--    リファスタの店頭入力ページです--}}
{{--@endsection--}}

{{--@section('content')--}}

<div class="header_shopFront">
    <nav>
        <ul>
            <li>キャンセル</li>
            <li>ID: 777</li>
            <li>やり直し</li>
        </ul>
    </nav>
</div>

    <div class="container">
        <div class="card">
            <div class="card-header">
                お客様の入力内容
            </div>
            <div class="card-body">
                以下、お客様の入力内容一覧
                <table class="table table-hover table-sm">
                    <tr>
                        <th>本人確認書類</th>
                        <td>{{$shop_front_detail->iddocment_category}}</td>
                    </tr>
                    <tr>
                        <th>過去に買取のご利用はあるか？</th>
                        <td>{{$shop_front_detail->is_first}}</td>
                    </tr>
                    <tr>
                        <th>姓</th>
                        <td>{{$shop_front_detail->lastname}}</td>
                    </tr>
                    <tr>
                        <th>名</th>
                        <td>{{$shop_front_detail->firstname}}</td>
                    </tr>
                    <tr>
                        <th>姓（フリガナ）</th>
                        <td>{{$shop_front_detail->furigana_lastname}}</td>
                    </tr>
                    <tr>
                        <th>名（フリガナ）</th>
                        <td>{{$shop_front_detail->furigana_firstname}}</td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td>{{$shop_front_detail->gender}}</td>
                    </tr>
                    <tr>
                        <th>生年月日</th>
                        <td>{{$shop_front_detail->birthday}}</td>
                    </tr>
                    <tr>
                        <th>都道府県</th>
                        <td>{{$shop_front_detail->prefecture}}</td>
                    </tr>
                    <tr>
                        <th>市区町村</th>
                        <td>{{$shop_front_detail->city}}</td>
                    </tr>
                    <tr>
                        <th>町名・番地</th>
                        <td>{{$shop_front_detail->town}}</td>
                    </tr>
                    <tr>
                        <th>建物種類</th>
                        <td>{{$shop_front_detail->building_types}}</td>
                    </tr>
                    <tr>
                        <th>お住まい</th>
                        <td>{{$shop_front_detail->dwelling_types}}</td>
                    </tr>
                    <tr>
                        <th>電話番号</th>
                        <td>{{$shop_front_detail->tel}}</td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td>{{$shop_front_detail->email}}</td>
                    </tr>
                    <tr>
                        <th>ご職業</th>
                        <td>{{$shop_front_detail->job_category}}</td>
                    </tr>
                    <tr>
                        <th>ご職業（ご自由にお書きください）</th>
                        <td>{{$shop_front_detail->job_category_freetext}}</td>
                    </tr>
                    <tr>
                        <th>キャンペーン</th>
                        <td>{{$shop_front_detail->campaign}}</td>
                    </tr>
                    <tr>
                        <th>取引結果</th>
                        <td>{{$shop_front_detail->taransaction_result}}</td>
                    </tr>
                    <tr>
                        <th>売買目的</th>
                        <td>{{$shop_front_detail->trading}}</td>
                    </tr>
                    <tr>
                        <th>サイン</th>
                        <td>{{$shop_front_detail->sign_img_path}}</td>
                    </tr>
                    <tr>
                        <th>本人確認書類画像</th>
                        <td>{{$shop_front_detail->iddocment_image_path}}</td>
                    </tr>
                    <tr>
                        <th>商品画像</th>
                        <td>{{$shop_front_detail->products_image_path}}</td>
                    </tr>


                </table>
            </div>

            <div class="card-footer">
                <div class="btn btn-primary">一覧に戻る</div>
            </div>

            <form action = "{{ env("APP_URL") }}/shop_front/send_mail" method = "post" enctype="">
                {{ csrf_field() }}
            <div class="card-footer">
                <div class="btn btn-primary">メール送信</div>
            </div>
            </form>

        </div>
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
{{--@endsection--}}

{{--@section('body_last')--}}
{{--    <script src='https://www.google.com/recaptcha/api.js'></script>--}}
{{--@endsection--}}