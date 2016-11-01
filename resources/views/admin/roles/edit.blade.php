@extends('admin.layouts.main')

@section('title', trans($app_module->name.'.title'))

@section('content')
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">@lang($app_module->name.'.'.$app_action->name.'.title')</h3>
        </div>
        <form action="{{ route('admin.'.$app_module->name.'.update', $data['role']->id) }}" role="form" method="POST">
            {!! csrf_field() !!}
            {{ method_field('PUT') }}

            <div class="box-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">@lang($app_module->name.'.'.$app_action->name.'.form.name.field')</label>
                            <input class="form-control" id="name" name="name" placeholder="@lang($app_module->name.'.'.$app_action->name.'.form.name.placeholder')" type="text" value="{{ $data['role']->name }}"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="50">@lang($app_module->name.'.'.$app_action->name.'.table.id')</th>
                                <th>@lang($app_module->name.'.'.$app_action->name.'.table.name')</th>
                                <th>@lang($app_module->name.'.'.$app_action->name.'.table.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['modules'] as $module)
                                <tr>
                                    <td>{{ $module->id }}</td>
                                    <td>@lang('modules.'.$module->name)</td>
                                    <td>
                                        <select multiple class="form-control" name="permissions[{{ $module->id }}][]">
                                            @foreach ($module->actions()->getResults() as $action)
                                                <option {{ $data['role']->permissions()->where('module_id', $module->id)->where('action_id', $action->id)->count() > 0 ? 'selected' : '' }} value="{{ $action->id }}">{{ $action->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-warning">@lang($app_module->name.'.'.$app_action->name.'.form.submit')</button>
            </div>
        </form>
    </div>
@endsection
