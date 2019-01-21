@extends('layouts.dashboard')
@section('name')@lang('common.account')@endsection
@section('add_record')@lang('common.account')@endsection
@section('content')

    <div class="page-content pt-0">
        <div class="content-wrapper">
            <div class="content">
                <div class="card">

                    <table class="table datatable-basic table-bordered table-striped table-hover dataTable no-footer">
                        <thead>
                        <tr>
                        <tr>
                            <th>{{ __('account.id') }}</th>
                            <th>{{ __('account.payment_at') }}</th>
                            <th>{{ __('account.transaction_number') }}</th>
                            <th>{{ __('account.payment_type') }}</th>
                            <th>{{ __('account.pay_amount') }}</th>
                            <th>{{ __('account.details') }}</th>
                            <th class="text-center">{{ __('common.action') }}</th>
                        </tr>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($history as $k => $p)
                                <tr class="{{ $p->deleted_at != null ? 'bg-warning white' : '' }}">
                                    <td>{{ ++$k }}</td>
                                    <td>{{ \Carbon\Carbon::parse($p->payment_date)->format('dS M, Y h:i A') }}</td>
                                    <td>{{ $p->custom }}</td>
                                    <td>
                                        @if($p->payment_type == 0)
                                            <div class="badge badge-primary font-weight-bold text-uppercase">{{ __('account.d_amount') }}</div>
                                        @elseif($p->payment_type == 1)
                                            <div class="badge badge-danger font-weight-bold text-uppercase">{{ __('account.w_amount') }}</div>
                                        @else
                                            <div class="badge badge-warning font-weight-bold text-uppercase">{{ __('account.e_amount') }}</div>
                                        @endif
                                    </td>
                                    <td>{{ $p->pay_amount }} - {{ $basic->currency }}</td>
                                    <td>
                                        {{ $p->details }}
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:;" id="{{$p->id}}"  class="open_modal list-icons-item"  title="{{ __('common.edit') }}"
                                           data-container="body"  data-toggle="modal" {{ $p->deleted_at != null ? 'disabled' : '' }} data-target="#DelModal" data-id="{{ $p->id }}">
                                            <i class="icon-pencil7"></i>
                                        </a>

                                       {{-- <button type="button" class="btn btn-danger btn-sm font-weight-bold text-uppercase delete_button"
                                                data-toggle="modal" {{ $p->deleted_at != null ? 'disabled' : '' }} data-target="#DelModal"
                                                data-id="{{ $p->id }}">
                                            <i class='fa fa-trash'></i> {{ __('account.delete') }}
                                        </button>--}}

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



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
                    <strong> {{ __('common.r_u_sure') }}</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('account-delete') }}" class="form-inline">
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

    <script>
        $(document).ready(function () {
            $(document).on("click", '.delete_button', function (e) {
                var id = $(this).data('id');
                $("#delete_id").val(id);
            });
        });
    </script>
@endsection
