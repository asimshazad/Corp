<?php $__env->startSection('name'); ?><?php echo app('translator')->getFromJson('common.salary'); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('add_record'); ?><?php echo app('translator')->getFromJson('common.salary'); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="page-content pt-0">
        <div class="content-wrapper">
            <div class="content">
                <div class="card">

                    <table class="table datatable-basic table-bordered table-striped table-hover dataTable no-footer">
                        <thead>
                        <tr>
                            <th><?php echo e(__('common.id')); ?></th>
                            <th><?php echo e(__('common.name')); ?></th>
                            <th><?php echo e(__('common.amount')); ?></th>
                            <th><?php echo e(__('common.note')); ?></th>
                            <th><?php echo e(__('common.created_date')); ?></th>
                            <th class="text-center"><?php echo e(__('customer.action')); ?></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $__currentLoopData = $salaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($p->id); ?></td>
                                <td><?php echo e($p->staff['name']); ?></td>
                                <td><?php echo e($p->paid); ?></td>
                                <td><?php echo e($p->note); ?></td>
                                <td><?php echo e(\Carbon\Carbon::parse($p->created_at)->format('dS M,y')); ?></td>
                                <td class="text-center">

                                    <a href="<?php echo e(route('customer-edit',$p->id)); ?>" id="<?php echo e($p->id); ?>"  class="list-icons-item"  title="<?php echo e(__('common.edit')); ?>" data-container="body">
                                        <i class="icon-pencil7"></i>
                                    </a>

                                    <a href="<?php echo e(route('customer-view',$p->id)); ?>" id="<?php echo e($p->id); ?>"  class="list-icons-item"  title="<?php echo e(__('common.view')); ?>" data-container="body">
                                        <i class="icon-pencil7"></i>
                                    </a>



                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                    <h5 class="modal-title"><?php echo e(__('salary.manage')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form id="frmProducts" name="frmProducts" autocomplete="off" novalidate="">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label><?php echo e(__('salary.select_staff')); ?></label>
                                    <select class="form-control" name="staff_id" id="staff_id" required>
                                        <?php $__currentLoopData = $staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($p->id); ?>"><?php echo e($p->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="col-sm-6">
                                    <label><?php echo e(__('salary.paid')); ?></label>
                                    <input type="text" class="form-control " id="paid" name="paid" placeholder="<?php echo e(__('salary.paid')); ?>" value="" required>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label><?php echo e(__('salary.note')); ?></label>
                                    <input type="textarea" class="form-control" id="note" name="note" placeholder="<?php echo e(__('salary.note')); ?>" value="">
                                </div>

                            </div>
                        </div>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button value="add" type="button" id="btn-save" class="btn bg-primary"> <?php echo e(__('common.save')); ?></button>
                        <input type="hidden" id="product_id" name="product_id" value="0">
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

    <script>

        var url = '<?php echo e(url('/admin/save-salaries')); ?>';
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>