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
                                <a class="btn btn-primary font-weight-bold text-uppercase" href="{{ route('payment-new') }}">
                                    <i class="fa fa-plus"></i>  {{ __('sidebar.new_payment') }}
                                </a>

                                <a class="btn btn-success font-weight-bold text-uppercase" href="{{ route('manage-company') }}">
                                    <i class="fa fa-plus"></i>  {{ __('sidebar.manage_company') }}
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
                                        <th>{{ __('company.id') }}</th>
                                        <th>{{ __('company.payment_date') }}</th>
                                        <th>{{ __('company.t_no') }}</th>
                                        <th>{{ __('company.c_name') }}</th>
                                        <th>{{ __('company.payment_type') }}</th>
                                        <th>{{ __('company.pay_amount') }}</th>
                                        <th>{{ __('company.t_amount') }}</th>
                                        <th>{{ __('common.action') }}</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($history as $k => $p)
                                        <tr class="{{ $p->deleted_at != null ? 'bg-warning white' : '' }}">
                                            <td>{{ ++$k }}</td>
                                            <td>{{ \Carbon\Carbon::parse($p->payment_date)->format('dS M,y h:i A') }}</td>
                                            <td>{{ $p->custom }}</td>
                                            <td>{{ $p->company->name }}</td>
                                            <td>
                                                @if($p->payment_type == 0)
                                                    <div class="badge badge-primary font-weight-bold text-uppercase">{{ __('company.delivery_payment') }}</div>
                                                @else
                                                    <div class="badge badge-primary font-weight-bold text-uppercase">{{ __('company.normal_payment') }}</div>
                                                @endif
                                            </td>
                                            <td>{{ $p->pay_amount }} - {{ $basic->currency }}</td>
                                            <td>
                                                @if($p->payment_type == 0)
                                                    {{ $p->total_amount }} - {{ $basic->currency }}
                                                @else
                                                    {{ $p->details }}
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm font-weight-bold text-uppercase delete_button"
                                                        data-toggle="modal" {{ $p->deleted_at != null ? 'disabled' : '' }} data-target="#DelModal"
                                                        data-id="{{ $p->id }}">
                                                    <i class='fa fa-trash'></i>
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
                    <h4 class="modal-title" id="myModalLabel2"><i class='fa fa-exclamation-triangle'></i><strong> {{ __('company.confirmation') }} </strong> </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <strong>{{ __('company.are_you_sure') }} </strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('payment-delete') }}" class="form-inline">
                        {!! csrf_field() !!}
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="delete_id" id="delete_id" value="0">
                        <button type="button" class="btn btn-warning font-weight-bold text-uppercase" data-dismiss="modal"><i class="fa fa-times"></i> {{ __('common.cancel') }}</button>&nbsp;
                        <button type="submit" class="btn btn-danger font-weight-bold text-uppercase"><i class="fa fa-check"></i> {{ __('common.yesure') }}</button>
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
