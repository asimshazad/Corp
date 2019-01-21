@extends('layouts.dashboard')
@section('name')@lang('company.company')@endsection
@section('add_record')@lang('company.company')@endsection
@section('content')

    <div class="page-content pt-0">
        <div class="content-wrapper">
            <div class="content">
                <div class="card">

                    <table class="table datatable-basic table-bordered table-striped table-hover dataTable no-footer">
                        <thead>
                        <tr>
                            <th>{{ __('company.id') }}</th>
                            <th>{{ __('company.name') }}</th>
                            <th>{{ __('company.email') }}</th>
                        <!--<th>{{ __('company.address') }}</th>-->
                            <th>{{ __('company.total_send') }}</th>
                            <th>{{ __('company.total_pay') }}</th>
                            <th>{{ __('company.total_due') }} </th>
                            <th class="text-center">{{ __('company.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($company as $product)
                            <tr id="product{{$product->id}}">
                                <td>{{ $product->id }}</td>
                                <td> {{ $product->name }}</td>
                                <td> {{ $product->email }} <br>{{ $product->phone }}</td>
                            <!--<td> {{ $product->address }}</td>-->
                                <td> {{ $product->total_send }} - {{ $basic->currency }}</td>
                                <td> {{ $product->total_pay }} - {{ $basic->currency }}</td>
                                <td> {{ $product->total_send - $product->total_pay }} - {{ $basic->currency }}</td>
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
                    <h5 class="modal-title">{{ __('company.manage') }}</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form id="frmProducts" name="frmProducts" autocomplete="off" novalidate="">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">

                                <div class="col-sm-6">
                                    <label>{{ __('company.name') }}</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('company.name') }}" value="">
                                </div>

                                <div class="col-sm-6">
                                    <label>{{ __('company.email') }}</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('company.email') }}" value="">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row">


                                <div class="col-sm-6">
                                    <label>{{ __('company.phone') }}</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="{{ __('company.phone') }}" value="">
                                </div>

                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row">


                                <div class="col-sm-12">
                                    <label>{{ __('company.address') }}</label>
                                    <textarea class="form-control" id="address" rows="3" name="address" placeholder="{{ __('company.address') }}"></textarea>
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

        var url = '{{ url('/admin/manage-company') }}';
        //display modal form for product editing
        $(document).on('click','.open_modal',function(){
            var product_id = $(this).attr("id");
            $.get(url + '/' + product_id, function (data) {
                //success data
                console.log(data);
                $('#product_id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#phone').val(data.phone);
                $('#address').val(data.address);
                $('#btn-save').val("update");
                $('#modal_form_vertical').modal('show');
            })
        });
        //display modal form for creating new product

        $(document).on('click','#btn_add',function(){
            $('#btn-save').val("add");
            $('#frmProducts').trigger("reset");
            $('#modal_form_vertical').modal('show');
        });
        //create new product / update existing product
        $(document).on('click','#btn-save',function(e){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var formData = {
                name: $('#name').val(),
                email: $('#email').val(),
                phone: $('#phone').val(),
                address: $('#address').val()
            };
            //used to determine the http verb to use [add=POST], [update=PUT]
            var state = $('#btn-save').val();
            var type = "POST"; //for creating new resource
            var product_id = $('#product_id').val();;
            var my_url = url;
            if (state == "update"){
                type = "PUT"; //for updating existing resource
                my_url += '/' + product_id;
            }
            console.log(formData);
            $.ajax({
                type: type,
                url: my_url,
                data: formData,
                dataType: 'json',
                success: function (data) {
                    location.reload();
                    /*var due = data.total_send - data.total_pay;
                    var product = '<tr id="product' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.email + ' </br>' + data.phone + '</td><td>' + data.address + '</td><td>' + data.total_send + ' - {{ $basic->currency }}</td><td>' + data.total_pay + ' - {{ $basic->currency }}</td><td>' + due + ' - {{ $basic->currency }}</td>';
                    product += '<td><button class="btn btn-primary btn-detail open_modal font-weight-bold uppercase" value="' + data.id + '"><i class="fa fa-edit"></i></button></td></tr>';

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
                toastr.success('Successfully Company Saved.');
            });
        });
    </script>

@endsection