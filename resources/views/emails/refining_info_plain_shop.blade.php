【HTTP_REFERER 】

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
●暗号化メールアドレス：{{ $input_values['angouka_mailaddress'] }}
--------------------------------------------
