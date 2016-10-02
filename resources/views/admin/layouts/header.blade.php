<header class="main-header">
    <a href="{{ url('/admin/dashboard') }}" class="logo">
        <span class="logo-mini"><strong>DPF</strong></span>
        <span class="logo-lg"><strong>D</strong>-admin</span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('images/user.png') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ auth('administrators')->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ asset('images/user.png') }}" class="img-circle" alt="User Image">
                            <p>
                                {{ auth('administrators')->user()->name }}
                                <small>Member since {{ date_format(date_create(auth('administrators')->user()->created_at), 'M. Y') }}</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div>
                                <a href="{{ url('/admin/logout') }}" class="btn btn-default btn-block btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
