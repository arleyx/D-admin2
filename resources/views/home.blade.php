@extends('layouts.main')

@section('title', 'Donate')

@section('content')
    <div class="container text-center">
        <h1>Donate</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <p>&nbsp;</p>
        <div class="row">
            <div class="col-sm-offset-4 col-sm-4">
                <a href="{{ url('/login') }}" class="btn btn-primary btn-lg btn-block">Sign in</a>
            </div>
        </div>
        <a href="{{ route('about-beering') }}" class="btn btn-link">No account? Create one!</a>
    </div>
@endsection
