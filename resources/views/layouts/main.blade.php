<!DOCTYPE html>
<html lang="{{ env('locale') }}">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>@yield('title')</title>
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet"/>
        <link rel="stylesheet" href="{{ asset('libs/bootstrap/css/bootstrap.min.css') }}" media="screen" charset="utf-8"/>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" media="screen" charset="utf-8"/>
    </head>
    <body>
        @include('layouts.header')

        @yield('content')

        @include('layouts.footer')
    </body>
    <script type="text/javascript" src="{{ asset('libs/jquery/js/jquery-1.12.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('libs/bootstrap/js/bootstrap.min.js') }}"></script>
</html>
