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


                                <div class="form-group">
                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Select Customer</strong></label>
                                    <div class="col-md-12">
                                        <select name="customer_id" id="customer_id" class="form-control select2 font-weight-bold">
                                            <option value="" class="font-weight-bold">Select One</option>
                                            @foreach($customer as $c)
                                                <option value="{{ $c->id }}" class="font-weight-bold">{{ $c->phone }} - {{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Customer Invoice</strong></label>
                                    <div class="col-md-12">
                                        <table id="repayment_table" class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>Invoice Number</th>
                                                <th>Total Amount</th>
                                                <th>Pay Amount</th>
                                                <th>Due Amount</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" >
                <div class="modal-header bg-gradient-radial-primary white">
                    <h4 class="modal-title" id="myModalLabel2"><i class="fa fa-credit-card"></i> Repayment Due</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="frmProducts" action="{{ route('staff-submit-due-repayment') }}" method="post" name="frmProducts" class="form-horizontal">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="col-md-12"><strong style="text-transform: uppercase;">Payment Date</strong></label>
                            <div class="col-md-12">
                                <div class='input-group'>
                                    <input type='text' name="payment_date" class="form-control font-weight-bold" id='datetimepicker1' value="{{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}" />
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12"><strong style="text-transform: uppercase;">Invoice Number</strong></label>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input name="custom" id="custom" class="form-control font-weight-bold" readonly value="" placeholder="Invoice Number"/>
                                    <span class="input-group-addon"><strong><i class="fa fa-tasks"></i></strong></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12"><strong style="text-transform: uppercase;">Total DUE</strong></label>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input name="total_due" id="total_due" class="form-control font-weight-bold" readonly value="" placeholder="Total Amount"/>
                                    <span class="input-group-addon"><strong>{{ $basic->currency }}</strong></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12"><strong style="text-transform: uppercase;">Pay Amount</strong></label>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="number" name="pay_amount" id="pay_amount" class="form-control font-weight-bold" value="" placeholder="Pay Amount" required/>
                                    <span class="input-group-addon"><strong>{{ $basic->currency }}</strong></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12"><strong style="text-transform: uppercase;">Due Amount</strong></label>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input name="due_amount" id="due_amount" class="form-control font-weight-bold" value="" placeholder="Due Amount" readonly/>
                                    <span class="input-group-addon"><strong>{{ $basic->currency }}</strong></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12"><strong style="text-transform: uppercase;">Payment Status</strong></label>
                            <div class="col-md-12">
                                <select name="payment_status" id="payment_status" class="form-control font-weight-bold" required >
                                    <option value="" class="font-weight-bold">Select One</option>
                                    <option value="1" class="font-weight-bold">Full Paid</option>
                                    <option value="0" class="font-weight-bold">Due Paid</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group" id="nextPayment" style="display: none">
                            <label class="col-md-12"><strong style="text-transform: uppercase;">Next Payment Date</strong></label>
                            <div class="col-md-12">
                                <div class='input-group'>
                                    <input type='text' name="due_payment_date" class="form-control font-weight-bold" id='datetimepicker2' value="{{ \Carbon\Carbon::now()->addDays('7')->format('Y-m-d H:i:s') }}" />
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block font-weight-bold text-uppercase" id="btn-save" value="add"><i class="fa fa-send"></i> Submit Repayment</button>
                                <input type="hidden" id="order_id" name="order_id" value="0">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('scripts')
    <script src="{{asset('assets/admin/js/select2.full.min.js')}}" type="text/javascript"></script>

    <script src="{{ asset('assets/admin/js/moment-with-locales.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/js/picker-date-time.js') }}" type="text/javascript"></script>

    <script>
        $(function () {
            $('.select2').select2();
        });
        var url = '{{ url('/staff/get-order-details') }}';
        $(document).on('click','.open_modal',function(){
            var order_id = $(this).val();

            $.get(url + '/' + order_id, function (data) {
                console.log(data);
                $('#order_id').val(data.id);
                $('#custom').val(data.custom);
                $('#total_due').val(data.due_amount);
                $('#due_amount').val(data.due_amount);
                $('#myModal').modal('show');
            })
        });
        $('#payment_status').on('change',function (e) {
            var status = e.target.value;
            if(status == 1){
                document.getElementById('nextPayment').style.display = 'none'
            }else{
                document.getElementById('nextPayment').style.display = 'block'
            }
        });
        $('#pay_amount').on('input',function (e) {
            var pay_amount = e.target.value;
            var total_due = $('#total_due').val();
            $('#due_amount').val(total_due - pay_amount);
        });
        $('#customer_id').on('change',function (e) {
            var customer_id = e.target.value;
            var url = '{{ url('/staff') }}';
            $.get(url + '/get-customer-due?customer_id=' + customer_id,function (data) {
                if(data == ''){
                    $("#repayment_table > tbody").html("");
                    toastr.warning('This Customer Have No Due.');
                }else {
                    $("#repayment_table > tbody").html("");
                    $.each(data,function (index,subcatObj) {

                        $('#repayment_table > tbody').append('<tr><td>'+ subcatObj.custom+'</td><td>'+ subcatObj.total_amount+' {{ $basic->currency }}</td><td>'+ subcatObj.pay_amount+' {{ $basic->currency }}</td><td>'+ subcatObj.due_amount+' {{ $basic->currency }}</td><td><button type="button"  class="btn btn-primary btn-sm btn-detail open_modal font-weight-bold text-uppercase" value="' + subcatObj.id + '"><i class="fa fa-credit-card"></i> Payment Now</button></td></tr>');
                    })
                }
            })
        });

    </script>



@endsection