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
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ url('/admin/login') }}"><strong>D</strong>-admin</a>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        {{-- <label for="email" class="col-md-4 control-label">E-Mail</label> --}}

                        <div class="col-md-12 has-feedback">
                            <input id="email" type="email" class="form-control" name="email" placeholder="E-Mail" value="{{ old('email') }}">
                            {{-- <i class="fa fa-user form-control-feedback"></i> --}}
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        {{-- <label for="password" class="col-md-4 control-label">Password</label> --}}

                        <div class="col-md-12 has-feedback">
                            <input id="password" type="password" class="form-control" placeholder="Password" name="password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-flat btn-block">Sign in</button>

                            <a class="btn btn-link" href="{{ url('/admin/password/reset') }}">Forgot Your Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
