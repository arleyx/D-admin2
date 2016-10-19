<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li {{ $dataConfig['module']->id == 0 ? 'class=active' : '' }}><a href="#"><i class="fa fa-dashboard"></i><span>{{ trans('modules.dashboard') }}</span></a></li>
            <li class="header">Modules</li>
            @foreach ($dataConfig['modules'] as $module)

                <li {{ $dataConfig['module']->id == $module->id ? 'class=active' : '' }}>
                    <a href="{{ route('admin.'.$module->name.'.index') }}">
                        <i class="fa fa-toggle-{{ $dataConfig['module']->id == $module->id ? 'on' : 'off' }}"></i><span>{{ trans('modules.'.$module->name) }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </section>
</aside>
