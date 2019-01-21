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
                        <h4 class="card-title" id="horz-layout-basic">Current Store</h4>
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
                            {!! Form::open(['route'=>'search-current-store','class'=>'form-horizontal','role'=>'form','method'=>'get']) !!}
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Product Band</strong></label>
                                            <div class="col-md-12">
                                                <select name="company_id" id="company_id" required class="form-control select2 font-weight-bold">
                                                    <option value="" class="font-weight-bold">Select One</option>
                                                    @foreach($company as $c)
                                                        <option value="{{ $c->id }}" class="font-weight-bold">{{ $c->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Product Category</strong></label>
                                            <div class="col-md-12">
                                                <select name="category_id" id="category_id" class="form-control select2 font-weight-bold">
                                                    <option value="0" class="font-weight-bold">All Category</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Select Product</strong></label>
                                            <div class="col-md-12">
                                                <select name="product_id" id="product_id" class="form-control select2 font-weight-bold">
                                                    <option value="0" class="font-weight-bold">All Product</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block font-weight-bold btn-lg text-uppercase"><i class="fa fa-search"></i> Check Store</button>
                            </div>
                        </div>
                        {!! Form::close() !!}

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


                            <table class="table table-striped table-bordered table-hover zero-configuration">
                                <thead>
                                <tr>
                                    <th>SL#</th>
                                    <th>Company - Category</th>
                                    <th>Code - Name</th>
                                    <th>In Stock</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($product as $k => $p)

                                    <tr>
                                        <td>{{ ++$k }}</td>
                                        <td>{{ $p->company->name }} - {{ $p->category->name }}</td>
                                        <td>{{ $p->product->code }} - {{ substr($p->product->name,0,25)}}{{ strlen($p->product->name) > 25 ? '...' : '' }}</td>
                                        <td>{{ $p->store->codes()->whereStatus(0)->count() }} - Items</td>
                                        <td>
                                            <a href="{{ route('store-view',$p->id) }}" class="btn btn-primary btn-sm bold text-uppercase font-weight-bold" title="View"><i class="fa fa-eye"></i> View Store</a>
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
    <script src="{{ asset('assets/admin/js/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/datatable-basic.js') }}"></script>
@endsection
