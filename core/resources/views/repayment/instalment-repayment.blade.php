@extends('layouts.dashboard')
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
                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Instalment Invoice List</strong></label>
                                    <div class="col-md-12">
                                        <table id="repayment_table" class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>Invoice Number</th>
                                                <th>Instalment Amount</th>
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
            var url = '{{ url('/admin') }}';
            $.get(url + '/get-customer-instalment?customer_id=' + customer_id,function (data) {
                console.log(data);
                if(data == ''){
                    $("#repayment_table > tbody").html("");
                    toastr.warning('This Customer Have No Instalment.');
                }else {
                    $("#repayment_table > tbody").html("");
                    $.each(data,function (index,subcatObj) {
                        $('#repayment_table > tbody').append('<tr><td>'+ subcatObj.custom+'</td><td>'+ subcatObj.total_amount+' {{ $basic->currency }}</td><td><a href="{{ route('instalment-repayment-list') }}?custom='+ subcatObj.custom+'" class="btn btn-primary btn-sm btn-detail font-weight-bold text-uppercase"><i class="fa fa-list"></i> View List</a></td></tr>');
                    })
                }
            })
        });

    </script>



@endsection