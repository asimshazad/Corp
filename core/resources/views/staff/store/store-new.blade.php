@extends('layouts.staff')
@section('style')
    <link href="{{asset('assets/admin/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap-datetimepicker.css') }}">
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

                            {!! Form::open(['class'=>'form-horizontal','role'=>'form']) !!}

                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Store Date</strong></label>
                                                <div class="col-md-12">
                                                    <div class='input-group'>
                                                        <input type='text' name="store_date" class="form-control" id='datetimepicker1' value="{{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}" />
                                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Reference Number</strong></label>
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <input name="reference" class="form-control font-weight-bold" value="{{ old('reference') }}" placeholder="Reference Number" required/>
                                                        <span class="input-group-addon"><strong><i class="fa fa-tasks"></i></strong></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Product Band</strong></label>
                                                <div class="col-md-12">
                                                    <select name="company_id" id="company_id" class="form-control select2 font-weight-bold">
                                                        <option value="" class="font-weight-bold">Select One</option>
                                                        @foreach($company as $c)
                                                            <option value="{{ $c->id }}" class="font-weight-bold">{{ $c->name }}</option>
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
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Select Product</strong></label>
                                                <div class="col-md-12">
                                                    <select name="product_id" id="product_id" class="form-control select2 font-weight-bold">
                                                        <option value="" class="font-weight-bold">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Product Warranty</strong></label>
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <input class="form-control font-weight-bold input-lg" name="warranty" value="" placeholder="Product Warranty" type="number" required>
                                                        <span class="input-group-addon"><strong>Days</strong></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Company Price</strong></label>
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <input class="form-control font-weight-bold input-lg" name="buy_price" value="" placeholder="Company Price" type="text" required>
                                                        <span class="input-group-addon"><strong>{{ $basic->currency }}</strong></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Sell Price</strong></label>
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <input class="form-control font-weight-bold input-lg" name="sell_price" value="" placeholder="Sell Price" type="text" required>
                                                        <span class="input-group-addon"><strong>{{ $basic->currency }}</strong></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-12 mb-2 contact-repeater">
                                        <label><strong style="text-transform: uppercase;">Product Bar Codes</strong></label>
                                        <div data-repeater-list="codes">
                                            <div class="input-group mb-1" data-repeater-item>
                                                <input name="code" class="form-control font-weight-bold" value="" placeholder="Product Bar Code" required/>
                                                <span class="input-group-btn" id="button-addon2"><button class="btn btn-danger" type="button" data-repeater-delete><i class="ft-x"></i></button></span>
                                            </div>
                                        </div>
                                        <button type="button" data-repeater-create class="btn btn-primary font-weight-bold">
                                            <i class="fa fa-plus"></i> Add New Code
                                        </button>
                                    </div>


                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-block font-weight-bold btn-lg text-uppercase"><i class="fa fa-send"></i> Store Product</button>
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
@section('scripts')
    <script src="{{asset('assets/admin/js/select2.full.min.js')}}" type="text/javascript"></script>

    <script src="{{ asset('assets/admin/js/moment-with-locales.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/js/picker-date-time.js') }}" type="text/javascript"></script>

    <script src="{{ asset('assets/admin/js/jquery.repeater.min.js') }}" type="text/javascript"></script>
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
                $('#category_id').append('<option class="font-weight-bold" value="">Select One</option>');
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
                    $('#product_id').append('<option class="font-weight-bold" value="">Select One</option>');
                    $.each(data,function (index,subcatObj) {
                        $('#product_id').append('<option class="font-weight-bold" value="'+subcatObj.id+'">'+subcatObj.code+' - '+subcatObj.name+'</option>');
                    })
                }

            })
        });

    </script>



@endsection