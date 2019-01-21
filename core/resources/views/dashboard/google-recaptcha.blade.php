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



                            {!! Form::model($basic,['route'=>['recaptcha-update',$basic->id],'method'=>'PUT','role'=>'form','class'=>'form-horizontal','files'=>true]) !!}
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-10 offset-1">

                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Google Recapcta Status</strong></label>
                                            <div class="col-md-12">
                                                <input data-toggle="toggle" {{ $basic->captcha_status == 1 ? 'checked' : ''}} data-onstyle="success" data-offstyle="danger" data-on="On" data-off="Off" data-width="100%" type="checkbox" name="captcha_status">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Recaptcha Site Key</strong></label>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input class="form-control bold input-lg" name="captcha_site" value="{{ $basic->captcha_site }}" type="text" required>
                                                    <span class="input-group-addon"><strong><i class="fa fa-key"></i></strong></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Recaptcha Secret Key</strong></label>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input class="form-control bold input-lg" name="captcha_secret" value="{{ $basic->captcha_secret }}" type="text" required>
                                                    <span class="input-group-addon"><strong><i class="fa fa-key"></i></strong></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> UPDATE</button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- row -->
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