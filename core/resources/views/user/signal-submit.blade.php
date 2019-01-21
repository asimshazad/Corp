@extends('layouts.user')

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

                            <form class="form-horizontal" method="post" action="">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label"><b>Signal Title : </b></label>
                                                <div class="col-sm-12">
                                                    <input name="title" value="" class="form-control input-lg" type="text" placeholder="Signal Title" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-12 control-label"><b>Signal Description :</b> </label>
                                                <div class="col-sm-12">
                                                    <textarea name="description" id="ckview" cols="30" rows="10" class="form-control input-lg" required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary btn-lg btn-block bg-softwarezon-x "> <i class="fa fa-send"></i> Submit Signal</button>
                                                </div>
                                            </div>
                                        </div>
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

    <script src="{{asset('assets/admin/ckeditor/ckeditor.js')}}"></script>

    <script>
        var ckview = document.getElementById("ckview");
        CKEDITOR.replace(ckview,{
            language:'en-gb'
        });
    </script>
@endsection
