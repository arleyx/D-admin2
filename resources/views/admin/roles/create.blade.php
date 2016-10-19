@extends('admin.layouts.main')

@section('title', trans('profiles.title'))

@section('content')
    <section class="content">
        @if (count($errors) > 0)
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans($dataConfig['module']->name.'.'.$dataConfig['action']->name.'.title') }}</h3>
            </div>
            <form action="{{ route('admin.'.$dataConfig['module']->name.'.store') }}" role="form" method="POST">
                {!! csrf_field() !!}

                <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">{{ trans($dataConfig['module']->name.'.'.$dataConfig['action']->name.'.form.name.field') }}</label>
                                <input class="form-control" id="name" name="name" placeholder="{{ trans($dataConfig['module']->name.'.'.$dataConfig['action']->name.'.form.name.placeholder') }}" type="text"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="50">#</th>
                                    <th width="50">{{ trans($dataConfig['module']->name.'.'.$dataConfig['action']->name.'.table.id') }}</th>
                                    <th>{{ trans($dataConfig['module']->name.'.'.$dataConfig['action']->name.'.table.name') }}</th>
                                    <th>{{ trans($dataConfig['module']->name.'.'.$dataConfig['action']->name.'.table.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['modules'] as $module)
                                    <tr>
                                        <td class="text-center">
                                            <label><input name="modules[{{ $module->id }}]" type="checkbox" value="{{ $module->id }}"/></label>
                                        </td>
                                        <td>{{ $module->id }}</td>
                                        <td>{{ trans('modules.'.$module->name) }}</td>
                                        <td>
                                            <select multiple class="form-control" name="modules[{{ $module->id }}][]">
                                                @foreach ($module->actions()->distinct()->getResults() as $action)
                                                    <option value="{{ $action->id }}">{{ $action->name }}</option>
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
                    <button type="submit" class="btn btn-primary">{{ trans($dataConfig['module']->name.'.'.$dataConfig['action']->name.'.form.submit') }}</button>
                </div>
            </form>
        </div>
    </section>
@endsection
