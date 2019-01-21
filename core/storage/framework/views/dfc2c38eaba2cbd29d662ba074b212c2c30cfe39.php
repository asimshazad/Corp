<div class="navbar navbar-expand-md navbar-light">
    <div class="text-center d-md-none w-100">
        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-navigation">
            <i class="icon-unfold mr-2"></i>
            Navigation
        </button>
    </div>

    <div class="navbar-collapse collapse" id="navbar-navigation">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="<?php echo e(route('dashboard')); ?>" class="navbar-nav-link active">
                    <i class="icon-home4 mr-2"></i>
                    <?php echo e(__('sidebar.dashboard')); ?>

                </a>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-strategy mr-2"></i>
                    Payments
                </a>
                <div class="dropdown-menu">
                    <a href="<?php echo e(route('upcoming-instalment-repayment')); ?>" class="dropdown-item <?php echo e(Request::is('admin/upcoming-instalment-repayment') ? 'active' : ''); ?>"><i class="icon-align-center-horizontal"></i> Upcoming Repayment </a>
                    <a href="<?php echo e(route('instalment-repayment')); ?>" class="dropdown-item <?php echo e(Request::is('admin/instalment-repayment') ? 'active' : ''); ?>"><i class="icon-align-center-horizontal"></i> New Repayment</a>
                    <a href="<?php echo e(route('instalment-repayment-history')); ?>" class="dropdown-item <?php echo e(Request::is('admin/instalment-repayment-history') ? 'active' : ''); ?>"><i class="icon-align-center-horizontal"></i> Repayment History</a>


                    <div class="dropdown-header">Due Payments</div>

                    <a href="<?php echo e(route('upcoming-due-repayment')); ?>" class="dropdown-item <?php echo e(Request::is('admin/upcoming-due-repayment') ? 'active' : ''); ?>"><i class="icon-align-center-horizontal"></i> Upcoming Due Repayment </a>
                    <a href="<?php echo e(route('instalment-repayment')); ?>" class="dropdown-item <?php echo e(Request::is('admin/due-repayment') ? 'active' : ''); ?>"><i class="icon-align-center-horizontal"></i> Due Repayment</a>
                    <a href="<?php echo e(route('due-repayment-history')); ?>" class="dropdown-item <?php echo e(Request::is('admin/due-repayment-history') ? 'active' : ''); ?>"><i class="icon-align-center-horizontal"></i> Repayment History</a>
                    <div class="dropdown-header">Company Payments</div>


                    <a href="<?php echo e(route('payment-new')); ?>" class="dropdown-item <?php echo e(Request::is('admin/payment-new') ? 'active' : ''); ?>"><i class="icon-align-center-horizontal"></i> New Payment </a>
                    <a href="<?php echo e(route('payment-history')); ?>" class="dropdown-item <?php echo e(Request::is('admin/payment-history') ? 'active' : ''); ?>"><i class="icon-align-center-horizontal"></i> Payment History</a>



                </div>
            </li>






            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-strategy mr-2"></i>
                    Products
                </a>
                <div class="dropdown-menu">
                    <a href="<?php echo e(route('sell-new')); ?>" class="dropdown-item <?php echo e(Request::is('admin/sell-new') ? 'active' : ''); ?>"><i class="icon-align-center-horizontal"></i> New Sell </a>
                    <a href="<?php echo e(route('sell-history')); ?>" class="dropdown-item <?php echo e(Request::is('admin/sell-history') ? 'active' : ''); ?>"><i class="icon-align-center-horizontal"></i> Sell History</a>

                    <a href="<?php echo e(route('product-new')); ?>" class="dropdown-item <?php echo e(Request::is('admin/product-new') ? 'active' : ''); ?>">
                        <i class="icon-align-center-horizontal"></i> New Product
                    </a>
                    <a href="<?php echo e(route('product-history')); ?>" class="dropdown-item <?php echo e(Request::is('admin/product-history') ? 'active' : ''); ?>">
                        <i class="icon-align-center-horizontal"></i> Product History
                    </a>
                    <a href="<?php echo route('manage-category'); ?>" class="dropdown-item <?php echo e(Request::is('admin/manage-category') ? 'active' : ''); ?>">
                        <i class="icon-align-center-horizontal"></i> Product Category
                    </a>

                    <a href="<?php echo route('manage-company'); ?>" class="dropdown-item <?php echo e(Request::is('admin/manage-company') ? 'active' : ''); ?>">
                        <i class="icon-align-center-horizontal"></i> Manage Company
                    </a>




                </div>
            </li>


            <li class="nav-item">
                <a href="<?php echo e(route('customer-history')); ?>" class="navbar-nav-link">
                    <i class="icon-align-center-horizontal"></i>
                    <?php echo e(__('sidebar.customers')); ?>

                </a>
            </li>








            <li class="nav-item">
               
               
            </li>




           






            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-strategy mr-2"></i>
                    <?php echo app('translator')->getFromJson('common.store'); ?>
                </a>
                <div class="dropdown-menu">
                    <a href="<?php echo e(route('current-store')); ?>" class="dropdown-item <?php echo e(Request::is('admin/current-store') ? 'active' : ''); ?>">
                        <i class="icon-align-center-horizontal"></i> Current Store
                    </a>
                    <a href="<?php echo e(route('store-new')); ?>" class="dropdown-item <?php echo e(Request::is('admin/store-new') ? 'active' : ''); ?>">
                        <i class="icon-align-center-horizontal"></i> New Store
                    </a>
                    <a href="<?php echo e(route('store-history')); ?>" class="dropdown-item <?php echo e(Request::is('admin/store-history') ? 'active' : ''); ?>">
                        <i class="icon-align-center-horizontal"></i> Store History
                    </a>
                </div>
            </li>







            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-strategy mr-2"></i>
                    <?php echo app('translator')->getFromJson('common.accounts'); ?>
                </a>
                <div class="dropdown-menu">
                    <a href="<?php echo e(route('mange-account')); ?>" class="dropdown-item <?php echo e(Request::is('admin/mange-account') ? 'active' : ''); ?>"><i class="icon-align-center-horizontal"></i> New Action </a>
                    <a href="<?php echo e(route('account-history')); ?>" class="dropdown-item <?php echo e(Request::is('admin/account-history') ? 'active' : ''); ?>"><i class="icon-align-center-horizontal"></i> Account History</a>
                </div>
            </li>




            <li class="nav-item">
                <a href="<?php echo e(route('manage-instalment')); ?>" class="navbar-nav-link <?php echo e(Request::is('admin/manage-instalment') ? 'active' : ''); ?>">
                    <i class="icon-strategy mr-2"></i>
                    <?php echo app('translator')->getFromJson('common.instalments'); ?>
                </a>
            </li>


            <li class="nav-item">
                <a href="<?php echo e(route('manage-staff')); ?>" class="navbar-nav-link <?php echo e(Request::is('admin/manage-staff') ? 'active' : ''); ?>">
                    <i class="icon-strategy mr-2"></i>
                    <?php echo app('translator')->getFromJson('common.staff'); ?>
                </a>
            </li>


            <li class="nav-item">
                <a href="<?php echo e(route('salaries')); ?>" class="navbar-nav-link">
                    <i class="icon-align-center-horizontal"></i>
                    <?php echo e(__('sidebar.salaries')); ?>

                </a>
            </li>


            <li class="nav-item">
                <a href="<?php echo e(route('transaction-log')); ?>" class="navbar-nav-link <?php echo e((\Route::current()->getName() == 'transaction-log' ?'active':'')); ?>">
                    <i class="icon-strategy mr-2"></i>
                    <?php echo app('translator')->getFromJson('common.log'); ?>
                </a>
            </li>

        </ul>

    </div>
</div>