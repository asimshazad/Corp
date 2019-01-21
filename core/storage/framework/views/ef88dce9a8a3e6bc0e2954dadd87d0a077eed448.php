<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="<?php echo e($basic->meta_tag); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e($site_title); ?> | <?php echo e($page_title); ?></title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/global_assets/css/icons/icomoon/styles.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/css/bootstrap_limitless.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/css/layout.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/css/components.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/css/colors.min.css')); ?>" rel="stylesheet" type="text/css">


    <!-- Core JS files -->

    <script src="<?php echo e(asset('assets/global_assets/js/main/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global_assets/js/main/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global_assets/js/plugins/loaders/blockui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global_assets/js/plugins/ui/slinky.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global_assets/js/plugins/tables/datatables/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global_assets/js/demo_pages/datatables_basic.js')); ?>"></script>

    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="<?php echo e(asset('assets/global_assets/js/plugins/visualization/d3/d3.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global_assets/js/plugins/visualization/d3/d3_tooltip.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global_assets/js/plugins/forms/styling/switchery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global_assets/js/plugins/ui/moment/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global_assets/js/plugins/pickers/daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global_assets/js/demo_pages/dashboard.js')); ?>"></script>
    <!--<script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>-->


<?php echo $__env->yieldContent('scripts'); ?>

    <!-- /theme JS files -->

</head>

<body>

<!-- Top header navbar -->
<?php echo $__env->make('partials.top_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- /Top header navbar -->


<!-- Top navbar -->
<?php echo $__env->make('partials.top_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- /Top navbar -->


<!-- Page header -->
<?php echo $__env->make('partials.page_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- /page header -->


<!-- Page content -->
<?php echo $__env->yieldContent('content'); ?>
<!-- /page content -->


<!-- Footer -->
<?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- /footer -->

</body>
</html>
