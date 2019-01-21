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
                                <table class="table table-striped  table-bordered table-hover zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>ID#</th>
                                        <th>Stored Date</th>
                                        <th>Reference</th>
                                        <th>Company - Category</th>
                                        <th>Code - Name</th>
                                        <th>Sell Rate</th>
                                        <th>N. Product</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($history as $k => $p)

                                        <tr>
                                            <td>{{ ++$k }}</td>
                                            <td>{{ \Carbon\Carbon::parse($p->created_at)->format('dS M,y h:i A') }}</td>
                                            <td>{{ $p->reference }}</td>
                                            <td>{{ $p->company->name }} - {{ $p->category->name }}</td>
                                            <td><a href="{{ route('staff-product-view',$p->product_id) }}" target="_blank">{{ $p->product->code }} - {{ substr($p->product->name,0,25)}}{{ strlen($p->product->name) > 25 ? '...' : '' }}</a></td>
                                            <td>{{ $p->sell_price }} - {{ $basic->currency }}</td>
                                            <td>{{ $p->codes()->count() }} - Items</td>
                                            <td>
                                                <a href="{{ route('staff-store-view',$p->id) }}" class="btn btn-primary btn-sm bold uppercase" title="View"><i class="fa fa-eye"></i> View</a>
                                                {{--<a href="{{ route('staff-store-edit',$p->id) }}" class="btn btn-warning btn-sm bold uppercase" title="Edit"><i class="fa fa-edit"></i> Edit</a>--}}
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
