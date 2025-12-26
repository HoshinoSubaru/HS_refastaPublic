@extends('layouts.shop_front')
@section('title')
    宅配買取お申し込みフォーム
@endsection

@section('description')
    宅配で金・地金・ダイヤや宝石・ブランド買取をお申込みされる方への無料宅配買取申込みフォームです。梱包材も無料でお使いいただけます。
    業界初！最短翌日に査定結果とお振込可能！梱包材をお送りした場合でもお品物ご到着当日の査定結果とお振り込みが可能ですので是非ご利用ください。
@endsection
@section('head_last')
    <script src="https://unpkg.com/vue@3.2.37/dist/vue.global.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@endsection
@section('content')
<?php
//ご利用規約のインポート
$kiyaku_url = "https://kinkaimasu.jp/kiyaku_text/kiyaku_for_rifa.php";

$questions_array = [
    [
        "id" => 1,
        "key" => "is_owner",
        "title" => "本日お持ちいただいた商品は<br>お客様の所有物ですか？",
        "radio" => [
            "はい", "いいえ"
        ],
    ],
    [
        "id" => 2,
        "key" => "identification_type",
        "title" => "本人確認書類を選択してください",
        "subtitle" => "*現住所記載のもの",
        "radio" => [
            "免許証",
            "保険証",
            "住基カード",
            "住基カード(顔写真なし)",
            "パスポート",
            "マイナンバー",
            "在留カード",
            "特別永住者証明",
            "運転経歴証明書",
            "その他",
            "未所持"
        ],
    ],
    [
        "id" => 3,
        "key" => "personal_info_term",
        "title" => "個人情報取扱規約",
        "personal_info_term" => true,
        "kiyaku_html" => file_get_contents($kiyaku_url)
    ],
    [
        "id" => 4,
        "key" => "purchase_achievement",
        "title" => "リファスタで過去に買取のご利用はございますか？",
        "radio" => [
            "初めて利用する",
            "過去に利用したことがある"
        ]
    ],
    [
        "id" => 5,
        "key" => "before_two_years",
        "title" => "前回のご利用は２年以上前ですか？",
        "radio" => [
            "はい",
            "いいえ"
        ]
    ],
    [
        "id" => 6,
        "key" => "has_changed_profile",
        "title" => "お名前やご住所、電話番号等はおかわりありませんか？",
        "radio" => [
            "はい",
            "いいえ"
        ]
    ],
    [
        "id" => 7,
        "key" => "personal_info",
        "title" => "個人情報の入力",
        "profile" => true,
    ],
//    [
//        "id" => 8,
//        "title" => "キャンペーンコードをお持ちの場合は入力してください",
//        "line" => true,
//    ],
    [
        "id" => 9,
        "key" => "deal_type",
        "title" => "取引成否",
        "radio" => [
            "不成立",
            "成立",
            "全商品預かり対応",
            "全商品寄付",
        ],
    ],
//    [
//        "id" => 10,
//        "key" => "deal_result",
//        "deal" => [
//            "result" => "成立",
//            "radio" => ["一部預り対応を行う", "一部寄付の対応を行う"],
//        ],
//    ],
    [
        "id" => 11,
        "key" => "terms_of_service",
        "terms_of_service" => true,
    ],
    [
        "id" => 12,
        "title" => "サイン（フルネーム）を記入してください",
        "key" => "signature",
        "signature" => true,
    ]
];

$questions_json = json_encode($questions_array, JSON_UNESCAPED_UNICODE);
?>
<div id="guestInfoRegistration">
    <guest_info_registration questions_json="{{ $questions_json }}" />
</div>
@endsection
<script type="importmap">
    {
      "imports": {
        "vue": "https://unpkg.com/vue@3/dist/vue.esm-browser.js",
        "vuetify": "https://cdnjs.cloudflare.com/ajax/libs/vuetify/3.0.0-beta.1/vuetify.esm.js"
      }
    }
</script>
<script type="module" src="{{ env("APP_URL") }}/public/js/shop_front/app.js"></script>
@section('body_last')
@endsection