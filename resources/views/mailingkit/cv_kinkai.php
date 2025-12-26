<!-- a8 -->
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
<!-- a8 -->

<?php
if(isset($_COOKIE["atss"])){
  $atss = $_COOKIE["atss"];
  setcookie("atss", "", time() - 30);
?>
  <!--インタースペース宅配買取-->
  <img src="https://is.accesstrade.net/cgi-bin/isatV2/urlounge/isatWeaselV2.cgi?result_id=100&verify=<?=$angouka_mailaddress?>&rk=<?=$atss?>" width="1" height="1">
  <!--インタースペース宅配買取-->
<?php
}else{
?>
  <!--インタースペース宅配買取-->
  <img src="https://is.accesstrade.net/cgi-bin/isatV2/urlounge/isatWeaselV2.cgi?result_id=100&verify=<?=$angouka_mailaddress?>" width="1" height="1">
  <!--インタースペース宅配買取-->
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
