<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li><a href="#"><i class="fa fa-dashboard"></i><span>{{ trans('menu.dashboard') }}</span></a></li>
            <li class="header">Modules</li>
            @foreach (auth('administrators')->user()->profile()->getResults()->modules()->getResults() as $module)
                <li><a href="#"><i class="fa fa-toggle-off"></i><span>{{ trans('menu.'.$module->name) }}</span></a></li>
            @endforeach

            <!-- Optionally, you can add icons to the links -->
            {{-- <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
            <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>


            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#">Link in level 2</a></li>
                    <li><a href="#">Link in level 2</a></li>
                </ul>
            </li> --}}
        </ul>
    </section>
</aside>
