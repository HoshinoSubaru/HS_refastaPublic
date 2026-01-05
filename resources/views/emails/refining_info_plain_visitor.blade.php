{{ $input_values['name'] }}様

この度は金地金精錬分割加工サービスをお申込み頂き誠にありがとうございます。
ご入力内容のご確認をお願い致します。
ご不明な点はお気軽にお申し付けください。
--------------------------------------------
インゴット詳細のご入力内容
--------------------------------------------
@php $iteration = 1; @endphp
@foreach($input_values["ingotDetails"] as $detail)
@if(!$detail || !is_array($detail) || empty($detail['_type']))
@continue
@endif
●入力内容{{ $iteration }}
タイプ：{{ $detail['_type'] ?? '未指定' }}
GDB：{{ $detail['_is_gdb'] ?? '' }}
重量：{{ number_format((int)$detail['_gram'] ?? 0) }}g
分割50gバー：{{ number_format((int)$detail['_splits_count_50g'] ?? 0) }}枚
分割100gバー：{{ number_format((int)$detail['_splits_count_100g'] ?? 0) }}枚
即分割100gバー：{{ number_format((int)$detail['_immediate_split_count_100g'] ?? 0) }}枚
スクラップのグラム：{{ number_format((int)$detail['_splits_scrap_100g'] ?? 0) }}g
加工費用：{{ number_format(round($detail['_fee_total_price'] ?? 0)) }}円
--------------------
@php $iteration++; @endphp
@endforeach
--------------------------------------------
希望内容
--------------------------------------------
●売却立替：{{ $input_values['sale_advance_input'] }}
@if(isset($input_values['selected_sale_g']))
●売却立替詳細：{{ $input_values['selected_sale_g'] }}g
@endif
@if(isset($input_values['saleRebuildingPricefee']))
●本日のインゴット売却価格：{{ $input_values['saleRebuildingPricefee'] }}
@endif
●インゴットのお持ち込み方法：{{ $input_values['service_selection'] }}
●配送料(税込)：{{ $input_values['deliveryservicefee'] ?? '0' }}
●バーチャージ(税込)：{{ $input_values['barchargefeefee'] ?? '0' }}
●ご請求金額：{{ $input_values['totalTransferAmountfee'] }}
※1kg以上の場合にはチャーター費用が大凡5万〜加算されます。
※詳しくはサポートチームからの連絡をお待ちください。
※ご請求金額がマイナスの場合は、お客様へ送金いたします。
--------------------------------------------
お客様情報
--------------------------------------------
●弊社ご利用回数：{{$input_values['usage'] }}
●希望連絡方法：{{ $input_values['contact_method'] }}
●お名前(姓　名)：{{ $input_values['name'] }}
●フリガナ(セイ　メイ)：{{ $input_values['kana'] }}
●電話番号：{{ $input_values['phone_number'] }}
●メールアドレス：{{ $input_values['email'] }}
●郵便番号：{{ $input_values['user_yuubinn'] }}
●都道府県：{{ $input_values['user_todou'] }}
●市区町村群：{{ $input_values['user_sikutyouson'] }}
●町村名・番地：{{ $input_values['user_banti'] }}
●建物名：{{ $input_values['user_building'] }}
--------------------------------------------
最終確認
--------------------------------------------
●ご本人さまのお申込みですか？： {{ $input_values['is_applicant']}}
●身分証の住所と現住所は同一ですか？：{{ $input_values['same_address']}}
●備考欄　兼　お問い合わせ内容：{{ $input_values['content_inquiry']}}
●利用規約・プライバシーポリシーの同意：同意する
--------------------------------------------
[宝飾品・服飾品] 
https://kinkaimasu.jp/
[金の精錬分割加工] 
https://kinkaimasu.jp/refining/

[配送先住所]
〒170-0013
東京都豊島区東池袋1-25-14
アルファビルディング4F
リファスタ　宅配買取事業部

[連絡先]
MAIL: rifa@urlounge.co.jp
FREE: 0120-954-679　（宝飾・服飾買取専門フリーダイヤル）
TEL: 03-5985-0388

[営業時間]
10:00～18:00（年中無休）※臨時休業・年末年始休業は除く、大阪心斎橋店は水曜定休日

[PRサイト]
リファが運営する注目の販売サイト！
ブランド品からハイジュエリーをお得にお買物！
[リファスタ 楽天市場店]
https://www.rakuten.ne.jp/gold/rfstore/
[リファスタ Yahoo!ショッピング]店
https://shopping.geocities.jp/rfstore/
[リファスタ ヤフオク!店]
https://auctions.yahoo.co.jp/seller/rf_shop2010
[リファスタ  eBay店]
https://www.ebay.com/str/refastainjapan
[リファスタ オフィシャルショッピングサイト]
https://refasta.myshopify.com/

[PR]LINE査定スタート！
写真だけでリアルタイム査定が可能！
お得なキャンペーンもございます★是非ご利用ください★
▶︎友だち追加はコチラ：　https://lin.ee/Ya5d9z
▶︎友だち検索はコチラ：　LINE ID : @rifa

[運営会社]
ラウンジデザイナーズ株式会社
WEBSITE: https://urlounge.co.jp/
古物営業許可番号：東京都公安委員会第305501007069号
インボイス制度(適格請求書発行事業者)：T5013301028596

We've been always demanding "CRAZY PASSION & IDEAS ".
THERE IS A LIGHT THAT NEVER GOES OUT .
We DESIGN your "LOUNGE".
That's how we are "LOUNGE DESIGNERS".
