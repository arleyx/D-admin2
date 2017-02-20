<header id="d-header">
    <div class="container">
        <nav>
            <a href="#">HOME</a>
            <a href="#">ABOUT US</a>
            <a href="#">PUBLICATION</a>
        </nav>

        <a href="#">
            <img src="{{ asset('images/logo.png') }}" alt="BeeringHoney" />
        </a>

        <nav>
            <a href="#">RESEARCH</a>
            <a href="#">GALLERY</a>
            <a href="#">CONTACT US</a>
        </nav>
    </div>
</header>


<section id="d-user" class="container">
    <nav class="pull-left">
        <a href="{{ url('/') }}">Home</a>
    </nav>
    @if (Auth::guard('web')->check())
        <nav class="pull-right">
            Welcome, <strong>{{ Auth::user()->profile->name }} {{ Auth::user()->profile->lastname }}</strong> |
            <a href="{{ url('/my-profile') }}">My profile</a> |
            <a href="{{ url('/logout') }}">Sign out</a>
        </nav>
    @endif
    <div class="clearfix"></div>
</section>
