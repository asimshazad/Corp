@extends('layouts.dashboard')
@section('style')
    <link href="{{asset('assets/admin/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap-datetimepicker.css') }}">
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

                            {!! Form::open(['class'=>'form-horizontal','role'=>'form']) !!}

                            <div class="form-body">

                                <div class="form-group">
                                    <label class="col-md-12"><strong
                                                style="text-transform: uppercase;">{{ __('company.payment_date') }}</strong></label>
                                    <div class="col-md-12">
                                        <div class='input-group'>
                                            <input type='text' name="payment_date" class="form-control font-weight-bold"
                                                   id='datetimepicker1'
                                                   value="{{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}"/>
                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12"><strong
                                                style="text-transform: uppercase;">{{ __('company.product_company') }}</strong></label>
                                    <div class="col-md-12">
                                        <select name="company_id" id="company_id"
                                                class="form-control select2 font-weight-bold">
                                            <option value=""
                                                    class="font-weight-bold">{{ __('company.select_one') }}</option>
                                            @foreach($company as $c)
                                                <option value="{{ $c->id }}"
                                                        class="font-weight-bold">{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12"><strong
                                                style="text-transform: uppercase;">{{ __('company.payment_type') }}</strong></label>
                                    <div class="col-md-12">
                                        <select name="payment_type" id="payment_type"
                                                class="form-control select2 font-weight-bold">
                                            <option value="0"
                                                    class="font-weight-bold">{{ __('company.delivery_payment') }}</option>
                                            <option value="1"
                                                    class="font-weight-bold">{{ __('company.normal_payment') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12"><strong
                                                style="text-transform: uppercase;">{{ __('company.pay_amount') }} </strong></label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input class="form-control font-weight-bold input-lg pay_amount"
                                                   id="pay_amount" name="pay_amount" value="{{ old('pay_amount') }}"
                                                   placeholder="{{ __('company.pay_amount') }}Pay Amount" type="text">
                                            <span class="input-group-addon"><strong>{{ $basic->currency }}</strong></span>
                                        </div>
                                    </div>
                                </div>

                                <div id="store_payment" style="display: block">

                                    <div class="form-group">
                                        <label class="col-md-12"><strong
                                                    style="text-transform: uppercase;">{{ __('company.total_amount') }}</strong></label>
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <input class="form-control font-weight-bold input-lg"
                                                       name="total_amount" value="{{ old('total_amount') }}"
                                                       placeholder="{{ __('company.total_amount') }}" type="text">
                                                <span class="input-group-addon"><strong>{{ $basic->currency }}</strong></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><strong
                                                    style="text-transform: uppercase;">{{ __('company.reference') }} </strong></label>
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <input name="reference" class="form-control font-weight-bold"
                                                       value="{{ old('reference') }}"
                                                       placeholder="{{ __('company.reference') }}"/>
                                                <span class="input-group-addon"><strong><i
                                                                class="fa fa-tasks"></i></strong></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div id="normal_payment" style="display: none">

                                    <div class="form-group">
                                        <label class="col-md-12"><strong
                                                    style="text-transform: uppercase;">{{ __('company.short_details') }} </strong></label>
                                        <div class="col-md-12">
                                            <textarea name='details' id="" cols="30" rows="5"
                                                      placeholder="{{ __('company.short_details') }}"
                                                      class="form-control font-weight-bold input-lg"></textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <button type="submit" id="paymentButton" disabled
                                            class="btn btn-primary btn-block font-weight-bold btn-lg text-uppercase"><i
                                                class="fa fa-send"></i> {{ __('company.submit') }}</button>
                                </div>
                            </div>
                            {!! Form::close() !!}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->
@endsection
@section('scripts')
    <script src="{{asset('assets/admin/js/select2.full.min.js')}}" type="text/javascript"></script>

    <script src="{{ asset('assets/admin/js/moment-with-locales.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/js/picker-date-time.js') }}" type="text/javascript"></script>

    <script>
        $(function () {
            $('.select2').select2();
        });
        $('.pay_amount').on('blur', function (e) {
            var pay_amount = e.target.value;
            var url = '{{ url('/') }}';
            $.get(url + '/check-admin-balance?amount=' + pay_amount, function (data) {
                var result = $.parseJSON(data);

                if (result['errorStatus'] == "yes") {
                    document.getElementById("paymentButton").disabled = true;
                    toastr.error(result['errorDetails']);
                } else {
                    toastr.info(result['errorDetails']);
                    document.getElementById("paymentButton").disabled = false;
                }

            })
        });
        $('#payment_type').on('change', function (e) {
            var payment_type = e.target.value;
            if (payment_type == 1) {
                document.getElementById("normal_payment").style.display = 'block';
                document.getElementById("store_payment").style.display = 'none';
            } else {
                document.getElementById("normal_payment").style.display = 'none';
                document.getElementById("store_payment").style.display = 'block';
            }
        });

    </script>

@endsection