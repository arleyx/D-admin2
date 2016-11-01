@if (session('alert.success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> @lang('alert.success.title')</h4>
        <ul>
            @foreach (session('alert.success')->all() as $status)
                <li>{{ $status }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('alert.info'))
    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-info"></i> @lang('alert.info.title')</h4>
        <ul>
            @foreach (session('alert.info')->all() as $status)
                <li>{{ $status }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('alert.warning'))
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-warning"></i> @lang('alert.warning.title')</h4>
        <ul>
            @foreach (session('alert.warning')->all() as $status)
                <li>{{ $status }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('alert.danger'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> @lang('alert.danger.title')</h4>
        <ul>
            @foreach (session('alert.danger')->all() as $status)
                <li>{{ $status }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> @lang('alert.error.title')</h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
