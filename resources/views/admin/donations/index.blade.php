@extends('admin.layouts.main')

@section('title', trans($app_module->name.'.title'))

@section('content')
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
                        <th>@lang($app_module->name.'.'.$app_action->name.'.table.date')</th>
                        <th>@lang($app_module->name.'.'.$app_action->name.'.table.user')</th>
                        <th>@lang($app_module->name.'.'.$app_action->name.'.table.amount')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['donations'] as $key => $donation)
                        <tr>
                            <td>{{ $donation->id }}</td>
                            <td>{{ $donation->created_at }}</td>
                            <td>{{ $donation->date }}</td>
                            <td>{{ $donation->user->profile->name }} {{ $donation->user->profile->lastname }}</td>
                            <td>${{ number_format($donation->amount, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @include('admin.layouts.pagination', ['result' => $data['donations']])
            @include('admin.layouts.datatable', ['noactions' => [1]])
        </div>
    </div>
@endsection
