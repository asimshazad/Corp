@extends('layouts.user')
@section('style')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@endsection
@section('content')

    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-basic">User Password Change</h4>
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
                            <form class="form form-horizontal" action="" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-body">

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput1">Old Password: </label>
                                        <div class="col-md-8">
                                            <input type="password" id="projectinput1" class="form-control" value="" placeholder="Old Password" name="current_password" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput2">New Password : </label>
                                        <div class="col-md-8">
                                            <input type="password" id="projectinput2" class="form-control" value="" placeholder="New Password" name="password" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput2">Confirm Password : </label>
                                        <div class="col-md-8">
                                            <input type="password" id="projectinput2" class="form-control" value="" placeholder="Confirm Password" name="password_confirmation" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-8 offset-3">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="ft-navigation"></i> Update Now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection