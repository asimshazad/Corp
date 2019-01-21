@extends('layouts.dashboard')
@section('name')@lang('common.transaction_log')@endsection
@section('content')

    <div class="page-content pt-0">
        <div class="content-wrapper">
            <div class="content">
                <div class="card">

                    <table class="table datatable-basic table-bordered table-striped table-hover dataTable no-footer">
                        <thead>
                        <tr>
                            <th>{{ __('transaction_log.sl') }}</th>
                            <th>{{ __('transaction_log.transaction_date') }}</th>
                            <th>{{ __('transaction_log.transaction_number') }}</th>
                            <th>{{ __('transaction_log.transaction_type') }}</th>
                            <th>{{ __('transaction_log.tran_amount') }}</th>
                            <th>{{ __('transaction_log.post_amount') }}</th>
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
                                        <span class="badge badge-info">{{ __('transaction_log.company_payment') }}</span>

                                    @elseif($p->type == 2)
                                        <span class="badge badge-warning">{{ __('transaction_log.re_company_payment') }}</span>

                                    @elseif($p->type == 3)
                                        <span class="badge badge-success">{{ __('transaction_log.deposit_amount') }}</span>
                                    @elseif($p->type == 4)
                                        <span class="badge badge-secondary">{{ __('transaction_log.re_deposit_amount') }}</span>

                                    @elseif($p->type == 5)
                                        <span class="badge badge-info">{{ __('transaction_log.withdraw_amount') }}</span>
                                    @elseif($p->type == 6)
                                        <span class="badge badge-info">{{ __('transaction_log.re_withdraw_amount') }}</span>
                                    @elseif($p->type == 7)
                                        <span class="badge badge-danger">{{ __('transaction_log.expense_amount') }}</span>
                                    @elseif($p->type == 8)
                                        <span class="badge badge-warning">{{ __('transaction_log.re_expense_amount') }}</span>
                                    @elseif($p->type == 9)
                                        <span class="badge badge-success">{{ __('transaction_log.sell_product_price') }}</span>
                                    @elseif($p->type == 10)
                                        <span class="badge badge-warning">{{ __('transaction_log.re_sell_product_price') }}</span>
                                    @elseif($p->type == 11)
                                        <span class="badge badge-primary">{{ __('transaction_log.due_payment') }}</span>
                                    @elseif($p->type == 12)
                                        <span class="badge badge-secondary">{{ __('transaction_log.re_due_payment') }}</span>
                                    @elseif($p->type == 13)
                                        <span class="badge badge-primary">{{ __('transaction_log.instalment_repayment') }}</span>
                                    @elseif($p->type == 14)
                                        <span class="badge badge-warning">{{ __('transaction_log.re_instalment_repayment') }}</span>
                                    @endif
                                </td>
                                <td>
                                    ({{ $p->status == 1 ? '-' : '+' }}) {{ $p->balance }} {{ $basic->currency }}
                                </td>
                                <td style="width: 10%">
                                    {{ $p->post_balance }} {{ $basic->currency }}
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection