@include("mailingkit.style")
@extends('layouts.app')
@section('title')宅配買取お申し込みフォーム@endsection

@section('description')
宅配で金・地金・ダイヤや宝石・ブランド買取をお申込みされる方への無料宅配買取申込みフォームです。梱包材も無料でお使いいただけます。
業界初！最短翌日に査定結果とお振込可能！梱包材をお送りした場合でもお品物ご到着当日の査定結果とお振り込みが可能ですので是非ご利用ください。
@endsection

@section('content')
{{-- <div class="5days-banner sp_none" style="width: 900px;margin: 0px auto 20px; max-width: 83%;">
  <img src="https://rifa.life/refasta_wordpress/wp-content/uploads/2021/12/form_banner.jpg" alt="5days_banner" width="900px">
</div>
<div class="5days-banner pc_none" style="width: 95%;margin: 0px auto 20px;">
  <img src="https://rifa.life/refasta_wordpress/wp-content/uploads/2021/12/form_banner.jpg" alt="5days_banner">
</div> --}}
<div class="modal fade" id="repeaterModal" tabindex="-1" role="dialog" aria-labelledby="repeaterModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">2回目以降のお客さまへ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <div class="alert alert-warning">
          2回目以降のお客さまは、お申込みは不要です。<br>
    			お持ちのダンボールや紙袋にお品物を詰め、お好きなタイミングで弊社着払いにてお送りください。<br>
          <br>
          〒170-0013<br>
          東京都豊島区東池袋1-25-14アルファビルディング4F<br>
          リファスタ 宅配事業部<br>
          03-5985-0388
          <div class="text-center">
            <strong>10:00～18:00（年中無休）<br>※臨時休業・年末年始休業は除く</strong><br>
          </div>
    			<br>
          <div class="text-center">
            ▼キット（梱包材）が必要な方▼<br>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              お申込みを続ける
            </button>
          </div>

        </div>
        <div class="modal-main-header">▼集荷のご依頼先はこちら▼</div>
        <div class="alert alert-warning">
        配送業者様へ直接集荷依頼をされた場合、<br>
        伝票(送り状)はお客様ご自身での手配となります。<br>
        <br>
        弊社での伝票手配をご希望の方は<br>
        「梱包キットなし」をご選択の上、<br>
        お申込みフォームをご入力ください。
        </div>
        <div class="modal-sub-header">ヤマト運輸</div>
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <a href="tel:0120-01-9625" class="btn btn-success my-2 btn-block">【固定電話】<br class="pc_only">0120-01-9625</a>
          </div>
  				<div class="col-md-6">
            <a href="tel:050-3786-3333" class="btn btn-success my-2 btn-block">【IP電話】<br class="pc_only">050-3786-3333</a>
          </div>
        </div>
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6" style="display: none">
            <a class="btn btn-primary my-2  btn-block" href="http://www.kuronekoyamato.co.jp/ytc/center/servicecenter_list.html#anc-01" target="_blank">
              営業所の検索ページ
            </a>
          </div>
          <div class="col-md-6">
            <a class="btn btn-primary my-2  btn-block" href="https://shuka.kuronekoyamato.co.jp/shuka_req/TopAction_doInit.action" target="_blank">
              集荷申し込み
            </a>
          </div>
        </div>
        <div class="modal-sub-header">佐川急便</div>
          <div class="row align-items-center justify-content-center">
            <div class="col-md-6">
              <a class="btn btn-primary my-2 btn-block" href="https://www.sagawa-exp.co.jp/send/branch_search/tanto/" target="_blank">
                営業所の検索ページ
              </a>
            </div>
          </div>
        <div class="modal-sub-header">ゆうパック</div>
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <a href="tel:0800-0800-111" class="btn btn-success my-2 btn-block">
              【電話番号】<br class="pc_only">0800-0800-111
            </a>
          </div>
          <div class="col-md-6">
            <a class="btn btn-primary my-2 btn-block" href="https://mgr.post.japanpost.jp/C20P02Action.do?ssoparam=0&amp;termtype=2" target="_blank">
              集荷申し込み
            </a>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade kit_modal" id="kit_s_modal" tabindex="-1" role="dialog" aria-labelledby="kit_s_modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sサイズ（26.3cm×17.8cm×12.6cm）</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-info">
          リングケース数個と鑑定書が数枚収まるサイズです。<br>
          ダイヤリング等はコチラ。箱付の長財布2つ程も収まります。
        </div>
        <div class="text-center row align-items-center justify-content-center">
          <img class="col" style="width: 200px;" src="https://kinkaimasu.jp/commonimg/delivery/kit_sankou/s.jpg" alt="">
          <img class="col" style="width: 200px;" src="https://kinkaimasu.jp/commonimg/delivery/kit_main/s_01.jpg" alt="">
          <img class="col" style="width: 200px;" src="https://kinkaimasu.jp/commonimg/delivery/kit_main/s_02.jpg" alt="">
          <img class="col" style="width: 200px;" src="https://kinkaimasu.jp/commonimg/delivery/kit_main/s_03.jpg" alt="">
          <img class="col" style="width: 200px;" src="https://kinkaimasu.jp/commonimg/delivery/kit_sub/s_04.png" alt="">
        </div>
        <div class="alert alert-secondary">
          <div>全キットの付属品</div>
          <ul class="row p-10">
    				<li class="col-md-12 col-sm-12">宅配買取セット：本社封入セット（宅配）</li>
    				<li class="col-md-6 col-sm-12">ご依頼いただいた梱包材</li>
    				<li class="col-md-6 col-sm-12">佐川急便の弊社印字伝票</li>
    				<li class="col-md-6 col-sm-12">チェック袋　A7*1</li>
    				<li class="col-md-6 col-sm-12">チェック袋　B9*3</li>
    			</ul>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade kit_modal" id="kit_m_modal" tabindex="-1" role="dialog" aria-labelledby="kit_m_modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mサイズ（43.5cm×31.0cm×23.5cm）</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-info">
          洋服10枚前後やバッグ1つ等のご依頼は、この大きさより上から始めてください。<br>
          靴箱が2つ程と、ミディアムサイズバッグが2点ほどが収まります。
        </div>
        <div class="text-center row align-items-center justify-content-center">
          <img class="col" style="width: 200px;" src="https://kinkaimasu.jp/commonimg/delivery/kit_sankou/m.jpg" alt="">
          <img class="col" style="width: 200px;" src="https://kinkaimasu.jp/commonimg/delivery/kit_main/m_01.jpg" alt="">
          <img class="col" style="width: 200px;" src="https://kinkaimasu.jp/commonimg/delivery/kit_main/m_02.jpg" alt="">
          <img class="col" style="width: 200px;" src="https://kinkaimasu.jp/commonimg/delivery/kit_main/m_03.jpg" alt="">
          <img class="col" style="width: 200px;" src="https://kinkaimasu.jp/commonimg/delivery/kit_sub/m_04.png" alt="">
        </div>
        <div class="alert alert-secondary">
          <div>全キットの付属品</div>
          <ul class="row p-10">
    				<li class="col-md-12 col-sm-12">宅配買取セット：本社封入セット（宅配）</li>
    				<li class="col-md-6 col-sm-12">ご依頼いただいた梱包材</li>
    				<li class="col-md-6 col-sm-12">佐川急便の弊社印字伝票</li>
    				<li class="col-md-6 col-sm-12">チェック袋　A7*1</li>
    				<li class="col-md-6 col-sm-12">チェック袋　B9*3</li>
    			</ul>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade kit_modal" id="kit_l_modal" tabindex="-1" role="dialog" aria-labelledby="kit_l_modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lサイズ（54.0cm×42.0cm×30.0cm）</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-info">
          当社で一番大きな段ボールです。大きなトートバッグに<br>
          箱付きのロングブーツ1、2箱程と、厚手の洋服も数枚収まるサイズです。
        </div>
        <div class="text-center row align-items-center justify-content-center">
          <img class="col" style="width: 200px;" src="https://kinkaimasu.jp/commonimg/delivery/kit_sankou/l.jpg" alt="">
          <img class="col" style="width: 200px;" src="https://kinkaimasu.jp/commonimg/delivery/kit_main/l_01.jpg" alt="">
          <img class="col" style="width: 200px;" src="https://kinkaimasu.jp/commonimg/delivery/kit_main/l_02.jpg" alt="">
          <img class="col" style="width: 200px;" src="https://kinkaimasu.jp/commonimg/delivery/kit_main/l_03.jpg" alt="">
          <img class="col" style="width: 200px;" src="https://kinkaimasu.jp/commonimg/delivery/kit_sub/l_04.png" alt="">
        </div>
        <div class="alert alert-secondary">
          <div>全キットの付属品</div>
          <ul class="row p-10">
    				<li class="col-md-12 col-sm-12">宅配買取セット：本社封入セット（宅配）</li>
    				<li class="col-md-6 col-sm-12">ご依頼いただいた梱包材</li>
    				<li class="col-md-6 col-sm-12">佐川急便の弊社印字伝票</li>
    				<li class="col-md-6 col-sm-12">チェック袋　A7*1</li>
    				<li class="col-md-6 col-sm-12">チェック袋　B9*3</li>
    			</ul>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade kit_modal" id="kit_d_modal" tabindex="-1" role="dialog" aria-labelledby="kit_d_modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">着払い伝票</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-info">
          弊社の住所を印字した佐川急便の着払い伝票のみの配送です。<br>
          ※ヤマトDM便での配送となる為、時間指定は承り兼ねます。
        </div>
        <div class="text-center row align-items-center justify-content-center">
          <img class="col" style="width: 200px;" src="https://kinkaimasu.jp/commonimg/delivery/kit_main/d_01.jpg" alt="">
        </div>
        <div class="alert alert-secondary">
          <div>全キットの付属品</div>
          <ul class="row p-10">
    				<li class="col-md-12 col-sm-12">宅配買取セット：本社封入セット（宅配）</li>
    				<li class="col-md-6 col-sm-12">ご依頼いただいた梱包材</li>
    				<li class="col-md-6 col-sm-12">佐川急便の弊社印字伝票</li>
    				<li class="col-md-6 col-sm-12">チェック袋　A7*1</li>
    				<li class="col-md-6 col-sm-12">チェック袋　B9*3</li>
    			</ul>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade kit_modal" id="kit_k_modal" tabindex="-1" role="dialog" aria-labelledby="kit_k_modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">クッション封筒（20.8×31.2cm）</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-info">
          小物や、貴金属類などはコチラで大丈夫です。<br>
          長財布2つ程であれば収まるサイズです。
        </div>
        <div class="text-center row align-items-center justify-content-center">
          <img class="col" style="width: 200px;" src="https://kinkaimasu.jp/commonimg/delivery/kit_sankou/k.jpg" alt="">
          <img class="col" style="width: 200px;" src="https://kinkaimasu.jp/commonimg/delivery/kit_main/k_01.jpg" alt="">
          <img class="col" style="width: 200px;" src="https://kinkaimasu.jp/commonimg/delivery/kit_main/k_02.jpg" alt="">
        </div>
        <div class="alert alert-secondary">
          <div>全キットの付属品</div>
          <ul class="row p-10">
    				<li class="col-md-6 col-sm-12">着払い伝票</li>
    				<li class="col-md-6 col-sm-12">買取カード</li>
    				<li class="col-md-6 col-sm-12">緩衝材（ミニパケ含む）</li>
    				<li class="col-md-6 col-sm-12">ご利用方法のご案内</li>
    				<li class="col-md-6 col-sm-12">午前中指定シール</li>
    				<li class="col-md-6 col-sm-12">取り扱い注意シール</li>
    			</ul>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
      </div>
    </div>
  </div>
</div>




<div class="container-fluid">
  <div class="row justify-content-md-center">
    <div class="col col-md-10 p-0">
      @if ($errors->any())
        <div class="alert alert-danger">
          入力内容に誤りがあるか、必須項目が抜けております。<br>
          恐れ入りますがもう一度ご確認をお願い致します。
        </div>
        <div class="alert alert-warning">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      @if(session('token_expired_warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>お知らせ：</strong>{{ session('token_expired_warning') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif

      @if($contract_at != "")
        <div class="alert alert-info">
          ▼3daysキャンペーンご利用の方へ▼<br>
          お申込日当日の地金相場価格を適用する為、お品物の金性（品位）と重量（グラム）を「備考欄」へご入力ください。<br>
          ご入力頂けない場合は適用されませんので、ご了承ください。
        </div>
      @endif
      <form
              role="form"
              method="POST"
              id="delivery_form"
              action="https://kinkaimasu.jp/delivery/thanks"
{{--              class="needs-validation" --}}
              novalidate
      >
        {!! csrf_field() !!}
        <input type="text" name="hp_field" class="hp-field" autocomplete="off">
        <input type="hidden" name="contract_at" value="{{ $contract_at }}">
        <input type="hidden" name="ad_param">
        <input type="hidden" name="service_users_id" value="{{ $user_info_arr['service_users_id'] ?? '' }}">

        <!-- GW休業バナー -->
        <div class="holiday_banner" style="display: block;max-width: 880px;margin: 0 auto;">
        {!! $holiday_banner !!}
        </div>

        <div class="card">
          <div class="card-header bg-dark text-white">
            お客様情報
          </div>
          <div>
            @if(isset($_SERVER['HTTP_X_FORWARDED_HOST']))
              @if(stristr($_SERVER['HTTP_X_FORWARDED_HOST'], "brandkaimasu.com"))


              <div class="col-md-8">
                <img src="https://kinkaimasu.jp/commonimg/delivery/brand/no_brand_pc.jpg" />
              </div>

                <div class="form-group row justify-content-center">
                  @php($item_name = 'brand_confirm')
                  <label class="col-md-3 col-form-label row">
                    <span class="badge badge-danger">必須</span>
                    買取不可ブランド
                  </label>
                  <div class="col-md-8">
                    <div class="col-sm-12 p-0">
                      <div class="custom-control custom-checkbox kiyaku-check-btn">
                      <input
                        type="checkbox"
                        class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }} custom-control-input"
                        name="{{ $item_name }}"
                        id="{{ $item_name }}"
                        aria-describedby="{{ $item_name }}HelpBlock"
                        autocomplete="off"
                        @if(old($item_name) == true) checked @endif
                        required
                      >
                      <label class="custom-control-label" for="{{ $item_name }}">
                        買取不可ブランドに同意する
                      </label>
                      <div class="valid-feedback">
                        入力済みです。
                      </div>
                      <div class="invalid-feedback">
                        買取不可ブランドに同意してください。
                      </div>
                    </div>
                    @if ($errors->has($item_name))
                      <div class="invalid-feedback">
                        <strong>{{ $errors->first($item_name) }}</strong>
                      </div>
                    @endif
                    </div>
                  </div>
                </div><!-- end form-group -->

              @endif
            @endif

              <div class="form-group row">
                @php($item_name = 'number_of_times')
                <label class="col-md-3 col-form-label row">
                  <span class="badge badge-danger">必須</span>
                  ご利用回数
                </label>
                <div class="col-md-8 item_center">
                  <div class="btn_2">
                    <label class="input-label">
                      <input
                        type="radio"
                        name="{{ $item_name }}"
                        id="{{ $item_name }}_1"
                        autocomplete="off"
                        value="はじめて"
                        @if((old($item_name) == "はじめて") OR (old($item_name) == "")) checked @endif
                      >
                      はじめて
                    </label>
                  </div>
                  <div class="btn_2">
                    <label class="input-label">
                      <input
                        type="radio"
                        name="{{ $item_name }}"
                        id="{{ $item_name }}_2"
                        autocomplete="off"
                        value="2回目以降"
                        @if(old($item_name) == "2回目以降") checked @endif
                        data-toggle="modal" data-target="#repeaterModal"
                      >
                      2回目以降
                    </label>
                  </div>
                </div>
              </div><!-- end form-group -->
          <div class="form-group row">
            @php($item_name = 'user_name')
            <label class="col-md-3 col-form-label row">
              <span class="badge badge-danger">必須</span>
              お名前(姓　名)
            </label>
            <div class="col-md-8">
              <input
                type="text"
                class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }}"
                name="{{ $item_name }}"
                id="{{ $item_name }}"
                @isset($user_info_arr[$item_name])
                  value="{{ $user_info_arr[$item_name] }}"
                @else
                  value="{{ old($item_name) }}"
                @endif
                required
                aria-describedby="{{ $item_name }}HelpBlock"
                placeholder="例）買取　太郎"
              >
              <div class="valid-feedback">
                入力済みです。
              </div>
              <div class="invalid-feedback">
                お名前を入力してください。
              </div>
              <small id="{{ $item_name }}HelpBlock" class="form-text text-muted">
                姓と名の間にスペースをお入れください。
              </small>
              @if ($errors->has($item_name))
                <div class="invalid-feedback">
                  <strong>{{ $errors->first($item_name) }}</strong>
                </div>
              @endif
            </div>
          </div><!-- end form-group -->

          <div class="form-group row">
            @php($item_name = 'user_name_kana')
            <label class="col-md-3 col-form-label row">
              <span class="badge badge-danger">必須</span>
              フリガナ(セイ　メイ)
            </label>
            <div class="col-md-8">
              <input
                type="text"
                class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }}"
                name="{{ $item_name }}"
                id="{{ $item_name }}"
                @isset($user_info_arr[$item_name])
                  value="{{ $user_info_arr[$item_name] }}"
                @else
                  value="{{ old($item_name) }}"
                @endif
                required
                aria-describedby="{{ $item_name }}HelpBlock"
                placeholder="例）カイトリ　タロウ"
              >
              <div class="valid-feedback">
                入力済みです。
              </div>
              <div class="invalid-feedback">
                フリガナを入力してください。
              </div>
              <small id="{{ $item_name }}HelpBlock" class="form-text text-muted">
                全角カナ
              </small>
              @if ($errors->has($item_name))
                <div class="invalid-feedback">
                  <strong>{{ $errors->first($item_name) }}</strong>
                </div>
              @endif
            </div>
          </div><!-- end form-group -->

          <div class="form-group row">
            @php($item_name = 'user_tel')
            <label class="col-md-3 col-form-label row">
              <span class="badge badge-danger">必須</span>
              <div class="row align-items-center justify-content-center m-0">
                <div class="">電話番号</div>
                {{-- <img src="https://kinkaimasu.jp/commonimg/delivery/tel.png" style="width: 30px;"> --}}
              </div>
            </label>
            <div class="col-md-8">
              <input
                type="tel"
                class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }}"
                name="{{ $item_name }}"
                id="{{ $item_name }}"
                @isset($user_info_arr[$item_name])
                  value="{{ $user_info_arr[$item_name] }}"
                @else
                  value="{{ old($item_name) }}"
                @endif
                required
                aria-describedby="{{ $item_name }}HelpBlock"
                placeholder="例）08012345678"
              >
              <div class="valid-feedback">
                入力済みです。
              </div>
              <div class="invalid-feedback">
                電話番号を入力してください。
              </div>
              <small id="{{ $item_name }}HelpBlock" class="form-text text-muted">
                ハイフン不要・半角数字
              </small>
              @if ($errors->has($item_name))
                <div class="invalid-feedback">
                  <strong>{{ $errors->first($item_name) }}</strong>
                </div>
              @endif
            </div>
          </div><!-- end form-group -->

          <div class="form-group row">
            @php($item_name = 'user_mail')
            <label class="col-md-3 col-form-label row">
              <span class="badge badge-danger">必須</span>
              メールアドレス
            </label>
            <div class="col-md-8">
              <input
                type="email"
                class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }}"
                name="{{ $item_name }}"
                id="{{ $item_name }}"
                @isset($user_info_arr[$item_name])
                  value="{{ $user_info_arr[$item_name] }}"
                @else
                  value="{{ old($item_name) }}"
                @endif
                required
                aria-describedby="{{ $item_name }}HelpBlock"
                placeholder="例）rifa@urlounge.co.jp"
              >
              <div class="valid-feedback">
                入力済みです。
              </div>
              <div class="invalid-feedback">
                メールアドレスを入力してください
              </div>
              <small id="{{ $item_name }}HelpBlock" class="form-text text-muted">
                半角英数字
              </small>
              @if ($errors->has($item_name))
                <div class="invalid-feedback">
                  <strong>{{ $errors->first($item_name) }}</strong>
                </div>
              @endif
            </div>
          </div><!-- end form-group -->

            <div class="form-group row">
              <label class="col-md-3 col-form-label row"><span class="badge badge-danger">必須</span>
              ご住所
              </label>
              <div class="col-md-8">
                <div class="accordion form-group">
                  <div class="option">
                    <input type="checkbox" id="toggle3" class="toggle">
                    <label class="title" for="toggle3">身分証に記載の情報をご入力ください。</label>
                    <div class="content">
                      {{-- <div class="row justify-content-md-center">
                        <div class="col-md-6"> --}}
                          <img src="https://kinkaimasu.jp/commonimg/delivery/license.png" alt="">
                        {{-- </div>
                      </div> --}}
                      {{-- <div class="row justify-content-md-center form-group"> --}}
                        <small id="{{ $item_name }}HelpBlock" class="form-text text-muted">
                          身分証は保険証やパスポート、マイナンバーカードなども有効です。
                        </small>
                      {{-- </div> --}}
                    </div>
                  </div>

                  <div class="form-group row">
                    @php($item_name = 'user_yuubinn')
                    {{-- <label class="col-md-3 col-form-label row">
                        <div class="col-7 col-sm-12 p-0">
                          <span class="badge badge-danger m-0">必須</span>
                          <span>郵便番号</span>
                          <img
                            src="https://kinkaimasu.jp/commonimg/delivery/zip.png"
                            class="p-2"
                            style="width: 30px;"
                          >
                        </div>
                    </label> --}}
                      <div class="col-8">
                        <input
                          type="text"
                          class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }} postcode_area post1"
                          name="{{ $item_name }}"
                          id="{{ $item_name }}"
                          @isset($user_info_arr[$item_name])
                            value="{{ $user_info_arr[$item_name] }}"
                          @else
                            value="{{ old($item_name) }}"
                          @endif
                          required
                          aria-describedby="{{ $item_name }}HelpBlock"
                          placeholder="例）1700013"
                        >
                      </div>
                      <div class="col-4 p-0 postcode_area post2">
                            <a
                              class="btn btn-primary p-1"
                              style="font-size: 12px; color: #fff;"
                              onclick="window.open('http://www.post.japanpost.jp/zipcode/','','scrollbars=yes');"
                              rel="nofollow"
                            >郵便番号検索</a>
                      </div>


                      <div class="valid-feedback">
                        入力済みです。
                      </div>
                      <div class="invalid-feedback">
                        郵便番号を入力してください
                      </div>
                      <div style="margin: 0 auto;">
                      <div class="row">
                        <small id="{{ $item_name }}HelpBlock" class="form-text text-muted">
                          半角数字を入力すると都道府県以下が自動反映されます。<br>
                          郵便番号がわからない方は青いボタンから検索してください。<br>
                        </small>
                        <div class="alert alert-warning" role="alert">
                          ※職場等ご自宅以外の住所はお使い頂けません。
                        </div>
                        @if ($errors->has($item_name))
                          <div class="invalid-feedback">
                            <strong>{{ $errors->first($item_name) }}</strong>
                          </div>
                        @endif
                      </div>
                      </div>


                  </div><!-- end form-group -->

                  <div class="form-group row post_input">
                        @php($item_name = 'user_todou')
                        {{-- <label class="col-md-3 col-form-label row">
                          <span class="badge badge-danger">必須</span>
                          都道府県
                        </label> --}}
                    <div class="col-md-8_1">
                          <select
                          class="custom-select custom-select-lg"
                          name="{{ $item_name }}"
                          id="{{ $item_name }}"
                          required
                          >
                          <option value="">都道府県を選ぶ</option>
                          @foreach($todouhuken as $val)
                          <option
                          value="{{ $val }}"
                          @isset($user_info_arr[$item_name])
                            @if($val == $user_info_arr[$item_name])
                              selected
                            @endif
                          @else
                            @if($val == old($item_name))
                              selected
                            @endif
                          @endif
                          >{{ $val }}</option>
                        @endforeach
                      </select>
                      <div class="valid-feedback">
                        入力済みです。
                      </div>
                      <div class="invalid-feedback">
                        都道府県を選択してください
                      </div>
                      @if ($errors->has($item_name))
                        <div class="invalid-feedback">
                          <strong>{{ $errors->first($item_name) }}</strong>
                        </div>
                      @endif
                    </div>
                  </div><!-- end form-group -->

                  <div class="form-group row post_input">
                    @php($item_name = 'user_sikutyouson')
                    {{-- <label class="col-md-3 col-form-label row">
                      <span class="badge badge-danger">必須</span>
                      市区郡
                    </label> --}}
                    <div class="col-md-8_1">
                      <input
                        type="text"
                        class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }}"
                        name="{{ $item_name }}"
                        id="{{ $item_name }}"
                        @isset($user_info_arr[$item_name])
                          value="{{ $user_info_arr[$item_name] }}"
                        @else
                          value="{{ old($item_name) }}"
                        @endif
                        required
                        aria-describedby="{{ $item_name }}HelpBlock"
                        placeholder="例）〇〇市△△区"
                      >
                      <div class="valid-feedback">
                        入力済みです。
                      </div>
                      <div class="invalid-feedback">
                        市区群を入力してください
                      </div>
                      @if ($errors->has($item_name))
                        <div class="invalid-feedback">
                          <strong>{{ $errors->first($item_name) }}</strong>
                        </div>
                      @endif
                    </div>
                  </div><!-- end form-group -->

                  <div class="form-group row post_input">
                    @php($item_name = 'user_banti')
                    {{-- <label class="col-md-3 col-form-label row">
                      <span class="badge badge-danger">必須</span>
                      町村名・番地
                    </label> --}}
                    <div class="col-md-8_1">
                      <input
                        type="text"
                        class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }}"
                        name="{{ $item_name }}"
                        id="{{ $item_name }}"
                        @isset($user_info_arr[$item_name])
                          value="{{ $user_info_arr[$item_name] }}"
                        @else
                          value="{{ old($item_name) }}"
                        @endif
                        required
                        aria-describedby="{{ $item_name }}HelpBlock"
                        placeholder="例）□□町１−２−３"
                      >
                      <div class="valid-feedback">
                        入力済みです。
                      </div>
                      <div class="invalid-feedback">
                        町村名・番地を入力してください
                      </div>
                      @if ($errors->has($item_name))
                        <div class="invalid-feedback">
                          <strong>{{ $errors->first($item_name) }}</strong>
                        </div>
                      @endif
                    </div>
                  </div><!-- end form-group -->

                  <div class="form-group row post_input">
                    @php($item_name = 'user_building')
                    {{-- <label class="col-md-3 col-form-label row">
                      <span class="badge badge-secondary">任意</span>
                      建物名
                    </label> --}}
                    <div class="col-md-8_1">
                      <input
                        type="text"
                        class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }}"
                        name="{{ $item_name }}"
                        id="{{ $item_name }}"
                        @isset($user_info_arr[$item_name])
                          value="{{ $user_info_arr[$item_name] }}"
                        @else
                          value="{{ old($item_name) }}"
                        @endif
                        aria-describedby="{{ $item_name }}HelpBlock"
                        placeholder="例）あいうえおマンション７７７号室"
                      >
                      @if ($errors->has($item_name))
                        <div class="invalid-feedback">
                          <strong>{{ $errors->first($item_name) }}</strong>
                        </div>
                      @endif
                    </div>
                  </div><!-- end form-group -->

                </div>
            {{-- </div> --}}
              </div>
            </div>
          {{-- <div class="col-md-8_2"> --}}
            {{-- <div class="row justify-content-md-center">
              <div class="alert alert-danger col-md-6">
                身分証に記載の情報をご入力ください。
              </div>
            </div> --}}










          <div class="konpou_box">
            <div class="card-header bg-dark text-white">買取申込内容
            </div>
          <div class="konpou_box_1">
            <div class="form-group row need_kit_space">
                @php($item_name = 'need_kit')
                <label class="col-md-3 col-form-label row">
                  <span class="badge badge-danger">必須</span>
                  梱包キット
                </label>
                <div class="col-md-8 item_center ">
                    <div class="btn_2">
                      <label class="input-label">
                        <input
                          type="radio"
                          name="{{ $item_name }}"
                          id="{{ $item_name }}_1"
                          autocomplete="off"
                          value="希望しない"
                          @if((old($item_name) == "希望しない") OR (old($item_name) == "")) checked @endif
                          onchange="need_kit_select()"
                        >
                        希望しない
                      </label>
                    </div>
                    <div class="btn_2">
                      <label class="input-label">

                        <input
                          type="radio"
                          name="{{ $item_name }}"
                          id="{{ $item_name }}_2"
                          autocomplete="off"
                          value="希望する"
                          @if(old($item_name) == "希望する") checked @endif
                          onchange="need_kit_select()"
                        >
                        希望する
                      </label>
                    </div>
                    <small id="{{ $item_name }}HelpBlock" class="form-text text-muted">
                      梱包キットを希望しない場合はお持ちの段ボールでお送りください。
                    </small>
                    <div role="alert" class="alert alert-warning">
                      <div class="text-center">
                        <strong>配送補償について</strong><br>
                      </div>
                        宅急便1箱につき30万円までの補償(責任限度額)を設置。
                        30万円以上をご希望の場合は、梱包キットを希望し補償額を設定してください。
                    </div>
                </div>
              </div>
                @php($item_name = 'kit_sum')
                <input
                  type="text"
                  name="{{ $item_name }}"
                  id="{{ $item_name }}"
                  value="{{ old($item_name) }}"
                  class="form-control {{ $errors->has($item_name) ? ' is-invalid' : '' }}"
                >
                <div class="valid-feedback">
                  <!-- 入力済みです。 -->
                </div>
                <div class="invalid-feedback">
                  梱包キットを選択してください
                </div>
                @if ($errors->has($item_name))
                  <div class="invalid-feedback">
                    <strong>{{ $errors->first($item_name) }}</strong>
                  </div>
                @endif
                <noscript>
                  <input
                      type="text"
                      name="{{ $item_name }}"
                      id="{{ $item_name }}"
                      value="1"
                  >
                </noscript>

                @if(!isset($_GET["is_kit_test"]))
                  @include("mailingkit.kit_select_listbox")
                @else
                  @include("mailingkit.kit_select")
                @endif



                <div class="form-group row" id="insurance_row">
                  @php($item_name = 'insurance')
                  <label class="col-md-3 col-form-label row">
                    <span class="badge badge-danger">必須</span>
                    <span id="insurance_label">配送補償</span>
                  </label>
                  <div class="col-md-8 item_center ">
                    <div class="btn_2">
                      <label class="input-label">
                        <input
                          type="radio"
                          name="{{ $item_name }}"
                          id="{{ $item_name }}_1"
                          autocomplete="off"
                          value="なし"
                          @if((old($item_name) == "なし") OR (old($item_name) == "")) checked @endif
                          onchange="insurance_select()"
                        >
                        30万円未満
                      </label>
                    </div>
                    <div class="btn_2">
                      <label class="input-label">
                        <input
                          type="radio"
                          name="{{ $item_name }}"
                          id="{{ $item_name }}_2"
                          autocomplete="off"
                          value="あり"
                          @if(old($item_name) == "あり") checked @endif
                          onchange="insurance_select()"
                        >
                        30万円以上
                        {{-- (日時指定無効) --}}
                      </label>
                    </div>
                      <small id="{{ $item_name }}HelpBlock" class="form-text text-muted">
                        30万円以上を選択された場合、専用伝票をご用意する為、お申し込みから4日前後でキットを発送致します。
                      </small>
                    @if ($errors->has($item_name))
                      <div class="invalid-feedback">
                        <strong>{{ $errors->first($item_name) }}</strong>
                      </div>
                    @endif
                  </div>
                </div><!-- end form-group -->


                <div class="form-group row" id="time_select_none_row">

                  @php($item_name = 'time_select_none')
                  <label class="col-md-3 col-form-label row">
                    <span class="badge badge-danger">必須</span>
                    配送日時指定
                  </label>
                  <div class="col-md-8 item_center ">
                    <div class="btn_2">
                      <label class="input-label">
                        <input
                          type="radio"
                          name="{{ $item_name }}"
                          id="{{ $item_name }}_1"
                          autocomplete="off"
                          value="指定しない"
                          @if((old($item_name) == "指定しない") OR (old($item_name) == "")) checked @endif
                          onchange="kit_calender_view()"
                        >
                        指定しない
                        {{-- <strong>(最短翌日配送!!)</strong> --}}
                      </label>
                    </div>
                    <div class="btn_2">
                      <label class="input-label">
                        <input
                          type="radio"
                          name="{{ $item_name }}"
                          id="{{ $item_name }}_2"
                          autocomplete="off"
                          value="指定する"
                          @if(old($item_name) == "指定する") checked @endif
                          onchange="kit_calender_view()"
                        >
                        指定する
                      </label>
                    </div>
                  </div>
                </div><!-- end form-group -->


                @if(!isset($_GET["is_kit_test"]))
                  @include("mailingkit.kit_calender_listbox")
                @else
                  @include("mailingkit.kit_calender")
                @endif


                <div class="form-group row" id="insurance_kingaku_row">
                  @php($item_name = 'insurance_kingaku')
                  <label class="col-md-3 col-form-label row">
                    配送保険対象金額
                  </label>
                  <div class="col-md-8">
                    <select
                      class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }}"
                      name="{{ $item_name }}"
                      id="{{ $item_name }}"
                    >
                      <option value="">選択してください。</option>
                      @foreach($haisou_hosyou as $val)
                      <option value="{{ str_replace(",","",$val) }}" @if($val == old($item_name)) selected @endif >{{ $val }}</option>
                      @endforeach
                    </select>
                    <small id="{{ $item_name }}HelpBlock" class="form-text text-muted">
                      ご希望の配送保険金額を設定してください。<br>
                      なお、補償金額1万円につき10円(税抜)をご負担頂いております。
                    </small>
                    @if ($errors->has($item_name))
                      <div class="invalid-feedback">
                        <strong>{{ $errors->first($item_name) }}</strong>
                      </div>
                    @endif
                  </div>
                </div><!-- end form-group -->


                <div class="form-group row" id="speed_box_row">

                  @php($item_name = 'speed_box')
                  <label class="col-md-3 col-form-label row" >
                    <span class="badge badge-danger">必須</span>
                    発送予定箱数
                  </label>
                  <div class="col-md-8 " style="padding-bottom: 10px">
                    <select
                      class="custom-select custom-select-lg form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }}"
                      name="{{ $item_name }}"
                      id="{{ $item_name }}"
                    >
                      <option value="" >箱の数を選択してください。</option>
                      @php($val = "1箱")
                      <option value="{{ $val }}" @if($val == old($item_name)) selected @endif >{{ $val }}</option>
                      @php($val = "2箱")
                      <option value="{{ $val }}" @if($val == old($item_name)) selected @endif >{{ $val }}</option>
                      @php($val = "3箱")
                      <option value="{{ $val }}" @if($val == old($item_name)) selected @endif >{{ $val }}</option>
                      @php($val = "4箱")
                      <option value="{{ $val }}" @if($val == old($item_name)) selected @endif >{{ $val }}</option>
                      @php($val = "5箱")
                      <option value="{{ $val }}" @if($val == old($item_name)) selected @endif >{{ $val }}</option>
                      @php($val = "6箱")
                      <option value="{{ $val }}" @if($val == old($item_name)) selected @endif >{{ $val }}</option>
                      @php($val = "7箱")
                      <option value="{{ $val }}" @if($val == old($item_name)) selected @endif >{{ $val }}</option>
                      @php($val = "8箱")
                      <option value="{{ $val }}" @if($val == old($item_name)) selected @endif >{{ $val }}</option>
                      @php($val = "9箱")
                      <option value="{{ $val }}" @if($val == old($item_name)) selected @endif >{{ $val }}</option>
                      @php($val = "10箱")
                      <option value="{{ $val }}" @if($val == old($item_name)) selected @endif >{{ $val }}</option>

                    </select>
                    <div class="valid-feedback">
                      入力済みです。
                    </div>
                    <div class="invalid-feedback">
                      発送予定箱数を選択してください。
                    </div>
                    @if ($errors->has($item_name))
                      <div class="invalid-feedback">
                        <strong>{{ $errors->first($item_name) }}</strong>
                      </div>
                    @endif
                  </div>
                </div><!-- end form-group -->

                @if(!isset($_GET["is_kit_test"]))
                  @include("mailingkit.shuuka_listbox")
                @else
                  @include("mailingkit.shuuka")
                @endif

            </div>
          </div>
          </div>

          <div class="form-group row">
            @php($item_name = 'tel_mail_line')
            <label class="col-md-3 col-form-label row margin_top_none" style="margin-top: 0px !important">
              <span class="badge badge-danger">必須</span>
              希望連絡方法
            </label>
            <div class="col-md-8">
              <div class="input_label_group">
                <label class="input-label">
                  <input
                    type="radio"
                    name="{{ $item_name }}"
                    id="{{ $item_name }}_1"
                    autocomplete="off"
                    value="LINE"
                    @if((old($item_name) == "LINE") OR (old($item_name) == "")) checked @endif
                   >
                   LINE
                </label>
                <label class="input-label">
                  <input
                    type="radio"
                    name="{{ $item_name }}"
                    id="{{ $item_name }}_2"
                    autocomplete="off"
                    value="メール"
                    @if(old($item_name) == "メール") checked @endif
                  >
                  メール
                </label>
                <label class="input-label">
                  <input
                    type="radio"
                    name="{{ $item_name }}"
                    id="{{ $item_name }}_3"
                    autocomplete="off"
                    value="電話"
                    @if(old($item_name) == "電話") checked @endif
                  >
                  電話
                </label>
              </div>
            </div>
          </div><!-- end form-group -->

          <div class="form-group row">
            @php($item_name = 'line_satei')
            <label class="col-md-3 col-form-label row">
              <span class="badge badge-danger">必須</span>
              事前査定
            </label>
            <div class="col-md-8">
              <div class="input_label_group">
                <label class="input-label">
                  <input
                    type="radio"
                    name="{{ $item_name }}"
                    id="{{ $item_name }}_1"
                    autocomplete="off"
                    value="事前査定なし"
                    @if((old($item_name) == "事前査定なし") OR (old($item_name) == "")) checked @endif
                   >
                   事前査定なし
                </label>
                <label class="input-label">
                  <input
                    type="radio"
                    name="{{ $item_name }}"
                    id="{{ $item_name }}_2"
                    autocomplete="off"
                    value="LINE査定"
                    @if(old($item_name) == "LINE査定") checked
                    checked
                    @endif
                  >
                  LINE査定
                </label>
                <label class="input-label">
                  <input
                    type="radio"
                    name="{{ $item_name }}"
                    id="{{ $item_name }}_3"
                    autocomplete="off"
                    value="メール査定"
                    @if(old($item_name) == "メール査定") checked
                    @endif
                  >
                  メール査定
                </label>
                <label class="input-label">
                  <input
                    type="radio"
                    name="{{ $item_name }}"
                    id="{{ $item_name }}_4"
                    autocomplete="off"
                    value="電話で見積り"
                    @if(old($item_name) == "電話で見積り") checked
                    @endif
                  >
                  電話で見積り
                </label>
                <label class="input-label">
                  <input
                    type="radio"
                    name="{{ $item_name }}"
                    id="{{ $item_name }}_5"
                    autocomplete="off"
                    value="チャットで見積り"
                    @if(old($item_name) == "チャットで見積り") checked
                    @endif
                  >
                  チャットで見積り
                </label>
              </div>
              <div class="alert alert-success">
                <div class="text-center">
                  <strong>
                    LINE査定をご利用頂いたお客様へ<br>
                  </strong>
                </div>
                LINE査定のお見積り金額を参考にさせて頂く為、お申し込み後、当社公式ライン宛（@rifa）に「お申し込み時のお名前・メールアドレス」をお送りください。
              </div>
            </div>
          </div><!-- end form-group -->
          <div class="form-group row">
            @php($item_name = 'bikou')
            <label class="col-md-3 col-form-label row">
              <span class="badge badge-secondary">任意</span>
              備考欄
            </label>
            <div class="col-md-8">
              <textarea
                rows="10"
                class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }} bikou_area"
                name="{{ $item_name }}"
                value="{{ old($item_name) }}"
                aria-describedby="{{ $item_name }}HelpBlock"
                placeholder="今回、買取をご依頼された特別な事情などがございましたら、是非お書き留めください。"
              >{{ old($item_name) }}</textarea>
              @if ($errors->has($item_name))
                <div class="invalid-feedback">
                  <strong>{{ $errors->first($item_name) }}</strong>
                </div>
              @endif
            </div>
          </div><!-- end form-group -->



          <div class="form-group row justify-content-center">
            @php($item_name = 'kiyaku_check')
            <label class="col-md-3 col-form-label row">
              <span class="badge badge-danger">必須</span>
              利用規約
              {{-- 利用規約と個人情報取扱い通知事項 --}}
              {{-- 利用規約とプライバシーポリシー(個人情報取扱い通知事項) --}}
            </label>
            <div class="col-md-8">
              <div class="col-sm-12 p-0">
              {{-- <div class="col-md-10 col-sm-12 p-0"> --}}
                <p>
                  ＊以下を同意の上、「同意する」にチェックしてください。
                </p>

                <div class="accordion" id="accordionKiyaku">
                  <div class="card">
                    <div class="card-header" id="">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#kiyaku_box" aria-expanded="true" aria-controls="kiyaku_box">
                          ▼利用規約
                        </button>
                      </h5>
                    </div>

                    <div id="kiyaku_box" class="collapse" aria-labelledby="" data-parent="#accordionKiyaku">
                      <div class="card-body">
                        {!! $kiyaku_html !!}
                      </div>
                    </div>

                  <div class="card">
                    <div class="card-header" id="headingTwo">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#privacy_box" aria-expanded="false" aria-controls="privacy_box">
                          ▼個人情報取扱い通知事項
                        </button>
                      </h5>
                    </div>
                    <div id="privacy_box" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionKiyaku">
                      <div class="card-body">
                        {!! $pp_html !!}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 p-0">
                <div class="custom-control custom-checkbox kiyaku-check-btn">
                  <input
                    type="checkbox"
                    class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }} custom-control-input"
                    name="{{ $item_name }}"
                    id="{{ $item_name }}"
                    aria-describedby="{{ $item_name }}HelpBlock"
                    autocomplete="off"
                    @if(old($item_name) == true) checked @endif
                    required
                  >
                  <label class="custom-control-label" for="{{ $item_name }}">
                    同意する
                  </label>
                  <div class="valid-feedback">
                    入力済みです。
                  </div>
                  <div class="invalid-feedback">
                    利用規約に同意してください。
                  </div>
                </div>

                <div role="alert" class="alert alert-warning">
                  <div id="{{ $item_name }}HelpBlock" class="form-text text-muted">
                    <div class="text-center">
                      <strong>◇キャンセル料,返送料は原則無料です。<br></strong>
                    </div>
                    全てのお品物に金額が付かなかった場合は、「着払い」にてご返却させていただいております。
                    ただし、一点でもお値段がつけば弊社「元払い」にてご返却いたします。
                    予め了承ください。
                  </div>
                </div>
                @if ($errors->has($item_name))
                  <div class="invalid-feedback">
                    <strong>{{ $errors->first($item_name) }}</strong>
                  </div>
                @endif
              </div>
            </div>
          </div><!-- end form-group -->



          </div><!-- end card-body -->

          {{-- </div> --}}
          <!-- end card -->
          {{-- <div class="card"> --}}
            {{-- <div class="card-header bg-dark text-white">
              お客様情報
            </div> --}}


            <div class="g-recaptcha" data-callback="onSubmit" data-sitekey="{{ config('services.google_recaptcha.site_key') }}"></div>


            <div
              name=""
              class="btn btn-primary btn-lg submit_btn js_submit_btn"
              disabled
            >入力内容を送信する</div>
            <noscript>
              <input type=submit class="btn btn-primary btn-lg submit_btn" value="入力内容を送信する">
            </noscript>

            <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="alert alert-warning" role="alert">
                  携帯電話のドメイン指定受信をされているお客様につきましては「urlounge.co.jp」を受信指定してください。<br>
                  設定をされていない場合、弊社からのメールが届きませんのでご確認ください。<br>
                  携帯電話のドメイン指定外拒否をされているお客様は一時的に解除をお願いいたします。<br>
                  パソコンのアドレスを返信用アドレスとしてご入力された場合は、
                  弊社からの連絡が迷惑メールフォルダなどに入る場合がございます。<br>
                  ご確認をお願いいたします。
                </div>
              </div>
            </div>


            <!-- <div class="accordion" id="accordionAnkeeto">
              <div class="card">
                <div class="card-header p-0" id="">
                  <h5 class="mb-0 text-center">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#ankeeto_box" aria-expanded="true" aria-controls="ankeeto_box">
                      ▼アンケートにご協力ください▼
                    </button>
                  </h5>
                </div>
                <div id="ankeeto_box" class="collapse card-body" aria-labelledby="" data-parent="#accordionAnkeeto">
                    <div class="form-group row">
                    <label class="col-md-12 col-form-label row">
                      どの検索エンジンを利用して当サイトを検索されましたか？
                    </label>
                    <div class="col-md-12">
                      @php($item_name = 'anke_1')
                      <div class="flex-direction-column">
                        <label class="input-label">
                          <input
                            type="radio"
                            name="{{ $item_name }}"
                            id="{{ $item_name }}_1"
                            autocomplete="off"
                            value="yahoo"
                            @if(old($item_name) == "yahoo") checked @endif
                           >
                           yahoo
                        </label>
                        <label class="input-label">
                          <input
                            type="radio"
                            name="{{ $item_name }}"
                            id="{{ $item_name }}_2"
                            autocomplete="off"
                            value="google"
                            @if(old($item_name) == "google") checked @endif
                          >
                          google
                        </label>
                        <label class="input-label">
                          <input
                            type="radio"
                            name="{{ $item_name }}"
                            id="{{ $item_name }}_3"
                            autocomplete="off"
                            value="その他"
                            @if(old($item_name) == "その他") checked @endif
                          >
                          その他
                        </label>
                      </div>
                      @php($item_name = 'anke_1_text')
                      <textarea
                        rows="3"
                        class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }}"
                        name="{{ $item_name }}"
                        value="{{ old($item_name) }}"
                        aria-describedby="{{ $item_name }}HelpBlock"
                        placeholder="その他の方はこちらにご記入ください。"
                      >{{ old($item_name) }}</textarea>
                      @if ($errors->has($item_name))
                        <div class="invalid-feedback">
                          <strong>{{ $errors->first($item_name) }}</strong>
                        </div>
                      @endif
                    </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-12 col-form-label row">
                        どのデバイスを利用して当サイトをご覧になりましたか？
                      </label>
                      <div class="col-md-12">
                        @php($item_name = 'anke_2')
                        <div class="flex-direction-column">
                          <label class="input-label">
                            <input
                              type="radio"
                              name="{{ $item_name }}"
                              id="{{ $item_name }}_1"
                              autocomplete="off"
                              value="パソコン"
                              @if(old($item_name) == "パソコン") checked @endif
                             >
                             パソコン
                          </label>
                          <label class="input-label">
                            <input
                              type="radio"
                              name="{{ $item_name }}"
                              id="{{ $item_name }}_2"
                              autocomplete="off"
                              value="スマートフォン"
                              @if(old($item_name) == "スマートフォン") checked @endif
                            >
                            スマートフォン
                          </label>
                          <label class="input-label">
                            <input
                              type="radio"
                              name="{{ $item_name }}"
                              id="{{ $item_name }}_3"
                              autocomplete="off"
                              value="タブレット"
                              @if(old($item_name) == "タブレット") checked @endif
                            >
                            タブレット
                          </label>
                          <label class="input-label">
                            <input
                              type="radio"
                              name="{{ $item_name }}"
                              id="{{ $item_name }}_4"
                              autocomplete="off"
                              value="その他"
                              @if(old($item_name) == "その他") checked @endif
                            >
                            その他
                          </label>
                        </div>
                        @php($item_name = 'anke_2_text')
                        <textarea
                          rows="3"
                          class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }}"
                          name="{{ $item_name }}"
                          value="{{ old($item_name) }}"
                          aria-describedby="{{ $item_name }}HelpBlock"
                          placeholder="その他の方はこちらにご記入ください。"
                        >{{ old($item_name) }}</textarea>
                        @if ($errors->has($item_name))
                          <div class="invalid-feedback">
                            <strong>{{ $errors->first($item_name) }}</strong>
                          </div>
                        @endif
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-12 col-form-label row">
                        どのような検索キーワードで当サイトをご覧になりましたか？
                      </label>
                      <div class="col-md-12 p-0">
                        <div class="row many_check_box">
                          @foreach($ankeeto_word as $val)
                          @php($item_name = 'anke_3_'.$loop->index)
                          <div class="col-md-3 col-6 custom-control custom-checkbox">
                            <input
                              type="checkbox" name="{{ $item_name }}" id="{{ $item_name }}" autocomplete="off"
                              class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }} custom-control-input"
                              @if(old($item_name) == true) checked @endif
                              value="{{ $val }}"
                            ><label class="custom-control-label" for="{{ $item_name }}">{{ $val }}</label>
                          </div>
                          @endforeach
                        </div>
                        @php($item_name = 'anke_3_text')
                        <textarea
                          rows="3"
                          class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }}"
                          name="{{ $item_name }}"
                          value="{{ old($item_name) }}"
                          aria-describedby="{{ $item_name }}HelpBlock"
                          placeholder="その他の方はこちらにご記入ください。"
                        >{{ old($item_name) }}</textarea>
                        @if ($errors->has($item_name))
                          <div class="invalid-feedback">
                            <strong>{{ $errors->first($item_name) }}</strong>
                          </div>
                        @endif
                      </div>
                    </div>

                    <input type="hidden" name="send_opt" value="{{ $_GET['send_opt'] ?? '' }}">

                    <div class="alert alert-light" role="alert">
                      ご協力ありがとうございました。
                    </div>
            <div class="g-recaptcha" data-callback="onSubmit" data-sitekey="{{ config('services.google_recaptcha.site_key') }}"></div>
                    <div class="row">
                      <div
                              name=""
                              class="btn btn-primary btn-lg submit_btn js_submit_btn"
                              disabled
                      >入力内容を送信する</div>
                    </div>
                    <noscript>
                      <input type=submit class="btn btn-primary btn-lg submit_btn" value="入力内容を送信する">
                    </noscript>
                  </div>
              </div>
            </div> -->
          </div>
      </form>



      <div id="ss_box" style="text-align: center; display: block; margin: 20px auto 15px;">
        <form action="https://www.login.secomtrust.net/customer/customer/pfw/CertificationPage.do" name="CertificationPageForm" method="post" target="_blank" style="margin: 0px;">
          <input type="image" src="https://rifa.life/refasta_wordpress/wp-content/uploads/2022/03/B0310422-1.gif" width="56" name="Sticker" alt="クリックして証明書の内容をご確認ください" oncontextmenu="return false;">
          <input type="hidden" name="Req_ID" value="7388475980">
        </form>
      </div>

      <div style="text-align: center;font-size: 12px;margin-bottom: 25px;">このサイトは、セコムトラストシステムズ株式会社のサーバ証明書により実在性が認証されています。<br>
        また、SSLページは通信が暗号化されプライバシーが守られています。</div>

      </div>
    </div>

</div>

@endsection

@section('body_last')
<!-- 郵便番号自動入力ファイル取得 -->
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<script src="https://kinkaimasu.jp/js/jquery.autoKana.js" charset="UTF-8"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
@include("mailingkit.js")
@endsection
