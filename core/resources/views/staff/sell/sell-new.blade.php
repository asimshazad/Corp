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

                            <form class="form-horizontal" method="post" role="form" >
                                {!! csrf_field() !!}

                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Customer Type</strong></label>
                                        <div class="col-md-12">
                                            <select name="customer_type" id="customer_type" class="form-control select2 font-weight-bold">
                                                <option value="1" class="font-weight-bold">Exist Customer</option>
                                                <option value="0" class="font-weight-bold">New Customer</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div id="old_customer" style="display: block;">
                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Select Customer</strong></label>
                                            <div class="col-md-12">
                                                <select name="customer_id" id="customer_id" class="form-control select24 font-weight-bold">
                                                    <option class="font-weight-bold">Select Customer</option>
                                                    @foreach($customer as $cus)
                                                        <option value="{{ $cus->id }}" class="font-weight-bold">{{ $cus->phone }} - {{ $cus->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="new_customer" style="display: none">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Customer Name</strong></label>
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                            <input name="name" class="form-control bold" value="{{ old('name') }}" placeholder="Customer Name" />
                                                            <span class="input-group-addon"><strong><i class="fa fa-file-text-o"></i></strong></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Customer Email</strong></label>
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                            <input name="email" type="email" class="form-control bold" value="{{ old('email') }}" placeholder="Customer Email (optional)"/>
                                                            <span class="input-group-addon"><strong><i class="fa fa-envelope"></i></strong></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Customer Phone</strong></label>
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                            <input name="phone" class="form-control bold" value="{{ old('phone') }}" placeholder="Customer Phone" />
                                                            <span class="input-group-addon"><strong><i class="fa fa-phone"></i></strong></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Alternative Phone</strong></label>
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                            <input name="phone2" class="form-control bold" value="{{ old('phone2') }}" placeholder="Alternative Phone (optional)"/>
                                                            <span class="input-group-addon"><strong><i class="fa fa-phone"></i></strong></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Customer Address </strong></label>
                                            <div class="col-md-12">
                                                <textarea name="address" id="" cols="30" rows="3" class="form-control input-lg" placeholder="Customer Address" >{{ old('address') }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="repeater-default">
                                        <div class="row form-section1 pl-1 pr-1">
                                            <div class="col-md-6">
                                                <h4 class="">Sell Product Information</h4>
                                            </div>
                                            <div class="col-md-6 text-right pr-1">
                                                <div class="form-group">
                                                    {{--<button data-repeater-create class="btn btn-primary btn-sm"><i class="ft-plus" style="font-size: 12px;"></i>Add More Item</button>--}}
                                                    <button id="addItem" class="btn btn-primary btn-sm"><i class="ft-plus" style="font-size: 12px;"></i>Add More Item</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div {{--data-repeater-list="car"--}}>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Product Bar Code</strong></label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Product Name</strong></label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Product Warranty</strong></label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Price</strong></label>
                                                </div>
                                                <div class="col-md-1 text-center">
                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Action</strong></label>
                                                </div>
                                            </div>


                                            <div class="row sellItem" id="itemBox">
                                                <input type="hidden" name="product_id[]" class="product_id" id="product_id">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <input name="code[]" class="form-control bold code" id="code" value="" placeholder="Product Bar Code" required/>
                                                                <span class="input-group-addon"><strong><i class="fa fa-code"></i></strong></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <input name="product[]" class="form-control bold name" value="" placeholder="Product Name" readonly required/>
                                                                <span class="input-group-addon"><strong><i class="fa fa-file-text-o"></i></strong></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <input name="warranty[]" class="form-control bold warranty" value="" placeholder="Product Warranty" readonly required/>
                                                                <span class="input-group-addon"><strong>Days</strong></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group col-md-12">
                                                        <div class="input-group">
                                                            <input name="price[]" class="form-control bold price" value="" placeholder="Product Price" readonly required/>
                                                            <span class="input-group-addon"><strong>{{ $basic->currency }}</strong></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group col-md-12 text-center">
                                                        <button type="button" class="btn btn-danger removeItem" id="removeItem" {{--data-repeater-delete--}}> <i class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Product Price</strong></label>
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <input name="product_price" id="product_price" class="form-control bold" value="" readonly placeholder="Product Price" required/>
                                                        <span class="input-group-addon"><strong>{{ $basic->currency }}</strong></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Discount Type</strong></label>
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <select name="discount_type" id="discount_type" class="form-control font-weight-bold text-uppercase">
                                                            <option value="0" class="font-weight-bold text-uppercase">No Discount</option>
                                                            <option value="1" class="font-weight-bold text-uppercase">Percentage</option>
                                                            <option value="2" class="font-weight-bold text-uppercase">Amount</option>
                                                        </select>
                                                        <span class="input-group-addon"><strong><i class="fa fa-random"></i></strong></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Discount</strong></label>
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <input name="discount" id="discount" class="form-control bold" disabled value="" placeholder="Discount" />
                                                        <span class="input-group-addon" id="discount-type-id"><strong><i class="fa fa-close"></i></strong></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Subtotal Price</strong></label>
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <input name="product_total" id="subtotal" class="form-control bold" value="" placeholder="Subtotal Price" readonly required/>
                                                        <span class="input-group-addon"><strong>{{ $basic->currency }}</strong></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Payment Type</strong></label>
                                        <div class="col-md-12">
                                            <select name="payment_type" id="payment_type" class="form-control select2 font-weight-bold" required>
                                                <option value="" class="font-weight-bold">Select Payment Type</option>
                                                <option value="0" class="font-weight-bold">On Paid</option>
                                                <option value="1" class="font-weight-bold">Due Paid</option>
                                                <option value="2" class="font-weight-bold">Instalment Paid</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div id="on_paid" style="display: none">
                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Total Price</strong></label>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input name="on_total_price" class="form-control bold total_price" value="" placeholder="Total Price" />
                                                    <span class="input-group-addon"><strong>{{ $basic->currency }}</strong></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="due_paid" style="display: none">

                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Total Price</strong></label>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input name="due_total_price" class="form-control bold total_price" value="" placeholder="total Price" />
                                                    <span class="input-group-addon"><strong>{{ $basic->currency }}</strong></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Pay Amount</strong></label>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input name="due_pay_amount" id="due_pay_amount" class="form-control bold pay_amount" value="" placeholder="Pay Amount" />
                                                    <span class="input-group-addon"><strong>{{ $basic->currency }}</strong></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Due Amount</strong></label>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input name="due_due_amount" id="due_due_amount" class="form-control bold due_amount" value="" placeholder="Due Amount" readonly />
                                                    <span class="input-group-addon"><strong>{{ $basic->currency }}</strong></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Payment Date</strong></label>
                                            <div class="col-md-12">
                                                <div class='input-group'>
                                                    <input type='text' name="due_payment_date" class="form-control font-weight-bold" id='datetimepicker2' value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" />
                                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div id="instalment_paid" style="display: none">
                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Subtotal Price</strong></label>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input name="subtotal" class="form-control bold total_price" id="instalment_price" value="" placeholder="Subtotal Price" readonly />
                                                    <span class="input-group-addon"><strong>{{ $basic->currency }}</strong></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Instalment Type</strong></label>
                                            <div class="col-md-12">
                                                <select name="instalment_id" id="instalment_id" class="form-control 6select2 font-weight-bold">
                                                    <option value="" class="font-weight-bold">Select One</option>
                                                    @foreach($instalment as $in)
                                                        <option value="{{ $in->id }}" class="font-weight-bold">{{ $in->name }} - {{ $in->charge }}% - {{ $in->time }} time instalment</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Total Amount</strong></label>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input name="ins_total_amount" class="form-control bold total_price" id="instalment_total" value="" placeholder="Total Amount" />
                                                    <span class="input-group-addon"><strong>{{ $basic->currency }}</strong></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Pay Amount</strong></label>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input name="ins_pay_amount" id="instalment_pay" class="form-control bold pay_amount" value="" placeholder="Pay Amount" />
                                                    <span class="input-group-addon"><strong>{{ $basic->currency }}</strong></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Due Amount</strong></label>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input name="ins_due_amount" id="instalment_due" class="form-control bold due_amount" value="" placeholder="Due Price" readonly />
                                                    <span class="input-group-addon"><strong>{{ $basic->currency }}</strong></span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Customer NID Number</strong></label>
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                            <input name="customer_nid" class="form-control bold" value="" placeholder="Customer NID Number" />
                                                            <span class="input-group-addon"><strong><i class="fa fa-file-text-o"></i></strong></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Customer Father Name</strong></label>
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                            <input name="customer_father" class="form-control bold" value="" placeholder="Customer Father Name"  />
                                                            <span class="input-group-addon"><strong><i class="fa fa-file-text-o"></i></strong></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr style="margin-top: 0;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Grander One Name</strong></label>
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                            <input name="grander_one_name" class="form-control bold" value="" placeholder="Grander One Name" />
                                                            <span class="input-group-addon"><strong><i class="fa fa-file-text-o"></i></strong></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Grander Two Name</strong></label>
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                            <input name="grander_two_name" class="form-control bold" value="" placeholder="Grander Two Name"  />
                                                            <span class="input-group-addon"><strong><i class="fa fa-file-text-o"></i></strong></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Grander One Father Name</strong></label>
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                            <input name="grander_one_father" class="form-control bold" value="" placeholder="Grander One Father Name" />
                                                            <span class="input-group-addon"><strong><i class="fa fa-file-text-o"></i></strong></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Grander Two Father Name</strong></label>
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                            <input name="grander_two_father" class="form-control bold" value="" placeholder="Grander Two Father Name"  />
                                                            <span class="input-group-addon"><strong><i class="fa fa-file-text-o"></i></strong></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Grander One Phone Number</strong></label>
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                            <input name="grander_one_phone" class="form-control bold" value="" placeholder="Grander One Phone Number" />
                                                            <span class="input-group-addon"><strong><i class="fa fa-file-text-o"></i></strong></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Grander Two Phone Number</strong></label>
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                            <input name="grander_two_phone" class="form-control bold" value="" placeholder="Grander Two Phone Number"  />
                                                            <span class="input-group-addon"><strong><i class="fa fa-file-text-o"></i></strong></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Grander One Address</strong></label>
                                                    <div class="col-md-12">
                                                        <textarea name="grander_one_address" id="" cols="30" rows="2" placeholder="Grander One Address" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Grander Two Address</strong></label>
                                                    <div class="col-md-12">
                                                        <textarea name="grander_two_address" id="" cols="30" rows="2" placeholder="Grander Two Address" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-block btn-lg text-uppercase"><i class="fa fa-send"></i> Sell Product</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->
@endsection
@section('vendors')
@endsection
@section('scripts')
    <script src="{{asset('assets/admin/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/js/jquery.repeater.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/js/form-repeater.js') }}" type="text/javascript"></script>

    <script src="{{ asset('assets/admin/js/moment-with-locales.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/js/picker-date-time.js') }}" type="text/javascript"></script>

    <script>
        $(function () {
            $('.select2,.select24').select2();
        });
        $('#customer_type').on('change',function (e) {
            var customer_type = e.target.value;
            if(customer_type == 0){
                document.getElementById("new_customer").style.display = 'block';
                document.getElementById("old_customer").style.display = 'none';
            }else{
                document.getElementById("new_customer").style.display = 'none';
                document.getElementById("old_customer").style.display = 'block';
            }
        });
        $('#payment_type').on('change',function (e) {
            var payment_type = e.target.value;
            if(payment_type == 0){
                document.getElementById("on_paid").style.display = 'block';
                document.getElementById("due_paid").style.display = 'none';
                document.getElementById("instalment_paid").style.display = 'none';
            }else if (payment_type == 1){
                document.getElementById("on_paid").style.display = 'none';
                document.getElementById("due_paid").style.display = 'block';
                document.getElementById("instalment_paid").style.display = 'none';
            }else {
                document.getElementById("on_paid").style.display = 'none';
                document.getElementById("due_paid").style.display = 'none';
                document.getElementById("instalment_paid").style.display = 'block';
            }
        });

        $("#addItem").click(function(){
            $("#itemBox:last").clone(true).insertAfter("div.sellItem:last").fadeIn(50);
            $("div.sellItem:last input").val('');
            $("div.sellItem:last input").val('');
            $("div.sellItem:last input").val('');
            $("div.sellItem:last input").val('');
            $("div.sellItem .removeItem").prop('disabled', false);
            return false;
        });

        $(document).on("click" , "#removeItem" , function()  {

            var itemRowQty = $('.sellItem').length;

            if (itemRowQty == 1){
                $("div.sellItem .removeItem").prop('disabled', true);
                return false;
            }else{
                if (confirm('Are you sure you want to remove this item?')) {
                    var price = $(this).closest('.sellItem').find('.price').val();
                    var productPrice = $('#product_price').val();
                    var discount = $('#discount').val();
                    var mPrice = productPrice - price;
                    if (discount == ''){
                        $('#subtotal').val(mPrice);
                        $('.total_price').val(mPrice);
                    }else if (discount == 0){
                        $('#subtotal').val(mPrice);
                        $('.total_price').val(mPrice);
                    }else {
                        var ll = mPrice - ((mPrice * discount) / 100);
                        $('#subtotal').val(ll);
                        $('.total_price').val(ll);
                    }
                    $('#product_price').val(productPrice - price);
                    $(this).closest('.sellItem').remove().fadeOut(50);
                }
                if(itemRowQty==1){
                    $("div.sellItem .removeItem").prop('disabled', true);
                    return false
                }else{
                    $("div.sellItem .removeItem").prop('disabled', false);
                }
                return false;
            }
            return false;
        });


        $('.sellItem').delegate('.code','blur',function(e) {

            var itemDiv = $(this).parent().parent().parent().parent().parent();
            var code = $(this).closest('.sellItem').find('.code').val();

            var url = '{{ url('/') }}';
            $.get(url + '/check-product-code?code=' + code,function (data) {
                var result = $.parseJSON(data);
                if (result['errorStatus'] == "yes"){
                    toastr.error(result['errorDetails']);
                }else{
                    toastr.info(result['errorDetails']);
                    itemDiv.find('.name').val(result.name);
                    itemDiv.find('.warranty').val(result.warranty);
                    itemDiv.find('.price').val(result.price);
                    itemDiv.find('.product_id').val(result.product_id);
                    $('#product_price').val(productPrice());
                    $('#subtotal').val(subTotal());
                    $('.total_price').val(subTotal());
                }
            })

        });

        $('#instalment_id').on('change',function (e) {
            var instalment_id = e.target.value;
            var total = $('#instalment_price').val();
            //alert(total);
            var url = '{{ url('/') }}';
            $.get(url + '/admin/check-instalment-percent/'+instalment_id+'/'+total,function (data) {
                var result = $.parseJSON(data);
                if (result['errorStatus'] == "yes"){
                    toastr.error(result['errorDetails']);
                }else{
                    toastr.info(result['errorDetails']);
                    $('#instalment_total').val(result.total);
                    var pay = $('#instalment_pay').val();
                    $('#instalment_due').val(result.total - pay);
                }
            })

        });

        $('.pay_amount').on('input',function (e) {
            var pay_amount = e.target.value;
            var total = $('.total_price').val();
            var total2 = $('#instalment_total').val();
            var due = total - pay_amount;
            $('.due_amount').val(due);
            $('#instalment_due').val(total2 - pay_amount);
        });

        $('.total_price,#instalment_total').on('input',function (e) {
            var total = e.target.value;
            var total2 = $('#instalment_total').val();
            var pay = $('.pay_amount').val();
            var pay2 = $('#instalment_pay').val();
            var due = total - pay;
            $('.due_amount').val(due);
            $('#instalment_due').val(total2 - pay2);
        });

        $('#discount_type').on('change',function (e) {

            var type = e.target.value;

            if (type == 0){
                $('#discount').val('');
                $( "#discount" ).prop( "disabled", true );
                document.getElementById('discount-type-id').innerHTML = '<strong><i class="fa fa-close"></i></strong>';
                var productPrice = parseInt($('#product_price').val());

                $('#subtotal').val(productPrice);
                $('.total_price').val(productPrice);

                $('#on_total_price').val(productPrice);
                $('#due_pay_amount').val('');
                $('#due_due_amount').val('');
                $('#instalment_id').val('');
                $('#instalment_total').val('');
                $('#instalment_pay').val('');
                $('#instalment_due').val('');


            }else if(type == 1){
                $('#discount').val('');
                $( "#discount" ).prop( "disabled", false );
                document.getElementById('discount-type-id').innerHTML = '<strong><i class="fa fa-percent"></i></strong>';

                var productPrice2 = parseInt($('#product_price').val());

                $('#subtotal').val(productPrice2);
                $('.total_price').val(productPrice2);

                $('#on_total_price').val(productPrice2);
                $('#due_pay_amount').val('');
                $('#due_due_amount').val('');
                $('#instalment_id').val('');
                $('#instalment_total').val('');
                $('#instalment_pay').val('');
                $('#instalment_due').val('');

                $('#discount').on('input',function (e) {
                    var productPrice = parseInt($('#product_price').val());

                    $('#on_total_price').val(productPrice);
                    $('#due_pay_amount').val('');
                    $('#due_due_amount').val('');
                    $('#instalment_id').val('');
                    $('#instalment_total').val('');
                    $('#instalment_pay').val('');
                    $('#instalment_due').val('');


                    var discount = $('#discount').val();
                    if (discount == '' ){
                        $('#subtotal').val(productPrice);
                        $('.total_price').val(productPrice);
                    }else if (discount == 0){
                        $('#subtotal').val(productPrice);
                        $('.total_price').val(productPrice);
                    }else {
                        var subtotal = productPrice - (productPrice * discount) / 100;
                        $('#subtotal').val(subtotal);
                        $('.total_price').val(subtotal);
                    }
                });

            }else{
                $('#discount').val('');
                $( "#discount" ).prop( "disabled", false );
                document.getElementById('discount-type-id').innerHTML = '<strong>{{ $basic->currency }}</strong>';

                var productPrice2 = parseInt($('#product_price').val());


                $('#subtotal').val(productPrice2);
                $('.total_price').val(productPrice2);

                $('#on_total_price').val(productPrice2);
                $('#due_pay_amount').val('');
                $('#due_due_amount').val('');
                $('#instalment_id').val('');
                $('#instalment_total').val('');
                $('#instalment_pay').val('');
                $('#instalment_due').val('');

                $('#discount').on('input',function (e) {
                    var productPrice = parseInt($('#product_price').val());

                    $('#on_total_price').val(productPrice);
                    $('#due_pay_amount').val('');
                    $('#due_due_amount').val('');
                    $('#instalment_id').val('');
                    $('#instalment_total').val('');
                    $('#instalment_pay').val('');
                    $('#instalment_due').val('');

                    var discount = $('#discount').val();
                    if (discount == '' ){
                        $('#subtotal').val(productPrice);
                        $('.total_price').val(productPrice);
                    }else if (discount == 0){
                        $('#subtotal').val(productPrice);
                        $('.total_price').val(productPrice);
                    }else {
                        var subtotal = productPrice - discount;
                        $('#subtotal').val(subtotal);
                        $('.total_price').val(subtotal);
                    }
                });
            }

        });


        function productPrice(tPrice)
        {
            var tPrice = 0;
            $('.price').each(function(i,e){
                var price = $(this).val()-0;
                tPrice += price;
            });
            return tPrice;
        }

        function subTotal() {
            var productPrice = parseInt($('#product_price').val());
            var discount = $('#discount').val();
            if (discount == '' ){
                return productPrice;
            }else if (discount == 0){
                return productPrice;
            }else {
                var type = $('#discount_type').val();
                if (type == 0){
                    return productPrice;
                }else if(type == 1){
                    var subtotal = productPrice - (productPrice * discount) / 100;
                    return subtotal;
                }else{
                    var subtotal = productPrice -  discount;
                    return subtotal;
                }
            }
        }
    </script>
@endsection