----------------------------------------------------------------------
【REMOTE_ADDR】： @if ($input_values->ip() !== null){{ $input_values->ip() }}@endif

【USER_AGENT】： @if ($input_values->header('User-Agent')!== null){{ $input_values->header('User-Agent') }}@endif

【HTTP_REFERER】：@if ($referer!== null){{ $referer }}@endif

----------------------------------------------------------------------
【お客様情報】
●メールアドレス:
@if (isset($input_values->mail))
  {{ $input_values->mail }}
@endif

●お問い合わせ内容:
@if (isset($input_values->text))
  {{ $input_values->text }}
@endif

●画像:
@if (isset($files_path))
  {{ implode($files_path) }}
@endif


●暗号化メールアドレス:
@if (isset($angouka_mailaddress))
  {{ $angouka_mailaddress }}
@endif
---------------------------------------------------------------------
