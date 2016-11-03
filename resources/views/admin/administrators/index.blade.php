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
                        <th>@lang($app_module->name.'.'.$app_action->name.'.table.create_at')</th>
                        <th>@lang($app_module->name.'.'.$app_action->name.'.table.name')</th>
                        <th>@lang($app_module->name.'.'.$app_action->name.'.table.email')</th>
                        <th>@lang($app_module->name.'.'.$app_action->name.'.table.role')</th>
                        <th>@lang($app_module->name.'.'.$app_action->name.'.table.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['administrators'] as $key => $administrator)
                        <tr>
                            <td>{{ $administrator->id }}</td>
                            <td>{{ $administrator->created_at }}</td>
                            <td>{{ $administrator->name }}</td>
                            <td>{{ $administrator->email }}</td>
                            <td>
                                <span class="label label-info">{{ $administrator->role->name }}</span>
                            </td>
                            <td>
                                <a class="btn btn-xs btn-warning" href="{{ route('admin.'.$app_module->name.'.edit', $administrator->id) }}"><i class="fa fa-edit"></i> @lang($app_module->name.'.'.$app_action->name.'.action.edit')</a>
                                <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete" data-url="{{ route('admin.'.$app_module->name.'.destroy', $administrator->id) }}"><i class="fa fa-remove"></i> @lang($app_module->name.'.'.$app_action->name.'.action.destroy')</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @include('admin.layouts.modal.delete')
            @include('admin.layouts.pagination', ['result' => $data['administrators']])
            @include('admin.layouts.datatable', ['noactions' => [1]])
        </div>
    </div>
@endsection
