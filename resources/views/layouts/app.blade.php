<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - 西安交通大学58届校运会</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="//img.eeyes.net/eeyes_common/css/eeyes_common.css">
    @auth
        <link rel="stylesheet" href="{{ mix('css/admin.css') }}">
    @endauth
    @yield('styles')
<body>
    <div id="app" class="{{ route_class() }}-page">
        @auth
            @include('layouts._header')
        @endauth
        @include('shared._messages')
        @yield('content')
        @include('layouts._footer')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript">
        console.log("%ceeyes.net", "font-size: 65px; color: #008aff; text-shadow: 0 0 10px rgba(0,138,255,0.8); font-style:italic;");
        console.log("%c精彩有e瞳，美妙无异同~", "margin-left: 10px; font-size:25px; color: #008aff;");
        console.log("%c想加入e瞳网？请发送邮件到 331531997 at qq dot com （注明“From console”）。", "margin-left: 10px; color: #008aff;");
    </script>
</body>
</html>
