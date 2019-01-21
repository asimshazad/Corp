@extends('layouts.dashboard')
@section('style')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@endsection
@section('content')

    <section id="card-footer-options">

        {!! Form::open(['files'=>true]) !!}
        <div class="row">

            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Change Logo</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: auto;" data-trigger="fileinput">
                                    <img style="width: 200px" src="{{ asset('assets/images/logo.png') }}" alt="logo">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 60px"></div>
                                <div>
                                                    <span class="btn btn-info btn-file">
                                                        <span class="fileinput-new bold uppercase"><i class="fa fa-file-image-o"></i> Update Logo</span>
                                                        <span class="fileinput-exists bold uppercase"><i class="fa fa-edit"></i> Change</span>
                                                        <input type="file" name="logo" accept="image/*">
                                                    </span>
                                    <a href="#" class="btn btn-danger fileinput-exists bold uppercase" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <span>Logo Must be Type of PNG</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Change Favicon</h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 60px; height: auto;" data-trigger="fileinput">
                                    <img style="width: 60px" src="{{ asset('assets/images/favicon.png') }}" alt="logo">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 120px; max-height: 120px"></div>
                                <div>
                                                    <span class="btn btn-info btn-file">
                                                        <span class="fileinput-new bold uppercase"><i class="fa fa-file-image-o"></i> Update Favicon</span>
                                                        <span class="fileinput-exists bold uppercase"><i class="fa fa-edit"></i> Change</span>
                                                        <input type="file" name="favicon" accept="image/*">
                                                    </span>
                                    <a href="#" class="btn btn-danger fileinput-exists bold uppercase" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-0 text-muted">
                        <span class="danger">Favicon Must be Type of PNG</span>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> UPDATE</button>
                </div>
            </div>
        {!! Form::close() !!}
    </section>


@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>
@endsection
