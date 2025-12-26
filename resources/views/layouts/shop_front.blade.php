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
        <ul>
{{--            <li>キャンセル</li>--}}
            <li>ID:
                <span id="send_id">{{ htmlspecialchars($_GET["send_id"] ?? "") }}</span></li>
                {{-- <li><a href="{{ env("APP_URL") }}/shop_front/startPage">やり直し</a></li> --}}
        </ul>
    </nav>
</header>
@yield('content')
@yield('body_last')
</body>
</html>
