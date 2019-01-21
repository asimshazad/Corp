@extends('layouts.dashboard')
@section('name')@lang('common.instalment')@endsection
@section('add_record')@lang('common.instalment')@endsection
@section('content')

    <div class="page-content pt-0">
        <div class="content-wrapper">
            <div class="content">
                <div class="card">

                    <table class="table datatable-basic table-bordered table-striped table-hover dataTable no-footer">
                        <thead>
                        <tr>
                            <th>{{ __('instalment.sl') }}</th>
                            <th>{{ __('instalment.name') }}</th>
                            <th>{{ __('instalment.duration') }}</th>
                            <th>{{ __('instalment.time') }}</th>
                            <th>{{ __('instalment.charge') }}</th>
                            <th>{{ __('instalment.difference') }}</th>
                            <th class="text-center">{{ __('instalment.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody id="products-list" name="products-list">
                        @foreach($instalment as $key => $product)
                            <tr id="product{{$product->id}}">
                                <td>{{++$key}}</td>
                                <td> {{$product->name}}</td>
                                <td> {{$product->duration}} - {{ __('common.month') }}</td>
                                <td> {{$product->time}} - {{ __('common.time') }}</td>
                                <td> {{$product->charge}}%</td>
                                <td> {{$product->difference}} - {{ __('common.days') }}</td>
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

    <!-- Modal for DELETE -->
    <div id="modal_form_vertical" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('instalment.manage') }}</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form id="frmProducts" name="frmProducts" autocomplete="off" novalidate="">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>{{ __('instalment.name') }}</label>
                                    <input name="name" id="name" class="form-control" value="" placeholder="{{ __('instalment.name') }} "/>
                                </div>

                                <div class="col-sm-6">

                                    <label>{{ __('instalment.total_duration') }}</label>
                                    <input name="duration" id="duration" type="number" class="form-control" value="" placeholder="{{ __('instalment.total_duration') }} "/>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>{{ __('instalment.installment_time') }}</label>
                                    <input name="time" id="time" type="number" class="form-control" value="" placeholder="{{ __('instalment.installment_time') }} "/>
                                </div>


                                <div class="col-sm-6">
                                    <label>{{ __('instalment.installment_charge') }}</label>
                                    <input name="charge" id="charge" type="text" class="form-control bold" value="" placeholder="{{ __('instalment.installment_charge') }}"/>
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

        var url = '{{ url('/admin/manage-instalment') }}';
        //display modal form for product editing
        $(document).on('click','.open_modal',function(){
            var product_id = $(this).attr("id");

            $.get(url + '/' + product_id, function (data) {
                //success data
                console.log(data);
                $('#product_id').val(data.id);
                $('#name').val(data.name);
                $('#duration').val(data.duration);
                $('#time').val(data.time);
                $('#charge').val(data.charge);
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
                company_id: $('#company_id').val(),
                name: $('#name').val(),
                duration: $('#duration').val(),
                time: $('#time').val(),
                charge: $('#charge').val()

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

                    // console.log(data);
                    // var product = '<tr id="product' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.duration + ' - Month</td><td>' + data.time + ' - Times</td><td>' + data.charge + '%</td><td>' + data.difference + ' - Days</td>';
                    // product += '<td><button class="btn btn-primary btn-detail open_modal font-weight-bold uppercase" value="' + data.id + '"><i class="fa fa-edit"></i> EDIT</button> </td></tr>';
                    //
                    // if (state == "add"){ //if user added a new record
                    //     $('#products-list').append(product);
                    // }else{ //if user updated an existing record
                    //     $("#product" + product_id).replaceWith( product );
                    // }
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
                toastr.success('Successfully Instalment Saved.');
            });
        });
    </script>

@endsection