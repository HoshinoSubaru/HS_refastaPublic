<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')|リファスタ</title>
    <meta name="description" content="@yield('description')">
    <!-- Styles -->
    <link href="{{ env("APP_URL") }}/public/css/reset.css" rel="stylesheet">
    <link href="{{ env("APP_URL") }}/public/css/shop_front.css" rel="stylesheet">
    <link href="{{ env("APP_URL") }}/public/css/shop_front.css.map" rel="stylesheet">
    @yield('head_last')
</head>
<body>
<header>
    <nav>        
        <li>ID:
                <span id="send_id">{{ htmlspecialchars($_GET["send_id"] ?? "") }}</span>
        </li>
            
        <ul>
            <a href="http://localhost/refasta_public/shop_front/iddocment_image_upload?shop_front_id={{ $shop_front_id }}"><font color="white">本人確認書類撮影画面</font></a>
            {{-- <a href="http://localhost/refasta_public/shop_front/confirm_iddocment_image?shop_front_id={{ $shop_front_id }}"><font color="white">本人確認書類確認画面</font></a> --}}
            <a href="http://localhost/refasta_public/shop_front/products_image_upload?shop_front_id={{ $shop_front_id }}"><font color="white">商品画像撮影画面</font></a>
            {{-- <a href="http://localhost/refasta_public/shop_front/confirm_image?shop_front_id={{ $shop_front_id }}"><font color="white">商品画像確認画面</font></a> --}}
            <a href="http://localhost/refasta_public/shop_front/confirm_new_image?shop_front_id={{ $shop_front_id }}"><font color="white">画像撮影確認画面</font></a>

        </ul>
    </nav>
</header>

<style>
    nav{
        color: white;
    }
    
    li{
        text-align: center;
    }

    div{
        text-align: center;
    }


</style>

@yield('content')
@yield('body_last')
</body>
</html>
