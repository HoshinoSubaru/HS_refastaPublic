@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="row justify-content-center align-items-center">
    <div class="col col-md-10 p-0">
      <div class = "row justify-content-center align-items-center">
        <a class="btn btn-primary" href="/delivery" role="button">宅配買取お申し込みフォーム</a>
      </div>
      <div class="row justify-content-center align-items-center">
        <div class="col-md-6 col-sm-10 row">
          <a href="/info/" class="btn btn-info btn-estimate">
            <small>24時間受付中</small><br>
            お問い合わせフォーム
          </a>
        </div>
        <div class="col-md-6 col-sm-10 row">
          <a href="/line/" class="btn btn-info btn-line">
            <small>@rifaで検索　11:00-20:00</small><br>
            @LINE
          </a>
        </div>
      </div>
      <div class="card line_satei_card">
        <div class="card-header bg-primary text-white">
          事前にLINE査定をご利用されたお客様へ
        </div>
        <div class="card-body">
          <div class="text-center">
            お申し込み後、「お名前・メールアドレス」を投稿するだけで
            LINE査定情報の引継ぎ、ご本人様確認が完了します。
            そのため、お取引完了までのやり取りもLINE上でスマートに完結可能。

            <iframe
              style="width: 100%; display: block; margin: 0 auto 10px;"
              width="580"
              height="326"
              src="https://www.youtube.com/embed/k1QfD2FrRIE?rel=0"
              frameborder="0"
              allow="autoplay; encrypted-media"
              allowfullscreen=""
            >
            </iframe>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="text-center card-body">
          <img src="{{ env('IMG_FOLDER') }}/thanks/comment_img_01.jpg" alt="">
          <img src="{{ env('IMG_FOLDER') }}/thanks/goods.jpg" alt="">
          <img src="{{ env('IMG_FOLDER') }}/thanks/comment_img_02.jpg" alt="">
          <div>
            ジュエリーからブランド品までさまざまなお品物をお買取しております。<br>
            お品物のジャンルが異なっていても各専門サイトからお申込みいただく必要はございません。<br>
            どのサイトからのお申込みでも「宝飾品・服飾品」を混同してお送り頂けます。
          </div>
          <img src="{{ env('IMG_FOLDER') }}/thanks/comment_img_03.jpg" alt="">
          <div>
            各専門サイトでは豊富な買取実績や取扱品目、取扱ブランド、<br>
            買取キャンペーンなどをご紹介しております。ぜひ一度ご覧くださいませ。
          </div>
          <div class="row">
            <a class="col-4" href="https://kinkaimasu.jp/" target="_blank">
              <img src="{{ env('IMG_FOLDER') }}/thanks/page_link_01.jpg" alt="">
            </a>
            <a class="col-4" href="https://brandkaimasu.com/" target="_blank">
              <img src="{{ env('IMG_FOLDER') }}/thanks/page_link_02.jpg" alt="">
            </a>
            <a class="col-4" href="https://diakaimasu.jp/" target="_blank">
              <img src="{{ env('IMG_FOLDER') }}/thanks/page_link_03.jpg" alt="">
            </a>

            <a class="col-12" href="/campaign/" target="_blank">
              <img src="{{ env('IMG_FOLDER') }}/thanks/campaign_link.jpg" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('body_last')
@include("mailingkit.style")
@endsection
