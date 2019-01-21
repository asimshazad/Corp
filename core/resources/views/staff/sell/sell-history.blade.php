@extends('layouts.staff')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/datatables.min.css') }}">
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

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>ID#</th>
                                        <th>Sell Date</th>
                                        <th>Sell Number</th>
                                        <th>Customer Details</th>
                                        <th>Payment Type</th>
                                        <th>Total Amount</th>
                                        <th>Pay Amount</th>
                                        <th>Due/Paid</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($sell as $k => $p)
                                        <tr>
                                            <td>{{ ++$k }}</td>
                                            <td>{{ \Carbon\Carbon::parse($p->created_at)->format('dS M,y h:i A') }}</td>
                                            <td>{{ $p->custom }}</td>
                                            <td>{{ $p->customer->name }} <br>{{ $p->customer->phone }}</td>
                                            <td>
                                                @if($p->payment_type == 0)
                                                    <div class="badge badge-secondary font-weight-bold text-uppercase">On Paid</div>
                                                @elseif($p->payment_type == 1)
                                                    <div class="badge badge-warning font-weight-bold text-uppercase">Due Paid</div>
                                                @else
                                                    <div class="badge badge-danger font-weight-bold text-uppercase">Instalment</div>
                                                @endif
                                            </td>
                                            <td>{{ $p->total_amount }} - {{ $basic->currency }}</td>
                                            <td>{{ $p->pay_amount }} - {{ $basic->currency }}</td>
                                            <td>
                                                @if($p->due_amount == 0)
                                                    <div class="badge badge-primary font-weight-bold text-uppercase">Paid</div>
                                                @else
                                                    {{ $p->due_amount }} - {{ $basic->currency }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('staff-sell-invoice',$p->custom) }}" class="btn btn-primary btn-sm bold text-uppercase" title="View"><i class="fa fa-eye"></i> View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->
    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header bg-warning white">
                    <h4 class="modal-title" id="myModalLabel2"><i class='fa fa-exclamation-triangle'></i><strong> Confirmation !</strong> </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <strong>Are you sure you want to do this ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('sell-delete') }}" class="form-inline">
                        {!! csrf_field() !!}
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="delete_id" id="delete_id" value="0">
                        <button type="button" class="btn btn-warning font-weight-bold text-uppercase" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>&nbsp;
                        <button type="submit" class="btn btn-danger font-weight-bold text-uppercase"><i class="fa fa-check"></i> Yes Sure</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/js/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/datatable-basic.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(document).on("click", '.delete_button', function (e) {
                var id = $(this).data('id');
                $("#delete_id").val(id);
            });
        });
    </script>
@endsection
