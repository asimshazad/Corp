@extends('layouts.dashboard')
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
                                <a class="btn btn-primary font-weight-bold text-uppercase" href="{{ route('sell-new') }}">
                                    <i class="fa fa-plus"></i>  {{ __('sidebar.add_new') }}
                                </a>

                                <a class="btn btn-success font-weight-bold text-uppercase" href="{{ route('manage-instalment') }}">
                                    <i class="fa fa-plus"></i>  {{ __('sidebar.manage_installment') }}
                                </a>


                            </ul>
                        </div>
                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>{{ __('sell.id') }}</th>
                                        <th>{{ __('sell.sell_date') }}</th>
                                        <th>{{ __('sell.sell_no') }}</th>
                                        <th>{{ __('sell.customer_details') }}</th>
                                        <th>{{ __('sell.payment_type') }}</th>
                                        <th>{{ __('sell.total_amount') }}</th>
                                        <th>{{ __('sell.pay_amount') }}</th>
                                        <th>{{ __('sell.due_paid') }}</th>
                                        <th>{{ __('sell.sell_by') }}</th>
                                        <th>{{ __('common.action') }}</th>
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
                                                    <div class="badge badge-secondary font-weight-bold text-uppercase">{{ __('sell.on_paid') }}</div>
                                                @elseif($p->payment_type == 1)
                                                    <div class="badge badge-warning font-weight-bold text-uppercase">{{ __('sell.due_paid') }}</div>
                                                @else
                                                    <div class="badge badge-danger font-weight-bold text-uppercase">{{ __('sell.instalment') }}</div>
                                                @endif
                                            </td>
                                            <td>{{ $p->total_amount }} - {{ $basic->currency }}</td>
                                            <td>{{ $p->pay_amount }} - {{ $basic->currency }}</td>
                                            <td>
                                                @if($p->due_amount == 0)
                                                    <div class="badge badge-primary font-weight-bold text-uppercase">{{ __('sell.paid') }}</div>
                                                @else
                                                    {{ $p->due_amount }} - {{ $basic->currency }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($p->staff_id == 0)
                                                    <div class="badge badge-success font-weight-bold text-uppercase">{{ __('common.admin') }}</div>
                                                @else
                                                    <div class="badge badge-primary font-weight-bold text-uppercase">{{ __('common.staff') }}</div>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('sell-invoice',$p->custom) }}" class="btn btn-primary btn-sm bold text-uppercase" title="View"><i class="fa fa-eye"></i> {{ __('common.view') }}</a>
                                                <button type="button" class="btn btn-danger btn-sm text-uppercase delete_button"
                                                        data-toggle="modal" {{ $p->deleted_at != null ? 'disabled' : '' }} data-target="#DelModal"
                                                        data-id="{{ $p->id }}">
                                                    <i class='fa fa-trash'></i> {{ __('common.delete') }}
                                                </button>
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
                    <h4 class="modal-title" id="myModalLabel2"><i class='fa fa-exclamation-triangle'></i><strong> {{ __('common.confirmation') }} </strong> </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <strong>{{ __('common.are_you_sure') }}</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('sell-delete') }}" class="form-inline">
                        {!! csrf_field() !!}
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="delete_id" id="delete_id" value="0">
                        <button type="button" class="btn btn-warning font-weight-bold text-uppercase" data-dismiss="modal"><i class="fa fa-times"></i> {{ __('common.cancel') }}</button>&nbsp;
                        <button type="submit" class="btn btn-danger font-weight-bold text-uppercase"><i class="fa fa-check"></i> {{ __('common.yesure') }} </button>
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
