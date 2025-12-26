<!--A8-->
<span id="a8sales"></span>
<script src="//statics.a8.net/a8sales/a8sales.js"></script>
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
<!--A8-->

<!--モバ8　宅配-->
<img src="https://px.moba8.net/svt/sales?async=1&PID=m00000005320001&SO=<?=$angouka_mailaddress?>&SI=926.1.926.takuhai" width="1" height="1" />
<!--モバ8　宅配-->

<!--  ValueCommerce iTAG  -->
<IMG SRC="//itrack2.valuecommerce.ne.jp/cgi-bin/3068421/vc_itag.cgi?sales_email=<?=$angouka_mailaddress?>&prgrid=Takuhai" width="1" height="1">
<!--  /ValueCommerce iTAG  -->
<?php
if(isset($_COOKIE["atss"])){
  $atss = $_COOKIE["atss"];
  setcookie("atss", "", time() - 30);
?>
  <!--インタースペース-->
  <img src="https://is.accesstrade.net/cgi-bin/isatV2/urlounge/isatWeaselV2.cgi?result_id=100&verify=<?=$angouka_mailaddress?>&rk=<?=$atss?>" width="1" height="1">
  <!--インタースペース-->
<?php
}else{
?>
  <!--インタースペース-->
  <img src="https://is.accesstrade.net/cgi-bin/isatV2/urlounge/isatWeaselV2.cgi?result_id=100&verify=<?=$angouka_mailaddress?>" width="1" height="1">
  <!--インタースペース-->
<?php
}
?>
