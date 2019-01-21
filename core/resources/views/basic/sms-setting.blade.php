@extends('layouts.dashboard')
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

                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title" id="horz-layout-basic">Code Details</h4>
                                        </div>
                                        <div class="card-content collpase show">
                                            <div class="card-body">
                                                <div class="col-md-12">
                                                    <div class="table-scrollable">
                                                        <table class="table table-striped bg-info table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th> # </th>
                                                                <th> CODE </th>
                                                                <th> DESCRIPTION </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>


                                                            <tr>
                                                                <td> 1 </td>
                                                                <td> <pre>@{{message}}</pre> </td>
                                                                <td> Message Text. Which Text User Receive.</td>
                                                            </tr>

                                                            <tr>
                                                                <td> 2 </td>
                                                                <td> <pre>@{{number}}</pre> </td>
                                                                <td> User Receive Number</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END SAMPLE TABLE PORTLET-->
                                </div>
                                <div class="col-md-12">
                                    <!-- BEGIN SAMPLE FORM PORTLET-->
                                    <div class="card">
                                        <div class="card-content collpase show">

                                            <div class="card-body">


                                                <form action="{{ route('sms-setting') }}" method="post" role="form" class="form-horizontal">
                                                    {!! csrf_field() !!}
                                                    <div class="form-body">

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">SMS Send API</strong></label>
                                                                    <div class="col-md-12">
                                                                        <textarea class="form-control" rows="3" name="smsapi" placeholder="API">{!! $basic->smsapi !!}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <button type="submit" class="btn btn-primary bg-softwarezon-x btn-block btn-lg"><i class="fa fa-send"></i> UPDATE</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- row -->
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->


@endsection
