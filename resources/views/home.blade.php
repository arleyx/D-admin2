@extends('layouts.main')

@section('title', 'Donate')

@section('content')
    <div class="container text-center">
        <h1>Donate</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        @if (Auth::guard('web')->check())
            <p>&nbsp;</p>
            <div class="row">
                <div class="col-sm-offset-4 col-sm-4">
                    <a href="{{ url('/donate') }}" class="btn btn-primary btn-lg btn-block">Donate!</a>
                </div>
            </div>
        @else
            <p>&nbsp;</p>
            <div class="row">
                <div class="col-sm-offset-4 col-sm-4">
                    <a href="{{ url('/login') }}" class="btn btn-primary btn-lg btn-block">Sign in</a>
                </div>
            </div>
            <a href="{{ url('/about-beering') }}" class="btn btn-link">No account? Create one!</a>
        @endif
        <p>&nbsp;</p>
        <p>&nbsp;</p>

        <h2>Statistics</h2>

        @push('scripts')
            <script src="{{ asset('libs/chart/chart.min.js') }}"></script>
        @endpush
        <div class="row">
            @foreach ($data['groups'] as $group)
                <div class="col-sm-4">
                    <h3>{{ $group->name }}</h3>
                    <canvas id="d-statistic-{{ $group->id }}" width="300" height="300"></canvas>
                </div>
                @push('scripts')
                    <script>
                        var ctx = document.querySelector('#d-statistic-{{ $group->id }}');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                                datasets: [{
                                    label: '# of Votes',
                                    data: [12, 19, 3, 5, 2, 3],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255,99,132,1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero:true
                                        }
                                    }]
                                }
                            }
                            });
                    </script>
                @endpush
            @endforeach
        </div>
    </div>
@endsection
