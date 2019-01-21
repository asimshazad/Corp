@extends('layouts.staff')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/datatables.min.css') }}">
@endsection
@section('content')


    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-basic">Product Details</h4>
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
                                    <td class="text-right" width="50%">Title</td>
                                    <td width="50%">Details</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-right">Created At</td>
                                    <td>{{ \Carbon\Carbon::parse($product->created_at)->format('Y-m-d h:i A') }} - {{ \Carbon\Carbon::parse($product->created_at)->diffForHumans() }}</td>
                                </tr>
                                <tr>
                                    <td class="text-right">Company - Category</td>
                                    <td>{{ $product->company->name }} - {{ $product->category->name }}</td>
                                </tr>
                                <tr>
                                    <td class="text-right">Product Code - Name</td>
                                    <td><a href="{{ route('staff-product-view',$product->id) }}" target="_blank">{{ $product->code }} - {{ $product->name }}</a></td>
                                </tr>
                                <tr>
                                    <td class="text-right">In Stock</td>
                                    <td>{{ $product->codes()->whereStatus(0)->count() }} - Items</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
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
                                        <th>SL#</th>
                                        <th>Store Date</th>
                                        <th>Reference</th>
                                        <th>Warranty</th>
                                        <th>Sell Price</th>
                                        <th>Code</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($productCode as $k => $p)

                                        <tr class="{{ $p->status == 1 ? 'bg-warning white' : '' }}">
                                            <td>{{ ++$k }}</td>
                                            <td>{{ \Carbon\Carbon::parse($p->store->created_at)->format('Y-m-d h:i A') }}</td>
                                            <td>{{ $p->store->reference }}</td>
                                            <td>{{ $p->store->warranty }} - Days</td>
                                            <td>{{ $p->store->sell_price }} - {{ $basic->currency }}</td>
                                            <td>{{ $p->code }}</td>
                                            <td>
                                                @if($p->status == 1)
                                                    <div class="badge badge-danger font-weight-bold text-uppercase">Sell Out</div>
                                                @else
                                                    <div class="badge badge-success font-weight-bold text-uppercase">In Stock</div>
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
        </div>
    </section><!---ROW-->

@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/js/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/datatable-basic.js') }}"></script>
@endsection
