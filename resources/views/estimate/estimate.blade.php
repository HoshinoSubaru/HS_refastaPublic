@extends('layouts.app')
@section('title')メール査定ご入力フォーム@endsection

@section('description')
貴金属や宝石、ダイヤモンド、時計、ブランド品などの買取価格を事前にチェック！オンライン上で必要な情報を入力するだけで簡単にお見積りができます。
画像や写真を添付していただけると、更に詳しいお話しが可能。ご納得いただいた上で店頭買取や宅配買取をご利用ください。
@endsection
@section('head_last')
@include("estimate.style")
@endsection
@section('content')
<link rel="stylesheet" href="https://kinkaimasu.jp/wp_styles/diamond/estimate.css">
<!-- <div class="line_area_wrap card card-body frame-est">
    <h3>LINEアプリからも<br class="sp_only">お見積りを受け賜わります。</h3>
    <ul class="step">
        <li>友だち追加<img src="https://kinkaimasu.jp/line/img/pc/content_first/step_01.jpg"></li>
        <img class="arrow" src="https://kinkaimasu.jp/line/img/pc/content_first/arrow.png">
        <li>写メを送る<img src="https://kinkaimasu.jp/line/img/pc/content_first/step_02.jpg"></li>
        <img class="arrow" src="https://kinkaimasu.jp/line/img/pc/content_first/arrow.png">
        <li>査定結果<img src="https://kinkaimasu.jp/line/img/pc/content_first/step_04.jpg"></li>
    </ul>
    <div class="alert alert-info line_area" role="alert">
        お友だち追加後、お好きなタイミングでお写真をお送りください。
    </div>
    {{-- <div class="QR_code">--}}
    {{-- <img src="https://qr-official.line.me/sid/m/rifa.png" alt="QR Code" class="image" width="204" height="204">--}}
    {{-- </div>--}}
    <a href="https://lin.ee/Ya5d9z" class="line_link btn">
        <img src="https://kinkaimasu.jp/new/img/campain/common/icon_line.png">
        LINE友だち追加はこちら
    </a>
</div> -->
<div class="line_link">
    <!-- <blink class="line_link_text blink">LINEでの査定は<br>細かいやりとりができるので<br>オススメです！</blink> -->
    <marquee class="line_link_text" scrollamount="5" truespeed bgcolor="#1cb501">簡単・便利でスピーディ！！</marquee>
    <img src="https://kinkaimasu.jp/commonimg/estimate/floating_line_estimate.jpg">
</div>
<div class="line_link_sp">
    <div class="line_link_text">簡単・便利でスピーディ！！</div>
    <div class="line_link_sp_img_wrap">
        <a href="https://lin.ee/F20kD4T">
            <img class="line_link_sp_img" src="https://kinkaimasu.jp/commonimg/estimate/floating_line_estimate_sp_01.jpg">
        </a>
        <a href="https://lin.ee/Ya5d9z">
            <img class="line_link_sp_img" src="https://kinkaimasu.jp/commonimg/estimate/floating_line_estimate_sp_02.jpg">
        </a>
    </div>
</div>
<div class="side_area">

</div>
<div class="frame-est card estimate">

<div class="fv">
    <img class="fv_sp_img sp_only" src="https://kinkaimasu.jp/commonimg/estimate/sp_fv.jpg">
    <div class="fv_in">
        <img class="fv_ttl pc_only" src="https://kinkaimasu.jp/commonimg/estimate/fv_ttl.jpg">
        <div class="fv_text_wrap">
            <h1 class="fv_header" >メール査定ご入力フォーム</h1>
            <div class="fv_text">
                お品物のお写真と情報をご存知の範囲でお知らせください。<br>
                一両日中を目処にご指定の連絡方法で返答いたしております。<br>
                ご不明点やご要望等ございましたら備考欄にお気軽にご入力くださいませ。
            </div>
        </div>
        <img class="fv_bg" src="https://kinkaimasu.jp/commonimg/estimate/fv_shouhin.jpg">
        <img class="fv_yajirusi" src="https://kinkaimasu.jp/commonimg/estimate/yajirusi.jpg">
    </div>
</div>

    {{-- <button type="button" class="btn btn-primary coupon_btn" data-toggle="modal" data-target=".coupon_modal">クーポン</button>--}}


    <div class="estimate-content-area">
        <div class="estimate_content_area_wrap">

            <div class="estimate_content_area_text customer_title">お品物のお写真</div>
            <div class="image_description">
                <div class="image_description_text">
                    お品物のお写真を添付してください。<br class="sp_only">*最大10枚まで添付可能
                </div>
                <!-- <table class="example_table">
                    <tr>
                        <th>地金の品位</th>
                        <td>（例　K18, Pt900など）</td>
                    </tr>
                    <tr>
                        <th>全体の重さ</th>
                        <td>（例　10）※グラム数</td>
                    </tr>
                    <tr>
                        <th>カラット数</th>
                        <td>（例　0.4）</td>
                    </tr>
                    <tr>
                        <th>ブランド名</th>
                        <td>（例　ルイヴィトン、グッチ）</td>
                    </tr>
                    <tr>
                        <th>宝石の種類</th>
                        <td>（例　ダイヤモンド、サファイア）</td>
                    </tr>
                    <tr>
                        <th>その他備考</th>
                        <td>（例　〇〇の鑑別書の写真、持ち手の汚れ　など）</td>
                    </tr>
                </table> -->
            </div>
            <div id="formBox" class="cFix">
                <div id="tab_top">
                    <div id="metal_top"></div>
                    <div id="dia_top"></div>
                    <div id="brand_top"></div>
                </div>
                <form action="{{ env("ESTIMATE_ACTION") }}" method="post" id="tab_form">
                    {{ csrf_field() }}
                    <input type="text" name="honeypot" id="honeypot" class="hp_field" autocomplete="off">
                    <div id="imageUpload">
                        <image_upload />
                    </div>
                    
                    <div class="dia_detail_ttl customer_title">お品物の種類</div>

                    <div class="check_category_area">
                        <label for="show_checkbox_metal" onclick="show_checkbox_contents();">
                            <input type="checkbox" id="show_checkbox_metal" class="form-control">
                            <div class="checkbox_text">貴金属・宝石・ジュエリー</div>
                        </label>
                        <label for="show_checkbox_brand" onclick="show_checkbox_contents();">
                            <input type="checkbox" id="show_checkbox_brand" class="form-control">
                            <div class="checkbox_text">ブランド品・衣類・その他</div>
                        </label>
                    </div>

                    {{-- <div class="dia_detail_ttl customer_title">詳細情報のご入力</div>--}}

                    <?php
                    // ファイル名をランダムな文字列２０文字+yyyymmddhhiiss.拡張子にする
                    $str = 'abcdefghijklmnopqrstuvwxyz0123456789';
                    $rand_str = substr(str_shuffle($str), 0, 20);
                    $send_id = date("YmdHis").$rand_str;
                    ?>
                    <input type="hidden" name="send_id" value="{{ old('send_id') ? old('send_id') : $send_id }}">
                    @if(isset($errors))
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @endif
                    <input type="hidden" name="form_focus" id="form_focus" value="estimate">

                    <table id="metal" class="active">
                        <tr>
                            <td class="p-0" colspan="4">
                                <h4>【詳細情報】貴金属・ジュエリー</h4>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2">
                                鑑定書（鑑別書）の有無
                            </th>
                            <td class="" colspan="2">
                                <label id="has_certificate" onclick="jewelry_area_close();"><input type="radio" name="certificate" value="1" class="form-control document_exist" @if("1"===old('certificate')) checked @endif>あり</label>
                                <label id="no_certificate" onclick="jewelry_area_open();"><input type="radio" name="certificate" value="0" class="form-control document_not_exist" @if("0"===old('certificate')) checked @endif>なし</label><br>
                            </td>
                        </tr>
                        <tr class="labo_name metal_chosen">
                            <td colspan="2">
                                <div class="certificate_chosen">
                                    <div class="hidden_area"></div>
                                    <div class="certificate_chosen_ttl">鑑別機関名</div>
                                    <input type="text" list="ice-cream-flavors" class="form-control" name="identification_authority_name" autocomplete="off" placeholder="ご入力ください。">
                                    <datalist id="ice-cream-flavors" name="identification_authority_name">
                                        <option value="中央宝石研究所 (CGL)" @if("中央宝石研究所 (CGL)"===old('identification_authority_name')) selected @endif>中央宝石研究所 (CGL)</option>
                                        <option value="GIA（米国宝石学会）" @if("GIA（米国宝石学会）"===old('identification_authority_name')) selected @endif>GIA（米国宝石学会）</option>
                                        <option value="AGTジェムラボラトリー(AGT)" @if("AGTジェムラボラトリー(AGT)"===old('identification_authority_name')) selected @endif>AGTジェムラボラトリー(AGT)</option>
                                        <option value="全国宝石学協会 (GAAJ)" @if("全国宝石学協会 (GAAJ)"===old('identification_authority_name')) selected @endif>全国宝石学協会 (GAAJ)</option>
                                        <option value="日本ジェムテイスティングセンター (GTC)" @if("日本ジェムテイスティングセンター (GTC)"===old('identification_authority_name')) selected @endif>日本ジェムテイスティングセンター (GTC)</option>
                                        <option value="ダイヤモンドグレーディングラボラトリー (DGL)" @if("ダイヤモンドグレーディングラボラトリー (DGL)"===old('identification_authority_name')) selected @endif>ダイヤモンドグレーディングラボラトリー (DGL)</option>
                                        <option value="日独宝石研究所 (JGGL)" @if("日独宝石研究所 (JGGL)"===old('identification_authority_name')) selected @endif>日独宝石研究所 (JGGL)</option>
                                        <option value="東京宝石鑑別協会 (TGL)" @if("東京宝石鑑別協会 (TGL)"===old('identification_authority_name')) selected @endif>東京宝石鑑別協会 (TGL)</option>
                                        <option value="東京宝石科学アカデミー (GAG)" @if("東京宝石科学アカデミー (GAG)"===old('identification_authority_name')) selected @endif>東京宝石科学アカデミー (GAG)</option>
                                        <option value="ノーブルジェムグレーディングラボラトリー (NGL)" @if("ノーブルジェムグレーディングラボラトリー (NGL)"===old('identification_authority_name')) selected @endif>ノーブルジェムグレーディングラボラトリー (NGL)</option>
                                        <option value="ジャパンジェムグレーディングセンター (GGC)" @if("ジャパンジェムグレーディングセンター (GGC)"===old('identification_authority_name')) selected @endif>ジャパンジェムグレーディングセンター (GGC)</option>
                                        <option value="全日本宝石研究所(ココ山岡)" @if("全日本宝石研究所(ココ山岡)"===old('identification_authority_name')) selected @endif>全日本宝石研究所(ココ山岡)</option>
                                        <option value="田崎真珠" @if("田崎真珠"===old('identification_authority_name')) selected @endif>田崎真珠</option>
                                        <option value="ミキモト" @if("ミキモト"===old('identification_authority_name')) selected @endif>ミキモト</option>
                                        <option value="ティファニー" @if("ティファニー"===old('identification_authority_name')) selected @endif>ティファニー</option>
                                        <option value="ラザールダイヤモンド" @if("ラザールダイヤモンド"===old('identification_authority_name')) selected @endif>ラザールダイヤモンド</option>
                                        <option value="ジャパンジェムアプレイザル" @if("ジャパンジェムアプレイザル"===old('identification_authority_name')) selected @endif>ジャパンジェムアプレイザル</option>
                                        <option value="ジュエルトレーディングラボラトリー" @if("ジュエルトレーディングラボラトリー"===old('identification_authority_name')) selected @endif>ジュエルトレーディングラボラトリー</option>
                                        <option value="ユニバーサルジェムラボラトリー" @if("ユニバーサルジェムラボラトリー"===old('identification_authority_name')) selected @endif>ユニバーサルジェムラボラトリー</option>
                                        <option value="ジェムリサーチラボラトリー" @if("ジェムリサーチラボラトリー"===old('identification_authority_name')) selected @endif>ジェムリサーチラボラトリー</option>
                                        <option value="メトロ宝石研究所" @if("メトロ宝石研究所"===old('identification_authority_name')) selected @endif>メトロ宝石研究所</option>
                                        <option value="ジャパンテクニカルジェムラボラトリー" @if("ジャパンテクニカルジェムラボラトリー"===old('identification_authority_name')) selected @endif>ジャパンテクニカルジェムラボラトリー</option>
                                        <option value="日本彩珠宝石研究所(サイジュ)" @if("日本彩珠宝石研究所(サイジュ)"===old('identification_authority_name')) selected @endif>日本彩珠宝石研究所(サイジュ)</option>
                                        <option value="日米宝石鑑別センター" @if("日米宝石鑑別センター"===old('identification_authority_name')) selected @endif>日米宝石鑑別センター</option>
                                        <option value="ジェムリサーチジャパン" @if("ジェムリサーチジャパン"===old('identification_authority_name')) selected @endif>ジェムリサーチジャパン</option>
                                        <option value="IGI (カナダ)" @if("IGI (カナダ)"===old('identification_authority_name')) selected @endif>IGI (カナダ)</option>
                                        <option value="AGS (アメリカ)" @if("AGS (アメリカ)"===old('identification_authority_name')) selected @endif>AGS (アメリカ)</option>
                                        <option value="AIGS (タイ)" @if("AIGS (タイ)"===old('identification_authority_name')) selected @endif>AIGS (タイ)</option>
                                        <option value="HRD (ベルギー)" @if("HRD (ベルギー)"===old('identification_authority_name')) selected @endif>HRD (ベルギー)</option>
                                        <option value="IIDGR (ベルギー)" @if("IIDGR (ベルギー)"===old('identification_authority_name')) selected @endif>IIDGR (ベルギー)</option>
                                        <option value="PGS (アメリカ)" @if("PGS (アメリカ)"===old('identification_authority_name')) selected @endif>PGS (アメリカ)</option>
                                        <option value="VGR (インド)" @if("VGR (インド)"===old('identification_authority_name')) selected @endif>VGR (インド)</option>
                                        <option value="GCAL (アメリカ)" @if("GCAL (アメリカ)"===old('identification_authority_name')) selected @endif>GCAL (アメリカ)</option>
                                        <option value="IGC (ロシア)" @if("IGC (ロシア)"===old('identification_authority_name')) selected @endif>IGC (ロシア)</option>
                                        <option value="GRS (スイス)" @if("GRS (スイス)"===old('identification_authority_name')) selected @endif>GRS (スイス)</option>
                                        <option value="その他 (Other)" @if("その他 (Other)"===old('identification_authority_name')) selected @endif>その他 (Other)</option>
                                    </datalist>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2">商品の形状</th>
                            <td colspan="2">
                                <select class="form-control" name="product_shape">
                                    <option value="">--選択--</option>
                                    <option value="リング" @if("リング"===old('product_shape')) selected @endif>リング</option>
                                    <option value="ネックレス/ペンダント" @if("ネックレス/ペンダント"===old('product_shape')) selected @endif>ネックレス/ペンダント</option>
                                    <option value="ペンダントヘッド" @if("ペンダントヘッド"===old('product_shape')) selected @endif>ペンダントヘッド</option>
                                    <option value="ブレスレット" @if("ブレスレット"===old('product_shape')) selected @endif>ブレスレット</option>
                                    <option value="バングル" @if("バングル"===old('product_shape')) selected @endif>バングル</option>
                                    <option value="ピアス" @if("ピアス"===old('product_shape')) selected @endif>ピアス</option>
                                    <option value="イヤリング" @if("イヤリング"===old('product_shape')) selected @endif>イヤリング</option>
                                    <option value="ブローチ" @if("ブローチ"===old('product_shape')) selected @endif>ブローチ</option>
                                    <option value="ピンタック" @if("ブローチ"===old('product_shape')) selected @endif>ピンタック</option>
                                    <option value="ラペルピン" @if("ラペルピン"===old('product_shape')) selected @endif>ラペルピン</option>
                                    <option value="ブランドジュエリー" @if("ブランドジュエリー"===old('product_shape')) selected @endif>ブランドジュエリー</option>
                                    <option value="インゴット" @if("インゴット"===old('product_shape')) selected @endif>インゴット</option>
                                    <option value="仏具" @if("仏具"===old('product_shape')) selected @endif>仏具</option>
                                    <option value="金歯" @if("金歯"===old('product_shape')) selected @endif>金歯</option>
                                    <option value="宝石のルース" @if("宝石のルース"===old('product_shape')) selected @endif>宝石のルース（石のまま）</option>
                                    <option value="色々混ざっている" @if("色々混ざっている"===old('product_shape')) selected @endif>色々混ざっている</option>
                                    <option value="その他" @if("その他"===old('product_shape')) selected @endif>その他</option>
                                </select>
                                <optgroup label=""></optgroup>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2">地金品位</th>
                            <td colspan="2">
                                <!-- <select class="form-control" name="ingot_grade">
                                    <option value="">--選択--</option>
                                    <option value="インゴット500g以上" @if("インゴット500g以上"===old('ingot_grade')) selected @endif>インゴット500g以上</option>
                                    <option value="インゴット100g以上" @if("インゴット100g以上"===old('ingot_grade')) selected @endif>インゴット100g以上</option>
                                    <option value="K24" @if("K24"===old('ingot_grade')) selected @endif>K24</option>
                                    <option value="K23" @if("K23"===old('ingot_grade')) selected @endif>K23</option>
                                    <option value="K22" @if("K22"===old('ingot_grade')) selected @endif>K22</option>
                                    <option value="K21. @if(" K21"===old('ingot_grade')) selected @endif 6">K21.6</option>
                                    <option value="K20" @if("K20"===old('ingot_grade')) selected @endif>K20</option>
                                    <option value="K18" @if("K18"===old('ingot_grade')) selected @endif>K18</option>
                                    <option value="K17" @if("K17"===old('ingot_grade')) selected @endif>K17</option>
                                    <option value="K14" @if("K14"===old('ingot_grade')) selected @endif>K14</option>
                                    <option value="K12" @if("K12"===old('ingot_grade')) selected @endif>K12</option>
                                    <option value="K10" @if("K10"===old('ingot_grade')) selected @endif>K10</option>
                                    <option value="K9" @if("K9"===old('ingot_grade')) selected @endif>K9</option>
                                    <option value="K8" @if("K8"===old('ingot_grade')) selected @endif>K8</option>
                                    <option value="K5" @if("K5"===old('ingot_grade')) selected @endif>K5</option>
                                    <option value="Pt1000(Pm1000) @if(" Pt1000(Pm1000)"===old('ingot_grade')) selected @endif ">Pt1000(Pm1000)</option>
                                    <option value=" Pt950( @if("Pt950"===old('ingot_grade')) selected @endif Pm950)">Pt950(Pm950)</option>
                                    <option value="Pt900( @if(" Pt900"===old('ingot_grade')) selected @endif Pm900)">Pt900(Pm900)</option>
                                    <option value="Pt850( @if(" Pt850"===old('ingot_grade')) selected @endif Pm850)">Pt850(Pm850)</option>
                                    <option value="PtやPmのみ" @if("PtやPmのみ"===old('ingot_grade')) selected @endif>PtやPmのみ</option>
                                    <option value="Pt900+ @if(" Pt900"===old('ingot_grade')) selected @endif Pt850のネックレス等">Pt900+Pt850のネックレス等</option>
                                    <option value="Sv1000" @if("Sv1000"===old('ingot_grade')) selected @endif>Sv1000</option>
                                    <option value="Sv925" @if("Sv925"===old('ingot_grade')) selected @endif>Sv925</option>
                                    <option value="Sv900" @if("Sv900"===old('ingot_grade')) selected @endif>Sv900</option>
                                    <option value="Pd1000" @if("Pd1000"===old('ingot_grade')) selected @endif>Pd1000</option>
                                    <option value="Pd950" @if("Pd950"===old('ingot_grade')) selected @endif>Pd950</option>
                                    <option value="Pd900" @if("Pd900"===old('ingot_grade')) selected @endif>Pd900</option>
                                    <option value="Pd500" @if("Pd500"===old('ingot_grade')) selected @endif>Pd500</option>
                                    <option value="Au12Pd20歯科材" @if("Au12Pd20歯科材"===old('ingot_grade')) selected @endif>Au12Pd20歯科材</option>
                                    <option value="コンビ" @if("コンビ"===old('ingot_grade')) selected @endif>コンビ</option>
                                    <option value="不明" @if("不明"===old('ingot_grade')) selected @endif>不明</option>
                                    <option value="色々混ざっている" @if("色々混ざっている"===old('ingot_grade')) selected @endif>色々混ざっている</option>
                                    <option value="その他" @if("その他"===old('ingot_grade')) selected @endif>その他（備考欄に記入をお願いします）</option>
                                </select> -->
                                <select class="form-control" name="ingot_grade">
                                    <option value="" selected="">--選択--</option>
                                    <optgroup label="金">
                                        <option value="K24 24金,999" @if("K24 24金,999"===old('ingot_grade')) selected @endif>K24（24金,999）</option>
                                        <option value="K23 23金,958" @if("K23 23金,958"===old('ingot_grade')) selected @endif>K23（23金,958）</option>
                                        <option value="K22 22金,916" @if("K22 22金,916"===old('ingot_grade')) selected @endif>K22（22金,916）</option>
                                        <option value="K21.6 21.6金,900" @if("K21.6 21.6金,900 "===old('ingot_grade')) selected @endif>K21.6（21.6金,900）</option>
                                        <option value=" K20 20金,835" @if("K20 20金,835"===old('ingot_grade')) selected @endif>K20（20金,835）</option>
                                        <option value="K18 18金,750" @if("K18 18金,750"===old('ingot_grade')) selected @endif>K18（18金,750）</option>
                                        <option value="K17 17金,700" @if("K17 17金,700"===old('ingot_grade')) selected @endif>K17（17金,700）</option>
                                        <option value="K14 14金,585" @if("K14 14金,585"===old('ingot_grade')) selected @endif>K14（14金,585）</option>
                                        <option value="K12 12金,500" @if("K12 12金,500"===old('ingot_grade')) selected @endif>K12（12金,500）</option>
                                        <option value="K10 10金,416" @if("K10 10金,416"===old('ingot_grade')) selected @endif>K10（10金,416）</option>
                                        <option value="K9 9金,375" @if("K9 9金,375"===old('ingot_grade')) selected @endif>K9（9金,375）</option>
                                        <option value="K8 8金,333" @if("K8 8金,333"===old('ingot_grade')) selected @endif>K8（8金,333）</option>
                                        <option value="K5 5金,210" @if("K5 5金,210"===old('ingot_grade')) selected @endif>K5（5金,210）</option>
                                    </optgroup>
                                    <optgroup label="プラチナ">
                                        <option value="Pt1000 999" @if("Pt1000 999"===old('ingot_grade')) selected @endif>Pt1000（999)</option>
                                        <option value="Pt950" @if("Pt950"===old('ingot_grade')) selected @endif>Pt950</option>
                                        <option value="Pt900" @if("Pt900"===old('ingot_grade')) selected @endif>Pt900</option>
                                        <option value="Pt850" @if("Pt850"===old('ingot_grade')) selected @endif>Pt850</option>
                                        <option value="Pt・Pm" @if("Pt・Pm"===old('ingot_grade')) selected @endif>Pt・Pm</option>
                                    </optgroup>
                                    <optgroup label="パラジウム">
                                        <option value="Pd1000･999" @if("Pd1000･999"===old('ingot_grade')) selected @endif>Pd1000･999</option>
                                        <option value="Pd950" @if("Pd950"===old('ingot_grade')) selected @endif>Pd950</option>
                                        <option value="Pd900" @if("Pd900"===old('ingot_grade')) selected @endif>Pd900</option>
                                        <option value="Pd500" @if("Pd500"===old('ingot_grade')) selected @endif>Pd500</option>
                                        <option value="pd歯科素材" @if("pd歯科素材"===old('ingot_grade')) selected @endif>pd歯科素材</option>
                                    </optgroup>
                                    <optgroup label="シルバー">
                                        <option value="SV1000" @if("SV1000"===old('ingot_grade')) selected @endif>SV1000</option>
                                        <option value="SV925" @if("SV925"===old('ingot_grade')) selected @endif>SV925</option>
                                        <option value="SV900" @if("SV900"===old('ingot_grade')) selected @endif>SV900</option>
                                    </optgroup>
                                    <optgroup label="コンビ">
                                        <option value="P900/K18 Pメイン" @if("P900/K18 Pメイン"===old('ingot_grade')) selected @endif>P900/K18 Pメイン</option>
                                        <option value="P900/K18 5:5" @if("P900/K18 5:5"===old('ingot_grade')) selected @endif>P900/K18 5:5</option>
                                        <option value="P900/K18 Kメイン" @if("P900/K18 Kメイン"===old('ingot_grade')) selected @endif>P900/K18 Kメイン</option>
                                        <option value="P850/K18 Pメイン" @if("P850/K18 Pメイン"===old('ingot_grade')) selected @endif>P850/K18 Pメイン</option>
                                        <option value="P850/K18 5:5" @if("P850/K18 5:5"===old('ingot_grade')) selected @endif>P850/K18 5:5</option>
                                        <option value="P850/K18 Kメイン" @if("P850/K18 Kメイン"===old('ingot_grade')) selected @endif>P850/K18 Kメイン</option>
                                    </optgroup>
                                    <optgroup label="分からない">
                                        <option value="金だとは思うが不明(K18とします)" @if("金だとは思うが不明(K18とします)"===old('ingot_grade')) selected @endif>金だとは思うが不明(K18とします)</option>
                                        <option value="プラチナとは思うが不明(Pt900とします)" @if("プラチナとは思うが不明(Pt900とします)"===old('ingot_grade')) selected @endif>プラチナとは思うが不明(Pt900とします)</option>
                                        <option value="メッキ" @if("メッキ"===old('ingot_grade')) selected @endif>メッキ</option>
                                    </optgroup>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2">全体重量（グラム）</th>
                            <td colspan="2">
                                <input class="form-control" type="number" name="total_weight" value="{{ old('total_weight') }}">
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2">ブランド名</th>
                            <td colspan="2">
                                <input class="form-control" type="text" name="diamond_jewelry_brand_name" value="{{ old('diamond_jewelry_brand_name') }}" placeholder="ご入力ください。">
                            </td>
                        </tr>

                        <tr class="jewelry_area jewelry_choice_area">
                            <td colspan="2">
                                <label id="has_jewelry"><input class="form-control" type="radio" name="jewelry" value="1" @if("1"===old('jewelry')) checked @endif>宝石あり</label>
                                <label id="no_jewelry"><input class="form-control" type="radio" name="jewelry" value="0" @if("0"===old('jewelry')) checked @endif>宝石なし</label>
                            </td>
                        </tr>
                        <tr class="jewelry_chosen">
                            <th colspan="2">宝石種類</th>
                            <td colspan="2">
                                <input class="form-control" type="text" name="jewelry_type" value="{{ old('jewelry_type') }}" placeholder="ご入力ください。">
                                <!-- <select class="form-control" name="jewelry_type">
                                    <option value="">--選択--</option>
                                    <option value="ダイヤモンド" @if("ダイヤモンド"===old('jewelry_type')) selected @endif>ダイヤモンド</option>
                                    <option value="エメラルド" @if("エメラルド"===old('jewelry_type')) selected @endif>エメラルド</option>
                                    <option value="ノンオイルエメラルド" @if("ノンオイルエメラルド"===old('jewelry_type')) selected @endif>ノンオイルエメラルド</option>
                                    <option value="パライバトルマリン" @if("パライバトルマリン"===old('jewelry_type')) selected @endif>パライバトルマリン</option>
                                    <option value="アレキサンドライト" @if("アレキサンドライト"===old('jewelry_type')) selected @endif>アレキサンドライト</option>
                                    <option value="ルビー" @if("ルビー"===old('jewelry_type')) selected @endif>ルビー</option>
                                    <option value="非加熱ルビー" @if("非加熱ルビー"===old('jewelry_type')) selected @endif>非加熱ルビー</option>
                                    <option value="スタールビー" @if("スタールビー"===old('jewelry_type')) selected @endif>スタールビー</option>
                                    <option value="サファイア" @if("サファイア"===old('jewelry_type')) selected @endif>サファイア</option>
                                    <option value="非加熱サファイア" @if("非加熱サファイア"===old('jewelry_type')) selected @endif>非加熱サファイア</option>
                                    <option value="スターサファイア" @if("スターサファイア"===old('jewelry_type')) selected @endif>スターサファイア</option>
                                    <option value="パパラチアサファイア" @if("パパラチアサファイア"===old('jewelry_type')) selected @endif>パパラチアサファイア</option>
                                    <option value="オパール" @if("オパール"===old('jewelry_type')) selected @endif>オパール</option>
                                    <option value="ホワイトオパール" @if("ホワイトオパール"===old('jewelry_type')) selected @endif>ホワイトオパール</option>
                                    <option value="ブラックオパール" @if("ブラックオパール"===old('jewelry_type')) selected @endif>ブラックオパール</option>
                                    <option value="ファイアオパール" @if("ファイアオパール"===old('jewelry_type')) selected @endif>ファイアオパール</option>
                                    <option value="珊瑚" @if("珊瑚"===old('jewelry_type')) selected @endif>珊瑚</option>
                                    <option value="翡翠" @if("翡翠"===old('jewelry_type')) selected @endif>翡翠</option>
                                    <option value="真珠" @if("真珠"===old('jewelry_type')) selected @endif>真珠(パール)</option>
                                    <option value="カメオ" @if("カメオ"===old('jewelry_type')) selected @endif>カメオ</option>
                                    <option value="タンザナイト" @if("タンザナイト"===old('jewelry_type')) selected @endif>タンザナイト</option>
                                    <option value="アクアマリン" @if("アクアマリン"===old('jewelry_type')) selected @endif>アクアマリン</option>
                                    <option value="アウイナイト" @if("アウイナイト"===old('jewelry_type')) selected @endif>アウイナイト</option>
                                    <option value="クリソベリル" @if("クリソベリル"===old('jewelry_type')) selected @endif>クリソベリル</option>
                                    <option value="トルマリン" @if("トルマリン"===old('jewelry_type')) selected @endif>トルマリン</option>
                                    <option value="トパーズ" @if("トパーズ"===old('jewelry_type')) selected @endif>トパーズ</option>
                                    <option value="ブルートパーズ" @if("ブルートパーズ"===old('jewelry_type')) selected @endif>ブルートパーズ</option>
                                    <option value="アイオライト" @if("アイオライト"===old('jewelry_type')) selected @endif>アイオライト</option>
                                    <option value="アパタイト" @if("アパタイト"===old('jewelry_type')) selected @endif>アパタイト</option>
                                    <option value="アメシスト( @if(" アメシスト"===old('jewelry_type')) selected @endif アメジスト)">アメシスト(アメジスト)</option>
                                    <option value="アメトリン" @if("アメトリン"===old('jewelry_type')) selected @endif>アメトリン</option>
                                    <option value="アンデシン" @if("アンデシン"===old('jewelry_type')) selected @endif>アンデシン</option>
                                    <option value="アンモライト" @if("アンモライト"===old('jewelry_type')) selected @endif>アンモライト</option>
                                    <option value="インカローズ" @if("インカローズ"===old('jewelry_type')) selected @endif>インカローズ</option>
                                    <option value="ガーネット" @if("ガーネット"===old('jewelry_type')) selected @endif>ガーネット</option>
                                    <option value="カルセドニー(オニキス･カーネリアン･アゲート･ジャスパー･クリソプレーズ等)" @if("カルセドニー(オニキス･カーネリアン･アゲート･ジャスパー･クリソプレーズ等)"===old('jewelry_type')) selected @endif>
                                        カルセドニー(オニキス･カーネリアン･アゲート･ジャスパー･クリソプレーズ等)</option>
                                    <option value="キュービックジルコニア" @if("キュービックジルコニア"===old('jewelry_type')) selected @endif>キュービックジルコニア</option>
                                    <option value="クォーツ" @if("クォーツ"===old('jewelry_type')) selected @endif>クォーツ(水晶)</option>
                                    <option value="クンツァイト" @if("クンツァイト"===old('jewelry_type')) selected @endif>クンツァイト(スポジュメン)</option>
                                    <option value="シトリン" @if("シトリン"===old('jewelry_type')) selected @endif>シトリン</option>
                                    <option value="シリマナイト" @if("シリマナイト"===old('jewelry_type')) selected @endif>シリマナイト</option>
                                    <option value="ジルコン" @if("ジルコン"===old('jewelry_type')) selected @endif>ジルコン</option>
                                    <option value="スピネル" @if("スピネル"===old('jewelry_type')) selected @endif>スピネル</option>
                                    <option value="スフェーン" @if("スフェーン"===old('jewelry_type')) selected @endif>スフェーン</option>
                                    <option value="ターコイズ" @if("ターコイズ"===old('jewelry_type')) selected @endif>ターコイズ</option>
                                    <option value="ダイオプサイト" @if("ダイオプサイト"===old('jewelry_type')) selected @endif>ダイオプサイト</option>
                                    <option value="べっ甲" @if("べっ甲"===old('jewelry_type')) selected @endif>べっ甲(鼈甲)</option>
                                    <option value="ペリドット" @if("ペリドット"===old('jewelry_type')) selected @endif>ペリドット</option>
                                    <option value="ベリル" @if("ベリル"===old('jewelry_type')) selected @endif>ベリル</option>
                                    <option value="マラカイト" @if("マラカイト"===old('jewelry_type')) selected @endif>マラカイト</option>
                                    <option value="ムーンストーン" @if("ムーンストーン"===old('jewelry_type')) selected @endif>ムーンストーン</option>
                                    <option value="ラピスラズリ" @if("ラピスラズリ"===old('jewelry_type')) selected @endif>ラピスラズリ</option>
                                    <option value="ルベライト(レッドトルマリン)" @if("ルベライト(レッドトルマリン)"===old('jewelry_type')) selected @endif>ルベライト(レッドトルマリン)</option>
                                    <option value="ロードクロサイト" @if("ロードクロサイト"===old('jewelry_type')) selected @endif>ロードクロサイト</option>
                                    <option value="琥珀" @if("琥珀"===old('jewelry_type')) selected @endif>琥珀(アンバー)</option>
                                    <option value="象牙" @if("象牙"===old('jewelry_type')) selected @endif>象牙</option>
                                    <option value="その他宝石" @if("その他宝石"===old('jewelry_type')) selected @endif>その他宝石（備考欄に記入をお願いします）</option>
                                    <option value="不明" @if("不明"===old('jewelry_type')) selected @endif>不明</option>
                                </select> -->
                                <optgroup label=""></optgroup>
                            </td>
                        </tr>
                        <tr class="jewelry_chosen">
                            <th colspan="2">宝石重量</th>
                            <td colspan="2">
                                <input class="form-control" type="number" name="jewelry_weight" value="{{ old('jewelry_weight') }}"><span class="ct_text">ct（カラット）</span><span class="red"><strong>製品に見える刻印でも構いません。</strong></span>
                            </td>
                        </tr>
                        <tr class="jewelry_chosen">
                            <th colspan="2">メレダイヤ重量（脇石）</th>
                            <td colspan="2">
                                <input class="form-control" type="number" name="Meredia_weight" value="{{ old('Meredia_weight') }}"><span class="ct_text">ct（カラット）</span>
                            </td>
                        </tr>

                        <tr class="jewelry_choice_area">
                            <td>
                                <!-- <div class="jewelry_area toggleButton btn btn-info">ダイヤモンドの詳細を入力する</div> -->
                            </td>
                        </tr>

                        <tr>
                            <td class="p-0">
                                <table id="dia" class="toggleContent">
                                    <tr>
                                        <td class="p-0" colspan="4">
                                            <h4>ダイヤモンドの詳細</h4>
                                        </td>
                                    </tr>

                                    <tr class="">
                                        <th colspan="2">カラット数 / Carat weight</th>
                                        <td colspan="2">
                                            <div class="from_overtone">
                                                <input class="form-control" name="dia_carat_weight" type="number" step="0.001" style="ime-mode:disabled;" value="" placeholder="ct（カラット）">
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th colspan="2">カラー / Color</th>
                                        <td colspan="2">
                                            <div class="select_color">
                                                <label id="sel_color_1" class="on on_check">
                                                    <input type="radio" class="form-control" name="is_color_dia" value="0" class="radio">
                                                    白ダイヤ(White)
                                                </label>
                                                <label id="sel_color_2">
                                                    <input type="radio" name="is_color_dia" class="form-control" value="1" class="radio">
                                                    カラーダイヤ (Fancy)
                                                </label>
                                            </div>
                                            <div class="is_color_dia_chosen">
                                                <div>
                                                    Intensity<br>(色の彩度)<br>
                                                    <select class="form-control" name="color_dia_intensity" id="color_dia_intensity">
                                                        <option value="">--選択--</option>
                                                        <option value="Faint">Faint</option>
                                                        <option value="Very light" @if(old('color_dia_intensity')==='Very light' ) selected @endif>Very light</option>
                                                        <option value="Light" @if(old('color_dia_intensity')==='Light' ) selected @endif>Light</option>
                                                        <option value="Fancy light" @if(old('color_dia_intensity')==='Fancy light' ) selected @endif>Fancy light</option>
                                                        <option value="Fancy" @if(old('color_dia_intensity')==='Fancy' ) selected @endif>Fancy</option>
                                                        <option value="Fancy Dark" @if(old('color_dia_intensity')==='Fancy Dark' ) selected @endif>Fancy Dark</option>
                                                        <option value="Fancy Intense" @if(old('color_dia_intensity')==='Fancy Intense' ) selected @endif>Fancy Intense</option>
                                                        <option value="Fancy Vivid" @if(old('color_dia_intensity')==='Fancy Vivid' ) selected @endif>Fancy Vivid</option>
                                                        <option value="Fancy Deep" @if(old('color_dia_intensity')==='Fancy Deep' ) selected @endif>Fancy Deep</option>
                                                    </select>
                                                    <optgroup label=""></optgroup>
                                                </div>
                                                <div>
                                                    Color,Overtone<br>(カラー / ニュアンス)<br>
                                                    <select class="form-control" name="color_dia_color_overtone" id="color_dia_color_overtone">
                                                        <option value="">--選択--</option>
                                                        <option data="off" value="Yellow" @if(old('color_dia_color_overtone')==='Yellow' ) selected @endif>Yellow</option>
                                                        <option data="off" value="Pink" @if(old('color_dia_color_overtone')==='Pink' ) selected @endif>Pink</option>
                                                        <option data="off" value="Blue" @if(old('color_dia_color_overtone')==='Blue' ) selected @endif>Blue</option>
                                                        <option data="off" value="Red" @if(old('color_dia_color_overtone')==='Red' ) selected @endif>Red</option>
                                                        <option data="off" value="Green" @if(old('color_dia_color_overtone')==='Green' ) selected @endif>Green</option>
                                                        <option data="off" value="Purple" @if(old('color_dia_color_overtone')==='Purple' ) selected @endif>Purple</option>
                                                        <option data="off" value="Orange" @if(old('color_dia_color_overtone')==='Orange' ) selected @endif>Orange</option>
                                                        <option data="off" value="Violet" @if(old('color_dia_color_overtone')==='Violet' ) selected @endif>Violet</option>
                                                        <option data="off" value="Gray" @if(old('color_dia_color_overtone')==='Gray' ) selected @endif>Gray</option>
                                                        <option data="off" value="Black" @if(old('color_dia_color_overtone')==='Black' ) selected @endif>Black</option>
                                                        <option data="off" value="Brown" @if(old('color_dia_color_overtone')==='Brown' ) selected @endif>Brown</option>
                                                        <option data="off" value="Campagne" @if(old('color_dia_color_overtone')==='Campagne' ) selected @endif>Campagne</option>
                                                        <option data="off" value="Cognac" @if(old('color_dia_color_overtone')==='Cognac' ) selected @endif>Cognac</option>
                                                        <option data="off" value="Chameleon" @if(old('color_dia_color_overtone')==='Chameleon' ) selected @endif>Chameleon</option>
                                                        <option data="off" value="White" @if(old('color_dia_color_overtone')==='White' ) selected @endif>White</option>
                                                        <option data="on" value="Brownish" @if(old('color_dia_color_overtone')==='Brownish' ) selected @endif>Brownish</option>
                                                        <option data="on" value="Greenish" @if(old('color_dia_color_overtone')==='Greenish' ) selected @endif>Greenish</option>
                                                        <option data="on" value="Yellowish" @if(old('color_dia_color_overtone')==='Yellowish' ) selected @endif>Yellowish</option>
                                                        <option data="on" value="Pinkish" @if(old('color_dia_color_overtone')==='Pinkish' ) selected @endif>Pinkish</option>
                                                        <option data="on" value="Purplish" @if(old('color_dia_color_overtone')==='Purplish' ) selected @endif>Purplish</option>
                                                        <option data="on" value="Grayish" @if(old('color_dia_color_overtone')==='Grayish' ) selected @endif>Grayish</option>
                                                        <option data="on" value="Orangey" @if(old('color_dia_color_overtone')==='Orangey' ) selected @endif>Orangey</option>
                                                        <option data="on" value="Reddish" @if(old('color_dia_color_overtone')==='Reddish' ) selected @endif>Reddish</option>
                                                        <option data="on" value="Bluish" @if(old('color_dia_color_overtone')==='Bluish' ) selected @endif>Bluish</option>
                                                        <option data="on" value="その他 (Other)" @if(old('color_dia_color_overtone')==='その他 (Other)' ) selected @endif>その他 (Other)
                                                        </option>
                                                    </select>
                                                    <optgroup label=""></optgroup>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="white_dia">
                                        <th colspan="2"></th>
                                        <td colspan="2">
                                            <div class="from_overtone">
                                                <select class="form-control" name="white_dia_color" id="white_dia_color">
                                                    <option value="">--選択--</option>
                                                    <option value="D" @if(old('white_dia_color')==='D' ) selected @endif>D</option>
                                                    <option value="E" @if(old('white_dia_color')==='E' ) selected @endif>E</option>
                                                    <option value="F" @if(old('white_dia_color')==='F' ) selected @endif>F</option>
                                                    <option value="G" @if(old('white_dia_color')==='G' ) selected @endif>G</option>
                                                    <option value="H" @if(old('white_dia_color')==='H' ) selected @endif>H</option>
                                                    <option value="I" @if(old('white_dia_color')==='I' ) selected @endif>I</option>
                                                    <option value="J" @if(old('white_dia_color')==='J' ) selected @endif>J</option>
                                                    <option value="K" @if(old('white_dia_color')==='K' ) selected @endif>K</option>
                                                    <option value="L" @if(old('white_dia_color')==='L' ) selected @endif>L</option>
                                                    <option value="M" @if(old('white_dia_color')==='M' ) selected @endif>M</option>
                                                    <option value="N" @if(old('white_dia_color')==='N' ) selected @endif>N</option>
                                                    <option value="O" @if(old('white_dia_color')==='O' ) selected @endif>O</option>
                                                    <option value="P" @if(old('white_dia_color')==='P' ) selected @endif>P</option>
                                                    <option value="Q" @if(old('white_dia_color')==='Q' ) selected @endif>Q</option>
                                                    <option value="R" @if(old('white_dia_color')==='R' ) selected @endif>R</option>
                                                    <option value="S" @if(old('white_dia_color')==='S' ) selected @endif>S</option>
                                                    <option value="T" @if(old('white_dia_color')==='T' ) selected @endif>T</option>
                                                    <option value="U" @if(old('white_dia_color')==='U' ) selected @endif>U</option>
                                                    <option value="V" @if(old('white_dia_color')==='V' ) selected @endif>V</option>
                                                    <option value="W" @if(old('white_dia_color')==='W' ) selected @endif>W</option>
                                                    <option value="X" @if(old('white_dia_color')==='X' ) selected @endif>X</option>
                                                    <option value="Y" @if(old('white_dia_color')==='Y' ) selected @endif>Y</option>
                                                    <option value="Z" @if(old('white_dia_color')==='Z' ) selected @endif>Z</option>
                                                    <option value="その他 (Other)" @if(old('white_dia_color')==='その他 (Other)' ) selected @endif>その他 (Other)</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">クラリティ / Clarity</th>
                                        <td colspan="2">
                                            <select class="form-control" name="dia_clarity">
                                                <option value="">--選択--</option>
                                                <option value="FL" @if(old('dia_clarity')==='その他 (Other)' ) selected @endif>FL</option>
                                                <option value="IF" @if(old('dia_clarity')==='IF' ) selected @endif>IF</option>
                                                <option value="VVS1" @if(old('dia_clarity')==='VVS1' ) selected @endif>VVS1</option>
                                                <option value="VVS2" @if(old('dia_clarity')==='VVS2' ) selected @endif>VVS2</option>
                                                <option value="VS1" @if(old('dia_clarity')==='VS1' ) selected @endif>VS1</option>
                                                <option value="VS2" @if(old('dia_clarity')==='VS2' ) selected @endif>VS2</option>
                                                <option value="SI1" @if(old('dia_clarity')==='SI1' ) selected @endif>SI1</option>
                                                <option value="SI2" @if(old('dia_clarity')==='SI2' ) selected @endif>SI2</option>
                                                <option value="SI3" @if(old('dia_clarity')==='SI3' ) selected @endif>SI3</option>
                                                <option value="I1" @if(old('dia_clarity')==='I1' ) selected @endif>I1</option>
                                                <option value="I2" @if(old('dia_clarity')==='I2' ) selected @endif>I2</option>
                                                <option value="I3" @if(old('dia_clarity')==='I3' ) selected @endif>I3</option>
                                                <option value="その他 (Other)" @if(old('dia_clarity')==='その他 (Other)' ) selected @endif>その他 (Other)</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">カット / Cut</th>
                                        <td colspan="2">
                                            <div class="select_area_middle">
                                                カットの総合評価 / Cut grade<br>
                                                <select class="form-control" name="dia_cut_grade">
                                                    <option value="">--選択--</option>
                                                    <option value="Ideal（アイデアルプロポーション）" @if(old('dia_cut_grade')==='Ideal（アイデアルプロポーション）' ) selected @endif>Ideal（アイデアルプロポーション）</option>
                                                    <option value="EXHC (ハートアンドキューピット)" @if(old('dia_cut_grade')==='EXHC (ハートアンドキューピット)' ) selected @endif>EXHC (ハートアンドキューピット)</option>
                                                    <option value="Excellent（優秀）" @if(old('dia_cut_grade')==='Excellent（優秀）' ) selected @endif>Excellent（優秀）</option>
                                                    <option value="Very good（優良）" @if(old('dia_cut_grade')==='Very good（優良）' ) selected @endif>Very good（優良）</option>
                                                    <option value="Very good (ハートアンドキューピット)" @if(old('dia_cut_grade')==='Very good (ハートアンドキューピット)' ) selected @endif>Very good
                                                        (ハートアンドキューピット)</option>
                                                    <option value="Good（良好）" @if(old('dia_cut_grade')==='Good（良好）' ) selected @endif>Good（良好）</option>
                                                    <option value="Fair（可）" @if(old('dia_cut_grade')==='Fair（可）' ) selected @endif>Fair（可）</option>
                                                    <option value="Poor（不可）" @if(old('dia_cut_grade')==='Poor（不可）' ) selected @endif>Poor（不可）</option>
                                                    <option value="その他 (Other)" @if(old('dia_cut_grade')==='その他 (Other)' ) selected @endif>その他 (Other)</option>
                                                </select>
                                                <optgroup label=""></optgroup>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2"></th>
                                        <td colspan="2">
                                            <div class="select_area_middle">
                                                ポリッシュ / Polish<br>
                                                <select class="form-control" name="dia_polish">
                                                    <option value="">--選択--</option>
                                                    <option value="Excellent（優秀）" @if(old('dia_polish')==='その他 (Other)' ) selected @endif>Excellent（優秀）</option>
                                                    <option value="Very good（優良）" @if(old('dia_polish')==='Very good（優良）' ) selected @endif>Very good（優良）</option>
                                                    <option value="Good（良好）" @if(old('dia_polish')==='Good（良好）' ) selected @endif>Good（良好）</option>
                                                    <option value="Fair（可）" @if(old('dia_polish')==='Fair（可）' ) selected @endif>Fair（可）</option>
                                                    <option value="Poor（不可）" @if(old('dia_polish')==='Poor（不可）' ) selected @endif>Poor（不可）</option>
                                                    <option value="その他 (Other)" @if(old('dia_polish')==='その他 (Other)' ) selected @endif>その他 (Other)</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2"></th>
                                        <td colspan="2">
                                            <div class="select_area_middle">
                                                シンメトリー / Symmetry<br>
                                                <select class="form-control" name="dia_symmetry">
                                                    <option value="">--選択--</option>
                                                    <option value="Excellent（優秀）" @if(old('dia_symmetry')==='その他 (Other)' ) selected @endif>Excellent（優秀）</option>
                                                    <option value="Very good（優良）" @if(old('dia_symmetry')==='Very good（優良）' ) selected @endif>Very good（優良）</option>
                                                    <option value="Good（良好）" @if(old('dia_symmetry')==='Good（良好）' ) selected @endif>Good（良好）</option>
                                                    <option value="Fair（可）" @if(old('dia_symmetry')==='Fair（可）' ) selected @endif>Fair（可）</option>
                                                    <option value="Poor（不可）" @if(old('dia_symmetry')==='Poor（不可）' ) selected @endif>Poor（不可）</option>
                                                    <option value="その他 (Other)" @if(old('dia_symmetry')==='その他 (Other)' ) selected @endif>その他 (Other)</option>
                                                </select>
                                                <optgroup label=""></optgroup>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">蛍光性 / Fluorescence</th>
                                        <td colspan="2">
                                            <div class="select_area_middle">
                                                蛍光性の強弱 / Intensity<br>
                                                <select class="form-control" name="dia_fluorescence_intensity">
                                                    <option value="">--選択--</option>
                                                    <option value="None" @if(old('dia_fluorescence_intensity')==='None' ) selected @endif>None</option>
                                                    <option value="VerySlight" @if(old('dia_fluorescence_intensity')==='VerySlight' ) selected @endif>Very Slight</option>
                                                    <option value="Slight" @if(old('dia_fluorescence_intensity')==='Slight' ) selected @endif>Slight</option>
                                                    <option value="Faint" @if(old('dia_fluorescence_intensity')==='Faint' ) selected @endif>Faint</option>
                                                    <option value="Medium" @if(old('dia_fluorescence_intensity')==='Medium' ) selected @endif>Medium</option>
                                                    <option value="Strong" @if(old('dia_fluorescence_intensity')==='Strong' ) selected @endif>Strong</option>
                                                    <option value="VeryStrong" @if(old('dia_fluorescence_intensity')==='VeryStrong' ) selected @endif>Very Strong</option>
                                                    <option value="その他 (Other)" @if(old('dia_fluorescence_intensity')==='その他 (Other)' ) selected @endif>その他 (Other)</option>
                                                </select>
                                            </div>
                                            <div class="select_area_middle">
                                                蛍光性の色 / Color<br>
                                                <select class="form-control" name="dia_fluorescence_color">
                                                    <option value="">--選択--</option>
                                                    <option value="None" @if(old('dia_fluorescence_color')==='None' ) selected @endif>None</option>
                                                    <option value="Blue" @if(old('dia_fluorescence_color')==='Blue' ) selected @endif>Blue</option>
                                                    <option value="Yellow" @if(old('dia_fluorescence_color')==='Yellow' ) selected @endif>Yellow</option>
                                                    <option value="Green" @if(old('dia_fluorescence_color')==='Green' ) selected @endif>Green</option>
                                                    <option value="Red" @if(old('dia_fluorescence_color')==='Red' ) selected @endif>Red</option>
                                                    <option value="Orange" @if(old('dia_fluorescence_color')==='Orange' ) selected @endif>Orange</option>
                                                    <option value="White" @if(old('dia_fluorescence_color')==='White' ) selected @endif>White</option>
                                                    <option value="その他 (Other)" @if(old('dia_fluorescence_color')==='その他 (Other)' ) selected @endif>その他 (Other)</option>
                                                </select>
                                            </div>
                                            <br clear="all">
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-0" colspan="4">
                                <div class="shape">
                                    <div>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/05.png"></div>
                                            ラウンドブリリアント<br>(Round)<br>
                                            <input type="checkbox" name="dia_shape[]" value="ラウンドブリリアント (Round)" @if(is_array(old('dia_shape')) && in_array("ラウンドブリリアント (Round)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/32.png"></div>
                                            スクエア<br>(Squiare)<br>
                                            <input type="checkbox" name="dia_shape[]" value="スクエア (Squiare)" @if(is_array(old('dia_shape')) && in_array("スクエア (Squiare)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/02.png"></div>
                                            トライアングル<br>(Triangular)<br>
                                            <input type="checkbox" name="dia_shape[]" value="トライアングル (Triangular)" @if(is_array(old('dia_shape')) && in_array("トライアングル (Triangular)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/03.png"></div>
                                            ブリオレット<br>(Briolette)<br>
                                            <input type="checkbox" name="dia_shape[]" value="ブリオレット (Briolette)" @if(is_array(old('dia_shape')) && in_array("ブリオレット (Briolette)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/04.png"></div>
                                            オクタゴナル<br>(Octagonal)<br>
                                            <input type="checkbox" name="dia_shape[]" value="オクタゴナル (Octagonal)" @if(is_array(old('dia_shape')) && in_array("オクタゴナル (Octagonal)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/28.png"></div>
                                            ロゼンジ<br>(Lozenge)<br>
                                            <input type="checkbox" name="dia_shape[]" value="ロゼンジ (Lozenge)" @if(is_array(old('dia_shape')) && in_array("ロゼンジ (Lozenge)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                    </div>
                                    <div>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/06.png"></div>
                                            ペアシェイプ<br>(Pear)<br>
                                            <input type="checkbox" name="dia_shape[]" value="ペアシェイプ (Pear)" @if(is_array(old('dia_shape')) && in_array("ペアシェイプ (Pear)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/07.png"></div>
                                            プリンセス<br>(Princess)<br>
                                            <input type="checkbox" name="dia_shape[]" value="プリンセス (Princess)" @if(is_array(old('dia_shape')) && in_array("プリンセス (Princess)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/08.png"></div>
                                            スクエアエメラルド<br>(Squiare Emerald)<br>
                                            <input type="checkbox" name="dia_shape[]" value="スクエアエメラルド (Squiare Emerald)" @if(is_array(old('dia_shape')) && in_array("スクエアエメラルド (Squiare Emerald)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/09.png"></div>
                                            マーキース<br>(Marquise)<br>
                                            <input type="checkbox" name="dia_shape[]" value="マーキース (Marquise)" @if(is_array(old('dia_shape')) && in_array("マーキース (Marquise)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/10.png"></div>
                                            オーバル<br>(Oval)<br>
                                            <input type="checkbox" name="dia_shape[]" value="オーバル (Oval)" @if(is_array(old('dia_shape')) && in_array("オーバル (Oval)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/29.png"></div>
                                            ペンタゴナル<br>(Pentagonal)<br>
                                            <input type="checkbox" name="dia_shape[]" value="ペンタゴナル (Pentagonal)" @if(is_array(old('dia_shape')) && in_array("ペンタゴナル (Pentagonal)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                    </div>
                                    <div>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/11.png"></div>
                                            ラディアント<br>(Radiant)<br>
                                            <input type="checkbox" name="dia_shape[]" value="ラディアント (Radiant)" @if(is_array(old('dia_shape')) && in_array("ラディアント (Radiant)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/12.png"></div>
                                            エメラルド<br>(Emerald)<br>
                                            <input type="checkbox" name="dia_shape[]" value="エメラルド (Emerald)" @if(is_array(old('dia_shape')) && in_array("エメラルド (Emerald)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/13.png"></div>
                                            トリリアント<br>(Trilliant)<br>
                                            <input type="checkbox" name="dia_shape[]" value="トリリアント (Trilliant)" @if(is_array(old('dia_shape')) && in_array("トリリアント (Trilliant)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/14.png"></div>
                                            ハート<br>(Heart)<br>
                                            <input type="checkbox" name="dia_shape[]" value="ハート (Heart)" @if(is_array(old('dia_shape')) && in_array("ハート (Heart)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/15.png"></div>
                                            ヨーロピアン<br>(European Cut)<br>
                                            <input type="checkbox" name="dia_shape[]" value="ヨーロピアン (European Cut)" @if(is_array(old('dia_shape')) && in_array("ヨーロピアン (European Cut)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/30.png"></div>
                                            ローズ<br>(Rose)<br>
                                            <input type="checkbox" name="dia_shape[]" value="ローズ (Rose)" @if(is_array(old('dia_shape')) && in_array("ローズ (Rose)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                    </div>
                                    <div>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/16.png"></div>
                                            オールドマイナー<br>(Old miner)<br>
                                            <input type="checkbox" name="dia_shape[]" value="オールドマイナー (Old miner)" @if(is_array(old('dia_shape')) && in_array("オールドマイナー (Old miner)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/17.png"></div>
                                            フランダース<br>(Flanders)<br>
                                            <input type="checkbox" name="dia_shape[]" value="フランダース (Flanders)" @if(is_array(old('dia_shape')) && in_array("フランダース (Flanders)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/18.png"></div>
                                            クッション<br>(Cushion)<br>
                                            <input type="checkbox" name="dia_shape[]" value="クッション (Cushion)" @if(is_array(old('dia_shape')) && in_array("クッション (Cushion)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/19.png"></div>
                                            変形クッション<br>(Cushion Modified)<br>
                                            <input type="checkbox" name="dia_shape[]" value="クッション モディファイド (Cushion Modified)" @if(is_array(old('dia_shape')) && in_array("クッション モディファイド (Cushion Modified)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/20.png"></div>
                                            アッシャー<br>(Asscher)<br>
                                            <input type="checkbox" name="dia_shape[]" value="アッシャー (Asscher)" @if(is_array(old('dia_shape')) && in_array("アッシャー (Asscher)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/31.png"></div>
                                            シールド<br>(Shield)<br>
                                            <input type="checkbox" name="dia_shape[]" value="シールド (Shield)" @if(is_array(old('dia_shape')) && in_array("シールド (Shield)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                    </div>
                                    <div>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/21.png"></div>
                                            バケット<br>(Baquette)<br>
                                            <input type="checkbox" name="dia_shape[]" value="バケット (Baquette)" @if(is_array(old('dia_shape')) && in_array("バケット (Baquette)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/23.png"></div>
                                            スター<br>(Star)<br>
                                            <input type="checkbox" name="dia_shape[]" value="スター (Star)" @if(is_array(old('dia_shape')) && in_array("スター (Star)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/25.png"></div>
                                            トラピゾイド<br>(Trapezoid)<br>
                                            <input type="checkbox" name="dia_shape[]" value="トラピゾイド (Trapezoid)" @if(is_array(old('dia_shape')) && in_array("トラピゾイド (Trapezoid)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/26.png"></div>
                                            ブレット<br>(Bullets)<br>
                                            <input type="checkbox" name="dia_shape[]" value="ブレット (Bullets)" @if(is_array(old('dia_shape')) && in_array("ブレット (Bullets)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/27.png"></div>
                                            ヘキサゴナル<br>(Hexagonal)<br>
                                            <input type="checkbox" name="dia_shape[]" value="ヘキサゴナル (Hexagonal)" @if(is_array(old('dia_shape')) && in_array("ヘキサゴナル (Hexagonal)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                        <label>
                                            <div class="shape_image"><img src="https://kinkaimasu.jp/estimate/item/35.png"></div>
                                            その他<br>(Other)<br>
                                            <input type="checkbox" name="dia_shape[]" value="その他 (Other)" @if(is_array(old('dia_shape')) && in_array("その他 (Other)",old('dia_shape'), true)) checked @endif>
                                        </label>
                                    </div>
                                    <label for="q8_other">
                                        ×CLEAR<br>
                                        <span>選択したシェイプを解除する。</span>
                                        <input type="radio" name="dia_shape[]" value="" id="dia_shape[]">
                                    </label>
                                </div>
                            </td>
                        </tr>

                    </table>



                    <table id="brand" class="">
                        <tr>
                            <td class="p-0" colspan="4">
                                <h4>【詳細情報】ブランド品・衣類・その他</h4>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2">ブランド名</th>
                            <td colspan="2">
                                <!-- ←エラー表示部分01 -->
                                <p class="err"><span class="red"><input name="key" type="hidden" id="key" value=""></span></p>
                                <!-- ←エラー表示部分01 -->
                                <input class="form-control" type="text" name="brand_name" id="brand_name" value="{{ old('brand_name') }}" placeholder="ご入力ください。">
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2">アイテム名(バッグ等)</th>
                            <td colspan="2"><input class="form-control" type="text" name="brand_item" value="{{ old('brand_item') }}" placeholder="ご入力ください。"></td>
                        </tr>
                        <tr>
                            <th colspan="2">型番･シリーズ･色等</th>
                            <td colspan="2"><input class="form-control" type="text" name="brand_model" value="{{ old('brand_model') }}" placeholder="ご入力ください。"></td>
                        </tr>
                        <tr class="brand_condition">
                            <th colspan="2">状態</th>
                            <td colspan="2">
                                <select class="form-control" name="brand_condition">
                                    <option value="">--選択--</option>
                                    <option value="SS：新品未開封、或いは梱包を取ったのみ" @if(old('brand_condition')==='SS：新品未開封、或いは梱包を取ったのみ' ) selected @endif>SS：新品未開封、或いは梱包を取ったのみ</option>
                                    <option value="S ：使用回数、数回レベルの超美品" @if(old('brand_condition')==='S ：使用回数、数回レベルの超美品' ) selected @endif>S：使用回数、数回レベルの超美品</option>
                                    <option value="A ：大切に使われ程良い状態" @if(old('brand_condition')==='A ：大切に使われ程良い状態' ) selected @endif>A ：大切に使われ程良い状態</option>
                                    <option value="B ：全体的な使用感あり" @if(old('brand_condition')==='B ：全体的な使用感あり' ) selected @endif>B ：全体的な使用感あり</option>
                                    <option value="C ：一部難ありや汚れが酷い、お直しが必要等の状態" @if(old('brand_condition')==='C ：一部難ありや汚れが酷い、お直しが必要等の状態' ) selected @endif>C ：一部難ありや汚れが酷い、お直しが必要等の状態</option>
                                    <option value="D ：ジャンク品(使用不可や壊れている等)" @if(old('brand_condition')==='D ：ジャンク品(使用不可や壊れている等)' ) selected @endif>D ：ジャンク品(使用不可や壊れている等)</option>
                                </select>
                                <optgroup label=""></optgroup>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2">ご購入店</th>
                            <td colspan="1">
                                <select class="form-control" name="brand_shop_name">
                                    <option value="">--選択--</option>
                                    <option value="国内正規店" @if(old('brand_shop_name')==='国内正規店' ) selected @endif>国内正規店</option>
                                    <option value="海外正規店" @if(old('brand_shop_name')==='海外正規店' ) selected @endif>海外正規店</option>
                                    <option value="アウトレット" @if(old('brand_shop_name')==='アウトレット' ) selected @endif>アウトレット</option>
                                    <option value="並行輸入品取扱店" @if(old('brand_shop_name')==='並行輸入品取扱店' ) selected @endif>並行輸入品取扱店</option>
                                    <option value="プレゼント・頂き物" @if(old('brand_shop_name')==='プレゼント・頂き物' ) selected @endif>プレゼント・頂き物</option>
                                    <option value="中古店・リサイクルショップ" @if(old('brand_shop_name')==='中古店・リサイクルショップ' ) selected @endif>中古店・リサイクルショップ</option>
                                    <option value="免税店・デューティーフリー" @if(old('brand_shop_name')==='免税店・デューティーフリー' ) selected @endif>免税店・デューティーフリー</option>
                                    <option value="その他" @if(old('brand_shop_name')==='その他' ) selected @endif>その他</option>
                                </select>
                                <optgroup label=""></optgroup>
                            </td>
                        </tr>

                    </table>
                    <div id="take_picture">
                        <div class="main_column">
                            <ul id="jewelry">
                                <li>
                                    <h3 class="ttl gold">貴金属・ジュエリーの撮影ポイント</h3>
                                    <div id="light_switch_4" class="pic_area">
                                        <span class="gold">1</span>
                                        <img src="https://kinkaimasu.jp/line/img/pc/take_picture/jewelry/img_01.jpg" alt="ジュエリー全体の写真">
                                        <p class="text">ジュエリー全体の写真</p>
                                    </div>
                                    <div id="light_switch_5" class="pic_area">
                                        <span class="gold">2</span>
                                        <img src="https://kinkaimasu.jp/line/img/pc/take_picture/jewelry/img_02.jpg" alt="刻印の写真">
                                        <p class="text">刻印の写真</p>
                                    </div>
                                    <div id="light_switch_6" class="pic_area">
                                        <span class="gold">3</span>
                                        <img src="https://kinkaimasu.jp/line/img/pc/take_picture/jewelry/img_03.jpg" alt="付属品の詳細写真">
                                        <p class="text">付属品の詳細写真</p>
                                    </div>
                                    <div id="light_switch_7" class="pic_area">
                                        <span class="gold">4</span>
                                        <img src="https://kinkaimasu.jp/line/img/pc/take_picture/jewelry/img_04.jpg" alt="付属品の全体写真">
                                        <p class="text">付属品の全体写真</p>
                                    </div>
                                </li>
                            </ul>
                            <ul id="bag" class="pc_only">
                                <li>
                                    <h3 class="ttl brown">ブランドバッグ・財布の撮影ポイント</h3>
                                    <div id="light_switch_8" class="pic_area">
                                        <span class="brown">1</span>
                                        <img src="https://kinkaimasu.jp/line/img/pc/take_picture/bag/img_01.jpg" alt="全体がわかる写真">
                                        <p class="text">全体がわかる写真</p>
                                    </div>
                                    <div id="light_switch_9" class="pic_area">
                                        <span class="brown">2</span>
                                        <img src="https://kinkaimasu.jp/line/img/pc/take_picture/bag/img_02.jpg" alt="裏側や内側の写真">
                                        <p class="text">裏側や内側の写真</p>
                                    </div>
                                    <div id="light_switch_10" class="pic_area">
                                        <span class="brown">3</span>
                                        <img src="https://kinkaimasu.jp/line/img/pc/take_picture/wallet/img_03.jpg" alt="汚れやダメージ部分のアップ">
                                        <p class="text">汚れやダメージ部分のアップ</p>
                                    </div>
                                    <div id="light_switch_11" class="pic_area">
                                        <span class="brown">4</span>
                                        <img src="https://kinkaimasu.jp/line/img/pc/take_picture/wallet/img_04.jpg" alt="ブランドタグの写真">
                                        <p class="text">ブランドタグの写真</p>
                                    </div>
                                </li>
                            </ul>
                            <ul id="apparel" class="pc_only">
                                <li>
                                    <h3 class="ttl blue">ブランド古着・靴の撮影ポイント</h3>
                                    <div id="light_switch_12" class="pic_area">
                                        <span class="blue">1</span>
                                        <img src="https://kinkaimasu.jp/line/img/pc/take_picture/apparel/img_01.jpg" alt="全体がわかる写真">
                                        <p class="text">全体がわかる写真</p>
                                    </div>
                                    <div id="light_switch_13" class="pic_area">
                                        <span class="blue">2</span>
                                        <img src="https://kinkaimasu.jp/line/img/pc/take_picture/apparel/img_02.jpg" alt="ブランド・品質表示タグ">
                                        <p class="text">ブランド・品質表示タグ</p>
                                    </div>
                                    <div id="light_switch_14" class="pic_area">
                                        <span class="blue">3</span>
                                        <img src="https://kinkaimasu.jp/line/img/pc/take_picture/apparel/img_03.jpg" alt="全体がわかる写真">
                                        <p class="text">全体がわかる写真</p>
                                    </div>
                                    <div id="light_switch_15" class="pic_area">
                                        <span class="blue">4</span>
                                        <img src="https://kinkaimasu.jp/line/img/pc/take_picture/apparel/img_04.jpg" alt="汚れやダメージ部分のアップ">
                                        <p class="text">汚れやダメージ部分のアップ</p>
                                    </div>
                                </li>
                            </ul>
                            <ul id="watch" class="pc_only">
                                <li>
                                    <h3 class="ttl green">ブランドウォッチ・時計の撮影ポイント</h3>
                                    <div id="light_switch_16" class="pic_area">
                                        <span class="green">1</span>
                                        <img src="https://kinkaimasu.jp/line/img/pc/take_picture/watch/img_01.jpg" alt="全体がわかる写真">
                                        <p class="text">全体がわかる写真</p>
                                    </div>
                                    <div id="light_switch_17" class="pic_area">
                                        <span class="green">2</span>
                                        <img src="https://kinkaimasu.jp/line/img/pc/take_picture/watch/img_02.jpg" alt="文字盤をアップした写真">
                                        <p class="text">文字盤をアップした写真</p>
                                    </div>
                                    <div id="light_switch_18" class="pic_area">
                                        <span class="green">3</span>
                                        <img src="https://kinkaimasu.jp/line/img/pc/take_picture/watch/img_03.jpg" alt="裏ブタ部分の写真">
                                        <p class="text">裏ブタ部分の写真</p>
                                    </div>
                                    <div id="light_switch_19" class="pic_area">
                                        <span class="green">4</span>
                                        <img src="https://kinkaimasu.jp/line/img/pc/take_picture/watch/img_04.jpg" alt="付属品の写真">
                                        <p class="text">付属品の写真</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <button type="button" class="btn point_btn sp_only" data-toggle="modal" data-target=".point_modal">お品物の撮影方法のポイント</button>
                    <h3 class="customer_title">お客様情報</h3>

                    <table id="customer">
                        <tr>
                            <th colspan="2">電話番号</th>
                            <td colspan="2">
                                <input class="form-control no-spin" type="number" name="tel" id="tel" value="{{ old('tel') }}" placeholder="例）08012345678">
                                <small class="form-text text-muted">ハイフン不要・半角数字</small>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2"><span class="color_red">必須</span>メールアドレス</th>
                            <td colspan="2">
                                <input class="form-control" type="text" name="mail" id="mail" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required value="{{ old('mail') }}" placeholder="例）rifa@urlounge.co.jp">
                                <small class="form-text text-muted">半角英数字</small>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2"><span class="color_red">必須</span>希望連絡方法</th>
                            <td colspan="2" id="q17_btn">
                                <label id="check_mail"><input type="radio" name="contact" class="form-control" value="メール" @if("メール"===old('contact') or old('contact')===NULL ) checked @endif>メール</label>
                                <label id="check_tell"><input type="radio" name="contact" class="form-control" value="電話" @if("電話"===old('contact')) checked @endif>電話</label>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2"><span></span>備考欄</th>
                            <td colspan="2">
                                <textarea 
                                    class="form-control"
                                    name="bikou" 
                                    id="bikou" 
                                    value="{{ old('bikou') }}" 
                                >{{$bikou_default_text}}</textarea>
                            </td>
                        </tr>
                    </table>
                    
                    <div class="form-group row justify-content-center terms_text_area">
                        <label class="col-md-3 col-form-label row form_ttl_area">
                            <div class="form_ttl_wrap">
                                <span class="badge badge-danger color_red">必須</span>
                                <div class="form_ttl">個人情報取扱い</div>
                            </div>
                            <div class="confirmation_text">
                                ※ご確認の上『送信ボタン』<br class="pc_only">を押してください。
                            </div>
                        </label>

                        <div class="col-md-8 agree_area">
                            <div class="col-sm-12 p-0">
                                <!-- <p>
                                    ＊以下を同意の上、「同意する」にチェックしてください。
                                </p> -->
                                <div id="accordionKiyaku" class="accordion">
                                    <div class="card">

                                        <div class="card">
                                            <div id="headingTwo" class="card-header">
                                                <h5 class="mb-0"><button type="button" data-toggle="collapse" data-target="#privacy_box" aria-expanded="false" aria-controls="privacy_box" class="btn btn-link collapsed">
                                                        ▼個人情報取扱い通知事項
                                                    </button></h5>

                                            </div>
                                            <div id="privacy_box" aria-labelledby="headingTwo" data-parent="#accordionKiyaku" class="collapse show">
                                            <div class="card-body">
                                                    {!! $kiyaku_html !!}
                                                    <div class="policy-text">
                                                        <ol>お客様からの個人情報に関するお問い合わせにつきましては、弊社所定の手続に基づき誠実に対応します。弊社個人情報保護マネジメントシステム(PMS)のお客様相談窓口へお問合せください。</ol>
                                                        <div class="policy_contact">
                                                            苦情及び相談対応／個人情報お問合せ窓口<br>
                                                            〒1700013 東京都豊島区東池袋1-25-14<br>
                                                            ラウンジデザイナーズ株式会社<br>
                                                            個人情報保護管理責任者<br>
                                                            E-mail：policy@urlounge.co.jp
                                                        </div>
                                                    </div>
                                                    <p class="bottom_text">
                                                        ２０１０年　５月２７日　制定<br>
                                                        ２０１９年　４月２５日　改訂<br>
                                                        東京都豊島区東池袋1-25-14<br>
                                                        ラウンジデザイナーズ株式会社<br>
                                                        代表取締役社長　杉　兼太朗<br>
                                                    </p>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-sm-12 p-0">
                                    <div class="custom-control custom-checkbox kiyaku-check-btn">
                                        <input type="checkbox" name="kiyaku_check" id="kiyaku_check" aria-describedby="kiyaku_checkHelpBlock" autocomplete="off" required="required" class="form-control custom-control-input">
                                        <label for="kiyaku_check" class="custom-control-label">
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
                                        <div id="kiyaku_checkHelpBlock" class="form-text text-muted">
                                            <div class="text-center"><strong>キャンセル料,返送料は原則無料です。<br></strong></div>
                                            全てのお品物に金額が付かなかった場合は、「着払い」にてご返却させていただいております。
                                            ただし、一点でもお値段がつけば弊社「元払い」にてご返却いたします。
                                            予め了承ください。
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="g-recaptcha" data-callback="onSubmit" data-sitekey="{{ env("GOOGLE_RECAPTHA_SITEKEY") }}"></div>
                        <noscript>
                        <button type="submit"name="" disabled class="btn btn-primary btn-lg submit_btn js_submit_btn "><span class="agree_text">同意して</span>送信する</button>
                        </noscript>
                    <button type="submit" name="" disabled class="btn btn-primary btn-lg submit_btn js_submit_btn "><span class="agree_text">同意して</span>送信する</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="ss_box" style="text-align: center; display: block; margin: 20px auto 15px;">
    <form action="https://www.login.secomtrust.net/customer/customer/pfw/CertificationPage.do" name="CertificationPageForm" method="post" target="_blank" style="margin: 0px;"><input type="image" src="https://rifa.life/refasta_wordpress/wp-content/uploads/2022/03/B0310422-1.gif" width="56" name="Sticker" alt="クリックして証明書の内容をご確認ください" oncontextmenu="return false;"> <input type="hidden" name="Req_ID" value="7388475980"></form>
</div>
<div class="secom_text" style="text-align: center; font-size: 12px; margin-bottom: 25px;">
    このサイトは、セコムトラストシステムズ株式会社のサーバ証明書により実在性が認証されています。<br class="pc_only">
    また、SSLページは通信が暗号化されプライバシーが守られています。</div>

@endsection

@section('body_last')
<div class="modal fade coupon_modal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <section class="section section_coupon" id="plugin-coupon-82371134313963" data-js-plugin="coupon">
                <div class="coupon_plugin_list">
                    <div class="coupon_plugin_item">
                        <a target="_self" rel="noopener" href="https://liff.line.me/1654883387-DxN9w07M/c/NkqEO0UUk" class="coupon_link">
                            <div class="coupon_info">
                                <em class="coupon_category coupon_limit">1回のみ利用可</em>
                                <strong class="coupon_title">【7月】誕生日クーポン | リファスタ</strong>
                                <span class="coupon_date">2022.07.01~2022.07.31</span>
                            </div>
                            <div class="coupon_thumb">
                                <picture class="picture">
                                    <source media="(min-width: 480px)" srcset="https://obs.line-scdn.net/0hacc3TXTdPkxeSioWPhJBGwALJC8uIisEMHI1ayUVfi4oeiNxYVg6eSQpKxQvcjhkBEQteDBKIC4GGiVPFyw6USQuaAAWHThKBCV1engfKwAVez9mEEcwSx4xOw?0">
                                    <img class="image" alt="" src="https://obs.line-scdn.net/0hacc3TXTdPkxeSioWPhJBGwALJC8uIisEMHI1ayUVfi4oeiNxYVg6eSQpKxQvcjhkBEQteDBKIC4GGiVPFyw6USQuaAAWHThKBCV1engfKwAVez9mEEcwSx4xOw/w150?0">
                                </picture>
                            </div>
                        </a>
                    </div>
                    <div class="coupon_plugin_item">
                        <a target="_self" rel="noopener" href="https://liff.line.me/1654883387-DxN9w07M/c/NgRfrGFg6" class="coupon_link">
                            <div class="coupon_info">
                                <em class="coupon_category coupon_limit">1回のみ利用可</em>
                                <strong class="coupon_title">【2022】初回限定クーポン | リファスタ</strong>
                                <span class="coupon_date">2022.01.01~2022.12.27</span>
                            </div>
                            <div class="coupon_thumb">
                                <picture class="picture">
                                    <source media="(min-width: 480px)" srcset="https://obs.line-scdn.net/0hEZOycRybGnVyAA4vE7plIipBABYCaA89HDgRUglfWhcEMRVwTA0XQyFVAi4mSwRINw0IaAh8TBUAQFxYEQZdQR9rRCQ6RF1zKDsSbDFnAS0URxhfOxYJQzIBDTov?0">
                                    <img class="image" alt="" src="https://obs.line-scdn.net/0hEZOycRybGnVyAA4vE7plIipBABYCaA89HDgRUglfWhcEMRVwTA0XQyFVAi4mSwRINw0IaAh8TBUAQFxYEQZdQR9rRCQ6RF1zKDsSbDFnAS0URxhfOxYJQzIBDTov/w150?0">
                                </picture>
                            </div>
                        </a>
                    </div>
                    <div class="coupon_plugin_item">
                        <a target="_self" rel="noopener" href="https://liff.line.me/1654883387-DxN9w07M/c/N6LyPPua9" class="coupon_link">
                            <div class="coupon_info">
                                <em class="coupon_category coupon_limit">1回のみ利用可</em>
                                <strong class="coupon_title">【総額300万円】10万円還元クーポン | リファスタ</strong>
                                <span class="coupon_date">2021.07.03~2027.07.03</span>
                            </div>
                            <div class="coupon_thumb">
                                <picture class="picture">
                                    <source media="(min-width: 480px)" srcset="https://obs.line-scdn.net/0hm6fa98xxMhlbGCShl4xNTnhZKHorcCdRNSA5PiBHcntwfyJNZn4tdnYbZSx2K3xHNCsuLSkabih0IXEbNCouOn9MbHtxLnBN?0">
                                    <img class="image" alt="" src="https://obs.line-scdn.net/0hm6fa98xxMhlbGCShl4xNTnhZKHorcCdRNSA5PiBHcntwfyJNZn4tdnYbZSx2K3xHNCsuLSkabih0IXEbNCouOn9MbHtxLnBN/w150?0">
                                </picture>
                            </div>
                        </a>
                    </div>
                    <div class="coupon_plugin_item">
                        <a target="_self" rel="noopener" href="https://liff.line.me/1654883387-DxN9w07M/c/NMAs67FMc" class="coupon_link">
                            <div class="coupon_info">
                                <em class="coupon_category coupon_limit">1回のみ利用可</em>
                                <strong class="coupon_title">プレミア限定10,000円クーポン（キーワード発行）</strong>
                                <span class="coupon_date">2021.07.03~2027.07.10</span>
                            </div>
                            <div class="coupon_thumb">
                                <picture class="picture">
                                    <source media="(min-width: 480px)" srcset="https://obs.line-scdn.net/0h-EdWKxB_cmpZLmTS7KYNPXpvaAkpRmciNxZ5TSJxMl1yTTA0Zxw7CHp5eF8gSTRvYR1pDy95flMgFjJvY05uSX16LAhwSjFr?0">
                                    <img class="image" alt="" src="https://obs.line-scdn.net/0h-EdWKxB_cmpZLmTS7KYNPXpvaAkpRmciNxZ5TSJxMl1yTTA0Zxw7CHp5eF8gSTRvYR1pDy95flMgFjJvY05uSX16LAhwSjFr/w150?0">
                                </picture>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<div class="modal fade point_modal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <button type="button" class="close_btn_right" data-dismiss="modal">✖️</button>
            <button type="button" class="btn btn-info close_btn" data-dismiss="modal">閉じる</button>
            <div id="take_picture">
                <div class="main_column">
                    <!-- <ul id="jewelry">
                        <li>
                            <h3 class="ttl gold">貴金属・ジュエリーの撮影ポイント</h3>
                            <div id="light_switch_4" class="pic_area">
                                <span class="gold">1</span>
                                <img src="https://kinkaimasu.jp/line/img/pc/take_picture/jewelry/img_01.jpg" alt="ジュエリー全体の写真">
                                <p class="text">ジュエリー全体の写真</p>
                            </div>
                            <div id="light_switch_5" class="pic_area">
                                <span class="gold">2</span>
                                <img src="https://kinkaimasu.jp/line/img/pc/take_picture/jewelry/img_02.jpg" alt="刻印の写真">
                                <p class="text">刻印の写真</p>
                            </div>
                            <div id="light_switch_6" class="pic_area">
                                <span class="gold">3</span>
                                <img src="https://kinkaimasu.jp/line/img/pc/take_picture/jewelry/img_03.jpg" alt="付属品の詳細写真">
                                <p class="text">付属品の詳細写真</p>
                            </div>
                            <div id="light_switch_7" class="pic_area">
                                <span class="gold">4</span>
                                <img src="https://kinkaimasu.jp/line/img/pc/take_picture/jewelry/img_04.jpg" alt="付属品の全体写真">
                                <p class="text">付属品の全体写真</p>
                            </div>
                        </li>
                    </ul> -->
                    <ul id="bag">
                        <li>
                            <h3 class="ttl brown">ブランドバッグ・財布の撮影ポイント</h3>
                            <div id="light_switch_8" class="pic_area">
                                <span class="brown">1</span>
                                <img src="https://kinkaimasu.jp/line/img/pc/take_picture/bag/img_01.jpg" alt="全体がわかる写真">
                                <p class="text">全体がわかる写真</p>
                            </div>
                            <div id="light_switch_9" class="pic_area">
                                <span class="brown">2</span>
                                <img src="https://kinkaimasu.jp/line/img/pc/take_picture/bag/img_02.jpg" alt="裏側や内側の写真">
                                <p class="text">裏側や内側の写真</p>
                            </div>
                            <div id="light_switch_10" class="pic_area">
                                <span class="brown">3</span>
                                <img src="https://kinkaimasu.jp/line/img/pc/take_picture/wallet/img_03.jpg" alt="汚れやダメージ部分のアップ">
                                <p class="text">汚れやダメージ部分のアップ</p>
                            </div>
                            <div id="light_switch_11" class="pic_area">
                                <span class="brown">4</span>
                                <img src="https://kinkaimasu.jp/line/img/pc/take_picture/wallet/img_04.jpg" alt="ブランドタグの写真">
                                <p class="text">ブランドタグの写真</p>
                            </div>
                        </li>
                    </ul>
                    <ul id="apparel">
                        <li>
                            <h3 class="ttl blue">ブランド古着・靴の撮影ポイント</h3>
                            <div id="light_switch_12" class="pic_area">
                                <span class="blue">1</span>
                                <img src="https://kinkaimasu.jp/line/img/pc/take_picture/apparel/img_01.jpg" alt="全体がわかる写真">
                                <p class="text">全体がわかる写真</p>
                            </div>
                            <div id="light_switch_13" class="pic_area">
                                <span class="blue">2</span>
                                <img src="https://kinkaimasu.jp/line/img/pc/take_picture/apparel/img_02.jpg" alt="ブランド・品質表示タグ">
                                <p class="text">ブランド・品質表示タグ</p>
                            </div>
                            <div id="light_switch_14" class="pic_area">
                                <span class="blue">3</span>
                                <img src="https://kinkaimasu.jp/line/img/pc/take_picture/apparel/img_03.jpg" alt="全体がわかる写真">
                                <p class="text">全体がわかる写真</p>
                            </div>
                            <div id="light_switch_15" class="pic_area">
                                <span class="blue">4</span>
                                <img src="https://kinkaimasu.jp/line/img/pc/take_picture/apparel/img_04.jpg" alt="汚れやダメージ部分のアップ">
                                <p class="text">汚れやダメージ部分のアップ</p>
                            </div>
                        </li>
                    </ul>
                    <ul id="watch">
                        <li>
                            <h3 class="ttl green">ブランドウォッチ・時計の撮影ポイント</h3>
                            <div id="light_switch_16" class="pic_area">
                                <span class="green">1</span>
                                <img src="https://kinkaimasu.jp/line/img/pc/take_picture/watch/img_01.jpg" alt="全体がわかる写真">
                                <p class="text">全体がわかる写真</p>
                            </div>
                            <div id="light_switch_17" class="pic_area">
                                <span class="green">2</span>
                                <img src="https://kinkaimasu.jp/line/img/pc/take_picture/watch/img_02.jpg" alt="文字盤をアップした写真">
                                <p class="text">文字盤をアップした写真</p>
                            </div>
                            <div id="light_switch_18" class="pic_area">
                                <span class="green">3</span>
                                <img src="https://kinkaimasu.jp/line/img/pc/take_picture/watch/img_03.jpg" alt="裏ブタ部分の写真">
                                <p class="text">裏ブタ部分の写真</p>
                            </div>
                            <div id="light_switch_19" class="pic_area">
                                <span class="green">4</span>
                                <img src="https://kinkaimasu.jp/line/img/pc/take_picture/watch/img_04.jpg" alt="付属品の写真">
                                <p class="text">付属品の写真</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <button type="button" class="btn btn-info close_btn" data-dismiss="modal">閉じる</button>
        </div>
    </div>
</div>
<div id="dia_point_content">
    <div class="modal_content_detail">
        <div class="modal_content_in">
            <div class="modal_content_img">
                <img class="modal_content_img_content" src="https://kinkaimasu.jp/line/img/pc/take_picture/jewelry/img_01.jpg">
            </div>
            <div class="modal_content_text">ジュエリー全体の写真</div>
        </div>
        <div class="modal_content_in">
            <div class="modal_content_img">
                <img class="modal_content_img_content" src="https://kinkaimasu.jp/line/img/pc/take_picture/jewelry/img_02.jpg">
            </div>
            <div class="modal_content_text">刻印の写真</div>
        </div>
        <div class="modal_content_in">
            <div class="modal_content_img">
                <img class="modal_content_img_content" src="https://kinkaimasu.jp/line/img/pc/take_picture/jewelry/img_03.jpg">
            </div>
            <div class="modal_content_text">付属品の詳細写真</div>
        </div>
        <div class="modal_content_in">
            <div class="modal_content_img">
                <img class="modal_content_img_content" src="https://kinkaimasu.jp/line/img/pc/take_picture/jewelry/img_04.jpg">
            </div>
            <div class="modal_content_text">付属品の全体写真</div>
        </div>
    </div>
</div>
<div id="brand_point_content">
    <div class="modal_content_detail">
        <div class="modal_content_in">
            <div class="modal_content_img">
                <img class="modal_content_img_content" src="https://kinkaimasu.jp/line/img/pc/take_picture/bag/img_01.jpg">
            </div>
            <div class="modal_content_text">全体が分かる写真</div>
        </div>
        <div class="modal_content_in">
            <div class="modal_content_img">
                <img class="modal_content_img_content" src="https://kinkaimasu.jp/line/img/pc/take_picture/bag/img_02.jpg">
            </div>
            <div class="modal_content_text">裏側や内側の写真</div>
        </div>
        <div class="modal_content_in">
            <div class="modal_content_img">
                <img class="modal_content_img_content" src="https://kinkaimasu.jp/line/img/pc/take_picture/bag/img_03.jpg">
            </div>
            <div class="modal_content_text">汚れやダメージ部分のアップ</div>
        </div>
        <div class="modal_content_in">
            <div class="modal_content_img">
                <img class="modal_content_img_content" src="https://kinkaimasu.jp/line/img/pc/take_picture/bag/img_04.jpg">
            </div>
            <div class="modal_content_text">ブランドタグの写真</div>
        </div>
    </div>
    <div class="modal_content_detail">
        <div class="modal_content_in">
            <div class="modal_content_img">
                <img class="modal_content_img_content" src="https://kinkaimasu.jp/line/img/pc/take_picture/apparel/img_01.jpg">
            </div>
            <div class="modal_content_text">全体が分かる写真</div>
        </div>
        <div class="modal_content_in">
            <div class="modal_content_img">
                <img class="modal_content_img_content" src="https://kinkaimasu.jp/line/img/pc/take_picture/apparel/img_02.jpg">
            </div>
            <div class="modal_content_text">ブランド・品質表示タグ</div>
        </div>
        <div class="modal_content_in">
            <div class="modal_content_img">
                <img class="modal_content_img_content" src="https://kinkaimasu.jp/line/img/pc/take_picture/apparel/img_03.jpg">
            </div>
            <div class="modal_content_text">全体が分かる写真</div>
        </div>
        <div class="modal_content_in">
            <div class="modal_content_img">
                <img class="modal_content_img_content" src="https://kinkaimasu.jp/line/img/pc/take_picture/apparel/img_04.jpg">
            </div>
            <div class="modal_content_text">汚れやダメージ部分のアップ</div>
        </div>
    </div>
    <div class="modal_content_detail">
        <div class="modal_content_in">
            <div class="modal_content_img">
                <img class="modal_content_img_content" src="https://kinkaimasu.jp/line/img/pc/take_picture/watch/img_01.jpg">
            </div>
            <div class="modal_content_text">全体が分かる写真</div>
        </div>
        <div class="modal_content_in">
            <div class="modal_content_img">
                <img class="modal_content_img_content" src="https://kinkaimasu.jp/line/img/pc/take_picture/watch/img_02.jpg">
            </div>
            <div class="modal_content_text">文字盤をアップした写真</div>
        </div>
        <div class="modal_content_in">
            <div class="modal_content_img">
                <img class="modal_content_img_content" src="https://kinkaimasu.jp/line/img/pc/take_picture/watch/img_03.jpg">
            </div>
            <div class="modal_content_text">裏ブタ部分の写真</div>
        </div>
        <div class="modal_content_in">
            <div class="modal_content_img">
                <img class="modal_content_img_content" src="https://kinkaimasu.jp/line/img/pc/take_picture/watch/img_04.jpg">
            </div>
            <div class="modal_content_text">付属品の写真</div>
        </div>
    </div>
</div>


<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="https://unpkg.com/vue@3.2.37/dist/vue.global.js"></script>
<script src="https://unpkg.com/axios@0.27.2/dist/axios.min.js"></script>

<script>
    // リキャプチャのチェックしたとき呼ばれる関数
function onSubmit(recaptcha) {
      if (recaptcha !== ''){
          // reCAPTHAによるチェックをしたあとは送信ボタンを押せるようにする
          jQuery('.submit_btn').removeAttr('disabled');
      }
}
$(".submit_btn").click(function(){
    if($(this).attr("disabled")){
        return false;
    }
    if($(this).hasClass("clicked")){
        return false;
    }
    $(".submit_btn").addClass("clicked");
    $(".submit_btn").text("送信中")
    
    // hp_field をクリア
    $('#honeypot').val('');

    $(".js_submit_btn").submit();
})

$(function() {
    setInterval(function() {
        $('.blink').css('visibility', $('.blink').css('visibility') == 'hidden' ? 'visible' : 'hidden');
    }, 800);
});

</script>


<script type="importmap">
    {
          "imports": {
            "vue": "https://unpkg.com/vue@3/dist/vue.esm-browser.js",
            "vuetify": "https://cdnjs.cloudflare.com/ajax/libs/vuetify/3.0.0-beta.1/vuetify.esm.js"
          }
        }
    </script>
<script type="module" src="{{ env("JS_URL") }}/js/estimate/app.js"></script>
<script src="{{ env("JS_URL") }}/js/estimate/jewelry.js"></script>
@endsection