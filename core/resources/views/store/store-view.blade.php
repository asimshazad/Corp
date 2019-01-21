@extends('layouts.dashboard')
@section('style')
@endsection
@section('content')
    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-basic">  </h4>
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

                            <table class="table table-bordered font-weight-bold">
                                <thead>
                                <tr>
                                    <td>{{ __('store.title') }} </td>
                                    <td>{{ __('store.details') }}</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ __('store.store_at') }} </td>
                                    <td>{{ \Carbon\Carbon::parse($store->created_at)->format('Y-m-d h:i A') }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('store.reference') }}  </td>
                                    <td>{{ $store->reference }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('store.c_c') }} </td>
                                    <td>{{ $store->company->name }} - {{ $store->category->name }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('store.c_n') }}</td>
                                    <td><a href="{{ route('product-view',$store->product_id) }}" target="_blank">{{ $store->product->code }} - {{ $store->product->name }}</a></td>
                                </tr>
                                <tr>
                                    <td>{{ __('store.sell_price') }} </td>
                                    <td>{{ $store->sell_price }} - {{ $basic->currency }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('store.c_p') }}</td>
                                    <td>{{ $store->buy_price }} - {{ $basic->currency }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('store.n_products') }}  </td>
                                    <td>{{ $store->codes()->count() }} - {{ __('common.items') }} </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-basic">{{ __('store.p_codes') }} </h4>
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

                            <table class="table table-bordered font-weight-bold">

                                <thead>
                                <tr>
                                    <td>{{ __('store.sl') }}</td>
                                    <td>{{ __('store.code') }}</td>
                                    <td>{{ __('common.status') }}</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($store->codes as $key => $sp)
                                    <tr class="{{ $sp->status == 1 ? 'bg-warning white' : '' }}">
                                        <td width="5%">{{ ++$key }}</td>
                                        <td><i class="fa fa-barcode"></i>  {{ $sp->code }}</td>
                                        <td>
                                            @if($sp->status == 1)
                                                <div class="badge badge-danger font-weight-bold text-uppercase">{{ __('store.sell_out') }}</div>
                                            @else
                                                <div class="badge badge-success font-weight-bold text-uppercase">{{ __('store.in_stock') }}</div>
                                            @endif
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
    </section><!---ROW-->
@endsection
@section('scripts')

@endsection