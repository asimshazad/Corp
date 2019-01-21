@extends('layouts.user')
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


                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Created At</th>
                                    <th>Transaction Number</th>
                                    <th>Transaction Type</th>
                                    <th>Transaction Amount</th>
                                    <th>Post Amount</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($log as $k => $p)
                                    <tr>
                                        <td>{{ ++$k }}</td>
                                        <td>{{ \Carbon\Carbon::parse($p->created_at)->format('dS M, Y') }}</td>
                                        <td>{{ $p->custom }}</td>
                                        <td>
                                            @if($p->type == 1)
                                                <div class="badge badge-primary">
                                                    <i class="fa fa-line-chart font-medium-2"></i>
                                                    <span>Provide Signal</span>
                                                </div>
                                            @elseif($p->type == 2)
                                                <div class="badge badge-success">
                                                    <i class="fa fa-send font-medium-2"></i>
                                                    <span>Subscription Plan</span>
                                                </div>
                                            @elseif($p->type == 3)
                                                <div class="badge badge-warning">
                                                    <i class="fa fa-cloud-upload font-medium-2"></i>
                                                    <span>Withdraw</span>
                                                </div>
                                            @elseif($p->type == 4)
                                                <div class="badge badge-warning">
                                                    <i class="fa fa-bolt font-medium-2"></i>
                                                    <span>Withdraw Charge</span>
                                                </div>
                                            @elseif($p->type == 5)
                                                <div class="badge badge-danger">
                                                    <i class="fa fa-cloud-download font-medium-2"></i>
                                                    <span>Withdraw Refund</span>
                                                </div>
                                            @elseif($p->type == 6)
                                                <div class="badge badge-danger">
                                                    <i class="fa fa-bolt font-medium-2"></i>
                                                    <span>Withdraw Charge Refund</span>
                                                </div>
                                            @elseif($p->type == 7)
                                                <div class="badge badge-success">
                                                    <i class="fa fa-cloud-download font-medium-2"></i>
                                                    <span>Reference Bonus</span>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <b>{{ $p->balance }} {{ $basic->currency }}</b>
                                        </td>
                                        <td>
                                            <b>{{ $p->post_balance }} {{ $basic->currency }}</b>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pull-right">
                                {!! $log->links('basic.pagination') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->
@endsection