@extends('layouts.main')

@section('title', 'Register')

@section('content')

    <div class="container">
        <h1 class="text-center">Register</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

        <p>&nbsp;</p>
        <p>&nbsp;</p>

        <form action="{{ url('/register') }}" role="form" method="POST">
            {!! csrf_field() !!}

            <legend>Your Information</legend>
            <fieldset>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">{{ trans('users.create.name.field') }}</label>
                            <input class="form-control" id="name" name="name" placeholder="{{ trans('users.create.name.placeholder') }}" type="text"/>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname">{{ trans('users.create.lastname.field') }}</label>
                            <input class="form-control" id="lastname" name="lastname" placeholder="{{ trans('users.create.lastname.placeholder') }}" type="text"/>
                            @if ($errors->has('lastname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone">{{ trans('users.create.phone.field') }}</label>
                            <input class="form-control" id="phone" name="phone" placeholder="{{ trans('users.create.phone.placeholder') }}" type="tel"/>
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </fieldset>

            <legend>Your account</legend>
            <fieldset>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">{{ trans('users.create.email.field') }}</label>
                            <input class="form-control" id="email" name="email" placeholder="{{ trans('users.create.email.placeholder') }}" type="email"/>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">{{ trans('users.create.password.field') }}</label>
                            <input class="form-control" id="password" name="password" placeholder="{{ trans('users.create.password.placeholder') }}" type="password"/>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-6{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm">{{ trans('users.create.password_confirmation.field') }}</label>
                            <input class="form-control" id="password-confirm" name="password_confirmation" placeholder="{{ trans('users.create.password_confirmation.placeholder') }}" type="password"/>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </fieldset>

            <legend>Beering</legend>
            <fieldset>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6{{ $errors->has('group_id') ? ' has-error' : '' }}">
                            <label for="group_id">{{ trans('users.create.group_id.field') }}</label>
                            <select class="form-control" id="password" name="group_id">
                                <option value="1">Opción 1</option>
                                <option value="2">Opción 2</option>
                                <option value="3">Opción 3</option>
                                <option value="4">Opción 4</option>
                                <option value="5">Opción 5</option>
                            </select>
                            @if ($errors->has('group_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('group_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </fieldset>
            <p>&nbsp;</p>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-offset-5 col-md-2">
                        <button type="submit" class="btn btn-success btn-block">Sign up</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
