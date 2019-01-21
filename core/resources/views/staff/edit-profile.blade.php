@extends('layouts.staff')
@section('style')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
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

                            <form class="form-horizontal" action="{{ route('staff-update-profile') }}" enctype="multipart/form-data" method="post" role="form">
                                <div class="form-body">

                                    {!! csrf_field() !!}


                                    <div class="form-group">
                                        <label class="col-md-2 control-label"><strong>Name :</strong></label>

                                        <div class="col-md-12">
                                            <input value="{{ $admin->name }}" class="form-control input-lg" name="name" placeholder="Staff Name" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label"><strong>Admin Email :</strong></label>

                                        <div class="col-md-12">
                                            <input value="{{ $admin->email }}" class="form-control input-lg" name="email" placeholder="Staff Email" type="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label"><strong>Admin Image :</strong></label>

                                        <div class="col-md-12">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 215px; height: 215px;" data-trigger="fileinput">
                                                    <img style="width: 215px" src="{{ asset('assets/images') }}/{{ $admin->image }}" alt="...">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 215px; max-height: 215px"></div>
                                                <div>
                                                <span class="btn btn-info btn-file">
                                                    <span class="fileinput-new bold uppercase"><i class="fa fa-file-image-o"></i> Select image</span>
                                                    <span class="fileinput-exists bold uppercase"><i class="fa fa-edit"></i> Change</span>
                                                    <input type="file" name="image" accept="image/*">
                                                </span>
                                                    <a href="#" class="btn btn-danger fileinput-exists bold uppercase" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-offset-2 col-md-12">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-send"></i> Update Profile</button>
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
@section('scripts')
    <script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>
@endsection
