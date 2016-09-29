<ul class="nav nav-sidebar">
    <li class="active"><a href="{{ url('/admin/dashboard') }}">{{ trans('menu.dashboard') }}</a></li>
</ul>
<ul class="nav nav-sidebar">
    @foreach (auth('administrators')->user()->profile()->getResults()->modules()->getResults() as $module)
        <li><a href="">{{ trans('menu.'.$module->name) }}</a></li>
    @endforeach
</ul>
