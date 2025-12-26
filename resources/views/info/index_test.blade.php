@extends('layouts.app')
@section('title')お問い合わせフォーム@endsection

@section('description')
リファスタのお問い合わせフォームです。匿名性も高い為に買取サービスを行う前にお気軽にお問い合わせ頂ければと思います。買取サービスの内容から細かい規約等もお気軽にお問い合わせください。※査定結果の返信等は直接査定結果のご連絡にご返信をお願いいたします。お見積もりは別途お見積りフォームもご用意しております。
@endsection

@include('info.style')
@section('content')
  <div class="form_head">
    <h1>お問い合わせフォーム</h1>
    <p class="content_comment">
      お世話になります。このお問い合わせフォームでは、<br>
      買取サービス全般や、その他何にでもお応え致します。<br>
      何時でも、何処ででも、お気軽にお問い合わせください。
    </p>
  </div>
  <div class="h1_bottom">
  <div class="main_column">
    <span class='pc_only'>営業時間内はチャットやLINEにてお問い合わせください。リアルタイムのやり取りも可能となります。<br>
		とはいえ混雑のため多少お待たせする場合も有るため、お時間に少々余裕のある方であれば<br>
		このフォームでお好きな内容を自由にお書き頂き、担当者からの返信をお待ちください。</span>
    <span class='sp_only'>営業時間内はリアルタイムのやり取りも可能なチャットやLINEがおすすめです。とはいえ、混雑により多少お待たせする場合も有るため、お時間に少々余裕のある方であればこのフォームでお好きな内容を自由にお書き頂き、担当者からの返信をお待ちください。</span>
  </div>
  </div>

  <div class="main_column">
      <form class="form" action="{{ env('REQ_INFO_DIR') }}_test/thanks" method="post" enctype="multipart/form-data">
      {{-- <form class="form" action="https://rifa.life/refasta_public/info/thanks" method="post" enctype="multipart/form-data"> --}}
        {!! csrf_field() !!}
        <table summary="お問い合わせフォーム" id="form_area">
          <tbody>

            <tr>
              <th class="star">メールアドレス</th>
              <td>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <span class="js_error_mail error_msgs"></span>
                @if ($errors->has('mail'))
                <span
                  role="status"
                  aria-live="polite"
                  class="ui-helper-hidden-accessible alert alert-danger"
                >
                  {{ $errors->first('mail') }}
                </span>
                @endif
                <input
                  type="text"
                  name="mail"
                  id="mail"
                  {{-- エラーでこのページに戻される時に、受け取った値を表示 --}}
                  value="{{ old('mail') }}"
                  placeholder="例)rifa@urlounge.co.jp(半角英数字)"
                  class="ui-autocomplete-input"
                  autocomplete="off"
                />
              </td>
            </tr>
            <tr>
              <th>お問い合わせ事例</th>
              <td>
                選択した内容をテンプレートとしてご利用頂けます。<br />
                <select name="exsample" id="exsample" onchange="ex_copy()">
                  <option value="">---ご選択下さい---</option>
                  @foreach ($MstToiawase as $item)
                      <option value="{{ $item->id }}">{{ $item->subject }}</option>
                  @endforeach
                </select>
              </td>
            </tr>
            <tr>
              <th class="star">お問い合わせ内容</th>
              <td>
                <span class="js_error_text error_msgs"></span>
                @if ($errors->has('text'))
                <span class="alert alert-danger">
                  {{ $errors->first('text') }}
                </span>
                @endif
                <textarea
                  placeholder="文字数やお問合せ内容に制限はありません。
ご自由にお書きください。
営業時間内になるべく早くご連絡をさせて頂きます。"
                  name="text"
                  id="text"
                  rows="1"
                  cols="1"
                >{{ old('text') }}</textarea>
              </td>
            </tr>
            <tr>
              <th>画像添付</th>
              <td>
                {{-- 該当するファイルがエラーの場合、エラーメッセージ表示 --}}

              @if ($errors->has('file_type'))
                <span class="alert alert-danger">
                  {{ $errors->first('file_type') }}
                </span>
              @endif
              @if ($errors->has('up_img1'))
                <li class="alert alert-danger">
                  {{ $errors->first('up_img1') }}
                </li>
              @endif
              <input type="file" name="up_img1" id="up_img1" value="1" />

              @if ($errors->has('up_img2'))
                <li class="alert alert-danger">
                  {{ $errors->first('up_img2') }}
                </li>
              @endif
              <input type="file" name="up_img2" id="up_img2" value="2" />

              @if ($errors->has('up_img3'))
                <li class="alert alert-danger">
                  {{ $errors->first('up_img3') }}
                </li>
              @endif
              <input type="file" name="up_img3" id="up_img3" value="3" />

              @if ($errors->has('up_img4'))
                <li class="alert alert-danger">
                  {{ $errors->first('up_img4') }}
                </li>
              @endif
              <input type="file" name="up_img4" id="up_img4" value="4" />

              @if ($errors->has('up_img5'))
                <li class="alert alert-danger">
                  {{ $errors->first('up_img5') }}
                </li>
              @endif
              <input type="file" name="up_img5" id="up_img5" value="5" />
              </td>
            </tr>
          </tbody>
        </table>
        <div id="kiyaku_area" class="star">
          利用規約とプライバシーポリシー(個人情報取扱い通知事項)に同意の上、「送信する」をクリックしてください。
          <div class="kiyaku_ttl">ご利用規約</div>
          {!! $kiyaku_html !!}
        </div>
        <div id="policy_area">
          <div class="kiyaku_ttl">
            プライバシーポリシー(個人情報取扱い通知事項)
          </div>
          <div id="policy_text_area">
            {!! $pp_html !!}
          </div>
        </div>
        <div id="kiyaku_check_area" class="star">
          <span class="js_error_kiyaku_check error_msgs"></span>
          @if ($errors->has('kiyaku_check'))
            <span class="alert alert-danger">
                  {{ $errors->first('kiyaku_check') }}
            </span>
          @endif
          <input
            type="checkbox"
            name="kiyaku_check"
            id="kiyaku_check"
            value="同意する"
          /><label for="kiyaku_check"
            >　利用規約・プライバシーポリシーに同意する。</label
          >
        </div>
        <div id="etc">
          <div>
            <img
              src="https://kinkaimasu.jp/img/mailingkit/attention.gif"
              alt="【送信する前にご確認ください】"
            /><br />
            ■フリーメールや携帯会社のキャリアメールは特にメールの不着が多く、弊社ドメインの「urlounge.co.jp」を指定受信して頂く必要がある場合があります。但し昨今のメールフィルタにて幾ら設定をしても受信できない場合も多く報告されています。<br />
            <br />
            ■その場合、インターネット回線の契約をしているプロバイダが提供しているアドレスに変更して頂くか、スマートフォンの場合には外部アプリであるLINEを推奨しております。
            <br />
            ■海外在住のお客様は、お手数ですが「チャット」または「LINE」にてお問い合わせくださいませ。
          </div>
        </div>
        <div class="g-recaptcha" data-callback="onSubmit" data-sitekey="{{ env("GOOGLE_RECAPTHA_SITEKEY") }}" ></div>
        <div class="thWide sendbox submit disabled" id='button' >
            お問合せ内容を送信する
        </div>
      </form>
    </div>

    <div id="about_info">
      <div id="thought">
        <h2 class="content_ttl">
          リファスタのお問い合わせ対応について思うこと
        </h2>
        <div class="main_column">
          <img src="https://kinkaimasu.jp/new/img/info/pc/support.png" id="about_img" />
          <div class="about_text">
            わたしたちのオペレートは、外注ではないインハウススタイルです。<br />
            <br />
            ですので査定人や受注担当、WEBデザインを担当するスタッフなどが、様々なシーン・シチュエーション・ケースで出来るだけ迅速に、適宜対応しております。<br />
            <br />
            また弊社ビジョンの一つである<span class="bold"
              >『顧客に寄り添う』</span
            >をモットーに、通り一辺倒な対応はせず、あくまでユーザーファースト。<br />
            <br />
            お客様は年齢・性別・生まれ育った環境・問合せに至る経緯まで全て違います。<br />
            <br />
            わたしたちは、あらゆる角度の問合せの真意を的確に捉え、ロボットやAI（人工知能）には出来ない『想いを伝える』ことを念頭に、少しくらい人間クサくても良いから、<span
              class="bold"
              >『お客様の記憶に残る様なカスタマーフォロー』</span
            >をすることに努めています。
          </div>
        </div>
        <!-- end main_column -->
      </div>
      <!-- end thought -->

      <div id="property">
        <div class="main_column">
          <h2 class="content_ttl">お客様との対応で得られること</h2>
          <img src="https://kinkaimasu.jp/new/img/info/pc/HRT.png" id="hrt_img" />
          <div class="about_text">
            わたしたちも、たくさんのお客様と接することが出来るのは非常に有意義なのと同時に、正直に言ってしまえば実は非常に怖い思いというのも有ります。<br />
            <br />
            人智を超えた（すみません）角度からの問合せや、自分たちの仕事を根底から覆すご意見を戴くことだってあるからです。<br />
            <br />
            人間関係とは、社内外・友人や家族間でも、あと一歩踏み込めるか踏み込めないかで、その先の付き合いや感じ方などがまるで変わってくるものです。<br />
            <br />
            でもそれはお客様も同じだと思っています。
          </div>
        </div>
        <!-- end main_column -->
      </div>

      <div id="property_2">
        <div class="main_column">
          <img src="https://kinkaimasu.jp/new/img/info/pc/boring.jpg" />
          <div class="about_text">
            リファスタのサイトを見て、<br />
            <br />
            <span class="bold">（「これってなんだろう。。。」）</span><br />
            <span class="bold"
              >（「・・・をしても大丈夫なのかな。不安だな。」）</span
            ><br />
            <br />
            こういった疑問が出た際に、通常はスマートフォンを閉じる・ブラウザバックで違うサイトに移動。。。<br />
            <br />
            そんな中でもお客様が、サイトに落ちているバナーからお電話やメールをする事は、非常に勇気がいることと思っています。<br />
            <br />
            だからわたしたちも一生懸命お応えする義務がある。
          </div>
        </div>
        <!-- end main_column -->
      </div>

      <div id="info_end">
        <div class="info_end_bg">
          <div class="main_column">
            <div class="about_text">
              お客様の問合せは、<br class='sp_only'>サービスのヒントになる<span
                class="bold red"
                style="font-size: 24px"
                >財産</span
              >なんです。<br />
              <br />
              買取サービスは金銭のやり取りが伴います。<br />
              それだけに不安がつきものです。<br />
              <br />
              どんな小さなことでも構いません。<br />
              お気軽にお声掛け・お問合せ頂ければ幸いです。
              <a href="#form_area" class="for_form_btn"
                >お問い合わせしてみる！</a
              >
            </div>
          </div>
        </div>
      </div>
      <!-- end info_end -->
    </div>
    <div id="info_type">
      <div class="main_column">
        <h2 class="content_ttl">リファスタへの問い合せ方法は以下4つ！</h2>
        <img src="https://kinkaimasu.jp/new/img/info/pc/tsuki.jpg" class="tsuki_img" />
        <table>
          <tbody>
            <tr>
              <th>お客様ケース</th>
              <th>おすすめの方法</th>
            </tr>
            <tr>
              <td>LINEが便利</td>
              <td>
                <a href="http://line.me/ti/p/%40rifa" target="_blank"
                  >LINEアプリ</a
                >
                <span class="blinking">おすすめ</span>
              </td>
            </tr>
            <tr>
              <td>メールで良い</td>
              <td>
                <a href="/info/" target="_blank">お問い合わせフォーム</a>
              </td>
            </tr>
            <tr>
              <td>すぐに答えが欲しい【1】</td>
              <td>
                @if (isset($_SERVER["HTTP_X_FORWARDED_HOST"]))
                  @if(stristr($_SERVER["HTTP_X_FORWARDED_HOST"], "kinkaimasu.jp"))
                    <a href="tel:0120954679">電話</a>
                  @elseif(stristr($_SERVER["HTTP_X_FORWARDED_HOST"], "brandkaimasu.com"))
                    <a href="tel:0120980246">電話</a>
                  @else
                    <a href="tel:0120954679">電話</a>
                  @endif
                @else
                  <a href="tel:0120954679">電話</a>
                @endif
              </td>
            </tr>
            <tr>
              <td>すぐに答えが欲しい【2】</td>
              <td>
                <a href="/chat/">オンラインチャット</a>
              </td>
            </tr>
          </tbody>
        </table>
        <br clear="all" />
      </div>
    </div>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script>
    function onSubmit(recaptcha) {
      if (recaptcha !== ''){
      // reCAPTHAによるチェックをしたあとは送信ボタンを押せるようにする
      $('#button').removeClass('disabled');
      }
    }
    </script>
@endsection

@section('body_last')

@include('info.js')
@endsection

@section('body_section')
@endsection
