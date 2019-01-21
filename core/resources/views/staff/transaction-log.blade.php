@extends('layouts.staff')
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


                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Transaction Date</th>
                                    <th>Transaction Number</th>
                                    <th>Transaction Type</th>
                                    <th>Tran Amount</th>
                                    <th>Post Amount</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($log as $k => $p)
                                    <tr>
                                        <td>{{ ++$k }}</td>
                                        <td>{{ \Carbon\Carbon::parse($p->created_at)->format('dS-M-y - h:i A') }}</td>
                                        <td>{{ $p->custom }}</td>

                                        <td>
                                            @if($p->type == 1)
                                                <div class="badge badge-primary font-weight-bold text-uppercase">
                                                    <i class="ft ft-briefcase font-medium-2"></i>
                                                    <span>Company Payment</span>
                                                </div>
                                            @elseif($p->type == 2)
                                                <div class="badge badge-warning font-weight-bold text-uppercase">
                                                    <i class="ft ft-briefcase font-medium-2"></i>
                                                    <span>Re Company Payment</span>
                                                </div>
                                            @elseif($p->type == 3)
                                                <div class="badge badge-success font-weight-bold text-uppercase">
                                                    <i class="ft ft-download-cloud font-medium-2"></i>
                                                    <span>Deposit Amount</span>
                                                </div>
                                            @elseif($p->type == 4)
                                                <div class="badge badge-warning font-weight-bold text-uppercase">
                                                    <i class="ft ft-download-cloud font-medium-2"></i>
                                                    <span>Re Deposit Amount</span>
                                                </div>
                                            @elseif($p->type == 5)
                                                <div class="badge badge-success font-weight-bold text-uppercase">
                                                    <i class="ft ft-upload-cloud font-medium-2"></i>
                                                    <span>Withdraw Amount</span>
                                                </div>
                                            @elseif($p->type == 6)
                                                <div class="badge badge-warning font-weight-bold text-uppercase">
                                                    <i class="ft ft-upload-cloud font-medium-2"></i>
                                                    <span>Re Withdraw Amount</span>
                                                </div>
                                            @elseif($p->type == 7)
                                                <div class="badge badge-success font-weight-bold text-uppercase">
                                                    <i class="ft ft-cloud-lightning font-medium-2"></i>
                                                    <span>Expense Amount</span>
                                                </div>
                                            @elseif($p->type == 8)
                                                <div class="badge badge-warning font-weight-bold text-uppercase">
                                                    <i class="ft ft-cloud-lightning font-medium-2"></i>
                                                    <span>Re Expense Amount</span>
                                                </div>
                                            @elseif($p->type == 9)
                                                <div class="badge badge-success font-weight-bold text-uppercase">
                                                    <i class="ft ft-shopping-cart font-medium-2"></i>
                                                    <span>Sell Product Price</span>
                                                </div>
                                            @elseif($p->type == 10)
                                                <div class="badge badge-warning font-weight-bold text-uppercase">
                                                    <i class="ft ft-shopping-cart font-medium-2"></i>
                                                    <span>Re Sell Product Price</span>
                                                </div>
                                            @elseif($p->type == 11)
                                                <div class="badge badge-primary font-weight-bold text-uppercase">
                                                    <i class="ft ft-copy font-medium-2"></i>
                                                    <span>Due Repayment</span>
                                                </div>
                                            @elseif($p->type == 12)
                                                <div class="badge badge-warning font-weight-bold text-uppercase">
                                                    <i class="ft ft-copy font-medium-2"></i>
                                                    <span>Re Due Repayment</span>
                                                </div>
                                            @elseif($p->type == 13)
                                                <div class="badge badge-primary font-weight-bold text-uppercase">
                                                    <i class="ft ft-sliders font-medium-2"></i>
                                                    <span>Instalment Repayment</span>
                                                </div>
                                            @elseif($p->type == 14)
                                                <div class="badge badge-warning font-weight-bold text-uppercase">
                                                    <i class="ft ft-sliders font-medium-2"></i>
                                                    <span>Re Instalment Repayment</span>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <b>({{ $p->status == 1 ? '-' : '+' }}) {{ $p->balance }} {{ $basic->currency }}</b>
                                        </td>
                                        <td>
                                            <b>{{ $p->post_balance }} {{ $basic->currency }}</b>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pull-right">
                                {!! $log->links('basic.pagination') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->
@endsection