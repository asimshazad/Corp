

<?php $__env->startSection('content'); ?>


    <form class="login-form" action="<?php echo e(route('admin.login.post')); ?>" method="post" novalidate>
        <?php if(session()->has('message')): ?>
            <div class="alert bg-warning text-white alert-styled-left alert-dismissible">
            <?php echo e(session()->get('message')); ?>

            </div>

        <?php endif; ?>
        <?php if($errors->any()): ?>
            <div class="alert bg-warning text-white alert-styled-left alert-dismissible">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="font-weight-semibold">Warning!</span>  <?php echo $error; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <?php echo csrf_field(); ?>

        <div class="card mb-0">
            <div class="card-body">
                <div class="text-center mb-3">
                    <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                    <h5 class="mb-0">Login to your account</h5>
                    <span class="d-block text-muted">Enter your credentials below</span>
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="email" name="email" class="form-control" id="user-name" placeholder="Enter Email"
                           required>
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="password" name="password" class="form-control" id="user-password"
                           placeholder="Enter Password" required>

                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Sign in <i
                                class="icon-circle-right2 ml-2"></i></button>
                </div>

                <div class="text-center">
                    <a href="<?php echo e(route('admin.password.request')); ?>">Forgot password?</a>
                </div>
            </div>
        </div>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>