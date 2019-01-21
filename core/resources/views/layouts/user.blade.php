<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="keywords" content="{{ $basic->meta_tag }}">
    <title>{{ $site_title }} | {{ $page_title }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/unslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/climacons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/fonts/meteocons/style.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/app.css') }}">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/fonts/simple-line-icons/style.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.min.css') }}">
    <!-- END Custom CSS-->
    @yield('style')
</head>
<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar">
<!-- - var navbarShadow = true-->
<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-light bg-gradient-x-grey-blue">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="navbar-brand">
                        <img alt="stack admin logo" src="{{ asset('assets/images/logo.png') }}" style="height: 36px" class="brand-logo">
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="fa fa-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div id="navbar-mobile" class="collapse navbar-collapse">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="ft-menu"></i></a></li>
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link nav-link-expand"><i class="ficon ft-maximize"></i></a></li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link">
                <span class="avatar avatar-online">
                  @if(Auth::user()->image != null)
                    <img src="{{ asset('assets/images') }}/{{ Auth::user()->image }}" alt="avatar">
                    @else
                        <img src="{{ asset('assets/images/user-default.png') }}" alt="avatar">
                    @endif
                    <i></i></span>
                            <span class="user-name">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a href="{{ route('user-edit-profile') }}" class="dropdown-item"><i class="ft-edit-3"></i> Edit Profile</a>
                            <a href="{{ route('user-change-password') }}" class="dropdown-item"><i class="ft-check-square"></i> Change Password</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item"><i class="ft-power"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
@php
    $userId = Auth::user()->id;
    $newSignal = App\UserSignal::whereUser_id($userId)->whereStatus(0)->count();
    $allSignal = App\UserSignal::whereUser_id($userId)->count();
@endphp
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-light menu-accordion menu-shadow">
    <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            <li class=" navigation-header">
                <span>General</span><i data-toggle="tooltip" data-placement="right" data-original-title="General" class=" ft-minus"></i>
            </li>
            <li class="{{ Request::is('user-dashboard') ? 'active' : '' }} nav-item">
                <a href="{{ route('user-dashboard') }}"><i class="ft-home"></i><span data-i18n="" class="menu-title">Dashboard</span></a>
            </li>
            <li class="navigation-header">
                <span>Manage Signal</span><i data-toggle="tooltip" data-placement="right" data-original-title="Components" class=" ft-minus"></i>
            </li>
            <li class="{{ Request::is('user/new-signal') ? 'active' : '' }} nav-item">
                <a href="{!! route('user-new-signal') !!}"><i class="ft-trending-up"></i>
                    <span data-i18n="" class="menu-title">New Signal</span>
                    <span class="badge badge badge-pill badge-warning float-right">{{$newSignal}}</span>
                </a>
            </li>
            <li class="{{ Request::is('user/all-signal') ? 'active' : '' }} nav-item">
                <a href="{!! route('user-all-signal') !!}"><i class="ft-bar-chart-2"></i>
                    <span data-i18n="" class="menu-title">All Signal</span>
                    <span class="badge badge badge-pill badge-warning float-right">{{$allSignal}}</span>
                </a>
            </li>

            @if(Auth::user()->plan_status == 1 and Auth::user()->plan->telegram_status == 1)
                <li class="navigation-header">
                    <span>Manage Telegram</span><i data-toggle="tooltip" data-placement="right" data-original-title="Components" class=" ft-minus"></i>
                </li>
                <li class="{{ Request::is('user/active-telegram') ? 'active' : '' }} nav-item">
                    <a href="{!! route('active-telegram') !!}"><i class="ft-check-circle"></i><span data-i18n="" class="menu-title">Active Telegram</span></a>
                </li>
            @endif


            <li class="navigation-header">
                <span>Become Provider</span><i data-toggle="tooltip" data-placement="right" data-original-title="Components" class=" ft-minus"></i>
            </li>
            @if(Auth::user()->signal_status == 0 or Auth::user()->signal_status == 2 or Auth::user()->signal_status == 3)
                <li class="{{ Request::is('user/staff-request') ? 'active' : '' }} nav-item">
                    <a href="{{ route('user-staff-request') }}"><i class="ft-upload-cloud"></i><span data-i18n="" class="menu-title">Send Request</span></a>
                </li>
            @else
                <li class="{{ Request::is('transaction-log') ? 'active' : '' }} nav-item">
                    <a href="{{ route('user-transaction-log') }}"><i class="ft-zap"></i><span data-i18n="" class="menu-title">Transaction Log</span></a>
                </li>
                <li class="{{ Request::is('user/submit-signal') ? 'active' : '' }} nav-item">
                    <a href="{{ route('user-submit-signal') }}"><i class="ft-upload-cloud"></i><span data-i18n="" class="menu-title">Submit Signal</span></a>
                </li>
                <li class="{{ Request::is('user/submit-history') ? 'active' : '' }} nav-item">
                    <a href="{{ route('submit-history') }}"><i class="ft-repeat"></i><span data-i18n="" class="menu-title">Signal History</span></a>
                </li>
                <li class="navigation-header">
                    <span>Manage Withdraw</span><i data-toggle="tooltip" data-placement="right" data-original-title="Components" class=" ft-minus"></i>
                </li>
                <li class="{{ Request::is('user/withdraw-now') ? 'active' : '' }} nav-item">
                    <a href="{{ route('user-withdraw-now') }}"><i class="ft-upload-cloud"></i><span data-i18n="" class="menu-title">Withdraw Now</span></a>
                </li>
                <li class="{{ Request::is('user/withdraw-history') ? 'active' : '' }} nav-item">
                    <a href="{{ route('user-withdraw-history') }}"><i class="ft-repeat"></i><span data-i18n="" class="menu-title">Withdraw History</span></a>
                </li>
            @endif
            <li class="navigation-header">
                <span>Manage Profile</span><i data-toggle="tooltip" data-placement="right" data-original-title="Components" class=" ft-minus"></i>
            </li>
            <li class="{{ Request::is('user-edit-profile') ? 'active' : '' }} nav-item">
                <a href="{!! route('user-edit-profile') !!}"><i class="ft-upload"></i><span data-i18n="" class="menu-title">Update Profile</span></a>
            </li>
            <li class="nav-item">
                <a href="{!! route('user-edit-profile') !!}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="ft-users"></i><span data-i18n="" class="menu-title">Log Out</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>

        </ul>
    </div>
</div>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">{{ $page_title }}</h3>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('user-dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">{{ $page_title }}</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">

            @if($errors->any())
                @foreach ($errors->all() as $error)

                    <div class="alert alert-icon-left alert-warning alert-dismissible mb-1" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {!!  $error !!}
                    </div>

                @endforeach
            @endif

            @yield('content')

        </div>
    </div>
</div>

<footer class="footer footer-static footer-dark navbar-border">
    <p class="clearfix text-sm-center mb-0 px-2">
        <span class="float-md-left d-block d-md-inline-block">{!! $basic->copy_text !!}</span>
        <span class="float-md-right d-block d-md-inline-block">Version : v1.0.2</span>
    </p>
</footer>

<script src="{{ asset('assets/admin/js/vendors.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js/unslider-min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js/app-menu.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js/toastr.js') }}"></script>


<script>
            @if(Session::has('message'))
    var type = "{{ Session::get('type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
@yield('scripts')

</body>
</html>