@extends('admin.layouts.main')

@section('title', trans($app_module->name.'.title'))

@section('content')
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">@lang($app_module->name.'.'.$app_action->name.'.title')</h3>
        </div>
        <form action="{{ route('admin.'.$app_module->name.'.update', $data['beering']->id) }}" role="form" method="POST">
            {!! csrf_field() !!}
            {{ method_field('PUT') }}

            <div class="box-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="title">@lang($app_module->name.'.'.$app_action->name.'.form.title.field')</label>
                            <input class="form-control" id="title" name="title" placeholder="@lang($app_module->name.'.'.$app_action->name.'.form.title.placeholder')" type="text" value="{{ $data['beering']->title }}"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="objective">@lang($app_module->name.'.'.$app_action->name.'.form.objective.field')</label>
                            <textarea class="form-control TMCE_basic" id="objective" name="objective" placeholder="@lang($app_module->name.'.'.$app_action->name.'.form.objective.placeholder')" rows="5">{{ $data['beering']->objective }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="description">@lang($app_module->name.'.'.$app_action->name.'.form.description.field')</label>
                            <textarea class="form-control TMCE_basic" id="description" name="description" placeholder="@lang($app_module->name.'.'.$app_action->name.'.form.description.placeholder')" rows="7">{{ $data['beering']->description }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="amount">@lang($app_module->name.'.'.$app_action->name.'.form.amount.field')</label>
                            <div class="input-group">
                                <span class="input-group-addon">$</span>
                                <input class="form-control" id="amount" name="amount" placeholder="@lang($app_module->name.'.'.$app_action->name.'.form.amount.placeholder')" type="text" value="{{ $data['beering']->amount }}"/>
                                <span class="input-group-addon">.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('admin.layouts.tinymce.editor')

            <div class="box-footer">
                <button type="submit" class="btn btn-warning">@lang($app_module->name.'.'.$app_action->name.'.form.submit')</button>
            </div>
        </form>
    </div>
@endsection
