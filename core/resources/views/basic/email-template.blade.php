@extends('layouts.dashboard')
@section('style')
    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>

    <script type="text/javascript">
        bkLib.onDomLoaded(function() { new nicEditor({fullPanel : true}).panelInstance('area1'); });
    </script>

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
                                    <div class="card">
                                        <div class="card-content collpase show">
                                            <div class="card-body">
                                                <div class="table-scrollable">
                                                    <table class="table table-striped table-hover">
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
                                                            <td> Details Text From Script</td>
                                                        </tr>
                                                        <tr>
                                                            <td> 2 </td>
                                                            <td> <pre>@{{name}}</pre> </td>
                                                            <td> Users Name. Will Pull From Database and Use in EMAIL text</td>
                                                        </tr>
                                                        <tr>
                                                            <td> 3 </td>
                                                            <td> <pre>@{{site_title}}</pre> </td>
                                                            <td> Site_title. Will Pull From Database and Use in EMAIL text</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END SAMPLE TABLE PORTLET-->
                                </div>

                                <div class="col-md-12">
                                    <!-- BEGIN SAMPLE TABLE PORTLET-->

                                    <div class="card">
                                        <div class="card-content collpase show">
                                            <div class="card-body">

                                                <form class="form-horizontal" action="{{ route('email-template') }}" method="post" role="form">
                                                    {!! csrf_field() !!}
                                                    <div class="form-body">

                                                        <div class="form-group">
                                                            <h4 class="control-label"><strong style="text-transform: uppercase;margin-left: 15px;">Email Template</strong><br></h4>
                                                            <br>
                                                            <div class="col-md-12">
                                                                <textarea id="area1" class="form-control" rows="5" name="email_body">{{ $basic->email_body }}</textarea>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> UPDATE</button>
                                                        </div>
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
