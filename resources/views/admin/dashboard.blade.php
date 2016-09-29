@extends('admin.layouts.main')

@section('title', trans('admin.title'))

@section('content')
    <header>
        @include('admin.layouts.header')
    </header>
    <main class="container-fluid">
        <div class="row">
            <nav class="col-sm-3 col-md-2 sidebar">@include('admin.layouts.menu')</nav>
            <section class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                @yield('content')
                <footer class="footer">
                    <p class="text-muted">{{ trans('admin.copyright') }}</p>
                </footer>
            </section>
        </div>
    </main>
    <?php /*<div class="page-header">
        <h1>{{ trans('admin.title') }}</h1>
    </div>
    <div class="jumbotron">
        <h1>Hello, world!</h1>
        <p>...</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
    </div> */ ?>
@endsection
