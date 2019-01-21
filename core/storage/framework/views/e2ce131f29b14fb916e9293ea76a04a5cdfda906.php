<div class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-brand wmin-0 mr-5">
        <a href="<?php echo e(url('/')); ?>" class="d-inline-block">
            <img src="<?php echo e(asset('assets/global_assets/images/logo_light.png')); ?>" alt="">
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">


        <span class="navbar-text ml-md-3 mr-md-auto">
			</span>

        <ul class="navbar-nav">
           

            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <span><?php echo e(Auth::user()->name); ?></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                    <a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
                    <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span class="badge badge-pill bg-blue ml-auto">58</span></a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>

                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo e(csrf_field()); ?>

                    </form>



                    <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="<?php echo e(route('logout')); ?>" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</div>
