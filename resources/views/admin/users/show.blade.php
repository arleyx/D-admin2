@extends('admin.layouts.main')

@section('title', trans($app_module->name.'.title'))

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">@lang($app_module->name.'.'.$app_action->name.'.title')</h3>
        </div>

        <div class="box-body">
            <table class="table table-bordered table-hover datatable">
                <tbody>
                    <tr>
                        <th>@lang($app_module->name.'.'.$app_action->name.'.table.id')</th>
                        <td>{{ $data['profile']->id }}</td>
                    </tr>
                    <tr>
                        <th>@lang($app_module->name.'.'.$app_action->name.'.table.created_at')</th>
                        <td>{{ $data['profile']->created_at }}</td>
                    </tr>
                    <tr>
                        <th>@lang($app_module->name.'.'.$app_action->name.'.table.updated_at')</th>
                        <td>{{ $data['profile']->updated_at }}</td>
                    </tr>
                    <tr>
                        <th>@lang($app_module->name.'.'.$app_action->name.'.table.name')</th>
                        <td>{{ $data['profile']->name }}</td>
                    </tr>
                    <tr>
                        <th>@lang($app_module->name.'.'.$app_action->name.'.table.lastname')</th>
                        <td>{{ $data['profile']->lastname }}</td>
                    </tr>
                    <tr>
                        <th>@lang($app_module->name.'.'.$app_action->name.'.table.email')</th>
                        <td>{{ $data['profile']->email }}</td>
                    </tr>
                    <tr>
                        <th>@lang($app_module->name.'.'.$app_action->name.'.table.phone')</th>
                        <td>{{ $data['profile']->phone }}</td>
                    </tr>
                    <tr>
                        <th>@lang($app_module->name.'.'.$app_action->name.'.table.occupation')</th>
                        <td>{{ $data['profile']->occupation }}</td>
                    </tr>
                    <tr>
                        <th>@lang($app_module->name.'.'.$app_action->name.'.table.about_you')</th>
                        <td>{{ $data['profile']->about_you }}</td>
                    </tr>
                    <tr>
                        <th>@lang($app_module->name.'.'.$app_action->name.'.table.citizenship')</th>
                        <td>{{ $data['profile']->citizenship()->name }}</td>
                    </tr>
                    <tr>
                        <th>@lang($app_module->name.'.'.$app_action->name.'.table.country')</th>
                        <td>{{ $data['profile']->country()->name }}</td>
                    </tr>
                    <tr>
                        <th>@lang($app_module->name.'.'.$app_action->name.'.table.know_us')</th>
                        <td>{{ $data['profile']->know_us }}</td>
                    </tr>

                    <tr>
                        <th class="warning">@lang($app_module->name.'.'.$app_action->name.'.table.group')</th>
                        <td class="warning">{{ $data['user']->group->name }}</td>
                    </tr>
                    <tr>
                        <th class="warning">@lang($app_module->name.'.'.$app_action->name.'.table.beering')</th>
                        <td class="warning">{{ $data['user']->group->beering->title }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
