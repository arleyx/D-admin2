@extends('layouts.main')

@section('title', 'Donate')

@section('content')
    <div class="container text-center">
        <h1>Donate</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        @if (Auth::guard('web')->check())
            <p>&nbsp;</p>
            <p>
                <strong>Welcome,</strong>
                {{ Auth::user()->profile->name }} {{ Auth::user()->profile->lastname }}
            </p>
            <div class="row">
                <div class="col-sm-offset-4 col-sm-4">
                    <a href="{{ url('/donate') }}" class="btn btn-primary btn-lg btn-block">Donate!</a>
                </div>
            </div>
            <a href="{{ url('/logout') }}" class="btn btn-link">Sign out</a>
        @else
            <p>&nbsp;</p>
            <div class="row">
                <div class="col-sm-offset-4 col-sm-4">
                    <a href="{{ url('/login') }}" class="btn btn-primary btn-lg btn-block">Sign in</a>
                </div>
            </div>
            <a href="{{ url('/about-beering') }}" class="btn btn-link">No account? Create one!</a>
        @endif



    </div>
@endsection
