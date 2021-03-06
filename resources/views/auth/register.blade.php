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

            <legend>Beering</legend>
            <fieldset>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12{{ $errors->has('group_id') ? ' has-error' : '' }}">
                            <label for="group_id">{{ trans('users.create.group_id.field') }}</label>

                            <div class="panel-group" id="accordion">
                                @foreach ($data['groups'] as $key => $group)
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <input type="radio" name="group_id" value="{{ $group->id }}"/>
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $group->id }}">{{ $group->name }}</a>
                                            </h4>
                                        </div>
                                        <div id="collapse-{{ $group->id }}" class="panel-collapse collapse {{ $key == 0 ? 'in' : '' }}">
                                            <div class="panel-body">
                                                {!! $group->about !!}
                                                <div class="clearfix"></div>
                                                <hr/>
                                                {!! $group->beering->description !!}
                                                <div class="clearfix"></div>
                                                <hr/>
                                                {!! $group->record !!}
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            @if ($errors->has('group_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('group_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12{{ $errors->has('know_us') ? ' has-error' : '' }}">
                            <label for="know_us">{{ trans('users.create.know_us.field') }}</label>
                            <textarea class="form-control" id="know_us" name="know_us" placeholder="{{ trans('users.create.know_us.placeholder') }}" rows="3">{{ old('know_us') }}</textarea>
                            @if ($errors->has('know_us'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('know_us') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </fieldset>

            <legend>Your Information</legend>
            <fieldset>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">{{ trans('users.create.name.field') }}</label>
                            <input class="form-control" id="name" name="name" placeholder="{{ trans('users.create.name.placeholder') }}" type="text" value="{{ old('name') }}"/>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname">{{ trans('users.create.lastname.field') }}</label>
                            <input class="form-control" id="lastname" name="lastname" placeholder="{{ trans('users.create.lastname.placeholder') }}" type="text" value="{{ old('lastname') }}"/>
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
                            <input class="form-control" id="phone" name="phone" placeholder="{{ trans('users.create.phone.placeholder') }}" type="tel" value="{{ old('phone') }}"/>
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <hr/>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6{{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="country">{{ trans('users.create.country.field') }}</label>
                            <select class="form-control" id="country" name="country">
                                @foreach ($data['countries'] as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('country'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('country') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6{{ $errors->has('citizenship') ? ' has-error' : '' }}">
                            <label for="citizenship">{{ trans('users.create.citizenship.field') }}</label>
                            <select class="form-control" id="citizenship" name="citizenship">
                                @foreach ($data['countries'] as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('citizenship'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('citizenship') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6{{ $errors->has('occupation') ? ' has-error' : '' }}">
                            <label for="occupation">{{ trans('users.create.occupation.field') }}</label>
                            <input class="form-control" id="occupation" name="occupation" placeholder="{{ trans('users.create.occupation.placeholder') }}" type="text" value="{{ old('occupation') }}"/>
                            @if ($errors->has('occupation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('occupation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6{{ $errors->has('about_you') ? ' has-error' : '' }}">
                            <label for="about_you">{{ trans('users.create.about_you.field') }}</label>
                            <textarea class="form-control" id="about_you" name="about_you" placeholder="{{ trans('users.create.about_you.placeholder') }}" rows="5">{{ old('about_you') }}</textarea>
                            @if ($errors->has('about_you'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('about_you') }}</strong>
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
                            <input class="form-control" id="email" name="email" placeholder="{{ trans('users.create.email.placeholder') }}" type="email" value="{{ old('email') }}"/>
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
