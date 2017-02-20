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
            @foreach ($data['beerings'] as $beering)
                <div class="col-sm-4">
                    <h3>{{ $beering->title }}</h3>
                    <canvas id="d-statistic-{{ $beering->id }}" width="300" height="300"></canvas>
                    <p>&nbsp;</p>
                    <div class="text-left">
                        {!! $beering->objective !!}
                        <div class="clearfix"></div>
                        <strong>Amount:</strong> ${{ number_format($beering->amount, 2) }}
                    </div>

                    {{-- dd($beering->donations()) --}}

                    {{-- <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($beering->donations() as $donation)
                                <tr>
                                    <td>{{ $donation->id }}</td>
                                    <td>{{ $donation->date }}</td>
                                    <td>{{ $donation->amount }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
                </div>
                @push('scripts')
                    <script>
                        var ctx = document.querySelector('#d-statistic-{{ $beering->id }}');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: {!! $beering->getChart()->getLabelsToJson() !!},
                                datasets: [{
                                    label: 'Donations',
                                    data: {!! $beering->getChart()->getDataToJson() !!},
                                    backgroundColor: [
                                        'rgba(242, 86, 90, 0.2)',
                                        'rgba(246, 140, 90, 0.2)',
                                        'rgba(253, 197, 112, 0.2)',
                                        'rgba(170, 212, 112, 0.2)',
                                        'rgba(71, 186, 121, 0.2)',
                                        'rgba(79, 190, 183, 0.2)',
                                        'rgba(93, 190, 233, 0.2)',
                                        'rgba(75, 152, 204, 0.2)',
                                        'rgba(147, 117, 181, 0.2)',
                                        'rgba(183, 86, 139, 0.2)',
                                        'rgba(217, 115, 180, 0.2)',
                                        'rgba(241, 64, 170, 0.2)',
                                    ],
                                    borderColor: [
                                        'rgba(242, 86, 90, 1)',
                                        'rgba(246, 140, 90, 1)',
                                        'rgba(253, 197, 112, 1)',
                                        'rgba(170, 212, 112, 1)',
                                        'rgba(71, 186, 121, 1)',
                                        'rgba(79, 190, 183, 1)',
                                        'rgba(93, 190, 233, 1)',
                                        'rgba(75, 152, 204, 1)',
                                        'rgba(147, 117, 181, 1)',
                                        'rgba(183, 86, 139, 1)',
                                        'rgba(217, 115, 180, 1)',
                                        'rgba(241, 64, 170, 1)',
                                    ],
                                    borderWidth: 1,
                                    //fill: false,
                                }],
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            //max: {{ $beering->amount }},
                                            //stepSize: {{ $beering->amount / 5 }},
                                            beginAtZero:true
                                        }
                                    }],
                                }
                            }
                            /*options: {
                                title: {
                                    display: true,
                                    text: 'Custom Chart Title'
                                },
                                scales: {
                                    xAxes: [{
                                        //type: 'linear',
                                        //position: 'top'
                                        //display: false
                                        //stacked: true
                                        ticks: {
                                            //suggestedMin: 0,    // minimum will be 0, unless there is a lower value.
                                            // OR //
                                            beginAtZero: true   // minimum value will be 0.
                                        }
                                    }]
                                }
                            }*/
                        });
                    </script>
                @endpush
            @endforeach
        </div>
    </div>
@endsection
