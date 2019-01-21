@extends('layouts.dashboard')
@section('name')@lang('common.salary')@endsection
@section('add_record')@lang('common.salary')@endsection
@section('content')

    <div class="page-content pt-0">
        <div class="content-wrapper">
            <div class="content">
                <div class="card">

                    <table class="table datatable-basic table-bordered table-striped table-hover dataTable no-footer">
                        <thead>
                        <tr>
                            <th>{{ __('common.id') }}</th>
                            <th>{{ __('common.name') }}</th>
                            <th>{{ __('common.amount') }}</th>
                            <th>{{ __('common.note') }}</th>
                            <th>{{ __('common.created_date') }}</th>
                            <th class="text-center">{{ __('customer.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($salaries as $k => $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->staff['name'] }}</td>
                                <td>{{ $p->paid }}</td>
                                <td>{{ $p->note }}</td>
                                <td>{{ \Carbon\Carbon::parse($p->created_at)->format('dS M,y') }}</td>
                                <td class="text-center">

                                    <a href="{{ route('customer-edit',$p->id) }}" id="{{$p->id}}"  class="list-icons-item"  title="{{ __('common.edit') }}" data-container="body">
                                        <i class="icon-pencil7"></i>
                                    </a>

                                    <a href="{{ route('customer-view',$p->id) }}" id="{{$p->id}}"  class="list-icons-item"  title="{{ __('common.view') }}" data-container="body">
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
                    <h5 class="modal-title">{{ __('salary.manage') }}</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form id="frmProducts" name="frmProducts" autocomplete="off" novalidate="">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>{{ __('salary.select_staff') }}</label>
                                    <select class="form-control" name="staff_id" id="staff_id" required>
                                        @foreach($staff as $p)
                                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-6">
                                    <label>{{ __('salary.paid') }}</label>
                                    <input type="text" class="form-control " id="paid" name="paid" placeholder="{{ __('salary.paid') }}" value="" required>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>{{ __('salary.note') }}</label>
                                    <input type="textarea" class="form-control" id="note" name="note" placeholder="{{ __('salary.note') }}" value="">
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

        var url = '{{ url('/admin/save-salaries') }}';
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
                staff_id : $('#staff_id').val(),
                paid: $('#paid').val(),
                note: $('#note').val(),
            };

             //console.log(formData);
             //return;
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
