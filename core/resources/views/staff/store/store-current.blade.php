@extends('layouts.staff')
@section('style')
    <link href="{{asset('assets/admin/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
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
                            {!! Form::open(['route'=>'staff-search-current-store','class'=>'form-horizontal','role'=>'form','method'=>'get']) !!}
                            <div class="form-body">

                                @if($top == 0)

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
                                @else
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Product Band</strong></label>
                                                <div class="col-md-12">
                                                    <select name="company_id" id="company_id" required class="form-control select2 font-weight-bold">
                                                        <option value="" class="font-weight-bold">Select One</option>
                                                        @foreach($company as $c)
                                                            @if($c->id == $company_id)
                                                            <option value="{{ $c->id }}" selected class="font-weight-bold">{{ $c->name }}</option>
                                                            @else
                                                            <option value="{{ $c->id }}" class="font-weight-bold">{{ $c->name }}</option>
                                                            @endif
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
                                                        @if($category_id == 0)
                                                            <option value="0" class="font-weight-bold">All Category</option>
                                                            @foreach($category as $c)
                                                                <option value="{{ $c->id }}" class="font-weight-bold">{{ $c->name }}</option>
                                                            @endforeach
                                                        @else
                                                            <option value="0" class="font-weight-bold">All Category</option>
                                                            @foreach($category as $c)
                                                                @if($c->id == $category_id)
                                                                    <option value="{{ $c->id }}" selected class="font-weight-bold">{{ $c->name }}</option>
                                                                @else
                                                                    <option value="{{ $c->id }}" class="font-weight-bold">{{ $c->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Select Product</strong></label>
                                                <div class="col-md-12">
                                                    <select name="product_id" id="product_id" class="form-control select2 font-weight-bold">
                                                        @if($product_id == 0)
                                                            <option value="0" class="font-weight-bold">All Product</option>
                                                            @foreach($products as $c)
                                                                <option value="{{ $c->id }}" class="font-weight-bold">{{ $c->name }}</option>
                                                            @endforeach
                                                        @else
                                                            <option value="0" class="font-weight-bold">All Product</option>
                                                            @foreach($products as $c)
                                                                @if($c->id == $product_id)
                                                                    <option value="{{ $c->id }}" selected class="font-weight-bold">{{ $c->name }}</option>
                                                                @else
                                                                    <option value="{{ $c->id }}" class="font-weight-bold">{{ $c->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block font-weight-bold btn-lg text-uppercase"><i class="fa fa-search"></i> Check Store</button>
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

        </div>
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
                                            <td><a href="{{ route('staff-product-view',$p->product_id) }}" target="_blank">{{ $p->product->code }} - {{ substr($p->product->name,0,30)}}{{ strlen($p->product->name) > 30 ? '...' : '' }}</a></td>
                                            <td>{{ $p->product->codes()->whereStatus(0)->count() }} - Items</td>
                                            <td>
                                                <a href="{{ route('staff-store-search-view',$p->product_id) }}" class="btn btn-primary btn-sm text-uppercase font-weight-bold" title="View"><i class="fa fa-eye"></i> View Store</a>
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
    <script src="{{asset('assets/admin/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/js/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/datatable-basic.js') }}"></script>
    <script>
        $(function () {
            $('.select2').select2();
        });
        $('#company_id').on('change',function (e) {
            var company_id = e.target.value;
            var url = '{{ url('/') }}';
            $.get(url + '/get-company-category?company_id=' + company_id,function (data) {
                if(data == ''){
                    document.getElementById("category_id").disabled = true;
                }else {
                    document.getElementById("category_id").disabled = false;
                }
                $('#category_id').empty();
                $('#category_id').append('<option class="font-weight-bold" value="0">All Category</option>');
                $.each(data,function (index,subcatObj) {
                    $('#category_id').append('<option class="font-weight-bold" value="'+subcatObj.id+'">'+subcatObj.name+'</option>');
                })
            })
        });

        $('#category_id').on('change',function (e) {
            var category_id = e.target.value;
            var url = '{{ url('/') }}';
            $.get(url + '/get-category-product?category_id=' + category_id,function (data) {
                if(data == ''){
                    document.getElementById("product_id").disabled = true;
                }else {
                    document.getElementById("product_id").disabled = false;
                    $('#product_id').empty();
                    $('#product_id').append('<option class="font-weight-bold" value="0">All Product</option>');
                    $.each(data,function (index,subcatObj) {
                        $('#product_id').append('<option class="font-weight-bold" value="'+subcatObj.id+'">'+subcatObj.code+' - '+subcatObj.name+'</option>');
                    })
                }

            })
        });

    </script>

@endsection