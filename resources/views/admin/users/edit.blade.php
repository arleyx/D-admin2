@extends('admin.layouts.main')

@section('title', trans($app_module->name.'.title'))

@section('content')
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">@lang($app_module->name.'.'.$app_action->name.'.title')</h3>
        </div>
        <form action="{{ route('admin.'.$app_module->name.'.update', $data['administrator']->id) }}" role="form" method="POST">
            {!! csrf_field() !!}
            {{ method_field('PUT') }}

            <div class="box-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="role_id">@lang($app_module->name.'.'.$app_action->name.'.form.role_id.field')</label>
                            <select class="form-control" id="role_id" name="role_id">
                                @foreach ($data['roles'] as $key => $role)
                                    <option {{ $data['administrator']->role->id === $role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">@lang($app_module->name.'.'.$app_action->name.'.form.name.field')</label>
                            <input class="form-control" id="name" name="name" placeholder="@lang($app_module->name.'.'.$app_action->name.'.form.name.placeholder')" type="text" value="{{ $data['administrator']->name }}"/>
                        </div>
                        <div class="col-md-6">
                            <label for="email">@lang($app_module->name.'.'.$app_action->name.'.form.email.field')</label>
                            <input class="form-control" id="email" name="email" placeholder="@lang($app_module->name.'.'.$app_action->name.'.form.email.placeholder')" type="email" value="{{ $data['administrator']->email }}"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="password">@lang($app_module->name.'.'.$app_action->name.'.form.password.field')</label>
                            <input class="form-control" id="password" name="password" placeholder="@lang($app_module->name.'.'.$app_action->name.'.form.password.placeholder')" type="password"/>
                            <span class="help-block">@lang($app_module->name.'.'.$app_action->name.'.form.password.help')</span>
                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation">@lang($app_module->name.'.'.$app_action->name.'.form.password_confirmation.field')</label>
                            <input class="form-control" id="password_confirmation" name="password_confirmation" placeholder="@lang($app_module->name.'.'.$app_action->name.'.form.password_confirmation.placeholder')" type="password"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-warning">@lang($app_module->name.'.'.$app_action->name.'.form.submit')</button>
            </div>
        </form>
    </div>
@endsection
