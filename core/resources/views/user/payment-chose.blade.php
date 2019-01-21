@extends('layouts.user')
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
                                @foreach($payment as $pm)
                                <div class="col-md-3">
                                    <div class="card text-white box-shadow-0 bg-gradient-x2-primary">
                                        <div class="card-content collpase show">
                                            <div class="card-body text-center">
                                                <h3 class="text-uppercase font-weight-bold text-center" id="horz-layout-basic">{{$pm->name}}</h3>
                                                <br>
                                                <img src="{{ asset('assets/images/payment') }}/{{$pm->image}}" style="width:100%;" alt="">
                                                <br>
                                                <br>
                                                <form action="{{ route('submit-payment-method') }}" method="post">
                                                    {!! csrf_field() !!}
                                                    <input type="hidden" name="id" value="{{$pm->id}}">
                                                    <input type="hidden" name="coupon" class="coupon" id="coupon">
                                                    <button type="submit" class="btn text-white btn-outline-info font-weight-bold text-uppercase btn-min-width mr-1 mb-1">Payment Now</button>
                                                </form>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->
@endsection
@section('scripts')

@endsection