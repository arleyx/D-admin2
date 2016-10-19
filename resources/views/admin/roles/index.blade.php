@extends('admin.layouts.main')

@section('title', trans('profiles.title'))

@section('content')
    <section class="content">
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
                        @foreach ($data['profiles'] as $profile)
                            <tr>
                                <td>{{ $profile->id }}</td>
                                <td>{{ $profile->create_at }}</td>
                                <td>{{ $profile->name }}</td>
                                <td>
                                    @foreach ($profile->modules()->distinct()->getResults() as $module)
                                        <span class="label label-info">{{ trans('modules.'.$module->name) }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-warning" href="{{ route('admin.'.$dataConfig['module']->name.'.edit', $profile->id) }}"><i class="fa fa-edit"></i> {{ trans('profiles.index.action.edit') }}</a>
                                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#destroy-modal" data-url="{{ route('admin.'.$dataConfig['module']->name.'.destroy', $profile->id) }}"><i class="fa fa-remove"></i> {{ trans('profiles.index.action.destroy') }}</a>

                                    <div class="modal modal-danger fade" id="destroy-modal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title">{{ trans('profiles.index.modal.title') }}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>{{ trans('profiles.index.modal.description') }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline destroy-button" data-dismiss="modal">{{ trans('profiles.index.modal.yes') }}</button>
                                                    <button type="button" class="btn btn-outline" data-dismiss="modal">{{ trans('profiles.index.modal.no') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{--<form action="{{ route('admin.'.$dataConfig['module']->name.'.destroy', $profile->id) }}" class="" method="DELETE">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i> Delete</button>
                                    </form>--}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
