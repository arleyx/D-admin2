<!DOCTYPE html>
<html lang="{{ env('locale') }}">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>@yield('title')</title>
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet"/>
        <link rel="stylesheet" href="{{ asset('libs/bootstrap/css/bootstrap.min.css') }}" media="screen" charset="utf-8"/>
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" media="screen" charset="utf-8"/>
        <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}" media="screen" charset="utf-8"/>
        <link rel="stylesheet" href="{{ asset('css/skins/skin-blue.min.css') }}" media="screen" charset="utf-8"/>
        <style media="screen">
            html, body {font-family: 'Noto Sans', sans-serif;}
        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            @if (auth('administrators')->check())
                @include('admin.layouts.header')
                @include('admin.layouts.menu')
            @endif

            <div class="content-wrapper">
                @yield('content')
            </div>

            <footer class="main-footer">
                <strong>Copyright &copy; 2016 <a href="#">DPF Colombia</a>.</strong> All rights reserved.
            </footer>
        </div>
    </body>
    <script type="text/javascript" src="{{ asset('libs/jquery/js/jquery-1.12.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('libs/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.min.js') }}"></script>
</html>
