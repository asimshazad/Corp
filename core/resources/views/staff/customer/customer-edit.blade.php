@extends('layouts.staff')
@section('style')
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
                            {!! Form::model($customer,['route'=>['staff-customer-update',$customer->id],'class'=>'form-horizontal','method'=>'put','role'=>'form']) !!}

                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Customer Name</strong></label>
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <input name="name" class="form-control bold" value="{{ $customer->name }}" placeholder="Customer Name" required/>
                                                <span class="input-group-addon"><strong><i class="fa fa-file-text-o"></i></strong></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Customer Email</strong></label>
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <input name="email" type="email" class="form-control bold" value="{{ $customer->email }}" placeholder="Customer Email (optional)"/>
                                                <span class="input-group-addon"><strong><i class="fa fa-envelope"></i></strong></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Customer Phone</strong></label>
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <input name="phone" class="form-control bold" value="{{ $customer->phone }}" placeholder="Customer Phone" required/>
                                                <span class="input-group-addon"><strong><i class="fa fa-phone"></i></strong></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Alternative Phone</strong></label>
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <input name="phone2" class="form-control bold" value="{{ $customer->phone2 }}" placeholder="Alternative Phone (optional)"/>
                                                <span class="input-group-addon"><strong><i class="fa fa-phone"></i></strong></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Customer Address </strong></label>
                                        <div class="col-md-12">
                                            <textarea name="address" id="" cols="30" rows="5" class="form-control input-lg" placeholder="Customer Address" required>{{ $customer->address }}</textarea>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-block btn-lg text-uppercase"><i class="fa fa-send"></i> Update Customer</button>
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
@endsection
@section('scripts')

@endsection