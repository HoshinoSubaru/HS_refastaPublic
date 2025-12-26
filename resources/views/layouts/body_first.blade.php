<!-- 1002 first tag manager -->
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K3CW8B3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- End 1002 first tag manager -->





@if(isset($_SERVER['HTTP_X_FORWARDED_HOST']))
  @if(stristr($_SERVER['HTTP_X_FORWARDED_HOST'], "kinkaimasu.jp"))
    <!-- Google Tag Manager -->
    <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-PZ98SJ"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PZ98SJ');</script>
    <!-- End Google Tag Manager -->

    <!--2021/06/23 kinkaiだけ Sprocketタグ設置-->
    <!-- <script src="//assets.v2.sprocket.bz/js/sprocket-jssdk.js#config=//assets.sprocket.bz/config/c14d19de4b784a9e831434ad29f21f8e.json" charset="UTF-8"></script> -->

<!-- ラウンジkinkai Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N822Q2X"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- ラウンジkinkai End Google Tag Manager (noscript) -->

  @elseif(stristr($_SERVER['HTTP_X_FORWARDED_HOST'], "brandkaimasu.com"))
    <?php
    // <!-- Google Tag Manager -->
    // <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-T269XW"
    // height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    // <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    // new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    // j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    // '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    // })(window,document,'script','dataLayer','GTM-T269XW');</script>
    // <!-- End Google Tag Manager -->
    ?>
    <!-- Google Tag Manager (noscript) -->
  	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T269XW"
  	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  	<!-- End Google Tag Manager (noscript) -->

<!-- ラウンジbrakai Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MLRMFCQ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- ラウンジbrakai End Google Tag Manager (noscript) -->

  @elseif(stristr($_SERVER['HTTP_X_FORWARDED_HOST'], "diakaimasu.jp"))

    <!-- Google Tag Manager -->
  	<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KG6N2M2"
  	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  	'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  	})(window,document,'script','dataLayer','GTM-KG6N2M2');</script>
  	<!-- End Google Tag Manager -->

    <!-- ラウンジdiakai Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WNLJHZ5"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- ラウンジdiakai End Google Tag Manager (noscript) -->

  @endif
@endif
