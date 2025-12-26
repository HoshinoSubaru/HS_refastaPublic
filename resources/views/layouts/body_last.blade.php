@if(isset($_SERVER['HTTP_X_FORWARDED_HOST']))
  @if(stristr($_SERVER['HTTP_X_FORWARDED_HOST'], "kinkaimasu.jp"))
    @php($a8_douteki_id = '1005148')
  @elseif(stristr($_SERVER['HTTP_X_FORWARDED_HOST'], "brandkaimasu.com"))
    @php($a8_douteki_id = '1005145')
    <!-- Flipdesk -->
    <script language="javascript" charset="UTF-8" type="text/javascript" src="https://api.flipdesk.jp/chat_clients/flipdesk_chat.js?api_token=7801beec42debaaec0d7be9359c61e8a766bd071&enc=UNICODE"></script>
    <!-- Flipdesk -->
    <iframe id="flip_ajax_load_cv_code_area" src="" style="display:none;" ></iframe>

  @elseif(stristr($_SERVER['HTTP_X_FORWARDED_HOST'], "diakaimasu.jp"))
    @php($a8_douteki_id = '1005148')
    <!-- Flipdesk -->
    {{-- <script language="javascript" charset="UTF-8" type="text/javascript" src="https://api.flipdesk.jp/chat_clients/flipdesk_chat.js?api_token=8fe39caeac3a30f1f5d796c87c71d3a53d8e8bce&enc=UNICODE"></script> --}}
    <!-- Flipdesk -->
    {{-- <iframe id="flip_ajax_load_cv_code_area" src="" style="display:none;" ></iframe> --}}
  @endif
@endif

<!-- all_inc -->

<!-- a8 2020start -->
<script type="text/javascript">
    (function(w,d,s){
        var f=d.getElementsByTagName(s)[0],j=d.createElement(s);
        j.async=true;j.src='//dmp.im-apps.net/js/1005148/0001/itm.js';
        f.parentNode.insertBefore(j, f);
    })(window,document,'script');
</script>
<script type="text/javascript">
    (function(w,d,s){
        var f=d.getElementsByTagName(s)[0],j=d.createElement(s);
        j.async=true;j.src='//dmp.im-apps.net/js/1005145/0001/itm.js';
        f.parentNode.insertBefore(j, f);
    })(window,document,'script');
</script>
<!-- a8 2020start -->
