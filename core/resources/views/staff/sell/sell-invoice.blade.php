@extends('layouts.staff')
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
                                            <h2>INVOICE</h2>
                                            <p class="pb-3">#{{ $sell->custom }}</p>
                                            <ul class="px-0 list-unstyled">
                                                @if($sell->status == 1)
                                                    <li><div class="badge badge-success font-weight-bold text-uppercase">Paid</div></li>
                                                @elseif($sell->status == 2)
                                                    <li><div class="badge badge-warning font-weight-bold text-uppercase">Due</div></li>
                                                    <li class="lead text-bold-800">{{ $basic->currency }} {{ $sell->due_amount }}</li>
                                                @else
                                                    <li><div class="badge badge-danger font-weight-bold text-uppercase">Instalment</div></li>
                                                    <li class="lead text-bold-800">{{ $basic->currency }} {{ $sell->due_amount }}</li>
                                                @endif

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
                                                <li class="text-bold-800">{{ $sell->customer->name }}</li>
                                                <li>{{ $sell->customer->phone }}, {{ $sell->customer->phone2 }}</li>
                                                <li>{{ $sell->customer->address }}.</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-sm-12 text-center text-md-right">
                                            <p>
                                                <span class="text-muted"></span> {{ \Carbon\Carbon::parse($sell->created_at)->format('dS M\'y - h:i A') }}</p>
                                            <p><span class="text-muted">Terms :</span>
                                                @if($sell->payment_type == 0)
                                                    On Paid
                                                @elseif($sell->payment_type == 1)
                                                    Due Payment <br> {{ \Carbon\Carbon::parse($sell->due_payment_date)->format('dS F, Y') }}
                                                @else
                                                    Instalment
                                                @endif
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
                                                        <th>#SL</th>
                                                        <th>Item Category</th>
                                                        <th>Item & Description</th>
                                                        <th class="text-right">Warranty</th>
                                                        <th class="text-right">Amount</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($sellItem as $key => $sl)
                                                    <tr>
                                                        <td scope="row">{{ ++$key }}</td>
                                                        <td>{{ $sl->product->category->name }}</td>
                                                        <td>
                                                            <p>{{ $sl->product->name }} - ({{$sl->code}})</p>
                                                        </td>
                                                        <td class="text-right">{{ $sl->store->warranty }} - Days</td>
                                                        <td class="text-right">{{ $sl->store->sell_price }} - {{ $basic->currency }}</td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">

                                            @if($sell->payment_type == 2)
                                                @php $sellInstalment2 = \App\OrderInstalment::whereOrder_id($sell->id)->first() @endphp
                                                <div class="col-md-7">
                                                    <div class="table-responsive table-bordered table-striped">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <th>Customer NID Number</th>
                                                                <th>Customer Father Name</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>{{ $sellInstalment2->customer_nid }}</td>
                                                                <td>{{ $sellInstalment2->customer_father }}</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <hr style="margin-top: 0;">
                                                    <div class="table-responsive table-bordered table-striped">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <th>Grander One Details</th>
                                                                <th>Grander Two Details</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>{{ $sellInstalment2->grander_one_name }}</td>
                                                                <td>{{ $sellInstalment2->grander_two_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ $sellInstalment2->grander_one_father }}</td>
                                                                <td>{{ $sellInstalment2->grander_two_father }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ $sellInstalment2->grander_one_phone }}</td>
                                                                <td>{{ $sellInstalment2->grander_two_phone }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ $sellInstalment2->grander_one_address }}</td>
                                                                <td>{{ $sellInstalment2->grander_two_address }}</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <hr>
                                                    <h5 class="text-center">Instalment Date List</h5>
                                                    <div class="table-responsive table-bordered table-striped">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <th>#SL</th>
                                                                <th>Date</th>
                                                                <th>Amount</th>
                                                                <th>Status</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($instalmentList as $key => $ins)
                                                                <tr>
                                                                    <td>{{ ++$key }}</td>
                                                                    <td>{{ \Carbon\Carbon::parse($ins->pay_date)->format('dS M,Y') }}</td>
                                                                    <td>{{ $ins->amount }} {{ $basic->currency }}</td>
                                                                    <td>
                                                                        @if($ins->status == 1)
                                                                            <div class="badge badge-success">Paid</div>
                                                                        @else
                                                                            <div class="badge badge-warning">Pending</div>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tbody>
                                                            <tr>
                                                                <td>Item Subtotal</td>
                                                                <td class="text-right">{{ $sell->product_price }} - {{ $basic->currency }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Discount ({{$sell->discount}}%)</td>
                                                                <td class="pink text-right">(-) {{ round(($sell->product_price * $sell->discount)/100,2)}} - {{ $basic->currency }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-bold-800">Item Total</td>
                                                                <td class="text-bold-800 text-right"> {{ $sell->product_total }} - {{ $basic->currency }}</td>
                                                            </tr>
                                                            @if($sell->payment_type == 0)
                                                                <tr class="bg-grey bg-lighten-4">
                                                                    <td class="text-bold-800">Total Amount</td>
                                                                    <td class="text-bold-800 text-right">{{ $sell->total_amount }} - {{ $basic->currency }}</td>
                                                                </tr>
                                                            @elseif($sell->payment_type == 1)
                                                                <tr class="bg-grey bg-lighten-4">
                                                                    <td class="text-bold-800">Total Amount</td>
                                                                    <td class="text-bold-800 text-right">{{ $sell->total_amount }} - {{ $basic->currency }}</td>
                                                                </tr>
                                                                <tr class="bg-grey bg-lighten-4">
                                                                    <td class="text-bold-800">Pay Amount</td>
                                                                    <td class="text-bold-800 text-right">{{ $sell->pay_amount }} - {{ $basic->currency }}</td>
                                                                </tr>
                                                                <tr class="bg-grey bg-lighten-4">
                                                                    <td class="red text-bold-800">Due Amount</td>
                                                                    <td class="red text-bold-800 text-right">{{ $sell->due_amount }} - {{ $basic->currency }}</td>
                                                                </tr>
                                                            @else
                                                                <tr class="bg-grey bg-lighten-4">
                                                                    <td class="text-bold-800">Instalment Type</td>
                                                                    <td class="text-bold-800 text-right">{{ $sell->instalment->name }} - {{ $sell->instalment->charge }}% - {{ $sell->instalment->time }} times</td>
                                                                </tr>
                                                                <tr class="bg-grey bg-lighten-4">
                                                                    <td class="text-bold-800">Total Amount</td>
                                                                    <td class="text-bold-800 text-right">{{ $sell->total_amount }} - {{ $basic->currency }}</td>
                                                                </tr>
                                                                <tr class="bg-grey bg-lighten-4">
                                                                    <td class="text-bold-800">Pay Amount</td>
                                                                    <td class="text-bold-800 text-right">{{ $sell->pay_amount }} - {{ $basic->currency }}</td>
                                                                </tr>
                                                                <tr class="bg-grey bg-lighten-4">
                                                                    <td class="red text-bold-800">Due Amount</td>
                                                                    <td class="red text-bold-800 text-right">{{ $sell->due_amount }} - {{ $basic->currency }}</td>
                                                                </tr>
                                                            @endif
                                                            <tr>
                                                                <td colspan="2" class="text-capitalize"><b>In word :</b> {{ \App\TraitsFolder\CommonTrait::wordAmount($sell->total_amount) }} {{ $basic->currency }} Only.</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-md-5 offset-md-7">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tbody>
                                                            <tr>
                                                                <td>Item Subtotal</td>
                                                                <td class="text-right">{{ $sell->product_price }} - {{ $basic->currency }}</td>
                                                            </tr>
                                                            <tr>
                                                                @if($sell->discount_type == 0)
                                                                    <td>Discount</td>
                                                                    <td class="pink text-right">(-) 0 - {{ $basic->currency }}</td>
                                                                @elseif($sell->discount_type == 1)
                                                                    <td>Discount ({{$sell->discount}}%)</td>
                                                                    <td class="pink text-right">(-) {{ round(($sell->product_price * $sell->discount)/100,2)}} - {{ $basic->currency }}</td>
                                                                @else
                                                                    <td>Discount ({{$sell->discount}}{{ $basic->symbol }})</td>
                                                                    <td class="pink text-right">(-) {{ ($sell->discount)}} - {{ $basic->currency }}</td>
                                                                @endif
                                                            </tr>
                                                            <tr>
                                                                <td class="text-bold-800">Item Total</td>
                                                                <td class="text-bold-800 text-right"> {{ $sell->product_total }} - {{ $basic->currency }}</td>
                                                            </tr>
                                                            @if($sell->payment_type == 0)
                                                                <tr class="bg-grey bg-lighten-4">
                                                                    <td class="text-bold-800">Total Amount</td>
                                                                    <td class="text-bold-800 text-right">{{ $sell->total_amount }} - {{ $basic->currency }}</td>
                                                                </tr>
                                                            @elseif($sell->payment_type == 1)
                                                                <tr class="bg-grey bg-lighten-4">
                                                                    <td class="text-bold-800">Total Amount</td>
                                                                    <td class="text-bold-800 text-right">{{ $sell->total_amount }} - {{ $basic->currency }}</td>
                                                                </tr>
                                                                <tr class="bg-grey bg-lighten-4">
                                                                    <td class="text-bold-800">Pay Amount</td>
                                                                    <td class="text-bold-800 text-right">{{ $sell->pay_amount }} - {{ $basic->currency }}</td>
                                                                </tr>
                                                                <tr class="bg-grey bg-lighten-4">
                                                                    <td class="red text-bold-800">Due Amount</td>
                                                                    <td class="red text-bold-800 text-right">{{ $sell->due_amount }} - {{ $basic->currency }}</td>
                                                                </tr>
                                                            @else
                                                                <tr class="bg-grey bg-lighten-4">
                                                                    <td class="text-bold-800">Instalment Type</td>
                                                                    <td class="text-bold-800 text-right">{{ $sell->instalment->name }} - {{ $sell->instalment->charge }}% - {{ $sell->instalment->time }} times</td>
                                                                </tr>
                                                                <tr class="bg-grey bg-lighten-4">
                                                                    <td class="text-bold-800">Total Amount</td>
                                                                    <td class="text-bold-800 text-right">{{ $sell->total_amount }} - {{ $basic->currency }}</td>
                                                                </tr>
                                                                <tr class="bg-grey bg-lighten-4">
                                                                    <td class="text-bold-800">Pay Amount</td>
                                                                    <td class="text-bold-800 text-right">{{ $sell->pay_amount }} - {{ $basic->currency }}</td>
                                                                </tr>
                                                                <tr class="bg-grey bg-lighten-4">
                                                                    <td class="red text-bold-800">Due Amount</td>
                                                                    <td class="red text-bold-800 text-right">{{ $sell->due_amount }} - {{ $basic->currency }}</td>
                                                                </tr>
                                                            @endif
                                                            <tr>
                                                                <td colspan="2" class="text-capitalize"><b>In word :</b> {{ \App\TraitsFolder\CommonTrait::wordAmount($sell->total_amount) }} {{ $basic->currency }} Only.</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            @endif


                                        </div>
                                    </div>
                                    <!-- Invoice Footer -->
                                    <div id="invoice-footer">
                                        <div class="row">
                                            <div class="col-md-5 col-sm-12 offset-7 text-center">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <a href="{{ route('staff-sell-new') }}" class="btn btn-primary btn-block btn-lg text-uppercase my-1"><i class="fa fa-arrow-left"></i> Sell Another</a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a href="{{ route('staff-print-invoice',$sell->custom) }}" target="_blank" class="btn btn-primary btn-block btn-lg text-uppercase my-1"><i class="fa fa-print"></i> Print Invoice</a>
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