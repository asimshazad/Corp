@extends('layouts.staff')
@section('style')
    <link href="{{asset('assets/admin/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>

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

                            {!! Form::model($product,['route'=>['staff-product-update',$product->id],'method'=>'put','class'=>'form-horizontal','role'=>'form']) !!}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Product Band</strong></label>
                                                <div class="col-md-12">
                                                    <select name="company_id" id="company_id" required class="form-control select2 font-weight-bold">
                                                        <option value="" class="font-weight-bold">Select One</option>
                                                        @foreach($company as $c)
                                                            @if($c->id == $product->company_id)
                                                                <option value="{{ $c->id }}" class="font-weight-bold" selected>{{ $c->name }}</option>
                                                            @else
                                                                <option value="{{ $c->id }}" class="font-weight-bold">{{ $c->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Product Category</strong></label>
                                                <div class="col-md-12">
                                                    <select name="category_id" id="category_id" class="form-control select2 font-weight-bold">
                                                        <option value="" class="font-weight-bold">Select One</option>
                                                        @foreach($category as $cat)
                                                            @if($cat->id == $product->category_id)
                                                                <option value="{{ $cat->id }}" class="font-weight-bold" selected>{{ $cat->name }}</option>
                                                            @else
                                                                <option value="{{ $cat->id }}" class="font-weight-bold">{{ $cat->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Product Name</strong></label>
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <input name="name" class="form-control bold" value="{{ $product->name }}" placeholder="Product Name" required/>
                                                        <span class="input-group-addon"><strong><i class="fa fa-file-text-o"></i></strong></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Product Short Code</strong></label>
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <input name="code" class="form-control bold" value="{{ $product->code }}" placeholder="Product Short Code" required/>
                                                        <span class="input-group-addon"><strong><i class="fa fa-code"></i></strong></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 mb-2 contact-repeater">
                                        <label><strong style="text-transform: uppercase;">Product Specification</strong></label>
                                        <div data-repeater-list="specification">
                                            @foreach($product->specifications as $sp)
                                            <div class="input-group mb-1" data-repeater-item>
                                                <input name="specification" class="form-control bold" value="{{ $sp->name }}" placeholder="Product Specification" required/>
                                                <span class="input-group-btn" id="button-addon2"><button class="btn btn-danger" type="button" data-repeater-delete><i class="ft-x"></i></button></span>
                                            </div>
                                            @endforeach
                                        </div>
                                        <button type="button" data-repeater-create class="btn btn-primary font-weight-bold">
                                            <i class="fa fa-plus"></i> Add New Specification
                                        </button>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> Update Product</button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->
@endsection
@section('vendors')
    <script src="{{ asset('assets/admin/js/jquery.repeater.min.js') }}" type="text/javascript"></script>
@endsection
@section('scripts')
    <script src="{{asset('assets/admin/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/js/form-repeater.js') }}" type="text/javascript"></script>
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
                $('#category_id').append('<option class="bold" value="">Select One</option>');
                $.each(data,function (index,subcatObj) {
                    $('#category_id').append('<option class="bold" value="'+subcatObj.id+'">'+subcatObj.name+'</option>');
                })
            })
        });
    </script>


@endsection