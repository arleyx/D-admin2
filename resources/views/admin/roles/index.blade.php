@extends('admin.layouts.main')

@section('title', trans($app_module->name.'.title'))

@section('content')
    <a class="btn btn-success" href="{{ route('admin.'.$app_module->name.'.create') }}"><i class="fa fa-plus-circle"></i> @lang($app_module->name.'.'.$app_action->name.'.action.create')</a>
    <p>&nbsp;</p>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">@lang($app_module->name.'.'.$app_action->name.'.title')</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-hover datatable">
                <thead>
                    <tr>
                        <th width="50">@lang($app_module->name.'.'.$app_action->name.'.table.id')</th>
                        <th>@lang($app_module->name.'.'.$app_action->name.'.table.created_at')</th>
                        <th>@lang($app_module->name.'.'.$app_action->name.'.table.name')</th>
                        <th>@lang($app_module->name.'.'.$app_action->name.'.table.module')</th>
                        <th>@lang($app_module->name.'.'.$app_action->name.'.table.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['roles'] as $key => $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->created_at }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @foreach ($role->modules() as $module)
                                    <span class="label label-info">@lang('modules.'.$module->name)</span>
                                @endforeach
                            </td>
                            <td>
                                <a class="btn btn-xs btn-warning" href="{{ route('admin.'.$app_module->name.'.edit', $role->id) }}"><i class="fa fa-edit"></i> @lang($app_module->name.'.'.$app_action->name.'.action.edit')</a>
                                <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete" data-url="{{ route('admin.'.$app_module->name.'.destroy', $role->id) }}"><i class="fa fa-remove"></i> @lang($app_module->name.'.'.$app_action->name.'.action.destroy')</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @include('admin.layouts.modal.delete')
            @include('admin.layouts.pagination', ['result' => $data['roles']])
            @include('admin.layouts.datatable', ['noactions' => [1, 3, 4]])
        </div>
    </div>
@endsection
