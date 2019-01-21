@extends('layouts.dashboard')

@section('style')

    <link href="{{ asset('assets/admin/css/bootstrap-toggle.min.css') }}" rel="stylesheet">

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
                            {!! Form::model($basic,['route'=>['manage-footer-update',$basic->id],'method'=>'PUT','role'=>'form','class'=>'form-horizontal','files'=>true]) !!}
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-10 offset-1">

                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Invoice Footer Text</strong></label>
                                            <div class="col-md-12">
                                                <textarea name="admin_text" id="area2" class="form-control" required>{{ $basic->admin_text }}</textarea>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Contact Google Map Code</strong></label>
                                            <div class="col-md-12">
                                                <textarea name="google_map" cols="10" rows="5" class="form-control input-lg" required>{{ $basic->google_map }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Footer Text</strong></label>
                                            <div class="col-md-12">
                                                <textarea name="footer_text" id="area2" cols="10" rows="3" class="form-control input-lg" required>{{ $basic->footer_text }}</textarea>
                                            </div>
                                        </div>

                                        {{--<div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Change Footer Image</strong></label>
                                            <div class="col-md-12">
                                                <div class="input-group" style="padding-bottom: 10px;">
                                                    <input type="file" name="footer_image" class="form-control bold input-lg" >
                                                    <span class="input-group-addon"><i class="fa fa-file-picture-o"></i></span>
                                                </div>
                                                <code style="margin-top: 5px;font-weight: bold;">Image Type : PNG,JPG,JPEG. and Good Regulation Recommended.</code>
                                            </div>
                                        </div>--}}

                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Copyright Text</strong></label>
                                            <div class="col-md-12">
                                                <textarea name="copy_text" id="area1" class="form-control" required>{{ $basic->copy_text }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="submit" onclick="nicEditors.findEditor('area1').saveContent();nicEditors.findEditor('area2').saveContent();" class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> UPDATE</button>
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

    <script src="{{ asset('assets/admin/js/bootstrap-toggle.min.js') }}"></script>
    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>

    <script type="text/javascript">
        bkLib.onDomLoaded(function() {
            new nicEditor({fullPanel : true}).panelInstance('area1');
            new nicEditor({fullPanel : true}).panelInstance('area2');
        });
    </script>

@endsection
