<div class="page-header">
    <div class="breadcrumb-line breadcrumb-line-light bg-white breadcrumb-line-component header-elements-md-inline mb-4 mt-4">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="<?php echo e(url('dashboard')); ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active"><?php echo $__env->yieldContent('name'); ?></span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>


        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">

                <?php if (! empty(trim($__env->yieldContent('add_record')))): ?>
                    <button type="button" class="btn btn-outline alpha-purple text-purple-800" id="btn_add"><i
                                class="icon-plus3"></i> <?php echo app('translator')->getFromJson('common.add'); ?></button>
                <?php endif; ?>

                <?php if (! empty(trim($__env->yieldContent('add_new_customer')))): ?>
                    <a href="<?php echo e(route('customer-new')); ?>" class="btn btn-outline alpha-purple text-purple-800">
                        <i class="icon-plus3"></i> <?php echo app('translator')->getFromJson('common.add'); ?>
                    </a>
                <?php endif; ?>


            </div>
        </div>
    </div>
</div>




