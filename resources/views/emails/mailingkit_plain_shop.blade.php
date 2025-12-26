【HTTP_REFERER 】
{{ $_SERVER["HTTP_REFERER"] }}
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
●配送補償：{{ $input_values->insurance }}
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

------------------------------------------------------------------------------------
●利用規約・プライバシーポリシーの同意：{{ $input_values->kiyaku_check }}
●暗号化メールアドレス：{{ substr(md5(htmlspecialchars($input_values->user_mail)), 0, 8) }}
