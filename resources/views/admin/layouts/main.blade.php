<!DOCTYPE html>
<html lang="{{ env('locale') }}">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset('libs/bootstrap/css/bootstrap.min.css') }}" media="screen" charset="utf-8"/>
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" media="screen" charset="utf-8"/>
        <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}" media="screen" charset="utf-8"/>
        <link rel="stylesheet" href="{{ asset('css/skins/skin-blue.min.css') }}" media="screen" charset="utf-8"/>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            @if (auth('administrators')->check())
                @include('admin.layouts.header')
                @include('admin.layouts.menu')
            @endif

            <div class="content-wrapper">
                @if ($dataConfig['module']->id > 1)
                    <section class="content-header">
                        <h1>
                            {{ trans($dataConfig['module']->name.'.title') }}
                            <small>{{ trans($dataConfig['module']->name.'.description') }}</small>
                        </h1>
                        {{-- <ol class="breadcrumb">
                            <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans($dataConfig['module']->name.'.title') }}</a></li>
                            <li class="active">{{ trans($dataConfig['module']->name.'.'.$action->name.'.title') }}</li>
                        </ol> --}}
                    </section>
                @endif

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
