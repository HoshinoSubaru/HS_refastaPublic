【HTTP_REFERER 】
{{ $_SERVER["HTTP_REFERER"] }}
--------------------------------------------
【送信内容】
@if( $input_values->upload_text_1 !== "")●送信内容１
{{ $input_values->upload_text_1 }}
@endif
@if( $input_values->upload_text_2 !== "")●送信内容2
{{ $input_values->upload_text_2 }}
@endif
@if( $input_values->upload_text_3 !== "")●送信内容3
{{ $input_values->upload_text_3 }}
@endif
@if( $input_values->upload_text_4 !== "")●送信内容4
{{ $input_values->upload_text_4 }}
@endif
@if( $input_values->upload_text_5 !== "")●送信内容5
{{ $input_values->upload_text_5 }}
@endif
@if( $input_values->upload_text_6 !== "")●送信内容6
{{ $input_values->upload_text_6 }}
@endif
@if( $input_values->upload_text_7 !== "")●送信内容7
{{ $input_values->upload_text_7 }}
@endif
@if( $input_values->upload_text_8 !== "")●送信内容8
{{ $input_values->upload_text_8 }}
@endif
@if( $input_values->upload_text_9 !== "")●送信内容9
{{ $input_values->upload_text_9 }}
@endif
@if( $input_values->upload_text_10 !== "")●送信内容10
{{ $input_values->upload_text_10 }}
@endif
--------------------------------------------
@if( isset($input_values->tel))●電話番号：{{ $input_values->tel }}
@endif
@if( isset($input_values->mail))●メールアドレス：{{ $input_values->mail }}
@endif
@if( isset($input_values->contact))●希望連絡方法：{{ $input_values->contact }}
@endif
--------------------------------------------
