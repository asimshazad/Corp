@extends('layouts.dashboard')
@section('name')@lang('common.staff')@endsection
@section('add_record')@lang('common.staff')@endsection
@section('content')

    <div class="page-content pt-0">
        <div class="content-wrapper">
            <div class="content">
                <div class="card">

                    <table class="table datatable-basic table-bordered table-striped table-hover dataTable no-footer">
                        <thead>
                        <tr>
                            <th>{{ __('common.id') }}</th>
                            <th>{{ __('staff.name') }}</th>
                            <th>{{ __('staff.email') }}</th>
                            <th>{{ __('common.status') }}</th>
                            <th>{{ __('common.created_at') }}</th>
                            <th class="text-center">{{ __('common.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($staff as $product)
                            <tr id="product{{$product->id}}">
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->email}}</td>
                                <td>
                                    @if($product->status == 1)
                                        <span class="badge bg-success-400">{{ __('common.active') }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ __('common.inactive') }}</span>
                                    @endif
                                </td>
                                <td>{{ $product->created_at }}</td>
                                <td class="text-center">
                                    <a href="javascript:;" id="{{$product->id}}"  class="open_modal list-icons-item"  title="{{ __('common.edit') }}" data-container="body">
                                        <i class="icon-pencil7"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="modal_form_vertical" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('staff.manage_staff') }}</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form id="frmProducts" name="frmProducts" autocomplete="off" novalidate="">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>{{ __('staff.name') }}</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('staff.name') }}" value="">
                                </div>

                                <div class="col-sm-6">
                                    <label>{{ __('staff.email') }}</label>
                                    <input type="text" class="form-control " id="email" name="email" placeholder="{{ __('staff.email') }}" value="">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>{{ __('staff.password') }}</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('staff.password') }}" autocomplete="new1-password" value="">
                                </div>

                                <div class="col-sm-6">
                                    <label>{{ __('staff.confirm_password') }}</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" autocomplete="off" placeholder="{{ __('staff.confirm_password') }}" value="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>{{ __('staff.status') }}</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" class="">{{ __('common.active') }}</option>
                                        <option value="0" class="">{{ __('common.inactive') }}</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button value="add" type="button" id="btn-save" class="btn bg-primary"> {{ __('common.save') }}</button>
                        <input type="hidden" id="product_id" name="product_id" value="0">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



@section('scripts')

    <script>

        var url = '{{ url('/admin/manage-staff') }}';
        //display modal form for product editing
        $(document).on('click','.open_modal',function(){
            var product_id = $(this).attr("id");
           // alert($(this).attr("id"));

            $.get(url + '/' + product_id, function (data) {
                //success data
                console.log(data);
                $('#product_id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#status').val(data.status);
                $('#btn-save').val("update");
                $('#modal_form_vertical').modal('show');
            })
        });
        //display modal form for creating new product
        //$('#btn_add').click(function(){
        $(document).on('click','#btn_add',function(){

            $('#btn-save').val("add");
            $('#frmProducts').trigger("reset");
            $('#modal_form_vertical').modal('show');
        });


        //create new product / update existing product
        $(document).on('click','#btn-save',function(e){
//       / $("#btn-save").click(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var formData = {
                name: $('#name').val(),
                email: $('#email').val(),
                status: $('#status').val(),
                password: $('#password').val(),
                password_confirmation: $('#password_confirmation').val(),
            };

           // console.log(formData);
           // return;
            //used to determine the http verb to use [add=POST], [update=PUT]
            var state = $('#btn-save').val();
            var type = "POST"; //for creating new resource
            var product_id = $('#product_id').val();
            var my_url = url;
            if (state == "update"){
                type = "PUT"; //for updating existing resource
                my_url += '/' + product_id;
            }
            console.log(formData);
           // return;
            $.ajax({
                type: type,
                url: my_url,
                data: formData,
                dataType: 'json',
                success: function (data) {
                    location.reload();
                   /* var product = '<tr id="product' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.email + '</td><td>' + data.staffStatus + '</td>';
                    product += '<td><button class="btn btn-primary btn-detail open_modal font-weight-bold text-uppercase" value="' + data.id + '"><i class="fa fa-edit"></i> EDIT Staff</button></td></tr>';

                    if (state == "add"){ //if user added a new record
                        $('#products-list').append(product);
                    }else{ //if user updated an existing record
                        $("#product" + product_id).replaceWith( product );
                    }*/
                    $('#frmProducts').trigger("reset");
                    $('#modal_form_vertical').modal('hide')
                },
                error: function(data)
                {
                    $.each( data.responseJSON.errors, function( key, value ) {
                        toastr.error( value);
                    });
                }
            }).done(function() {
                toastr.success('Successfully Staff Saved.');
            });
        });
    </script>
@endsection