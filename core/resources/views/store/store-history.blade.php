@extends('layouts.dashboard')
@section('name')@lang('common.store')@endsection
@section('add_record')@lang('common.store')@endsection
@section('content')
    <div class="page-content pt-0">
        <div class="content-wrapper">
            <div class="content">
                <div class="card">

                    <table class="table datatable-basic table-bordered table-striped table-hover dataTable no-footer">
                        <thead>
                        <tr>
                        <tr>
                            <th>{{ __('store.id') }}</th>
                            <th>{{ __('store.date') }}</th>
                            <th>{{ __('store.reference') }}</th>
                            <th>{{ __('store.c_c') }}</th>
                            <th>{{ __('store.c_n') }}</th>
                            <th>{{ __('store.buy_rate') }}</th>
                            <th>{{ __('store.sell_rate') }}</th>
                            <th>{{ __('store.quantity') }}</th>
                            <th>{{ __('store.store_by') }}</th>
                            <th class="text-center">{{ __('store.action') }}</th>
                        </tr>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($history as $k => $p)

                            <tr>
                                <td>{{ ++$k }}</td>
                                <td>{{ \Carbon\Carbon::parse($p->created_at)->format('d-m-y h:i A') }}</td>
                                <td>{{ $p->reference }}</td>
                                <td>{{ $p->company->name }}<br>{{ $p->category->name }}</td>
                                <td><a href="{{ route('product-view',$p->product_id) }}" target="_blank">{{ $p->product->code }} - {{ substr($p->product->name,0,25)}}{{ strlen($p->product->name) > 25 ? '...' : '' }}</a></td>
                                <td>{{ $basic->symbol }}{{ $p->buy_price }}</td>
                                <td>{{ $basic->symbol }}{{ $p->sell_price }}</td>
                                <td>{{ $p->codes()->count() }} - {{ __('common.items') }}</td>
                                <td>
                                    @if($p->staff_id == 0)
                                        <div class="badge badge-success font-weight-bold text-uppercase">{{ __('common.admin') }}</div>
                                    @else
                                        <div class="badge badge-primary font-weight-bold text-uppercase">{{ __('common.staff') }}</div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a class="list-icons-item" href="{{ route('store-edit',$p->id) }}"   title="{{ __('common.edit') }}">
                                        <i class="icon-pencil7"></i>
                                    </a>

                                    <a class="list-icons-item" href="{{ route('store-view',$p->id) }}"   title="{{ __('common.view') }}">
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







    <section id="horizontal-form-layouts" style="display: none">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-basic">{{$page_title}}</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">

                                <a class="btn btn-primary font-weight-bold text-uppercase" href="{{ route('store-new') }}">
                                    <i class="fa fa-plus"></i>  {{ __('sidebar.add_new') }}
                                </a>

                                <a class="btn btn-success font-weight-bold text-uppercase" href="{{ route('current-store') }}">
                                    <i class="fa fa-plus"></i>  {{ __('sidebar.current_store') }}
                                </a>


                            </ul>
                        </div>
                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-striped  table-bordered table-hover zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>{{ __('store.id') }}</th>
                                        <th>{{ __('store.date') }}</th>
                                        <th>{{ __('store.reference') }}</th>
                                        <th>{{ __('store.c_c') }}</th>
                                        <th>{{ __('store.c_n') }}</th>
                                        <th>{{ __('store.buy_rate') }}</th>
                                        <th>{{ __('store.sell_rate') }}</th>
                                        <th>{{ __('store.quantity') }}</th>
                                        <th>{{ __('store.store_by') }}</th>
                                        <th>{{ __('store.action') }}</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($history as $k => $p)

                                        <tr>
                                            <td>{{ ++$k }}</td>
                                            <td>{{ \Carbon\Carbon::parse($p->created_at)->format('d-m-y h:i A') }}</td>
                                            <td>{{ $p->reference }}</td>
                                            <td>{{ $p->company->name }}<br>{{ $p->category->name }}</td>
                                            <td><a href="{{ route('product-view',$p->product_id) }}" target="_blank">{{ $p->product->code }} - {{ substr($p->product->name,0,25)}}{{ strlen($p->product->name) > 25 ? '...' : '' }}</a></td>
                                            <td>{{ $basic->symbol }}{{ $p->buy_price }}</td>
                                            <td>{{ $basic->symbol }}{{ $p->sell_price }}</td>
                                            <td>{{ $p->codes()->count() }} - {{ __('common.items') }}</td>
                                            <td>
                                                @if($p->staff_id == 0)
                                                    <div class="badge badge-success font-weight-bold text-uppercase">{{ __('common.admin') }}</div>
                                                @else
                                                    <div class="badge badge-primary font-weight-bold text-uppercase">{{ __('common.staff') }}</div>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('store-view',$p->id) }}" class="btn btn-primary btn-sm bold uppercase" title="{{ __('common.view') }}"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('store-edit',$p->id) }}" class="btn btn-warning btn-sm bold uppercase" title="{{ __('common.edit') }}"><i class="fa fa-edit"></i></a>
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
    </section>




@endsection
