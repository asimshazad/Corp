@extends('layouts.dashboard')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-colorpicker.min.css') }}">
    <link href="{{ asset('assets/admin/css/bootstrap-toggle.min.css')}}" rel="stylesheet">
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


                            {!! Form::model($basic,['route'=>['basic-update',$basic->id],'method'=>'PUT','class'=>'form form-horizontal']) !!}
                                <div class="form-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Website Title</strong></label>
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <input class="form-control bold input-lg" name="title" value="{{ $basic->title }}" type="text" required>
                                                        <span class="input-group-addon"><strong><i class="fa fa-file-text-o"></i></strong></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Base Currency</strong></label>
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <input class="form-control bold input-lg" name="currency" value="{{ $basic->currency }}" type="text" required>
                                                        <span class="input-group-addon"><strong><i class="fa fa-money"></i></strong></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Contact Phone</strong></label>
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <input type="text" name="phone" class="form-control bold input-lg" value="{{ $basic->phone }}" required>
                                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Currency Symbol </strong></label>
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <input class="form-control bold input-lg" name="symbol" value="{{ $basic->symbol }}" type="text" required>
                                                        <span class="input-group-addon"><strong><i class="fa fa-bolt"></i></strong></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Contact Email</strong></label>
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <input type="text" name="email" class="form-control bold input-lg" value="{{ $basic->email }}" required>
                                                        <span class="input-group-addon"><i class="fa fa-envelope-open"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Contact Address</strong></label>
                                                <div class="col-md-12">
                                                    <textarea name="address" id="" class="form-control bold input-lg" cols="30" rows="1"> {{ $basic->address }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> UPDATE</button>
                                        </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/js/bootstrap-colorpicker.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-toggle.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('.my-colorpicker1').colorpicker()
        });
    </script>
@endsection