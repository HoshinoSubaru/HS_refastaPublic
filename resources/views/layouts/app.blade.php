<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  @include('layouts.head_first')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')|リファスタ</title>
    <meta name="description" content="@yield('description')">



    <!-- Styles -->
    <link href="https://rifa.life/refasta_public/public/css/app.css" rel="stylesheet">
    <link href="https://rifa.life/refasta_public/public/css/custom.css" rel="stylesheet">
    <link href="{{ env("APP_URL") }}/public/css/custom.css" rel="stylesheet">
    <!-- fontawesome -->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    @yield('head_last')
    @include('layouts.head_last')

        <!-- 該当ページのみCV TAG 設置 -->
    @if(isset($success_cv) && $success_cv == true)
      <!-- LINE Tag Base Code -->
      <!-- Do Not Modify -->
      <script>
      (function(g,d,o){
        g._ltq=g._ltq||[];g._lt=g._lt||function(){g._ltq.push(arguments)};
        var h=location.protocol==='https:'?'https://d.line-scdn.net':'http://d.line-cdn.net';
        var s=d.createElement('script');s.async=1;
        s.src=o||h+'/n/line_tag/public/release/v1/lt.js';
        var t=d.getElementsByTagName('script')[0];t.parentNode.insertBefore(s,t);
          })(window, document);
      if (typeof _lt !== 'undefined') {
        _lt('init', {
          customerType: 'account',
          tagId: '814feab9-15cc-467b-9a83-1844eb38c975'
        });
        _lt('send', 'pv', ['814feab9-15cc-467b-9a83-1844eb38c975']);
      }
      </script>
      <noscript>
      <img height="1" width="1" style="display:none"
            src="https://tr.line.me/tag.gif?c_t=lap&t_id=814feab9-15cc-467b-9a83-1844eb38c975&e=pv&noscript=1" />
      </noscript>
      <!-- End LINE Tag Base Code -->
      <!-- LINE CV Tag -->
      <script>
      if (typeof _lt !== 'undefined') {
      _lt('send', 'cv', {
        type: 'Conversion'
      },['814feab9-15cc-467b-9a83-1844eb38c975']);
      }
      </script>
      <!-- LINE CV Tag End-->
      @endif

    <noscript>
        <style>.js_submit_btn{display: none;}</style>
    </noscript>
</head>
<body>
  @include('layouts.body_first')
    <div id="app">
        <nav class="navbar p-0">
            <div class="container-fluid p-0">
                <div class="navbar-header row w-100 m-0">
                  <div class="col-6 col-md-4 p-0">
                    <!-- Branding Image -->
                    @if(request()->is('refining_info/*'))
                        <a class="navbar-brand" href="/refining">
                            <img alt="貴金属・宝石・ダイヤモンド・時計・ブランド買取のリファスタ" src="https://kinkaimasu.jp/commonimg/delivery/logo.png">
                        </a>
                    @else
                        <a class="navbar-brand" href="/">
                          <!-- <img alt="貴金属・宝石・ダイヤモンド・時計・ブランド買取のリファスタ" src="{{ env('IMG_FOLDER') }}/logo.png"> -->
                            <img alt="貴金属・宝石・ダイヤモンド・時計・ブランド買取のリファスタ" src="https://kinkaimasu.jp/commonimg/delivery/logo.png">
                        </a>
                    @endif
                  </div>
                  <div class="col-6 col-md-8 row justify-content-center align-items-center text-right m-0 p-0">
                    <div class="col-4 col-sm-9 p-0 text-right">
                    </div>
                    <div class="col-8 col-sm-3 text-center">
                      <div id="ss_box" style="text-align: center; display: block; margin: 4px auto 9px;">
                        <form class="secom_img" action="https://www.login.secomtrust.net/customer/customer/pfw/CertificationPage.do" name="CertificationPageForm" method="post" target="_blank" style="margin: 0px;">
                          <input type="image" src="https://rifa.life/refasta_wordpress/wp-content/uploads/2022/03/B0310422-1.gif" width="46" name="Sticker" alt="クリックして証明書の内容をご確認ください" oncontextmenu="return false;">
                          <input type="hidden" name="Req_ID" value="7388475980">
                        </form>
                      </div>
              			</div>
                  </div>
                </div>

                <!-- Navbar Left -->
                <div class="collapse navbar-collapse justify-content-start" id="navbarSupportedContent">
                </div>
                <!-- Navbar Right -->
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                </div>
            </div>
        </nav>

        @yield('content')
    </div>


    <footer class="footer mt-auto py-3">
      <div class="container">
        <!-- <img src="{{ env('IMG_FOLDER') }}/footer_info.jpg"> -->
        <div class="footer_content">
          <div class="footer_logo_img">
            <img alt="貴金属,宝石,ブランド買取のリファスタ" src="https://kinkaimasu.jp//commonimg/footer_new/logo.png">
          </div>
          <div class="footer_content_right">
            <div class="ft_tel">
              <a href="tel:0120-954-679" onclick="ga('send', 'event', 'sp', 'tel');" class="tel_link txt_tel" itemprop="telephone">
              0120-954-679
              </a>
            </div>
            <div class="business_hours">
              【営業時間】 10:00 ～ 18:00 | (大阪心斎橋店は水曜定休日)
            </div>
          </div>
        </div>
        <div class="copyright_text">東京都公安委員会許可第305501007069号 <br class="sp_only"> 運営会社 ラウンジデザイナーズ株式会社</div>
        <div class="copyright_text">Copyright ©Loungedesigners inc. all right reserved.</div>
      </div>
    </footer>

    <!-- Scripts -->
    <script src="https://rifa.life/refasta_public/public/js/app.js"></script>

    @yield('body_last')
    @include('layouts.body_last')
</body>
</html>
