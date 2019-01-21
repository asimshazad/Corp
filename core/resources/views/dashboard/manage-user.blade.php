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


                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th>ID#</th>
                                    <th>Details</th>
                                    <th>Telegram ID</th>
                                    <th>Plan</th>
                                    <th>Email Verify</th>
                                    <th>Phone Verify</th>
                                    <th>Status</th>
                                    <th>Payment Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($user as $k => $p)
                                    <tr class="{{ $p->plan_status == 1 ? '' : 'bg-warning ' }}">
                                        <td>{{ ++$k }}</td>
                                        <td>{{$p->name}}<br>{{$p->email}}<br>{{$p->country_code}}{{$p->phone}}</td>
                                        <td>@if($p->telegram_id != null) {{ $p->telegram_id }}@else NULL @endif</td>
                                        <td>{{$p->plan->name}}</td>
                                        <td>
                                            @if($p->verify_status == 1)
                                                <button type="button" class="btn btn-primary btn-sm bold uppercase email_button"
                                                        data-toggle="modal" data-target="#EmailModal"
                                                        data-id="{{$p->id}}" title="Unverified">
                                                    <i class='fa fa-check'></i> Verified
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-danger btn-sm bold uppercase email_button"
                                                        data-toggle="modal" data-target="#EmailModal"
                                                        data-id="{{$p->id}}" title="Verified">
                                                    <i class='fa fa-times'></i> Unverified
                                                </button>
                                            @endif
                                        </td>
                                        <td>
                                            @if($p->phone_status == 1)
                                                <button type="button" class="btn btn-primary btn-sm bold uppercase phone_button"
                                                        data-toggle="modal" data-target="#PhoneModal"
                                                        data-id="{{$p->id}}" title="Unverified">
                                                    <i class='fa fa-check'></i> Verified
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-danger btn-sm bold uppercase phone_button"
                                                        data-toggle="modal" data-target="#PhoneModal"
                                                        data-id="{{$p->id}}" title="Verified">
                                                    <i class='fa fa-times'></i> Unverified
                                                </button>
                                            @endif
                                        </td>
                                        <td>
                                            @if($p->status == 0)
                                                <button type="button" class="btn btn-primary btn-sm bold uppercase block_button"
                                                        data-toggle="modal" data-target="#DelModal"
                                                        data-id="{{$p->id}}" title="Block">
                                                    <i class='fa fa-check'></i> Active
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-danger btn-sm bold uppercase block_button"
                                                        data-toggle="modal" data-target="#DelModal"
                                                        data-id="{{$p->id}}" title="Active">
                                                    <i class='fa fa-times'></i> Block
                                                </button>
                                            @endif
                                        </td>
                                        <td>
                                            @if($p->plan_status == 1)
                                                <div class="badge badge-success"><i class="fa fa-check"></i> Payment</div>
                                            @else
                                                <div class="badge badge-danger"><i class="fa fa-times"></i> Not Payment</div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('user-edit',$p->id) }}" class="btn btn-primary btn-sm bold uppercase" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                                            <button type="button" class="btn btn-danger btn-sm bold uppercase confirm_button"
                                                    data-toggle="modal" data-target="#ConModal"
                                                    data-id="{{$p->id}}" title="Delete">
                                                <i class='fa fa-trash'></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$user->links('basic.pagination')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->

    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class="fa fa-exclamation-triangle"></i> Confirmation.!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>Are you sure you want to Do this ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('user-block') }}" class="form-inline">
                        {!! csrf_field() !!}
                        <input type="hidden" name="block_id" class="block_id" value="0">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Yes sure</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="EmailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class="fa fa-exclamation-triangle"></i> Confirmation.!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>Are you sure you want to Do This ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('email-block') }}" class="form-inline">
                        {!! csrf_field() !!}
                        <input type="hidden" name="email_id" class="email_id" value="0">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Yes sure</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="PhoneModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class="fa fa-exclamation-triangle"></i> Confirmation.!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>Are you sure you want to Do This ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('phone-block') }}" class="form-inline">
                        {!! csrf_field() !!}
                        <input type="hidden" name="phone_id" class="phone_id" value="0">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Yes sure</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="ConModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class='fa fa-trash'></i> Delete !</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body">
                    <strong>Are you sure you want to Delete ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('user-delete') }}" class="form-inline">
                        {!! csrf_field() !!}
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="id" class="confirm_id" value="0">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE</button>
                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $(document).on("click", '.block_button', function (e) {
                var id = $(this).data('id');
                $(".block_id").val(id);
            });
            $(document).on("click", '.email_button', function (e) {
                var id = $(this).data('id');
                $(".email_id").val(id);
            });
            $(document).on("click", '.phone_button', function (e) {
                var id = $(this).data('id');
                $(".phone_id").val(id);
            });
            $(document).ready(function () {
                $(document).on("click", '.confirm_button', function (e) {
                    var id = $(this).data('id');
                    $(".confirm_id").val(id);
                });
            });
        });
    </script>
@endsection
