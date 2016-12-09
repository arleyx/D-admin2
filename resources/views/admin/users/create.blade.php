@extends('admin.layouts.main')

@section('title', trans($app_module->name.'.title'))

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">@lang($app_module->name.'.'.$app_action->name.'.title')</h3>
        </div>
        <form action="{{ route('admin.'.$app_module->name.'.store') }}" role="form" method="POST">
            {!! csrf_field() !!}

            <div class="box-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="role_id">@lang($app_module->name.'.'.$app_action->name.'.form.role_id.field')</label>
                            <select class="form-control" id="role_id" name="role_id">
                                @foreach ($data['roles'] as $key => $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">@lang($app_module->name.'.'.$app_action->name.'.form.name.field')</label>
                            <input class="form-control" id="name" name="name" placeholder="@lang($app_module->name.'.'.$app_action->name.'.form.name.placeholder')" type="text" value="{{ old('name') }}"/>
                        </div>
                        <div class="col-md-6">
                            <label for="email">@lang($app_module->name.'.'.$app_action->name.'.form.email.field')</label>
                            <input class="form-control" id="email" name="email" placeholder="@lang($app_module->name.'.'.$app_action->name.'.form.email.placeholder')" type="email" value="{{ old('email') }}"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="password">@lang($app_module->name.'.'.$app_action->name.'.form.password.field')</label>
                            <input class="form-control" id="password" name="password" placeholder="@lang($app_module->name.'.'.$app_action->name.'.form.password.placeholder')" type="password"/>
                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation">@lang($app_module->name.'.'.$app_action->name.'.form.password_confirmation.field')</label>
                            <input class="form-control" id="password_confirmation" name="password_confirmation" placeholder="@lang($app_module->name.'.'.$app_action->name.'.form.password_confirmation.placeholder')" type="password"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-success">@lang($app_module->name.'.'.$app_action->name.'.form.submit')</button>
            </div>
        </form>
    </div>
@endsection
