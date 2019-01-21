@extends('layouts.dashboard')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/datatables.min.css') }}">
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

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>{{ __('customer.id') }}</th>
                                        <th>{{ __('customer.created_date') }}</th>
                                        <th>{{ __('common.invoice_id') }}</th>
                                        <th>{{ __('common.payment_type') }}</th>
                                        <th>{{ __('common.total_amount') }}</th>
                                        <th>{{ __('common.pay_amount') }}</th>
                                        <th>{{ __('common.due_amount') }}</th>
                                        <th><th>{{ __('common.status') }}</th></th>
                                        <th>{{ __('common.action') }}</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($order as $k => $p)
                                        <tr>
                                            <td>{{ ++$k }}</td>
                                            <td>{{ \Carbon\Carbon::parse($p->created_at)->format('dS M,y h:i A') }}</td>
                                            <td>{{ $p->custom }}</td>
                                            <td>
                                                @if($p->payment_type == 0)
                                                    <div class="badge badge-primary font-weight-bold text-uppercase">{{ __('common.on_paid') }}</div>
                                                @elseif($p->payment_type == 1)
                                                    <div class="badge badge-warning font-weight-bold text-uppercase">{{ __('common.due_paid') }}</div>
                                                @else
                                                    <div class="badge badge-warning font-weight-bold text-uppercase">{{ __('common.instalment') }}</div>
                                                @endif
                                            </td>
                                            <td>{{ $p->total_amount }} {{ $basic->currency }}</td>
                                            <td>

                                                @if($p->status == 1)
                                                    <div class="badge badge-primary font-weight-bold text-uppercase">{{ __('common.paid') }}</div>
                                                @elseif($p->status == 3)
                                                    <div class="badge badge-warning font-weight-bold text-uppercase">{{ __('common.pending') }}</div>
                                                @else
                                                    {{ $p->pay_amount }} {{ $basic->currency }}
                                                @endif

                                            </td>
                                            <td>
                                                @if($p->status == 1)
                                                    <div class="badge badge-primary font-weight-bold text-uppercase">{{ __('common.paid') }}</div>
                                                @elseif($p->status == 3)
                                                    <div class="badge badge-warning font-weight-bold text-uppercase">{{ __('common.instalment') }}</div>
                                                @else
                                                    {{ $p->due_amount }} {{ $basic->currency }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($p->status == 1)
                                                    <div class="badge badge-primary font-weight-bold text-uppercase">{{ __('common.paid') }}</div>
                                                @elseif($p->status == 3)
                                                    <div class="badge badge-warning font-weight-bold text-uppercase">{{ __('common.instalment') }}</div>
                                                @else
                                                    <div class="badge badge-warning font-weight-bold text-uppercase">{{ __('common.due') }}</div>
                                                @endif
                                            </td>
                                            <td>
                                                @if($p->payment_type == 2)
                                                    <a href="{{ url('admin/instalment-repayment-list?custom=').$p->custom }}" class="btn btn-info btn-sm font-weight-bold text-uppercase" title="{{ __('common.instalment_list') }}"><i class="fa fa-list"></i>{{ __('common.instalment') }}</a>
                                                @endif
                                                <a href="{{ route('sell-invoice',$p->custom) }}" class="btn btn-primary btn-sm font-weight-bold text-uppercase" title="{{ __('common.view') }}"><i class="fa fa-eye"></i> {{ __('common.invoice') }} </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->



@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/js/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/datatable-basic.js') }}"></script>
@endsection
