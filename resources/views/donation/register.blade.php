@extends('template.main')

@section('title', 'Donations')

    @section('content')

        <div class="container">
            <h1 class="text-center">Register</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            
            @if(count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('donor.store') }}" method="POST">
                {!! csrf_field() !!}

                <legend>Your Information</legend>
                <fieldset>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="name">{{ trans('forms.name.field') }}</label>
                                <input class="form-control" id="name" name="name" placeholder="{{ trans('forms.name.placeholder') }}" type="text"/>
                            </div>
                            <div class="col-sm-6">
                                <label for="lastname">{{ trans('forms.lastname.field') }}</label>
                                <input class="form-control" id="lastname" name="lastname" placeholder="{{ trans('forms.lastname.placeholder') }}" type="text"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="phone">{{ trans('forms.phone.field') }}</label>
                                <input class="form-control" id="phone" name="phone" placeholder="{{ trans('forms.phone.placeholder') }}" type="tel"/>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <legend>Your account</legend>
                <fieldset>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="email">{{ trans('forms.email.field') }}</label>
                                <input class="form-control" id="email" name="email" placeholder="{{ trans('forms.email.placeholder') }}" type="email"/>
                            </div>
                            <div class="col-sm-6">
                                <label for="password">{{ trans('forms.password.field') }}</label>
                                <input class="form-control" id="password" name="password" placeholder="{{ trans('forms.password.placeholder') }}" type="password"/>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <legend>Beering</legend>
                <fieldset>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="group_id">{{ trans('forms.group_id.field') }}</label>
                                <select class="form-control" id="password" name="group_id">
                                    <option value="1">Opción 1</option>
                                    <option value="2">Opción 2</option>
                                    <option value="3">Opción 3</option>
                                    <option value="4">Opción 4</option>
                                    <option value="5">Opción 5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <p>&nbsp;</p>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-offset-5 col-sm-2">
                            <button type="submit" class="btn btn-success btn-block">Sign up</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endsection
