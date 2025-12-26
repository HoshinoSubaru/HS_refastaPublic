{{ $input_values->user_name }}様
この度は宅配買取のお申込み誠にありがとうございます。

ご入力内容をご確認の上お手続きくださいますようお願い致します。

@if($input_values->need_kit == "希望しない")
  1.お持ちのダンボールや紙袋にお品物を梱包。
  2.緩衝材でお品物を保護し、新聞紙などで隙間を埋めてください。
  3.弊社がお客様のお申込み内容を確認し配達業者を手配。

  ※※ご注意ください※※
  ・初回の宅配買取の場合、お客様ご自宅への集荷依頼を当方が致します。集荷ご希望日時の変更を希望される場合は、お手数ですが弊社までお知らせくださいますようお願い致します。

  「梱包キットなし」の詳しい流れは、下記の弊社HPをご覧くださいませ。
  https://kinkaimasu.jp/choice#speed_box

  ・送り先住所はメール下部[配送先住所]にてご確認ください。
  ・身分証のお写真と金融機関情報は、ご成約後にLINEやメールにてお送りくださいませ。
  必ずしも同封する必要はございません。

  ▼お品物ご到着後の流れ▼
  ・原則到着日当日の査定連絡となりますが、混雑状況により翌日の連絡となる場合もございます。予めご了承いただけますようお願い致します。

  ▼便利なLINE連絡▼
  配送の連絡や査定結果まで全てLINEで完結可能。
  LINE限定クーポンやお得なキャンペーンもアリ★
  ・友だち追加はコチラ：https://lin.ee/Ya5d9z

  ▼▼お品物は多い方がお得▼▼
  査定物が多い方が金額アップ！
  キャンセル料は勿論無料でございますので、安心して沢山のお品物をお送りいただけます！
  宝飾品（貴金属は壊れた物も可）や、服飾品（洋服やブランド品）の混合も大歓迎！

  【お取扱いブランド】
  https://kinkaimasu.jp/brandlist/ 
  【お買取OK商品】
  https://kinkaimasu.jp/choice/navi/possible/
  【お買取NG商品】
  https://kinkaimasu.jp/choice/navi/impossible/
  【買取システム】
  https://kinkaimasu.jp/system/

@elseif($input_values->need_kit == "希望する")
  ▼「梱包キットあり」をご希望の方へ▼
  ・届いたキットにお品物を梱包し、お好きな配送業者にて着払い（*午前中指定）でお送りください。
  ・初回の方に限り、ご身分証のご提示が必要となります為、下記の「マイページ」よりご提出をお願いいたします。※ご成約後のタイミングでも問題ございません。
  【マイページ】※ログイン／ご登録が必要です。
  https://kinkaimasu.jp/mypage/login

  【佐川急便】
  最寄りの営業所を下記より検索し、集荷のご依頼、または直接のお持ち込みをお願い致します。
  https://www.sagawa-exp.co.jp/send/branch_search/tanto/

  【ヤマト運輸】※コンビニへお持ち込みいただく場合はコチラ
  固定電話：0120-01-9625
  IP電話（050）：050-3786-3333
  携帯電話 (営業所検索)
  http://www.kuronekoyamato.co.jp/ytc/center/servicecenter_list.html#anc-01
  WEB集荷は下記よりお願い致します。
  https://shuka.kuronekoyamato.co.jp/shuka_req/TopAction_doInit.action

  【ゆうパック】
  電話で集荷する場合：0800-0800-111（フリーダイヤル）

  WEBで集荷する場合
  https://mgr.post.japanpost.jp/C20P02Action.do?ssoparam=0&termtype=2

  ・送り先住所はメール下部[配送先住所]にてご確認ください。
  ・金融機関情報は、ご成約後にLINEやメールにてお送りください。必ずしも同封する必要はございません。

  ▼お品物ご到着後の流れ▼
  ・宝飾品のみの場合、原則到着日当日の査定連絡となりますが、混雑状況により翌日の連絡となる場合もございます。予めご了承いただけますようお願い致します。

  ▼便利なLINE連絡▼
  配送の連絡や査定結果まで全てLINEで完結可能。
  LINE限定クーポンやお得なキャンペーンもアリ★
  ・友だち追加はコチラ：https://lin.ee/Ya5d9z

  ▼▼お品物は多い方がお得▼▼
  査定物が多い方が金額がアップ！
  キャンセル料は勿論無料でございますので、安心して沢山のお品物をお送りいただけます！
  宝飾品（貴金属は壊れた物も可）や、服飾品（洋服やブランド品）の混合も大歓迎！

  【お取扱いブランド】
  https://kinkaimasu.jp/brandlist/ 
  【お買取OK商品】
  https://kinkaimasu.jp/choice/navi/possible/
  【お買取NG商品】
  https://kinkaimasu.jp/choice/navi/impossible/
  【買取システム】
  https://kinkaimasu.jp/system/
@endif

--------------------------------------------
@if($input_values->brand_confirm)
  ●買取不可ブランドへの同意：同意する
@endif
●ご利用回数：{{ $input_values->number_of_times }}
●梱包キット：{{ $input_values->need_kit }}
@if($input_values->need_kit == "希望しない")
  ●発送予定箱数：{{ $input_values->speed_box }}個
  ●希望集荷日時：{{ $input_values->date_and_time_hidden }}
@else
  ●梱包キットの詳細：
  Sサイズ：{{ $input_values->kit_count_s }}個
  Mサイズ：{{ $input_values->kit_count_m }}個
  Lサイズ：{{ $input_values->kit_count_l }}個
  クッション封筒：{{ $input_values->kit_count_k }}個
  ●配送日時指定：{{ $input_values->time_select_none }}
  @if($input_values->time_select_none == "指定する")
    ●配送希望日時：{{ $input_values->time_select_hidden }}
  @endif
  @if($input_values->insurance == "あり")
    ●配送補償：30万円以上(日時指定無効)
  @else
    ●配送補償：30万円未満
  @endif
  @if($input_values->insurance == "あり")
    ●配送補償対象金額：{{ $input_values->insurance_kingaku }}
  @endif
@endif
--------------------------------------------
●お名前(姓　名)：{{ $input_values->user_name }}
●フリガナ(セイ　メイ)：{{ $input_values->user_name_kana }}
--------------------------------------------
●電話番号：{{ $input_values->user_tel }}
●メールアドレス：{{ $input_values->user_mail }}
--------------------------------------------
●郵便番号：{{ $input_values->user_yuubinn }}
●都道府県：{{ $input_values->user_todou }}
●市区群：{{ $input_values->user_sikutyouson }}
●町村名・番地：{{ $input_values->user_banti }}
●建物名：{{ $input_values->user_building }}
--------------------------------------------
●希望連絡方法：{{ $input_values->tel_mail_line }}
--------------------------------------------
●事前査定：{{ $input_values->line_satei }}
--------------------------------------------
●備考：{{ $input_values->bikou }}
--------------------------------------------
@if($input_values->kiyaku_check)
  ●利用規約・プライバシーポリシーの同意：同意する
@endif
--------------------------------------------
[宝飾品・服飾品] 
https://kinkaimasu.jp/

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
▼友だち追加はコチラ：　https://lin.ee/Ya5d9z
▼友だち検索はコチラ：　LINE ID : @rifa

[運営会社]
ラウンジデザイナーズ株式会社
WEBSITE: https://urlounge.co.jp/
東京都公安委員会第305501007069号

We've been always demanding "CRAZY PASSION & IDEAS ".
THERE IS A LIGHT THAT NEVER GOES OUT .
We DESIGN your "LOUNGE".
That's how we are "LOUNGE DESIGNERS".