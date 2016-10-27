@extends('admin.layouts.main')

@section('title', trans($dataConfig['module']->name.'.title'))

@section('content')
    <a class="btn btn-primary" href="{{ route('admin.'.$dataConfig['module']->name.'.create') }}"><i class="fa fa-plus-circle"></i> {{ trans($dataConfig['module']->name.'.'.$dataConfig['action']->name.'.action.create') }}</a>
    <p>&nbsp;</p>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans($dataConfig['module']->name.'.'.$dataConfig['action']->name.'.title') }}</h3>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="50">{{ trans($dataConfig['module']->name.'.'.$dataConfig['action']->name.'.table.id') }}</th>
                        <th>{{ trans($dataConfig['module']->name.'.'.$dataConfig['action']->name.'.table.create_at') }}</th>
                        <th>{{ trans($dataConfig['module']->name.'.'.$dataConfig['action']->name.'.table.name') }}</th>
                        <th>{{ trans($dataConfig['module']->name.'.'.$dataConfig['action']->name.'.table.module') }}</th>
                        <th>{{ trans($dataConfig['module']->name.'.'.$dataConfig['action']->name.'.table.action') }}</th>
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
                                    <span class="label label-info">{{ trans('modules.'.$module->name) }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a class="btn btn-xs btn-warning" href="{{ route('admin.'.$dataConfig['module']->name.'.edit', $role->id) }}"><i class="fa fa-edit"></i> {{ trans('roles.index.action.edit') }}</a>
                                <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete" data-url="{{ route('admin.'.$dataConfig['module']->name.'.destroy', $role->id) }}"><i class="fa fa-remove"></i> {{ trans('roles.index.action.destroy') }}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @include('admin.layouts.modal.delete')
        </div>
    </div>
@endsection
