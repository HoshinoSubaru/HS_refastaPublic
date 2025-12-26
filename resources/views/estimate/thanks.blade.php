@extends('layouts.app')
@section('title')【送信完了】総合オンラインお見積りフォーム | リファスタ(旧:リファウンデーション)@endsection

@section('description')
貴金属や宝石、ダイヤモンドから時計やブランド品などのお見積りフォームの送信完了画面です。
後程担当者よりご希望のご連絡方法にて詳細な内容をご連絡させて頂きます。今しばらくお待ち下さい。
@endsection
@section('head_last')
@include("estimate.thanks_style")
@endsection
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
<link rel="stylesheet" href="https://kinkaimasu.jp/wp_styles/diamond/estimate_thanks.css">

<div class="line_link">
    <!-- <blink class="line_link_text blink">LINEでの査定は<br>細かいやりとりができるので<br>オススメです！</blink> -->
    <marquee class="line_link_text" scrollamount="5" truespeed bgcolor="#1cb501">簡単・便利でスピーディ！！</marquee>
    <img src="https://kinkaimasu.jp/commonimg/estimate/floating_line_estimate.jpg">
</div>
<div class="line_link_sp" style="display: none;">
    <marquee class="line_link_text" scrollamount="5" truespeed bgcolor="#1cb501">簡単・便利でスピーディ！！</marquee>
    <div class="line_link_sp_img_wrap">
        <a href="https://lin.ee/F20kD4T">
            <img class="line_link_sp_img" src="https://kinkaimasu.jp/commonimg/estimate/floating_line_estimate_sp_01.webp">
        </a>
        <a href="https://lin.ee/Ya5d9z">
            <img class="line_link_sp_img" src="https://kinkaimasu.jp/commonimg/estimate/floating_line_estimate_sp_02.webp">
        </a>
    </div>
</div>

@section('content')
<div class="estimate_thanks_wrap">
  <div>

  </div>
</div>
<div class="entry-content">
  <div class="thanks_comment">
    <div class="thanks_comment_in">
      <h2>ご入力ありがとうございます。</h2>
      <div class="thanks_comment_text">
        <div>ご入力頂いたメールアドレスに<br class="sp_only">「rifa@urlounge.co.jp」より<br class="sp_only">確認メールをお送り致しております。<br>内容のご確認をお願いできますでしょうか。</div>
      </div>
    </div>
    <div class="thanks_content">
      <div class="line_method_outer">
        <div class="line_method_ttl">
          LINE査定のご案内
        </div>
        <div class="line_method_img">
          <a href="https://kinkaimasu.jp/line/"><img src="https://kinkaimasu.jp/commonimg/estimate/line_method.jpg"></a>
          <div class="line_method_wrap">
            <div class="line_method_text">
              事前査定やお問合せはもちろん、<br class="sp_only">実査定のご依頼から<br class="pc_only">ご成約に至るまで<br class="sp_only">LINEでのやり取りが可能でございます。
            </div>
            <div class="link_btn">
              <figure class=" size-large"><a href="http://line.me/ti/p/%40rifa"><img src="https://rifa.life/refasta_wordpress/wp-content/uploads/2020/10/btn_sp_line.png" alt="" class="wp-image-16137"></a></figure>
            </div>
            <div class="line_method_link_wrap">
              <a class="line_method_link" href="https://lin.ee/Ya5d9z">LINE査定ご利用はこちら</a>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="confirmation_table_ttl">
        ＜ご依頼内容＞
      </div> -->
      <div class="upload_confirmation_content_wrap">
        @if( str_replace("\n", "", $img_default_text) != str_replace(array("\r\n","\r","\n"), "", $upload_text_1))
          <div class="upload_confirmation_content">
              <div class="up_text_ttl">送信内容１</div>
              <div>{!! nl2br($upload_text_1) !!}</div>
          </div>
        @endif
        @if( str_replace("\n", "", $img_default_text) != str_replace(array("\r\n","\r","\n"), "", $upload_text_2))
          <div class="upload_confirmation_content">
              <div class="up_text_ttl">送信内容２</div>
              <div>{!! nl2br($upload_text_2) !!}</div>
          </div>
        @endif
        @if( str_replace("\n", "", $img_default_text) != str_replace(array("\r\n","\r","\n"), "", $upload_text_3))
          <div class="upload_confirmation_content">
              <div class="up_text_ttl">送信内容３</div>
              <div>{!! nl2br($upload_text_3) !!}</div>
          </div>
        @endif
        @if( str_replace("\n", "", $img_default_text) != str_replace(array("\r\n","\r","\n"), "", $upload_text_4))
          <div class="upload_confirmation_content">
              <div class="up_text_ttl">送信内容４</div>
              <div>{!! nl2br($upload_text_4) !!}</div>
          </div>
        @endif
        @if( str_replace("\n", "", $img_default_text) != str_replace(array("\r\n","\r","\n"), "", $upload_text_5))
          <div class="upload_confirmation_content">
              <div class="up_text_ttl">送信内容５</div>
              <div>{!! nl2br($upload_text_5) !!}</div>
          </div>
        @endif
        @if( str_replace("\n", "", $img_default_text) != str_replace(array("\r\n","\r","\n"), "", $upload_text_6))
          <div class="upload_confirmation_content">
              <div class="up_text_ttl">送信内容６</div>
              <div>{!! nl2br($upload_text_6) !!}</div>
          </div>
        @endif
        @if( str_replace("\n", "", $img_default_text) != str_replace(array("\r\n","\r","\n"), "", $upload_text_7))
          <div class="upload_confirmation_content">
              <div class="up_text_ttl">送信内容７</div>
              <div>{!! nl2br($upload_text_7) !!}</div>
          </div>
        @endif
        @if( str_replace("\n", "", $img_default_text) != str_replace(array("\r\n","\r","\n"), "", $upload_text_8))
          <div class="upload_confirmation_content">
              <div class="up_text_ttl">送信内容８</div>
              <div>{!! nl2br($upload_text_8) !!}</div>
          </div>
        @endif
        @if( str_replace("\n", "", $img_default_text) != str_replace(array("\r\n","\r","\n"), "", $upload_text_9))
          <div class="upload_confirmation_content">
              <div class="up_text_ttl">送信内容９</div>
              <div>{!! nl2br($upload_text_9) !!}</div>
          </div>
        @endif
        @if( str_replace("\n", "", $img_default_text) != str_replace(array("\r\n","\r","\n"), "", $upload_text_10))
          <div class="upload_confirmation_content" >
              <div class="up_text_ttl">送信内容１０</div>
              <div>{!! nl2br($upload_text_10) !!}</div>
          </div>
        @endif
        <div class="confirmation_table_wrap">
          <div class="up_text_ttl">お客様情報</div>
          <table class="confirmation_table">
            @if( $tel != "")
              <tr >
                <th>電話番号</th>
                <td>{{ $tel }}</td>
              </tr>
            @endif
            @if( $mail != "")
              <tr>
                <th>メールアドレス</th>
                <td>{{ $mail }}</td>
              </tr>
            @endif
            @if( $contact != "")
              <tr>
                <th>希望連絡方法</th>
                <td>{{ $contact }}</td>
              </tr>
            @endif
              
            <tr @if( $bikou == "") class="confirmation_table_tr_none" @endif>
              <th>備考</th>
              <td class="bikou_text">{!! nl2br($bikou )!!}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>

  </div>
  <div  class="thanks_content_area map_area">
    <div class="">
      <!-- <div class="logo_img_area">
        <img src="https://kinkaimasu.jp//commonimg/footer_new/logo.webp">
      </div> -->
      <div class="">
        <!-- <table class="add_table">
          <tr>
            <td>電話番号</td>
            <td>0120-954-679</td>
          </tr>
          <tr>
            <td>店舗情報・東京池袋</td>
            <td>〒170-0013<br>東京都豊島区 東池袋1丁目25−14 アルファビルディング4F</td>
          </tr>
          <tr>
            <td>店舗情報・大阪心斎橋</td>
            <td>〒542-0085<br>大阪府 大阪市 中央区心斎橋筋1丁目4-12 心斎橋日光ビル 2F</td>
          </tr>
          <tr>
            <td>営業時間</td>
            <td>10:00〜18:00</td>
          </tr>
          <tr>
            <td>メールアドレス</td>
            <td>rifa@urlounge.co.jp</td>
          </tr>
        </table> -->
        @php
          $Url = "https://rifa.life/refastaProject/get_wp_posts/35043?block_id=24679";
          //  Initiate curl session
          $handle = curl_init();
          // Set the url
          curl_setopt($handle, CURLOPT_URL,$Url);
          // Execute the session and store the contents in $result
          $result=curl_exec($handle);
          // Closing the session
          curl_close($handle);
        @endphp
      </div>
      <!-- <div class="map_area_btn_wrap">
        <div class="map_area_btn_in">
          <div class="map_area_btn">
            <a href="/accessmap/">店舗アクセスマップ</a>
          </div>
          <div class="map_area_text">
            池袋駅東口より徒歩7分。
          </div>
        </div>
        <div class="map_area_btn_in">
          <div class="map_area_btn">
            <a href="https://goo.gl/SWyBnW">Googleマップナビ</a>
          </div>
          <div class="map_area_text">
            店舗までの経路をご案内。
          </div>
        </div>
      </div> -->
    </div>
  </div>
  <!-- <div class="inquiry_area_wrap">
    <div class="inquiry_area">
        <h2>お気軽にお問い合わせください</h2>
      <div class="tel_area">
        <div class="number_area">
          <div class="number">
            <div>0120-954-679</div>
          </div>
        </div>
        <div class="number_text">
          <div>通話料無料（11:00〜20:00 年中無休）</div>
        </div>
      </div>
      <div class="link_btn_wrap">
        <div class="link_btn">
          <figure class=" size-large"><a href="http://line.me/ti/p/%40rifa"><img src="https://rifa.life/refasta_wordpress/wp-content/uploads/2020/10/btn_sp_line.png" alt="" class="wp-image-16137" srcset="https://rifa.life/refasta_wordpress/wp-content/uploads/2020/10/btn_sp_line.png 640w, https://rifa.life/refasta_wordpress/wp-content/uploads/2020/10/btn_sp_line-300x75.png" data-pagespeed-url-hash="1137009235" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a></figure>
        </div>
        <div class="link_btn">
          <figure class=" size-large"><a href="/estimate/"><img src="https://rifa.life/refasta_wordpress/wp-content/uploads/2020/10/btn_sp_mail.png" alt="" class="wp-image-16138" srcset="https://rifa.life/refasta_wordpress/wp-content/uploads/2020/10/btn_sp_mail.png 640w, https://rifa.life/refasta_wordpress/wp-content/uploads/2020/10/btn_sp_mail-300x75.png" data-pagespeed-url-hash="2799748750" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a></figure>
        </div>
      </div>
    </div>
  </div> -->
</div>


@if(env("APP_DEBUG") == false)
    @if(stristr($cv_site, "diakaimasu.jp"))
      @include("estimate.cv_diakai")
    @elseif(stristr($cv_site, "brandkaimasu.com"))
      @include("estimate.cv_brakai")
    @elseif(stristr($cv_site, "kinkaimasu.jp"))
      @include("estimate.cv_kinkai")
    @endif
@endif
@endsection


