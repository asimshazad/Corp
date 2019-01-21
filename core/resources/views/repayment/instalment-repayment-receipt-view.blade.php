@extends('layouts.dashboard')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/invoice.css') }}">
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

                            <section class="card" id="printAble">
                                <div id="invoice-template" class="card-body">
                                    <!-- Invoice Company Details -->
                                    <div id="invoice-company-details" class="row">
                                        <div class="col-md-4 col-sm-12 text-center text-md-left">
                                            <img src="{{ asset('assets/images/logo.png') }}" alt="company logo" style="width: 40%" class=""/>
                                            <div class="details text-center" style="width: 44%">
                                                <h5 class="mt-1">{{ $basic->title }}</h5>
                                                <h6>{{ $basic->address }}</h6>
                                                <h6>{{ $basic->phone }}</h6>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-12 text-center text-md-right">
                                            <h2>RECEIPT</h2>
                                            <p class="pb-3">#{{ $sell->custom }}</p>
                                            <ul class="px-0 list-unstyled">
                                                <li><div class="badge badge-danger font-weight-bold text-uppercase">Instalment</div></li>
                                                <li class="lead text-bold-800">{{ $basic->currency }} {{ $sell->amount }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--/ Invoice Company Details -->
                                    <!-- Invoice Customer Details -->
                                    <div id="invoice-customer-details" class="row pt-2">
                                        <div class="col-sm-12 text-center text-md-left">
                                            <p class="font-weight-bold">Bill To</p>
                                        </div>
                                        <div class="col-md-6 col-sm-12 text-center text-md-left">
                                            <ul class="px-0 list-unstyled">
                                                <li class="text-bold-800">{{ $sell->instalment->customer->name }}</li>
                                                <li>{{ $sell->instalment->customer->phone }}</li>
                                                <li>{{ $sell->instalment->customer->address }}.</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-sm-12 text-center text-md-right">
                                            <p>
                                                <span class="text-muted"></span> {{ \Carbon\Carbon::parse($sell->pay_date)->format('dS-F-Y') }}</p>
                                            <p><span class="text-muted">Terms :</span>
                                                Instalment Repayment
                                            </p>
                                        </div>
                                    </div>
                                    <!--/ Invoice Customer Details -->
                                    <!-- Invoice Items Details -->
                                    <div id="invoice-items-details" class="pt-2">
                                        <div class="row">
                                            <div class="table-responsive col-sm-12">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>Invoice Number</th>
                                                        <th class="text-right">Instalment Amount</th>
                                                        <th class="text-right">Pay Amount</th>
                                                        <th class="text-right">Due Amount</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $sell->instalment->custom }}</td>
                                                            <td class="text-right">{{ $sell->amount }} - {{ $basic->currency }}</td>
                                                            <td class="text-right">{{ $sell->pay_amount }} - {{ $basic->currency }}</td>
                                                            <td class="text-right">{{ $sell->amount - $sell->pay_amount }} - {{ $basic->currency }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">

                                                <div class="col-md-5 offset-md-7">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tbody>


                                                                <tr class="bg-grey bg-lighten-4">
                                                                    <td class="text-bold-800">Total Amount</td>
                                                                    <td class="text-bold-800 text-right">{{ $sell->amount }} - {{ $basic->currency }}</td>
                                                                </tr>
                                                                <tr class="bg-grey bg-lighten-4">
                                                                    <td class="text-bold-800">Pay Amount</td>
                                                                    <td class="text-bold-800 text-right">{{ $sell->pay_amount }} - {{ $basic->currency }}</td>
                                                                </tr>
                                                                <tr class="bg-grey bg-lighten-4">
                                                                    <td class="red text-bold-800">Due Amount</td>
                                                                    <td class="red text-bold-800 text-right">{{ $sell->amount - $sell->pay_amount }} - {{ $basic->currency }}</td>
                                                                </tr>
                                                            <tr>
                                                                <td colspan="2" class="text-capitalize"><b>In word :</b> {{ \App\TraitsFolder\CommonTrait::wordAmount($sell->amount) }} {{ $basic->currency }} Only.</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>


                                        </div>
                                    </div>
                                    <!-- Invoice Footer -->
                                    <div id="invoice-footer">
                                        <div class="row">
                                            <div class="col-md-5 col-sm-12 offset-7 text-center">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <a href="{{ route('instalment-repayment') }}" class="btn btn-primary btn-block btn-lg text-uppercase my-1"><i class="fa fa-arrow-left"></i> Another</a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a href="{{ route('instalment-repayment-invoice-print',$sell->custom) }}" target="_blank" class="btn btn-primary btn-block btn-lg text-uppercase my-1"><i class="fa fa-print"></i> Print</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ Invoice Footer -->
                                </div>
                            </section>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->
@endsection
@section('scripts')

@endsection