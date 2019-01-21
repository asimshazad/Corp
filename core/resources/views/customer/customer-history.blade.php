@extends('layouts.dashboard')
@section('name')@lang('common.customer')@endsection
@section('add_new_customer')@lang('common.customer')@endsection
@section('content')

    <div class="page-content pt-0">
        <div class="content-wrapper">
            <div class="content">
                <div class="card">

                    <table class="table datatable-basic table-bordered table-striped table-hover dataTable no-footer">
                        <thead>
                        <tr>
                            <th>{{ __('customer.id') }}</th>
                            <th>{{ __('customer.customer_name') }}</th>
                            <th>{{ __('customer.customer_phone') }}</th>
                            <th>{{ __('customer.account_no') }}</th>
                            <th>{{ __('customer.job') }}</th>
                            <th>{{ __('customer.cast') }}</th>
                            <th>{{ __('customer.customer_address') }}</th>
                            <th>{{ __('customer.created_date') }}</th>
                            <th class="text-center">{{ __('customer.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($customer as $k => $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->phone }} <br> {{ $p->phone2 }}</td>
                                <td>{{ $p->account_no }}</td>
                                <td>{{ $p->job }}</td>
                                <td>{{ $p->cast }}</td>
                                <td>
                                    {{ str_limit($p->address,50) }}
                                </td>
                                <td>{{ \Carbon\Carbon::parse($p->created_at)->format('dS M,y') }}</td>
                                <td class="text-center">

                                    <a href="{{ route('customer-view',$p->id) }}" id="{{$p->id}}"  class="list-icons-item"  title="{{ __('common.view') }}" data-container="body">
                                        <i class="icon-pencil7"></i>
                                    </a>

                                    <a href="{{ route('customer-edit',$p->id) }}" id="{{$p->id}}"  class="list-icons-item"  title="{{ __('common.edit') }}" data-container="body">
                                        <i class="icon-pencil7"></i>
                                    </a>

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
