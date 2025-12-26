<!--A8-->
<span id="a8sales"></span>
<script src="//statics.a8.net/a8sales/a8sales.js"></script>
<script>
    a8sales({
        "pid": "s00000011821004",//テストID　変更不可、テストツールで確認後に変更となります
        "order_number": "<?=$angouka_mailaddress?>",//注文番号・現行タグの&so=の値を反映してください
        "currency": "JPY",//省略可
        "items": [　//以下、現行タグの&si=の値を反映してください
            {
                "code": "takuhai",//商品コード　なければ「a8」
                "price": 4000,//固定値
                "quantity": 1,//固定値
            },
        ],
        "total_price": 4000,//省略可、固定値
    });
</script>
<script>
    a8sales({
        "pid": "s00000011821001",//テストID　変更不可、テストツールで確認後に変更となります
        "order_number": "<?=$angouka_mailaddress?>",//注文番号・現行タグの&so=の値を反映してください
        "currency": "JPY",//省略可
        "items": [　//以下、現行タグの&si=の値を反映してください
            {
                "code": "a8",//商品コード　なければ「a8」
                "price": 1000,//固定値
                "quantity": 1,//固定値
            },
        ],
        "total_price": 1000,//省略可、固定値
    });
</script>
<script>
    a8sales({
        "pid": "s00000011821002",//テストID　変更不可、テストツールで確認後に変更となります
        "order_number": "<?=$angouka_mailaddress?>",//注文番号・現行タグの&so=の値を反映してください
        "currency": "JPY",//省略可
        "items": [　//以下、現行タグの&si=の値を反映してください
            {
                "code": "a8",//商品コード　なければ「a8」
                "price": 4000,//固定値
                "quantity": 1,//固定値
            },
        ],
        "total_price": 4000,//省略可、固定値
    });
</script>
<script>
    a8sales({
        "pid": "s00000011821006",//テストID　変更不可、テストツールで確認後に変更となります
        "order_number": "<?=$angouka_mailaddress?>",//注文番号・現行タグの&so=の値を反映してください
        "currency": "JPY",//省略可
        "items": [　//以下、現行タグの&si=の値を反映してください
            {
                "code": "a8",
                "price": 4000,
                "quantity": 1
            },
        ],
        "total_price": 4000,
    });
</script>
<!--A8-->

<!--モバ8　宅配-->
<img src="https://px.moba8.net/svt/sales?async=1&PID=m00000005320001&SO=<?=$angouka_mailaddress?>&SI=926.1.926.takuhai" width="1" height="1" />
<!--モバ8　宅配-->

<!--  ValueCommerce iTAG  -->
<IMG SRC="//itrack2.valuecommerce.ne.jp/cgi-bin/3068421/vc_itag.cgi?sales_email=<?=$angouka_mailaddress?>&prgrid=Takuhai" width="1" height="1">
<!--  /ValueCommerce iTAG  -->

<!--インタースペース-->
<?php
if(isset($_COOKIE["atss"])){
  $atss = $_COOKIE["atss"];
  setcookie("atss", "", time() - 30);
  ?>
    <img src="https://is.accesstrade.net/cgi-bin/isatV2/urlounge/isatWeaselV2.cgi?result_id=100&verify=<?=$angouka_mailaddress?>&rk=<?=$atss?>" width="1" height="1">
  <?php
}else{
  ?>
    <img src="https://is.accesstrade.net/cgi-bin/isatV2/urlounge/isatWeaselV2.cgi?result_id=100&verify=<?=$angouka_mailaddress?>" width="1" height="1">
  <?php
}
?>

<!-- rentracks -->
<script type="text/javascript">
    (function(){
        function loadScriptRTCV(callback){
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'https://www.rentracks.jp/js/itp/rt.track.js?t=' + (new Date()).getTime();
            if ( script.readyState ) {
                script.onreadystatechange = function() {
                    if ( script.readyState === 'loaded' || script.readyState === 'complete' ) {
                        script.onreadystatechange = null;
                        callback();
                    };
                };
            } else {
                script.onload = function() {
                    callback();
                };
            };
            document.getElementsByTagName('head')[0].appendChild(script);
        }

        loadScriptRTCV(function(){
            _rt.sid = 4397;
            _rt.pid = 6534;
            _rt.price = 0;
            _rt.reward = -1;
            _rt.cname = '';
            _rt.ctel = '';
            _rt.cemail = '';
            _rt.cinfo = '<?=$angouka_mailaddress?>';
            rt_tracktag();
        });
    }(function(){}));
</script>
<!-- rentracks -->

<!-- リンクエッジ -->

<script type="text/javascript">
  window.lag=window.lag||function(){(lag.q=lag.q||[]).push(arguments)};lag.l=+new Date;
  lag(
    {
      'acd':'f5f8dd3f3395112f',
      'cs': '8dfc81ba',
      'ucd': '<?=$angouka_mailaddress?>'
    }
  );
</script>
<script src="https://link-ag.net/dist/p/c/index.js"></script>

<!-- リンクエッジ -->