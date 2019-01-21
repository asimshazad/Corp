@extends('layouts.dashboard')
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

                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body">

                            <form class="form-horizontal" method="post" role="form">
                                {!! csrf_field() !!}
                                <div class="row ">
                                    <div class="form-group col-md-6">
                                        <label><strong style="text-transform: uppercase;">{{ __('customer.customer_name') }}</strong></label>
                                        <div >
                                            <div class="input-group">
                                                <input name="name" class="form-control bold" value="{{ old('name') }}" placeholder="{{ __('customer.customer_name') }}" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label><strong style="text-transform: uppercase;">{{ __('customer.account_no') }}</strong></label>
                                        <div >
                                            <div class="input-group">
                                                <input name="account_no" class="form-control bold" value="{{ old('account_no') }}" placeholder="{{ __('customer.account_no') }}" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label><strong style="text-transform: uppercase;">{{ __('customer.father_name') }}</strong></label>
                                        <div >
                                            <div class="input-group">
                                                <input name="father_name" class="form-control bold" value="{{ old('father_name') }}" placeholder="{{ __('customer.father_name') }}" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label><strong style="text-transform: uppercase;">{{ __('customer.cast') }}</strong></label>
                                        <div >
                                            <div class="input-group">
                                                <input name="cast" class="form-control bold" value="{{ old('cast') }}" placeholder="{{ __('customer.cast') }}" required/>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label><strong style="text-transform: uppercase;">{{ __('customer.phone') }}</strong></label>
                                        <div >
                                            <div class="input-group">
                                                <input name="phone" class="form-control bold" value="{{ old('phone') }}" placeholder="{{ __('customer.phone') }}" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label><strong style="text-transform: uppercase;">{{ __('customer.alternative_phone') }}</strong></label>
                                        <div >
                                            <div class="input-group">
                                                <input name="phone2" class="form-control bold" value="{{ old('alternative_phone') }}" placeholder="{{ __('customer.alternative_phone') }}" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label><strong style="text-transform: uppercase;">{{ __('customer.job') }}</strong></label>
                                        <div >
                                            <div class="input-group">
                                                <input name="job" class="form-control bold" value="{{ old('job') }}" placeholder="{{ __('customer.job') }}" required/>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label><strong style="text-transform: uppercase;">{{ __('customer.customer_address') }}</strong></label>
                                        <div >
                                            <div class="input-group">
                                                <input name="address" class="form-control bold" value="{{ old('address') }}" placeholder="{{ __('customer.customer_address') }}" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-block btn-lg text-uppercase"><i class="fa fa-send"></i> {{ __('customer.create_customer') }}</button>
                                    </div>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->
@endsection
@section('vendors')
@endsection
@section('scripts')

@endsection