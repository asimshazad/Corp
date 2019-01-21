@extends('layouts.user')
@section('style')

@endsection
@section('content')

    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-basic">{{$page_title}}</h4>
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
                                <div class="col-md-10 offset-1">
                                    <div class="alert alert-primary" role="alert">
                                        <strong>Step #1 : Need To Send a Request To Admin.</strong>
                                    </div>
                                    <div class="alert alert-primary" role="alert">
                                        <strong>Step #2 : Need Admin Approval to Become this.</strong>
                                    </div>
                                    <div class="alert alert-primary" role="alert">
                                        <strong>Step #3 : After Approve You can Submit Signal.</strong>
                                    </div>
                                    <div class="alert alert-primary" role="alert">
                                        <strong>Step #4 : Admin Set Signal Value In USD. It's Depend on Admin.</strong>
                                    </div>
                                    <div class="alert alert-primary" role="alert">
                                        <strong>Step #4 : When You Reached Withdraw Limit, Then You can Withdraw This.</strong>
                                    </div>
                                    <hr>
                                    @if(Auth::user()->signal_status == 0)
                                        <form class="form form-horizontal" action="{{ route('submit-staff-request') }}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="ft-navigation"></i> Send Staff Request</button>
                                        </form>
                                    @elseif(Auth::user()->signal_status == 2)
                                        <div class="alert alert-warning text-center" role="alert">
                                            <strong>Your Request is Pending Now.</strong>
                                        </div>
                                    @elseif(Auth::user()->signal_status == 3)
                                        <div class="alert alert-danger text-center" role="alert">
                                            <strong>Your Request is Rejected.</strong>
                                        </div>
                                    @else
                                        <div class="alert alert-success text-center" role="alert">
                                            <strong>Your are Already a Staff.</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
@section('scripts')

@endsection