@extends('layouts.app')
@section('title')宅配買取お申し込みフォームテスト@endsection

@section('description')
宅配で金・地金・ダイヤや宝石・ブランド買取をお申込みされる方への無料宅配買取申込みフォームです。梱包材も無料でお使いいただけます。
業界初！最短翌日に査定結果とお振込可能！梱包材をお送りした場合でもお品物ご到着当日の査定結果とお振り込みが可能ですので是非ご利用ください。
@endsection

@section('content')
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
          2回目以降のお客さまは、<strong>お申込みは不要です。</strong><br>
    			<br>
    			お持ちのダンボールや紙袋にお品物を詰め、<br>
    			お好きなタイミングで弊社着払いにてお送りください。<br>
    			<strong>11:00～18:00　月～土曜日祝祭日営業（日曜定休）</strong><br>
    			<br>
    			キット（梱包材）が必要な方のみこのままお申込みを続けてください。
        </div>
        <div class="modal-main-header">▼集荷のご依頼先はこちら▼</div>
        <div class="modal-sub-header">ヤマト運輸</div>
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <a href="tel:0120-01-9625" class="btn btn-success my-2">【固定電話から】0120-01-9625</a>
          </div>
  				<div class="col-md-6">
            <a href="tel:050-3786-3333" class="btn btn-success my-2">【IP電話(050)から】050-3786-3333</a>
          </div>
        </div>
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <a class="btn btn-primary my-2" href="http://www.kuronekoyamato.co.jp/ytc/center/servicecenter_list.html#anc-01" target="_blank">
              営業所の検索ページ
            </a>
          </div>
          <div class="col-md-6">
            <a class="btn btn-primary my-2" href="https://shuka.kuronekoyamato.co.jp/shuka_req/TopAction_doInit.action" target="_blank">
              集荷申し込み
            </a>
          </div>
        </div>
        <div class="modal-sub-header">佐川急便</div>
        <a class="btn btn-primary my-2" href="https://www.sagawa-exp.co.jp/send/branch_search/tanto/" target="_blank">
          営業所の検索ページ
        </a>
        <div class="modal-sub-header">ゆうパック</div>
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <a href="tel:0800-0800-111" class="btn btn-success my-2">
              【電話で集荷】0800-0800-111
            </a>
          </div>
          <div class="col-md-6">
            <a class="btn btn-primary my-2" href="https://mgr.post.japanpost.jp/C20P02Action.do?ssoparam=0&amp;termtype=2" target="_blank">
              集荷依頼ページ
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
          <img class="col" style="width: 200px;" src="{{ env('IMG_FOLDER') }}/kit_sankou/s.jpg" alt="">
          <img class="col" style="width: 200px;" src="{{ env('IMG_FOLDER') }}/kit_main/s_01.jpg" alt="">
          <img class="col" style="width: 200px;" src="{{ env('IMG_FOLDER') }}/kit_main/s_02.jpg" alt="">
          <img class="col" style="width: 200px;" src="{{ env('IMG_FOLDER') }}/kit_main/s_03.jpg" alt="">
          <img class="col" style="width: 200px;" src="{{ env('IMG_FOLDER') }}/kit_sub/s_04.png" alt="">
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
          <img class="col" style="width: 200px;" src="{{ env('IMG_FOLDER') }}/kit_sankou/m.jpg" alt="">
          <img class="col" style="width: 200px;" src="{{ env('IMG_FOLDER') }}/kit_main/m_01.jpg" alt="">
          <img class="col" style="width: 200px;" src="{{ env('IMG_FOLDER') }}/kit_main/m_02.jpg" alt="">
          <img class="col" style="width: 200px;" src="{{ env('IMG_FOLDER') }}/kit_main/m_03.jpg" alt="">
          <img class="col" style="width: 200px;" src="{{ env('IMG_FOLDER') }}/kit_sub/m_04.png" alt="">
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
          <img class="col" style="width: 200px;" src="{{ env('IMG_FOLDER') }}/kit_sankou/l.jpg" alt="">
          <img class="col" style="width: 200px;" src="{{ env('IMG_FOLDER') }}/kit_main/l_01.jpg" alt="">
          <img class="col" style="width: 200px;" src="{{ env('IMG_FOLDER') }}/kit_main/l_02.jpg" alt="">
          <img class="col" style="width: 200px;" src="{{ env('IMG_FOLDER') }}/kit_main/l_03.jpg" alt="">
          <img class="col" style="width: 200px;" src="{{ env('IMG_FOLDER') }}/kit_sub/l_04.png" alt="">
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
          <img class="col" style="width: 200px;" src="{{ env('IMG_FOLDER') }}/kit_main/d_01.jpg" alt="">
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
          <img class="col" style="width: 200px;" src="{{ env('IMG_FOLDER') }}/kit_sankou/k.jpg" alt="">
          <img class="col" style="width: 200px;" src="{{ env('IMG_FOLDER') }}/kit_main/k_01.jpg" alt="">
          <img class="col" style="width: 200px;" src="{{ env('IMG_FOLDER') }}/kit_main/k_02.jpg" alt="">
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
      <form role="form" method="POST" id="delivery_form" action="{{ env('REQ_DIR') }}/thanks" class="needs-validation" novalidate>
        {!! csrf_field() !!}
        <div class="card">
          <div class="card-header bg-dark text-white">
            買取申込内容
          </div>
          <div class="card-body">

            @if(isset($_SERVER['HTTP_X_FORWARDED_HOST']))
              @if(stristr($_SERVER['HTTP_X_FORWARDED_HOST'], "brandkaimasu.com"))
                <img src="{{ env('IMG_FOLDER') }}/brand/no_brand_pc.jpg" />
                <div class="form-group row">
                  @php($item_name = 'brand_confirm')
                  <label class="col-md-3 col-form-label row">
                    <span class="badge badge-danger">必須</span>
                    買取不可ブランド
                  </label>
                  <div class="col-md-8">
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
                        買取不可ブランドに同意する。
                      </label>
                      <div class="valid-feedback">
                        入力済みです。
                      </div>
                      <div class="invalid-feedback">
                        買取不可ブランドに同意してください。
                      </div>
                    </div>

                  </div>
                </div><!-- end form-group -->
              @endif
            @endif
              <div class="form-group row">
                @php($item_name = 'number_of_times')
                <label class="col-md-3 col-form-label row">
                  ご利用回数
                </label>
                <div class="col-md-8">
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-yellow
                    @if((old($item_name) == "はじめて") OR (old($item_name) == "")) active @endif
                    ">
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
                    <label class="btn btn-yellow
                    @if(old($item_name) == "2回目以降") active @endif
                    ">
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

              <div class="form-group row need_kit_space">
                @php($item_name = 'need_kit')
                <label class="col-md-3 col-form-label row">
                  梱包キット
                </label>
                <div class="col-md-8">
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-yellow
                    @if((old($item_name) == "希望しない") OR (old($item_name) == "")) active @endif
                    ">
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

                    <label class="btn btn-yellow
                    @if(old($item_name) == "希望する") active @endif
                    ">
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
                </div>
              </div><!-- end form-group -->


              <div role="alert" class="alert alert-warning">
                  <strong>配送補償について</strong><br>
                  全ての宅配便に予め30万円までの配送補償をお付け致しております。<br>
                  それ以上は、梱包キットを希望し補償額を設定してください。
              </div>

              @php($item_name = 'kit_sum')
              <input
                type="text"
                name="{{ $item_name }}"
                id="{{ $item_name }}"
                value="{{ old($item_name) }}"
                class="form-control"
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

              <div class="card" id="kit_select_area">
                <div class="card-header">
                  梱包キットの選択をしてください。
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="kit_select_box col-sm-12 col-md-3">
                      <div class="kit_image">
                        <img
                          style="width: 150px;"
                          src="{{ env('IMG_FOLDER') }}/kit_main/s_01.jpg"
                          data-toggle="modal" data-target="#kit_s_modal"
                        />
                        <div class="text-center">Sサイズ</div>
                      </div>
                      <div class="row kit_count_row">
              					<div class="col kit_down btn btn-yellow">－</div>
                        <div class="col kit_number">
                          @php($kit_size = "s")
                          @php($item_name = "kit_count_".$kit_size)
                          <input
                            type="text"
                            class="kit_num_data"
                            data="{{ $kit_size }}"
                            name="{{ $item_name }}"
                            id="{{ $item_name }}"
                            value="{{ old($item_name, 0) }}"
                            readonly
                          />
                        </div>
                        <div class="col kit_up btn btn-yellow">＋</div>
                      </div>
            				</div>

                    <div class="kit_select_box col-sm-12 col-md-3">
                      <div class="kit_image">
                        <img
                          style="width: 150px;"
                          src="{{ env('IMG_FOLDER') }}/kit_main/m_01.jpg"
                          data-toggle="modal" data-target="#kit_m_modal"
                        />
                      </div>
                      <div class="row kit_count_row">
                        <div class="col-12 text-center">Mサイズ</div>
              					<div class="col kit_down btn btn-yellow">－</div>
                        <div class="col kit_number">
                          @php($kit_size = "m")
                          @php($item_name = "kit_count_".$kit_size)
                          <input
                            type="text"
                            class="kit_num_data"
                            data="{{ $kit_size }}"
                            name="{{ $item_name }}"
                            id="{{ $item_name }}"
                            value="{{ old($item_name, 0) }}"
                            readonly
                          />
                        </div>
                        <div class="col kit_up btn btn-yellow">＋</div>
                      </div>
            				</div>

                    <div class="kit_select_box col-sm-12 col-md-3">
                      <div class="kit_image">
                        <img
                          style="width: 150px;"
                          src="{{ env('IMG_FOLDER') }}/kit_main/l_01.jpg"
                          data-toggle="modal" data-target="#kit_l_modal"
                        />
                      </div>
                      <div class="row kit_count_row">
                        <div class="col-12 text-center">Lサイズ</div>
              					<div class="col kit_down btn btn-yellow">－</div>
                        <div class="col kit_number">
                          @php($kit_size = "l")
                          @php($item_name = "kit_count_".$kit_size)
                          <input
                            type="text"
                            class="kit_num_data"
                            data="{{ $kit_size }}"
                            name="{{ $item_name }}"
                            id="{{ $item_name }}"
                            value="{{ old($item_name, 0) }}"
                            readonly
                          />
                        </div>
                        <div class="col kit_up btn btn-yellow">＋</div>
                      </div>
            				</div>
                    <!-- <div class="kit_select_box col-sm-12 col-md-3">
                      <div class="kit_image">
                        <img
                          style="width: 150px;"
                          src="{{ env('IMG_FOLDER') }}/kit_main/d_01.jpg"
                          data-toggle="modal" data-target="#kit_d_modal"
                        />
                      </div>
                      <div class="row kit_count_row">
                        <div class="col-12 text-center">着払い伝票のみ</div>
              					<div class="col kit_down btn btn-yellow">－</div>
                        <div class="col kit_number">
                          @php($kit_size = "d")
                          @php($item_name = "kit_count_".$kit_size)
                          <input
                            type="text"
                            class="kit_num_data"
                            data="{{ $kit_size }}"
                            name="{{ $item_name }}"
                            id="{{ $item_name }}"
                            value="{{ old($item_name, 0) }}"
                            readonly
                          />
                        </div>
                        <div class="col kit_up btn btn-yellow">＋</div>
                      </div>
            				</div> -->

                    <div class="kit_select_box col-sm-12 col-md-3">
                      <div class="kit_image">
                        <img
                          style="width: 150px;"
                          src="{{ env('IMG_FOLDER') }}/kit_main/k_01.jpg"
                          data-toggle="modal" data-target="#kit_k_modal"
                        />
                      </div>
                      <div class="row kit_count_row">
                        <div class="col-12 text-center">クッション封筒</div>
              					<div class="col kit_down btn btn-yellow">－</div>
                        <div class="col kit_number">
                          @php($kit_size = "k")
                          @php($item_name = "kit_count_".$kit_size)
                          <input
                            type="text"
                            class="kit_num_data"
                            data="{{ $kit_size }}"
                            name="{{ $item_name }}"
                            id="{{ $item_name }}"
                            value="{{ old($item_name, 0) }}"
                            readonly
                          />
                        </div>
                        <div class="col kit_up btn btn-yellow">＋</div>
                      </div>
            				</div>
                  </div>
                </div>
              </div>

              <div class="form-group row" id="time_select_none_row">
                @php($item_name = 'time_select_none')
                <label class="col-md-3 col-form-label row">
                  配送日時指定
                </label>
                <div class="col-md-8">
                  <div class="btn-group btn-group-toggle flex-direction-column" data-toggle="buttons">
                    <label class="btn btn-yellow
                    @if((old($item_name) == "指定しない") OR (old($item_name) == "")) active @endif
                    ">
                      <input
                        type="radio"
                        name="{{ $item_name }}"
                        id="{{ $item_name }}_1"
                        autocomplete="off"
                        value="指定しない"
                        @if((old($item_name) == "指定しない") OR (old($item_name) == "")) checked @endif
                        onchange="kit_calender_view()"
                       >
                       指定しない<strong>(最短翌日配送!!)</strong>
                    </label>
                    <label class="btn btn-yellow
                    @if((old($item_name) == "指定する") OR (old($item_name) == "")) active @endif
                    ">
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

              <div class="form-group row" id="time_select_hidden_row">
                @php($item_name = 'time_select_hidden')
                <label class="col-md-3 col-form-label row">
                  配送希望日時
                </label>
                <div class="col-md-8">
                  <input
                    type="text"
                    class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }}"
                    name="{{ $item_name }}"
                    id="{{ $item_name }}"
                    value="{{ old($item_name) }}"
                    aria-describedby="{{ $item_name }}HelpBlock"
                    placeholder="こちらをクリックして日時を選択してください。"
                    data-toggle="modal" data-target="#time_calender_boxModal"
                    autocomplete="off"
                    readonly
                  >
                  <div class="valid-feedback">
                    入力済みです。
                  </div>
                  <div class="invalid-feedback">
                    配送希望日時を入力してください。
                  </div>
                  @if ($errors->has($item_name))
                    <div class="invalid-feedback">
                      <strong>{{ $errors->first($item_name) }}</strong>
                    </div>
                  @endif
                </div>
              </div><!-- end form-group -->
              <div class="modal fade" id="time_calender_boxModal" tabindex="-1" role="dialog" aria-labelledby="time_calender_boxModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">梱包キットの配送希望日時</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <table id="time_calender_box" class="text-center">
                        <tr>
                          <th rowspan="2">日時</th>
                          <th colspan="7"><?=$kongetu?></th>
                        </tr>


                        <tr>
                          <th ><?=$td_day[2]?></th>
                          <th ><?=$td_day[3]?></th>
                          <th ><?=$td_day[4]?></th>
                          <th ><?=$td_day[5]?></th>
                          <th ><?=$td_day[6]?></th>
                          <th ><?=$td_day[7]?></th>
                          <th ><?=$td_day[8]?></th>
                        </tr>
                        <tr>
                          <th class="left_th"><?=$sel[1]?></th>
                          <td class="day_time_sel" id="<?=$month[2].'/'.$day[2].'('.$wday[2].') '.$sel[1]?>"><?=$basic_tomorroww_all?></td>
                          <td class="day_time_sel" id="<?=$month[3].'/'.$day[3].'('.$wday[3].') '.$sel[1]?>"><?=$basic_two_days_later_all?></td>
                          <td class="day_time_sel" id="<?=$month[4].'/'.$day[4].'('.$wday[4].') '.$sel[1]?>"><?=$basic_three_days_later_all?></td>
                          <td class="day_time_sel" id="<?=$month[5].'/'.$day[5].'('.$wday[5].') '.$sel[1]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?=$month[6].'/'.$day[6].'('.$wday[6].') '.$sel[1]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?=$month[7].'/'.$day[7].'('.$wday[7].') '.$sel[1]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?=$month[8].'/'.$day[8].'('.$wday[8].') '.$sel[1]?>"><span class='ok_time'>◎</span></td>
                        </tr>
                        <tr>
                          <th class="left_th"><?=$sel[2]?></th>
                          <td class="day_time_sel" id="<?=$month[2].'/'.$day[2].'('.$wday[2].') '.$sel[2]?>"><?=$basic_tomorroww_all?></td>
                          <td class="day_time_sel" id="<?=$month[3].'/'.$day[3].'('.$wday[3].') '.$sel[2]?>"><?=$basic_two_days_later_all?></td>
                          <td class="day_time_sel" id="<?=$month[4].'/'.$day[4].'('.$wday[4].') '.$sel[2]?>"><?=$basic_three_days_later_all?></td>
                          <td class="day_time_sel" id="<?=$month[5].'/'.$day[5].'('.$wday[5].') '.$sel[2]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?=$month[6].'/'.$day[6].'('.$wday[6].') '.$sel[2]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?=$month[7].'/'.$day[7].'('.$wday[7].') '.$sel[2]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?=$month[8].'/'.$day[8].'('.$wday[8].') '.$sel[2]?>"><span class='ok_time'>◎</span></td>
                        </tr>
                        <tr>
                          <th class="left_th"><?=$sel[3]?></th>
                          <td class="day_time_sel" id="<?=$month[2].'/'.$day[2].'('.$wday[2].') '.$sel[3]?>"><?=$basic_tomorroww_all?></td>
                          <td class="day_time_sel" id="<?=$month[3].'/'.$day[3].'('.$wday[3].') '.$sel[3]?>"><?=$basic_two_days_later_all?></td>
                          <td class="day_time_sel" id="<?=$month[4].'/'.$day[4].'('.$wday[4].') '.$sel[3]?>"><?=$basic_three_days_later_all?></td>
                          <td class="day_time_sel" id="<?=$month[5].'/'.$day[5].'('.$wday[5].') '.$sel[3]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?=$month[6].'/'.$day[6].'('.$wday[6].') '.$sel[3]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?=$month[7].'/'.$day[7].'('.$wday[7].') '.$sel[3]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?=$month[8].'/'.$day[8].'('.$wday[8].') '.$sel[3]?>"><span class='ok_time'>◎</span></td>
                        </tr>
                        <tr>
                          <th class="left_th"><?=$sel[4]?></th>
                          <td class="day_time_sel" id="<?=$month[2].'/'.$day[2].'('.$wday[2].') '.$sel[4]?>"><?=$basic_tomorroww_all?></td>
                          <td class="day_time_sel" id="<?=$month[3].'/'.$day[3].'('.$wday[3].') '.$sel[4]?>"><?=$basic_two_days_later_all?></td>
                          <td class="day_time_sel" id="<?=$month[4].'/'.$day[4].'('.$wday[4].') '.$sel[4]?>"><?=$basic_three_days_later_all?></td>
                          <td class="day_time_sel" id="<?=$month[5].'/'.$day[5].'('.$wday[5].') '.$sel[4]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?=$month[6].'/'.$day[6].'('.$wday[6].') '.$sel[4]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?=$month[7].'/'.$day[7].'('.$wday[7].') '.$sel[4]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?=$month[8].'/'.$day[8].'('.$wday[8].') '.$sel[4]?>"><span class='ok_time'>◎</span></td>
                        </tr>
                        <tr>
                          <th class="left_th"><?=$sel[5]?></th>
                          <td class="day_time_sel" id="<?=$month[2].'/'.$day[2].'('.$wday[2].') '.$sel[5]?>"><?=$basic_tomorroww_all?></td>
                          <td class="day_time_sel" id="<?=$month[3].'/'.$day[3].'('.$wday[3].') '.$sel[5]?>"><?=$basic_two_days_later_all?></td>
                          <td class="day_time_sel" id="<?=$month[4].'/'.$day[4].'('.$wday[4].') '.$sel[5]?>"><?=$basic_three_days_later_all?></td>
                          <td class="day_time_sel" id="<?=$month[5].'/'.$day[5].'('.$wday[5].') '.$sel[5]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?=$month[6].'/'.$day[6].'('.$wday[6].') '.$sel[5]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?=$month[7].'/'.$day[7].'('.$wday[7].') '.$sel[5]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?=$month[8].'/'.$day[8].'('.$wday[8].') '.$sel[5]?>"><span class='ok_time'>◎</span></td>
                        </tr>




                        <!-- <tr>
                          <th >8/18<br>(火)</th>
                          <th >8/19<br>(水)</th>
                          <th >8/20<br>(木)</th>
                          <th >8/21<br>(金)</th>
                          <th >8/22<br>(土)</th>
                          <th >8/23<br>(日)</th>
                          <th >8/24<br>(月)</th>
                        </tr>
                        <tr>
                          <th class="left_th"><?=$sel[1]?></th>
                          <td class="day_time_sel" id="<?='8/18(火) '.$sel[1]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/19(水) '.$sel[1]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/20(木) '.$sel[1]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/21(金) '.$sel[1]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/22(土) '.$sel[1]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/23(日) '.$sel[1]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/24(月) '.$sel[1]?>"><span class='ok_time'>◎</span></td>
                        </tr>
                        <tr>
                          <th class="left_th"><?=$sel[2]?></th>
                          <td class="day_time_sel" id="<?='8/18(火) '.$sel[2]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/19(水) '.$sel[2]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/20(木) '.$sel[2]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/21(金) '.$sel[2]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/22(土) '.$sel[2]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/23(日) '.$sel[2]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/24(月) '.$sel[2]?>"><span class='ok_time'>◎</span></td>
                        </tr>
                        <tr>
                          <th class="left_th"><?=$sel[3]?></th>
                          <td class="day_time_sel" id="<?='8/18(火) '.$sel[3]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/19(水) '.$sel[3]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/20(木) '.$sel[3]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/21(金) '.$sel[3]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/22(土) '.$sel[3]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/23(日) '.$sel[3]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/24(月) '.$sel[3]?>"><span class='ok_time'>◎</span></td>
                        </tr>
                        <tr>
                          <th class="left_th"><?=$sel[4]?></th>
                          <td class="day_time_sel" id="<?='8/18(火) '.$sel[4]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/19(水) '.$sel[4]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/20(木) '.$sel[4]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/21(金) '.$sel[4]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/22(土) '.$sel[4]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/23(日) '.$sel[4]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/24(月) '.$sel[4]?>"><span class='ok_time'>◎</span></td>
                        </tr>
                        <tr>
                          <th class="left_th"><?=$sel[5]?></th>
                          <td class="day_time_sel" id="<?='8/18(火) '.$sel[5]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/19(水) '.$sel[5]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/20(木) '.$sel[5]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/21(金) '.$sel[5]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/22(土) '.$sel[5]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/23(日) '.$sel[5]?>"><span class='ok_time'>◎</span></td>
                          <td class="day_time_sel" id="<?='8/24(月) '.$sel[5]?>"><span class='ok_time'>◎</span></td>
                        </tr> -->

                      </table>
                      <small id="{{ $item_name }}HelpBlock" class="form-text text-muted">
                        ※配送業者の混雑状況により、ご希望に沿えない場合がございます。
                      </small>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group row" id="insurance_row">
                @php($item_name = 'insurance')
                <label class="col-md-3 col-form-label row">
                  配送補償
                </label>
                <div class="col-md-8">
                  <div class="btn-group btn-group-toggle flex-direction-column" data-toggle="buttons">
                    <label class="btn btn-yellow
                    @if((old($item_name) == "なし") OR (old($item_name) == "")) active @endif
                    ">
                      <input
                        type="radio"
                        name="{{ $item_name }}"
                        id="{{ $item_name }}_1"
                        autocomplete="off"
                        value="なし"
                        @if((old($item_name) == "なし") OR (old($item_name) == "")) checked @endif
                        onchange="insurance_select()"
                       >
                       なし
                    </label>
                    <label class="btn btn-yellow
                    @if((old($item_name) == "あり") OR (old($item_name) == "")) active @endif
                    ">
                      <input
                        type="radio"
                        name="{{ $item_name }}"
                        id="{{ $item_name }}_2"
                        autocomplete="off"
                        value="あり"
                        @if(old($item_name) == "あり") checked @endif
                        onchange="insurance_select()"
                      >
                      あり（日時指定無効）
                    </label>
                    <small id="{{ $item_name }}HelpBlock" class="form-text text-muted">
                      30万円以上を選択された場合、専用伝票をご用意する為、お申し込みから4日前後でキットを発送致します。
                    </small>
                  </div>
                  @if ($errors->has($item_name))
                    <div class="invalid-feedback">
                      <strong>{{ $errors->first($item_name) }}</strong>
                    </div>
                  @endif
                </div>
              </div><!-- end form-group -->

              <div class="form-group row" id="insurance_kingaku_row">
                @php($item_name = 'insurance_kingaku')
                <label class="col-md-3 col-form-label row">
                  配送補償対象金額
                </label>
                <div class="col-md-8">
                  <select
                    class="mb-3 form-control"
                    name="{{ $item_name }}"
                    id="{{ $item_name }}"
                  >
                    <option value="">選択してください。</option>
                    @foreach($haisou_hosyou as $val)
                    <option value="{{ str_replace(",","",$val) }}" @if($val == old($item_name)) selected @endif >{{ $val }}</option>
                    @endforeach
                  </select>
                  <small id="{{ $item_name }}HelpBlock" class="form-text text-muted">
                    ご希望の配送補償金額を設定してください。<br>
                    なお、成約金額1万円につき10円(税抜)をご負担頂いております。
                  </small>
                  @if ($errors->has($item_name))
                    <div class="invalid-feedback">
                      aaaaaaaaaaaaa
                      <strong>{{ $errors->first($item_name) }}</strong>
                    </div>
                  @endif
                </div>
              </div><!-- end form-group -->


              <div class="form-group row" id="speed_box_row">
                @php($item_name = 'speed_box')
                <label class="col-md-3 col-form-label row">
                  発送予定箱数
                </label>
                <div class="col-md-8">
                  <select
                    class="custom-select custom-select-lg mb-3"
                    name="{{ $item_name }}"
                    id="{{ $item_name }}"
                  >
                    <option value="" >選択してください。</option>
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

              <div class="form-group row" id="date_and_time_hidden_row">
                @php($item_name = 'date_and_time_hidden')
                <label class="col-md-3 col-form-label row">
                  集荷希望日時
                </label>
                <div class="col-md-8">

                  <input
                    type="text"
                    class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }}"
                    name="{{ $item_name }}"
                    id="{{ $item_name }}"
                    value="{{ old($item_name) }}"
                    aria-describedby="{{ $item_name }}HelpBlock"
                    placeholder="こちらをクリックして日時を選択してください。"
                    data-toggle="modal" data-target="#calender_boxModal"
                    autocomplete="off"
                    readonly
                  >
                  <div class="valid-feedback">
                    入力済みです。
                  </div>
                  <div class="invalid-feedback">
                    集荷希望日時を入力してください。
                  </div>
                  @if ($errors->has($item_name))
                    <div class="invalid-feedback">
                      <strong>{{ $errors->first($item_name) }}</strong>
                    </div>
                  @endif
                </div>
              </div><!-- end form-group -->
              <div class="modal fade" id="calender_boxModal" tabindex="-1" role="dialog" aria-labelledby="calender_boxModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="calender_boxModalLabel">集荷希望日時</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="calender_alert alert alert-warning">15時以降のお申込みは最短翌々日の集荷です。</div>
                      <table id="calender_box" class="text-center">
                  			<tr>
                  				<th rowspan="2">日時</th>
                  				<th colspan="7">{{ $kongetu }}</th>
                  			</tr>
                  			<tr>
                  				<th >{!! $td_day[1] !!}</th>
                  				<th >{!! $td_day[2] !!}</th>
                  				<th >{!! $td_day[3] !!}</th>
                  				<th >{!! $td_day[4] !!}</th>
                  				<th >{!! $td_day[5] !!}</th>
                  				<th >{!! $td_day[6] !!}</th>
                  				<th >{!! $td_day[7] !!}</th>
                  			</tr>
                  			<tr>
                  				<th class="left_th">{!! $sel[1] !!}</th>
                  				<td class="day_time_sel" id="{{ $month[1].'/'.$day[1].'('.$wday[1].') '.$sel[1] }}">{!! $today_time[1] !!}</td>
                  				<td class="day_time_sel" id="{{ $month[2].'/'.$day[2].'('.$wday[2].') '.$sel[1] }}">{!! $tomorroww_morning !!}</td>
                  				<td class="day_time_sel" id="{{ $month[3].'/'.$day[3].'('.$wday[3].') '.$sel[1] }}">{!! $two_days_later_morning !!}</td>
                  				<td class="day_time_sel" id="{{ $month[4].'/'.$day[4].'('.$wday[4].') '.$sel[1] }}"><span class='ok_time'>◎</span></td>
                  				<td class="day_time_sel" id="{{ $month[5].'/'.$day[5].'('.$wday[5].') '.$sel[1] }}"><span class='ok_time'>◎</span></td>
                  				<td class="day_time_sel" id="{{ $month[6].'/'.$day[6].'('.$wday[6].') '.$sel[1] }}"><span class='ok_time'>◎</span></td>
                  				<td class="day_time_sel" id="{{ $month[7].'/'.$day[7].'('.$wday[7].') '.$sel[1] }}"><span class='ok_time'>◎</span></td>
                  			</tr>
                  			<tr>
                  				<th class="left_th">{!! $sel[2] !!}</th>
                  				<td class="day_time_sel" id="{{ $month[1].'/'.$day[1].'('.$wday[1].') '.$sel[2] }}">{!! $today_time[2] !!}</td>
                  				<td class="day_time_sel" id="{{ $month[2].'/'.$day[2].'('.$wday[2].') '.$sel[2] }}">{!! $tomorroww_all !!}</td>
                  				<td class="day_time_sel" id="{{ $month[3].'/'.$day[3].'('.$wday[3].') '.$sel[2] }}">{!! $two_days_later_all !!}</td>
                  				<td class="day_time_sel" id="{{ $month[4].'/'.$day[4].'('.$wday[4].') '.$sel[2] }}"><span class='ok_time'>◎</span></td>
                  				<td class="day_time_sel" id="{{ $month[5].'/'.$day[5].'('.$wday[5].') '.$sel[2] }}"><span class='ok_time'>◎</span></td>
                  				<td class="day_time_sel" id="{{ $month[6].'/'.$day[6].'('.$wday[6].') '.$sel[2] }}"><span class='ok_time'>◎</span></td>
                  				<td class="day_time_sel" id="{{ $month[7].'/'.$day[7].'('.$wday[7].') '.$sel[2] }}"><span class='ok_time'>◎</span></td>
                  			</tr>
                  			<tr>
                  				<th class="left_th">{!! $sel[3] !!}</th>
                  				<td class="day_time_sel" id="{{ $month[1].'/'.$day[1].'('.$wday[1].') '.$sel[3] }}">{!! $today_time[3] !!}</td>
                  				<td class="day_time_sel" id="{{ $month[2].'/'.$day[2].'('.$wday[2].') '.$sel[3] }}">{!! $tomorroww_all !!}</td>
                  				<td class="day_time_sel" id="{{ $month[3].'/'.$day[3].'('.$wday[3].') '.$sel[3] }}">{!! $two_days_later_all !!}</td>
                  				<td class="day_time_sel" id="{{ $month[4].'/'.$day[4].'('.$wday[4].') '.$sel[3] }}"><span class='ok_time'>◎</span></td>
                  				<td class="day_time_sel" id="{{ $month[5].'/'.$day[5].'('.$wday[5].') '.$sel[3] }}"><span class='ok_time'>◎</span></td>
                  				<td class="day_time_sel" id="{{ $month[6].'/'.$day[6].'('.$wday[6].') '.$sel[3] }}"><span class='ok_time'>◎</span></td>
                  				<td class="day_time_sel" id="{{ $month[7].'/'.$day[7].'('.$wday[7].') '.$sel[3] }}"><span class='ok_time'>◎</span></td>
                  			</tr>
                  			<tr>
                  				<th class="left_th">{!! $sel[4] !!}</th>
                  				<td class="day_time_sel" id="{{ $month[1].'/'.$day[1].'('.$wday[1].') '.$sel[4] }}">{!! $today_time[4] !!}</td>
                  				<td class="day_time_sel" id="{{ $month[2].'/'.$day[2].'('.$wday[2].') '.$sel[4] }}">{!! $tomorroww_all !!}</td>
                  				<td class="day_time_sel" id="{{ $month[3].'/'.$day[3].'('.$wday[3].') '.$sel[4] }}">{!! $two_days_later_all !!}</td>
                  				<td class="day_time_sel" id="{{ $month[4].'/'.$day[4].'('.$wday[4].') '.$sel[4] }}"><span class='ok_time'>◎</span></td>
                  				<td class="day_time_sel" id="{{ $month[5].'/'.$day[5].'('.$wday[5].') '.$sel[4] }}"><span class='ok_time'>◎</span></td>
                  				<td class="day_time_sel" id="{{ $month[6].'/'.$day[6].'('.$wday[6].') '.$sel[4] }}"><span class='ok_time'>◎</span></td>
                  				<td class="day_time_sel" id="{{ $month[7].'/'.$day[7].'('.$wday[7].') '.$sel[4] }}"><span class='ok_time'>◎</span></td>
                  			</tr>
                  			<tr>
                  				<th class="left_th">{!! $sel[5] !!}</th>
                  				<td class="day_time_sel" id="{{ $month[1].'/'.$day[1].'('.$wday[1].') '.$sel[5] }}">{!! $today_time[5] !!}</td>
                  				<td class="day_time_sel" id="{{ $month[2].'/'.$day[2].'('.$wday[2].') '.$sel[5] }}">{!! $tomorroww_all !!}</td>
                  				<td class="day_time_sel" id="{{ $month[3].'/'.$day[3].'('.$wday[3].') '.$sel[5] }}">{!! $two_days_later_all !!}</td>
                  				<td class="day_time_sel" id="{{ $month[4].'/'.$day[4].'('.$wday[4].') '.$sel[5] }}"><span class='ok_time'>◎</span></td>
                  				<td class="day_time_sel" id="{{ $month[5].'/'.$day[5].'('.$wday[5].') '.$sel[5] }}"><span class='ok_time'>◎</span></td>
                  				<td class="day_time_sel" id="{{ $month[6].'/'.$day[6].'('.$wday[6].') '.$sel[5] }}"><span class='ok_time'>◎</span></td>
                  				<td class="day_time_sel" id="{{ $month[7].'/'.$day[7].'('.$wday[7].') '.$sel[5] }}"><span class='ok_time'>◎</span></td>
                  			</tr>
                  		</table>
                      <small id="{{ $item_name }}HelpBlock" class="form-text text-muted">
                        ※配送業者の混雑状況により、ご希望に沿えない場合がございます。
                      </small>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div><!-- end card -->
        <div class="card">
        <div class="card-header bg-dark text-white">
          お客様情報
        </div>
        <div class="card-body">
          <div class="row justify-content-md-center">
            <div class="alert alert-danger col-md-6">
              身分証に記載の情報をご入力ください。
            </div>
          </div>
          <div class="row justify-content-md-center">
            <div class="col-md-6">
              <img src="{{ env('IMG_FOLDER') }}/license.png" alt="">
            </div>
          </div>
          <div class="row justify-content-md-center form-group">
            <small id="{{ $item_name }}HelpBlock" class="form-text text-muted">
              身分証は保険証やパスポート、マイナンバーカードなども有効です。
            </small>
          </div>


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
                value="{{ old($item_name) }}"
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
                value="{{ old($item_name) }}"
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
                <img src="{{ env('IMG_FOLDER') }}/tel.png" style="width: 30px;">
              </div>
            </label>
            <div class="col-md-8">
              <input
                type="tel"
                class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }}"
                name="{{ $item_name }}"
                id="{{ $item_name }}"
                value="{{ old($item_name) }}"
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
                value="{{ old($item_name) }}"
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
            @php($item_name = 'user_yuubinn')
            <label class="col-md-3 col-form-label row">
              <div class="row align-items-center justify-content-center m-0 w-100">
                <div class="col-7 col-sm-12 p-0">
                  <span class="badge badge-danger m-0">必須</span>
                  <span>郵便番号</span>
                  <img
                    src="{{ env('IMG_FOLDER') }}/zip.png"
                    class="p-2"
                    style="width: 30px;"
                  >
                </div>
                <div class="col-5 col-sm-12 p-0">
                  <a
                    class="btn btn-primary p-1"
                    style="font-size: 12px; color: #fff;"
                    onclick="window.open('http://www.post.japanpost.jp/zipcode/','','scrollbars=yes');"
                    rel="nofollow"
                  >郵便番号検索</a>
                </div>
              </div>
            </label>
            <div class="col-md-8">
              <input
                type="text"
                class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }}"
                name="{{ $item_name }}"
                id="{{ $item_name }}"
                value="{{ old($item_name) }}"
                required
                aria-describedby="{{ $item_name }}HelpBlock"
                placeholder="例）1700013"
              >
              <div class="valid-feedback">
                入力済みです。
              </div>
              <div class="invalid-feedback">
                郵便番号を入力してください
              </div>
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
          </div><!-- end form-group -->

          <div class="form-group row">
            @php($item_name = 'user_todou')
            <label class="col-md-3 col-form-label row">
              <span class="badge badge-danger">必須</span>
              都道府県
            </label>
            <div class="col-md-8">
              <select
                class="custom-select custom-select-lg mb-3"
                name="{{ $item_name }}"
                id="{{ $item_name }}"
                required
              >
                <option value="">都道府県を選ぶ</option>
                @foreach($todouhuken as $val)
                <option value="{{ $val }}" @if($val == old($item_name)) selected @endif >{{ $val }}</option>
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

          <div class="form-group row">
            @php($item_name = 'user_sikutyouson')
            <label class="col-md-3 col-form-label row">
              <span class="badge badge-danger">必須</span>
              市区郡
            </label>
            <div class="col-md-8">
              <input
                type="text"
                class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }}"
                name="{{ $item_name }}"
                id="{{ $item_name }}"
                value="{{ old($item_name) }}"
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

          <div class="form-group row">
            @php($item_name = 'user_banti')
            <label class="col-md-3 col-form-label row">
              <span class="badge badge-danger">必須</span>
              町村名・番地
            </label>
            <div class="col-md-8">
              <input
                type="text"
                class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }}"
                name="{{ $item_name }}"
                id="{{ $item_name }}"
                value="{{ old($item_name) }}"
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

          <div class="form-group row">
            @php($item_name = 'user_building')
            <label class="col-md-3 col-form-label row">
              <span class="badge badge-secondary">任意</span>
              建物名
            </label>
            <div class="col-md-8">
              <input
                type="text"
                class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }}"
                name="{{ $item_name }}"
                id="{{ $item_name }}"
                value="{{ old($item_name) }}"
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


          <div class="form-group row">
            @php($item_name = 'tel_mail_line')
            <label class="col-md-3 col-form-label row">
              希望連絡方法
            </label>
            <div class="col-md-8">
              <div class="btn-group btn-group-toggle flex-direction-column" data-toggle="buttons">
                <label class="btn btn-yellow
                @if((old($item_name) == "LINE") OR (old($item_name) == "")) active @endif
                ">
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
                <label class="btn btn-yellow
                @if(old($item_name) == "メール") active @endif
                ">
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
                <label class="btn btn-yellow
                @if(old($item_name) == "電話") active @endif
                ">
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
              事前査定
            </label>
            <div class="col-md-8">
              <div class="btn-group btn-group-toggle flex-direction-column" data-toggle="buttons">
                <label class="btn btn-yellow
                @if((old($item_name) == "事前査定なし") OR (old($item_name) == "")) active @endif
                ">
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
                <label class="btn btn-yellow
                @if(old($item_name) == "LINE査定") active @endif
                ">
                  <input
                    type="radio"
                    name="{{ $item_name }}"
                    id="{{ $item_name }}_2"
                    autocomplete="off"
                    value="LINE査定"
                    @if(old($item_name) == "LINE査定") checked @endif
                  >
                  LINE査定
                </label>
                <label class="btn btn-yellow
                @if(old($item_name) == "メール査定") active @endif
                ">
                  <input
                    type="radio"
                    name="{{ $item_name }}"
                    id="{{ $item_name }}_3"
                    autocomplete="off"
                    value="メール査定"
                    @if(old($item_name) == "メール査定") checked @endif
                  >
                  メール査定
                </label>
                <label class="btn btn-yellow
                @if(old($item_name) == "電話で見積もり") active @endif
                ">
                  <input
                    type="radio"
                    name="{{ $item_name }}"
                    id="{{ $item_name }}_4"
                    autocomplete="off"
                    value="電話で見積もり"
                    @if(old($item_name) == "電話で見積もり") checked @endif
                  >
                  電話で見積もり
                </label>
                <label class="btn btn-yellow
                @if(old($item_name) == "チャットで見積もり") active @endif
                ">
                  <input
                    type="radio"
                    name="{{ $item_name }}"
                    id="{{ $item_name }}_5"
                    autocomplete="off"
                    value="チャットで見積もり"
                    @if(old($item_name) == "チャットで見積もり") checked @endif
                  >
                  チャットで見積もり
                </label>
              </div>
              <div class="alert alert-success">
                ※LINE査定をご利用頂いたお客様へ<br>
                <br>
                LINE査定のお見積り金額を参考にさせて頂く為、お申し込み後、当社公式ライン宛（@rifa）に<strong>「お申し込み時のお名前・メールアドレス」</strong>をお送りください。
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
                class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }}"
                name="{{ $item_name }}"
                value="{{ old($item_name) }}"
                aria-describedby="{{ $item_name }}HelpBlock"
                placeholder="例）ご質問・ご要望・商品情報など自由にご入力ください。
お友だち紹介キャンペーンをご利用の際は、
ご紹介者様のお名前と都道府県をご記入ください。"
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
            <label class="col-md-10 col-sm-12 col-form-label p-0">
              <span class="badge badge-danger">必須</span>
              利用規約とプライバシーポリシー(個人情報取扱い通知事項)
            </label>
            <div class="col-md-10 col-sm-12 p-0">
              <p>
                以下の内容に同意の上、「同意する。」にチェックしてください。
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
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#privacy_box" aria-expanded="false" aria-controls="privacy_box">
                        ▼プライバシーポリシー(個人情報取扱い通知事項)
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
            <div class="col-md-10 col-sm-12 p-0">
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
                  利用規約・プライバシーポリシーに同意する。
                </label>
                <div class="valid-feedback">
                  入力済みです。
                </div>
                <div class="invalid-feedback">
                  利用規約・プライバシーポリシーに同意してください。
                </div>
              </div>

              <div role="alert" class="alert alert-warning">
                <div id="{{ $item_name }}HelpBlock" class="form-text text-muted">
                  -- キャンセル料,返送料は原則無料です。<br>
                  <strong>全てのお品物に金額が付かなかった場合</strong>は、<strong>「着払い」にてご返却</strong>させていただいております。
                  ただし、<strong>一点でもお値段がつけば弊社「元払い」にてご返却</strong>いたします。
                  予め了承ください。
                </div>
              </div>
              @if ($errors->has($item_name))
                <div class="invalid-feedback">
                  <strong>{{ $errors->first($item_name) }}</strong>
                </div>
              @endif
            </div>
          </div><!-- end form-group -->


          <input
            type="submit"
            name=""
            value="入力内容を送信する"
            class="btn btn-primary btn-lg submit_btn"
          >


          <div class="alert alert-light p-0" role="alert">
            携帯電話のドメイン指定受信をされているお客様につきましては「urlounge.co.jp」を受信指定してください。<br>
            設定をされていない場合、弊社からのメールが届きませんのでご確認ください。<br>
            携帯電話のドメイン指定外拒否をされているお客様は一時的に解除をお願いします。<br>
            パソコンのアドレスを返信用アドレスとしてご入力された場合は、<br>
            弊社からの連絡が迷惑メールフォルダなどに入る場合がございます。<br>
            確認をお願いいたします。
          </div>


          <div class="accordion" id="accordionAnkeeto">
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
                    <div class="btn-group-toggle flex-direction-column" data-toggle="buttons">
                      <label class="btn btn-yellow
                      @if(old($item_name) == "yahoo") active @endif
                      ">
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
                      <label class="btn btn-yellow
                      @if(old($item_name) == "google") active @endif
                      ">
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
                      <label class="btn btn-yellow
                      @if(old($item_name) == "その他") active @endif
                      ">
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
                  </div><!-- end form-group -->
                  <div class="form-group row">
                    <label class="col-md-12 col-form-label row">
                      どのデバイスを利用して当サイトをご覧になりましたか？
                    </label>
                    <div class="col-md-12">
                      @php($item_name = 'anke_2')
                      <div class="btn-group btn-group-toggle flex-direction-column" data-toggle="buttons">
                        <label class="btn btn-yellow
                        @if(old($item_name) == "パソコン") active @endif
                        ">
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
                        <label class="btn btn-yellow
                        @if(old($item_name) == "スマートフォン") active @endif
                        ">
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
                        <label class="btn btn-yellow
                        @if(old($item_name) == "タブレット") active @endif
                        ">
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
                        <label class="btn btn-yellow
                        @if(old($item_name) == "その他") active @endif
                        ">
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
                  </div><!-- end form-group -->
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
                  </div><!-- end form-group -->
                  <div class="alert alert-light" role="alert">
                    ご協力ありがとうございました。
                  </div>
                  <input
                    type="submit"
                    name=""
                    value="入力内容を送信する"
                    class="btn btn-primary btn-lg submit_btn"
                  >
                </div>
            </div>
          </div>





        </div>
      </div><!-- end card -->
      </form>
    </div>
  </div>
</div>
@endsection

@section('body_last')
<!-- 郵便番号自動入力ファイル取得 -->
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<script src="https://kinkaimasu.jp/js/jquery.autoKana.js" charset="UTF-8"></script>
@include("mailingkit.js")
@include("mailingkit.style_test")
@endsection