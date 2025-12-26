@extends('layouts.app')
@section('title')お問い合わせフォーム@endsection

@section('description')
リファスタのお問い合わせフォームです。匿名性も高い為に買取サービスを行う前にお気軽にお問い合わせ頂ければと思います。買取サービスの内容から細かい規約等もお気軽にお問い合わせください。※査定結果の返信等は直接査定結果のご連絡にご返信をお願いいたします。お見積もりは別途お見積りフォームもご用意しております。
@endsection

@section('content')
<div class="form_head">
  <h1>【送信完了】お問い合わせフォーム</h1>
  <p class="content_comment">
    お世話になります。このお問い合わせフォームでは、<br>
    買取サービス全般や、その他何にでもお応え致します。<br>
    何時でも、何処ででも、お気軽にお問い合わせください。
  </p>
</div>

<div class="container-fluid">
      <div class="text-center info_thanks_txt">
          お問い合わせありがとうございます。<br>
          内容の送信が完了いたしました。<br>
          担当者のご連絡まで今しばらくお待ちくださいませ。
      </div>
</div>
@endsection


@section('body_last')
<style>
  /* **********************Thanks page************************* */
/* ********************************************************************* */

  /* --------------------PC SP 共通パート---------------------- */
.form_head {
    position: relative;
    display: flex;
    align-content: center;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-size: contain;
    background-repeat: no-repeat;
}
.form_head h1{
    color: #fff;
    text-align: center;
    -webkit-margin-before: 0em;
    -webkit-margin-after: 0em;
    padding: 40px 0px 0px;
    display: block;
    margin: 0 auto;
    border-bottom: 4px solid red;}


.form_head .content_comment {
    line-height: 1.55rem;
    color: #fff;
    text-align: center;
}

  /* ------------------form------------------------- */
 form {
  background-color: #fff;
  box-shadow: 0 1px 1px rgb(0 0 0 / 20%);
}

.info_thanks_txt{
  margin: 45px 0;
}

#copyright{
  text-align: center;
}
/* **********************PC　only*************** */
@media screen and (min-width: 900px) {
  .sp_only{
    display: none
  }

  .form_head {
      background: url(https://kinkaimasu.jp/new/img/info/pc/h1/bg.png);
      position: relative;
      display: flex;
      align-content: center;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background-position:  center;
      background-size: cover;
      background-repeat: no-repeat;
  }
  .form_head h1{
      font-size: 2.2rem;
      line-height: 3.55rem;
      color: #fff;
      text-align: center;
      -webkit-margin-before: 0em;
      -webkit-margin-after: 0em;
      padding:  40px 0px 0px;
      margin: 0px 0 15px 0;
      width: 980px;
      display: block;
      margin: 0 auto;
      border-bottom: 4px solid red;
      width: 40%
  }

  .form_head .content_comment {
      font-size: 0.85rem;
      line-height: 1.55rem;
      color: #fff;
      text-align: center;
      margin:20px 0;
  }
}

/* *****************SP only******************** */
@media screen and (max-width: 900px) {
  .pc_only{
    display: none;
  }
  body {
    background: white;
  }
  img{width: 100%}

  .form_head {
    background: url(https://kinkaimasu.jp/new/img/info/sp/h1/bg.jpg);
    background-size: cover;
    background-position: 50%;
  }
  .form_head h1{
      font-size: 32px;
  }

  .form_head .content_comment {
    margin-top: 10px;
      font-size: 14px;
      line-height: 1.55rem;
      color: #fff;
  }
  .main_column {
    width: 100%;
  }
}
</style>
@if (env('APP_DEBUG') == false)
  @if ((strpos($http_user_agent, 'iPhone') !== false) || ((strpos($http_user_agent, 'Android') !== false) && (strpos($http_user_agent, 'Mobile') !== false))
  || (strpos($http_user_agent, 'Windows Phone') !== false)
  || (strpos($http_user_agent, 'BlackBerry') !== false) || (strpos($http_user_agent, 'BB10') !== false) || (strpos($http_user_agent, 'Passport') !== false))
  @php($ua_data = "sp")
  @else
  @php($ua_data ="pc")
  @endif

  @if(stristr($HTTP_X_FORWARDED_HOST, "diakaimasu.jp"))
      @if($ua_data == "pc")
          @include("info.cv.pc.diakai_cv")
      @else
          @include("info.cv.sp.diakai_cv")
      @endif
  @elseif(stristr($HTTP_X_FORWARDED_HOST, "brandkaimasu.com"))
      @if($ua_data == "pc")
        @include("info.cv.pc.brakai_cv")
      @else
        @include("info.cv.sp.brakai_cv")
      @endif
  @elseif(stristr($HTTP_X_FORWARDED_HOST, "kinkaimasu.jp"))
      @if($ua_data == "pc")
        @include("info.cv.pc.kinkai_cv")
      @else
        @include("info.cv.sp.kinkai_cv")
      @endif
  @endif
@endif

@endsection
