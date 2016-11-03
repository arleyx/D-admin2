<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li {{ $app_module->id == 0 ? 'class=active' : '' }}><a href="{{ url('/admin/init') }}"><i class="fa fa-dashboard"></i><span>@lang('modules.dashboard')</span></a></li>
            <li class="header">Modules</li>
            @foreach ($app_modules as $module)
                <li {{ $app_module->id == $module->id ? 'class=active' : '' }}>
                    <a href="{{ route('admin.'.$module->name.'.index') }}">
                        <i class="fa fa-toggle-{{ $app_module->id == $module->id ? 'on' : 'off' }}"></i><span>@lang('modules.'.$module->name)</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </section>
</aside>
