@include("refining_info.style")
@extends('layouts.app')
@section('content')
    <div class="refining_thanks">
        <div class="refining_area">
            <h2>金地金精錬分割加工サービス申込完了致しました。</h2>
            <div class="thanks">
              <div class="thanks_ttl">お申込み頂き誠にありがとうございます。</div>
              ご入力情報の送信を完了致しました。<br /><br />
                ご入力頂いたメールアドレスに確認メールをお送り致しましたので、ご確認をお願い致します。<br /><br />
                後日担当部署よりご連絡致しますので、今暫くお待ち下さいませ。<br />
                この度は貴重なお時間を割いて頂き誠にありがとうございます。<br />
                厚く御礼申し上げます。<br />
                <br />
                <p>
                  送信完了後、すぐにご入力頂いたメールアドレスにお申込み確認メールが届きます。<br />
                  1～2分経っても届かない場合、ドメイン拒否或いは誤ったメールアドレスの入力の可能性もありますので、大変お手数ではございますが、0120-954-679（<span data='StartTime' style='display:none;'></span>11:00<span></span>～19:00）にお電話頂くか<a href="mailto:rifa@urlounge.co.jp">rifa@urlounge.co.jp</a> にご一報頂きます様宜しくお願い申し上げます。
                </p>
              <div class="thank_iframe_area">
                  <div class="thanks_ttl">「店頭タイプ」を選択されたお客様へ</div>
                  <div class="booking_text">下記からご希望日時を選択後、お名前とご連絡先、各項目をご入力ください。<strong>お電話でのご予約</strong>も勿論、受け賜っておりますのでお気軽にご依頼くださいませ。</div>
                  <iframe src="https://reservation-refasta.youcanbook.me/?noframe=true&amp;skipHeaderFooter=true" 
                      id="ycbmiframereservation-refasta" style="margin: auto; display: block; max-width: 600px; width: 100%; border: 0px; background-color: transparent; box-shadow: rgba(0, 0, 0, 0.2) 0px 10px 25px 0px; height: 350px;" frameborder="0" allowtransparency="true">
                  </iframe>
              </div>
              <div id="thanks_under">
                <a href="mailto:rifa@urlounge.co.jp" ><img src="https://kinkaimasu.jp/new/img/refining/info/thanks_device_btn.png" alt="メールにてご連絡"></a>
              </div>
          </div>
        </div>
    </div>
<!--A8-->

<span id="a8sales"></span>
<script src="//statics.a8.net/a8sales/a8sales.js"></script>
<script>
a8sales({
  "pid": "s00000011821005",//テストID　変更不可、テストツールで確認後に変更となります
  "order_number": "{!! $angouka_mailaddress !!}",//注文番号・現行タグの&so=の値を反映してください
  "currency": "JPY",//省略可
  "items": [　//以下、現行タグの&si=の値を反映してください
  {
    "code": "a8",
    "price": 5000,
    "quantity": 1
  },
],
"total_price": 5000,
});
</script>
<!--A8-->
@endsection

