@extends('layouts.app')
@section('title')宅配買取お申し込みフォーム@endsection

@section('description')
宅配で金・地金・ダイヤや宝石・ブランド買取をお申込みされる方への無料宅配買取申込みフォームです。梱包材も無料でお使いいただけます。
業界初！最短翌日に査定結果とお振込可能！梱包材をお送りした場合でもお品物ご到着当日の査定結果とお振り込みが可能ですので是非ご利用ください。
@endsection

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center align-items-center">
    <div class="col col-md-10 p-0">
      <div class="text-center">
        <div class="alert alert-success">
          <div class="row justify-content-center align-items-center">
            <img src="https://kinkaimasu.jp/commonimg/delivery/thanks_icon_01.png" alt="" style="width: 30px;">
            <strong>ご入力情報の送信が完了いたしました。</strong>
          </div>
          宅配買取りサービスをお申し込み頂きありがとうございます。<br>
          ご入力頂いたメールアドレスに確認メールをお送りいたしましたのでご確認をお願いします。
        </div>
      </div>

      @if($_POST["need_kit"] == "希望しない")
      <div class="alert alert-warning">
        <div class="text-center">
      		<a href="https://kinkaimasu.jp/choice/kaitori.pdf" target="_bank">
      			<img src="https://kinkaimasu.jp/new/img/mailingkit/pc_1612/choice_card_btn_200.png" alt="買取カード印刷" >
      		</a>
        </div>
    		買取カードは、お客様情報や金融機関情報、お品物情報などを<br>
    		記載いただいている任意書類ですので、必ずご用意いただく必要はございません。<br>
    		<br>
    		印刷環境がない場合は、<strond>※ご成約の場合のみ</strond>、ご身分証のお写真（両面）と、<br>
    		振込先の金融機関情報をLINEまたはメールにてお送りください。
      </div>
      @endif

      <div class="card thanks_detail">
        <div class="card-header bg-primary text-white">
          ご入力内容
        </div>
        <div class="card-body">
          @if(isset($_SERVER['HTTP_X_FORWARDED_HOST']))
            @if(stristr($_SERVER['HTTP_X_FORWARDED_HOST'], "brandkaimasu.com"))
            <div class="row">
              <div class="col-sm-4">
                買取不可ブランド
              </div>
              <div class="col-sm-8">
                @if($_POST["brand_confirm"])
                  同意する
                @else
                  同意しない
                @endif
              </div>
            </div>
            @endif
          @endif
          <div class="row">
            <div class="col-sm-4">
              ご利用回数
            </div>
            <div class="col-sm-8">
              {{ $_POST["number_of_times"] }}
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              梱包キット
            </div>
            <div class="col-sm-8">
              {{ $_POST["need_kit"] }}
            </div>
          </div>

          @if($_POST["need_kit"] == "希望しない")
            <div class="row">
              <div class="col-sm-4">
                発送予定箱数
              </div>
              <div class="col-sm-8">
                {{ $_POST["speed_box"] }}個
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                集荷希望日時
              </div>
              <div class="col-sm-8">
                {{ $_POST["date_and_time_hidden"] }}
              </div>
            </div>
          @else
            <div class="row">
              <div class="col-sm-4">
                梱包キットの詳細
              </div>
              <div class="col-sm-8">
                ダンボールS：{{ $_POST["kit_count_s"] }}個<br>
                ダンボールM：{{ $_POST["kit_count_m"] }}個<br>
                ダンボールL：{{ $_POST["kit_count_l"] }}個<br>
                クッション封筒：{{ $_POST["kit_count_k"] }}個
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                配送日時指定
              </div>
              <div class="col-sm-8">
                {{ $_POST["time_select_none"] }}
              </div>
            </div>
            @if($_POST["time_select_none"] == "指定する")
              <div class="row">
                <div class="col-sm-4">
                  配送希望日時
                </div>
                <div class="col-sm-8">
                  {{ $_POST["time_select_hidden"] }}
                </div>
              </div>
            @endif
            <div class="row">
              <div class="col-sm-4">
                配送補償
              </div>
              <div class="col-sm-8">
                @if($_POST["insurance"] == "あり")
                  30万円以上(日時指定無効)
                @else
                  30万円未満
                @endif
              </div>
            </div>
            @if($_POST["insurance"] == "あり")
              <div class="row">
                <div class="col-sm-4">
                  配送補償対象金額
                </div>
                <div class="col-sm-8">
                  {{ $_POST["insurance_kingaku"] }}
                </div>
              </div>
            @endif
          @endif

          <div class="row">
            <div class="col-sm-4">
              お名前
            </div>
            <div class="col-sm-8">
              {{ $_POST["user_name"] }}
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              フリガナ
            </div>
            <div class="col-sm-8">
              {{ $_POST["user_name_kana"] }}
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              電話番号
            </div>
            <div class="col-sm-8">
              {{ $_POST["user_tel"] }}
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              メールアドレス
            </div>
            <div class="col-sm-8">
              {{ $_POST["user_mail"] }}
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              郵便番号
            </div>
            <div class="col-sm-8">
              {{ $_POST["user_yuubinn"] }}
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              都道府県
            </div>
            <div class="col-sm-8">
              {{ $_POST["user_todou"] }}
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              市区郡
            </div>
            <div class="col-sm-8">
              {{ $_POST["user_sikutyouson"] }}
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              町村名・番地
            </div>
            <div class="col-sm-8">
              {{ $_POST["user_banti"] }}
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              建物名
            </div>
            <div class="col-sm-8">
              {{ $_POST["user_building"] }}
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              希望連絡方法
            </div>
            <div class="col-sm-8">
              {{ $_POST["tel_mail_line"] }}
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              事前査定
            </div>
            <div class="col-sm-8">
              {{ $_POST["line_satei"] }}
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              備考欄
            </div>
            <div class="col-sm-8">
              {{ $_POST["bikou"] }}
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              利用規約・プライバシーポリシー
            </div>
            <div class="col-sm-8">
              @if($_POST["kiyaku_check"])
                同意する。
              @else
                同意しない。
              @endif
            </div>
          </div>
        </div>
      </div>

      <div class="alert alert-warning">
        入力情報の誤りやお問い合わせは下記よりご連絡ください。<br>
        <strong>
          ※身分証記載の住所と現住所の相違、確認メールが届かない
        </strong>など。
      </div>

      @if($_POST["need_kit"] == "希望しない")
      <div class="alert alert-info">
    		弊社にて集荷手続き完了後、メールにてご案内をさせていただきます。<br>
    		確認メールが未着の方は、ご案内のメールも未着の可能性がございます。
      </div>
      @endif

      <div class="row justify-content-center align-items-center">
        <div class="col-md-6 col-sm-10 row">
          <a href="/info/" class="btn btn-info btn-estimate">
            <small>24時間受付中</small><br>
            お問い合わせフォーム
          </a>
        </div>
        <div class="col-md-6 col-sm-10 row">
          <a href="/info/" class="btn btn-info btn-line">
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
          <img src="https://kinkaimasu.jp/commonimg/delivery/thanks/comment_img_01.jpg" alt="">
          <img src="https://kinkaimasu.jp/commonimg/delivery/thanks/goods.jpg" alt="">
          <img src="https://kinkaimasu.jp/commonimg/delivery/thanks/comment_img_02.jpg" alt="">
          <div>
            ジュエリーからブランド品までさまざまなお品物をお買取しております。<br>
            お品物のジャンルが異なっていても各専門サイトからお申込みいただく必要はございません。<br>
            どのサイトからのお申込みでも「宝飾品・服飾品」を混同してお送り頂けます。
          </div>
          <img src="https://kinkaimasu.jp/commonimg/delivery/thanks/comment_img_03.jpg" alt="">
          <div>
            各専門サイトでは豊富な買取実績や取扱品目、取扱ブランド、<br>
            買取キャンペーンなどをご紹介しております。ぜひ一度ご覧くださいませ。
          </div>

          <div class="row">
            <a class="col-4" href="https://kinkaimasu.jp/" target="_blank">
              <img src="https://kinkaimasu.jp/commonimg/delivery/thanks/page_link_01.jpg" alt="">
            </a>
            <a class="col-4" href="https://brandkaimasu.com/" target="_blank">
              <img src="https://kinkaimasu.jp/commonimg/delivery/thanks/page_link_02.jpg" alt="">
            </a>
            <a class="col-4" href="https://diakaimasu.jp/" target="_blank">
              <img src="https://kinkaimasu.jp/commonimg/delivery/thanks/page_link_03.jpg" alt="">
            </a>

            <a class="col-12" href="/campaign/" target="_blank">
              <img src="https://kinkaimasu.jp/commonimg/delivery/thanks/campaign_link.jpg" alt="">
            </a>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "VideoObject",
    "name": "LINE査定後に宅配買取をお申込み～査定情報の引継ぎ方法～",
    "description": "お申し込み後、「お名前・メールアドレス」を投稿するだけでLINE査定情報の引継ぎ、ご本人様確認が完了します。そのため、お取引完了までのやり取りもLINE上でスマートに完結。",
    "thumbnailUrl": "https://kinkaimasu.jp/line/movie/thumbnai_lime_assessment_takeover.jpg",
    "uploadDate": "2018-10-24",
    "duration": "PT0M35S",
    "contentUrl": "https://youtu.be/k1QfD2FrRIE",
    "embedUrl": "https://www.youtube.com/embed/k1QfD2FrRIE"
  }
</script>
@endsection
@section('body_last')
@include("mailingkit.style")
  @if(env("APP_DEBUG") == false)
    @include("mailingkit.cv_all")
  @endif
@endsection
