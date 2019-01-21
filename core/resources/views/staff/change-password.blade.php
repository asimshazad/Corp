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

                            <form class="form-horizontal" action="" method="post" role="form">
                                <div class="form-body">

                                    {!! csrf_field() !!}

                                    <div class="form-group">
                                        <label class="col-md-2 control-label"><strong>Current Password :</strong></label>

                                        <div class="col-md-12">
                                            <input class="form-control input-lg" name="current_password" required placeholder="Current Password" type="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label"><strong>New Password :</strong></label>

                                        <div class="col-md-12">
                                            <input class="form-control input-lg" name="password" required placeholder="New Password" type="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label"><strong>New Password Again :</strong></label>

                                        <div class="col-md-12">
                                            <input class="form-control input-lg" name="password_confirmation" required placeholder="New Password Again" type="password">
                                        </div>
                                    </div>

                                    <div class="col-md-offset-2 col-md-12">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-send"></i> Update Password</button>
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

@endsection
