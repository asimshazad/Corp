<div class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-brand wmin-0 mr-5">
        <a href="{{ url('/') }}" class="d-inline-block">
            <img src="{{ asset('assets/global_assets/images/logo_light.png') }}" alt="">
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
           {{-- <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="../../../../global_assets/images/lang/gb.png" class="img-flag mr-2" alt="">
                    English
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item english"><img src="../../../../global_assets/images/lang/gb.png" class="img-flag" alt=""> English</a>
                    <a href="#" class="dropdown-item ukrainian"><img src="../../../../global_assets/images/lang/ua.png" class="img-flag" alt=""> Українська</a>
                    <a href="#" class="dropdown-item deutsch"><img src="../../../../global_assets/images/lang/de.png" class="img-flag" alt=""> Deutsch</a>
                    <a href="#" class="dropdown-item espana"><img src="../../../../global_assets/images/lang/es.png" class="img-flag" alt=""> España</a>
                    <a href="#" class="dropdown-item russian"><img src="../../../../global_assets/images/lang/ru.png" class="img-flag" alt=""> Русский</a>
                </div>
            </li>--}}

            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <span>{{ Auth::user()->name }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                    <a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
                    <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span class="badge badge-pill bg-blue ml-auto">58</span></a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>



                    <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('logout') }}" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</div>
