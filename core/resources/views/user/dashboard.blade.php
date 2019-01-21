@extends('layouts.user')
@section('content')

    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-6">
                <div class="card text-white box-shadow-0 bg-gradient-radial-primary">
                    <div class="card-header">
                        <h1 class="text-uppercase font-weight-bold text-center" id="horz-layout-basic">Plan Status</h1>
                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body text-center">

                            <h3>Current Plan : {{ $user->plan->name }}</h3>
                            <br>
                            @if($user->plan_status == 0)
                                <h3>Complete Your Payment</h3>
                            @else
                                @if($user->plan->plan_type == 0)
                                    <h3>Available Duration : {{ \Carbon\Carbon::parse($user->expire_time)->diffForHumans()  }}</h3>
                                @else
                                    <h3>Duration Unlimited</h3>
                                @endif
                            @endif
                            <br>
                            @if($user->plan_status != 0 or $user->plan->price_type == 0)
                            <a href="{{ route('user-upgrade-plan') }}" class="btn text-white btn-outline-success font-weight-bold text-uppercase btn-min-width mr-1 mb-1">Upgrade Your Plan</a>
                            @else
                                <a href="{{ route('chose-payment-method') }}" class="btn text-white btn-outline-warning font-weight-bold text-uppercase btn-min-width mr-1 mb-1">Complete Your Payment</a>
                                <a href="{{ route('user-upgrade-plan') }}" class="btn text-white btn-outline-success font-weight-bold text-uppercase btn-min-width mr-1 mb-1">Upgrade Your Plan</a>
                            @endif
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-white box-shadow-0 bg-gradient-x2-success">
                    <div class="card-header">
                        <h1 class="text-uppercase font-weight-bold text-center" id="horz-layout-basic">Signal Status</h1>
                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body text-center font-weight-bold">
                            <br>
                            <h3>New Signal : {{ $new_signal }}</h3>
                            <br>
                            <h3 style="margin-bottom: 20px;">Total Signal : {{ $all_signal }}</h3>
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->
    @if (Auth::user()->signal_status == 1)
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-gradient-directional-warning">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body white text-left">
                                <h3>{{ $balance }} {{ $basic->currency }}</h3>
                                <span class="font-weight-bold text-uppercase">Current Balance</span>
                            </div>
                            <div class="align-self-center">
                                <i class="icon-wallet white font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-gradient-directional-success">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body white text-left">
                                <h3>{{$total_provide}}</h3>
                                <span class="font-weight-bold text-uppercase">Total Provide Signal</span>
                            </div>
                            <div class="align-self-center">
                                <i class="icon-graph white font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-gradient-directional-danger">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body white text-left">
                                <h3>{{$provide_approve}}</h3>
                                <span class="font-weight-bold text-uppercase">Total Approve Signal</span>
                            </div>
                            <div class="align-self-center">
                                <i class="icon-check white font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-gradient-directional-primary">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body white text-left">
                                <h3>{{ $provide_reject }}</h3>
                                <span class="font-weight-bold text-uppercase">Total Reject Signal</span>
                            </div>
                            <div class="align-self-center">
                                <i class="icon-ban white font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-gradient-directional-pink">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body white text-left">
                                <h3>{{ \Carbon\Carbon::parse($withdraw_last->created_at)->format('dS M, Y') }}</h3>
                                <span class="font-weight-bold text-uppercase">Last Withdraw</span>
                            </div>
                            <div class="align-self-center">
                                <i class="icon-calendar white font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-gradient-directional-info">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body white text-left">
                                <h3>{{ $withdraw_total }} {{ $basic->currency }}</h3>
                                <span class="font-weight-bold text-uppercase">Total Withdraw</span>
                            </div>
                            <div class="align-self-center">
                                <i class="icon-paper-plane white font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-gradient-directional-warning">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body white text-left">
                                <h3>{{ $withdraw_pending }} {{ $basic->currency }}</h3>
                                <span class="font-weight-bold text-uppercase">Total Pending</span>
                            </div>
                            <div class="align-self-center">
                                <i class="icon-refresh white font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-gradient-directional-danger">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body white text-left">
                                <h3>{{ $withdraw_refund }} {{ $basic->currency }}</h3>
                                <span class="font-weight-bold text-uppercase">Total Refund</span>
                            </div>
                            <div class="align-self-center">
                                <i class="icon-close white font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-basic">Signal Statistic</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body">


                            <div class="row">
                                <div class="col-md-12">
                                    <!-- small box -->
                                    <div class="small-box">
                                        <canvas id="lineChart" style="width: auto; height: auto"></canvas>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->

@endsection
@section('scripts')

    <script type="text/javascript" src="{{ asset('assets/admin/js/Chart.min.js') }}"></script>

    <script language="JavaScript">
        displayLineChart();
        function displayLineChart() {
            var data = {
                labels: [
                    @foreach($dL as $l)
                        '{{ $l }}',
                    @endforeach
                ],
                datasets: [
                    {
                        label: "Prime and Fibonacci",
                        fillColor: "#3dbcff",
                        strokeColor: "#0099ff",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [
                            @foreach($dV as $d)
                                '{{ $d }}',
                            @endforeach
                        ]
                    }
                ]
            };
            var ctx = document.getElementById("lineChart").getContext("2d");
            var options = {
                responsive: true
            };
            var lineChart = new Chart(ctx).Line(data, options);
        }
    </script>
@endsection