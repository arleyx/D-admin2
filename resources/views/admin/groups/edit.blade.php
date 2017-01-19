@extends('admin.layouts.main')

@section('title', trans($app_module->name.'.title'))

@section('content')
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">@lang($app_module->name.'.'.$app_action->name.'.title')</h3>
        </div>
        <form action="{{ route('admin.'.$app_module->name.'.update', $data['group']->id) }}" role="form" method="POST">
            {!! csrf_field() !!}
            {{ method_field('PUT') }}

            <div class="box-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">@lang($app_module->name.'.'.$app_action->name.'.form.name.field')</label>
                            <input class="form-control" id="name" name="name" placeholder="@lang($app_module->name.'.'.$app_action->name.'.form.name.placeholder')" type="text" value="{{ $data['group']->name }}"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="beering_id">@lang($app_module->name.'.'.$app_action->name.'.form.beering_id.field')</label>
                            <select class="form-control" id="beering_id" name="beering_id">
                                @foreach ($data['beerings'] as $key => $beering)
                                    <option {{ $data['group']->beering->id === $beering->id ? 'selected' : '' }} value="{{ $beering->id }}">{{ $beering->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="about">@lang($app_module->name.'.'.$app_action->name.'.form.about.field')</label>
                            <textarea class="form-control TMCE_basic" id="about" name="about" placeholder="@lang($app_module->name.'.'.$app_action->name.'.form.about.placeholder')" rows="5">{{ $data['group']->about }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="record">@lang($app_module->name.'.'.$app_action->name.'.form.record.field')</label>
                            <textarea class="form-control TMCE_basic" id="record" name="record" placeholder="@lang($app_module->name.'.'.$app_action->name.'.form.record.placeholder')" rows="5">{{ $data['group']->record }}</textarea>
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
