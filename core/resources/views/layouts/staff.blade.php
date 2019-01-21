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

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.min.css') }}">

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
                    <a href="{{ route('staff-dashboard') }}" class="navbar-brand">
                        <img alt="logo" src="{{ asset('assets/images/logo.png') }}" style="height: 36px" class="brand-logo">
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

                    <li class="dropdown dropdown-notification nav-item">
                        <a href="{{ route('staff-upcoming-instalment-repayment') }}" class="nav-link nav-link-label" title="Instalment Repayment"><i class="ficon ft-sliders"></i>
                            <span class="badge badge-pill badge-default badge-danger badge-default badge-up" >{{ $instalmentCount }}</span>
                        </a>
                    </li>

                    <li class="dropdown dropdown-notification nav-item">
                        <a href="{{ route('staff-upcoming-due-repayment') }}" class="nav-link nav-link-label" title="Due Repayment"><i class="ficon ft-copy"></i>
                            <span class="badge badge-pill badge-default badge-danger badge-default badge-up" >{{ $dueCount }}</span>
                        </a>
                    </li>

                    <li class="dropdown dropdown-user nav-item">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link">
                <span class="avatar avatar-online">
                  <img src="{{ asset('assets/images') }}/{{ Auth::user()->image }}" alt="avatar"><i></i></span>
                            <span class="user-name">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a href="{{ route('staff-edit-profile') }}" class="dropdown-item"><i class="ft-edit-3"></i> Edit Profile</a>
                            <a href="{{ route('staff-change-password') }}" class="dropdown-item"><i class="ft-check-square"></i> Change Password</a>
                            <div class="dropdown-divider"></div><a href="{{ route('staff.logout') }}" class="dropdown-item"><i class="ft-power"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div data-scroll-to-active="true" class="main-menu menu-fixed menu-light menu-accordion menu-shadow">
    <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            <li class=" navigation-header">
                <span>General</span><i data-toggle="tooltip" data-placement="right" data-original-title="General" class=" ft-minus"></i>
            </li>
            <li class="{{ Request::is('staff-dashboard') ? 'active' : '' }} nav-item">
                <a href="{{ route('staff-dashboard') }}"><i class="ft-home"></i><span data-i18n="" class="menu-title">Dashboard</span></a>
            </li>

            <li class=" nav-item"><a href="#"><i class="ft-sliders"></i><span data-i18n="" class="menu-title">Instalment Payment</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('staff/upcoming-instalment-repayment') ? 'active' : '' }}"><a href="{{ route('staff-upcoming-instalment-repayment') }}" class="menu-item">Upcoming Repayment</a></li>
                    <li class="{{ Request::is('staff/instalment-repayment') ? 'active' : '' }}"><a href="{{ route('staff-instalment-repayment') }}" class="menu-item">New Repayment</a></li>
                    <li class="{{ Request::is('staff/instalment-repayment-history') ? 'active' : '' }}"><a href="{{ route('staff-instalment-repayment-history') }}" class="menu-item">Repayment History</a></li>
                </ul>
            </li>

            <li class=" nav-item"><a href="#"><i class="ft-copy"></i><span data-i18n="" class="menu-title">Due Payment</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('staff/upcoming-due-repayment') ? 'active' : '' }}"><a href="{{ route('staff-upcoming-due-repayment') }}" class="menu-item">Upcoming Repayment</a></li>
                    <li class="{{ Request::is('staff/due-repayment') ? 'active' : '' }}"><a href="{{ route('staff-due-repayment') }}" class="menu-item">Due Repayment</a></li>
                    <li class="{{ Request::is('staff/due-repayment-history') ? 'active' : '' }}"><a href="{{ route('staff-due-repayment-history') }}" class="menu-item">Repayment History</a></li>
                </ul>
            </li>

            <li class=" nav-item"><a href="#"><i class="ft-shopping-cart"></i><span data-i18n="" class="menu-title">Sell Product</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('staff/sell-new') ? 'active' : '' }}"><a href="{{ route('staff-sell-new') }}" class="menu-item">New Sell</a></li>
                    <li class="{{ Request::is('staff/sell-history') ? 'active' : '' }}"><a href="{{ route('staff-sell-history') }}" class="menu-item">Sell History</a></li>
                </ul>
            </li>


            <li class=" nav-item"><a href="#"><i class="ft-users"></i><span data-i18n="" class="menu-title">Manage Customer</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('staff/customer-new') ? 'active' : '' }}"><a href="{{ route('staff-customer-new') }}" class="menu-item">New Customer</a></li>
                    <li class="{{ Request::is('staff/customer-history') ? 'active' : '' }}"><a href="{{ route('staff-customer-history') }}" class="menu-item">Customer History</a></li>
                </ul>
            </li>


            <li class="nav-item"><a href="#"><i class="ft-credit-card"></i><span data-i18n="" class="menu-title">Manage Expense</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('staff/mange-account') ? 'active' : '' }}"><a href="{{ route('new-expense') }}" class="menu-item">New Expense</a></li>
                    <li class="{{ Request::is('staff/expense-history') ? 'active' : '' }}"><a href="{{ route('expense-history') }}" class="menu-item">Expense History</a></li>
                </ul>
            </li>


            <li class=" nav-item"><a href="#"><i class="ft-layers"></i><span data-i18n="" class="menu-title">Manage Store</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('staff/current-store') ? 'active' : '' }}"><a href="{{ route('staff-current-store') }}" class="menu-item">Current Store</a></li>
                    <li class="{{ Request::is('staff/store-new') ? 'active' : '' }}"><a href="{{ route('staff-store-new') }}" class="menu-item">New Store</a></li>
                    <li class="{{ Request::is('staff/store-history') ? 'active' : '' }}"><a href="{{ route('staff-store-history') }}" class="menu-item">Store History</a></li>
                </ul>
            </li>

            <li class=" nav-item"><a href="#"><i class="ft-box"></i><span data-i18n="" class="menu-title">Manage Product</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('staff/product-new') ? 'active' : '' }}"><a href="{{ route('staff-product-new') }}" class="menu-item">New Product</a></li>
                    <li class="{{ Request::is('staff/product-history') ? 'active' : '' }}"><a href="{{ route('staff-product-history') }}" class="menu-item">Product History</a></li>
                </ul>
            </li>


            <li class="{{ Request::is('transaction-log') ? 'active' : '' }} nav-item">
                <a href="{{ route('staff-transaction-log') }}"><i class="ft-activity"></i><span data-i18n="" class="menu-title">Transaction Log</span></a>
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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
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
@yield('vendors')
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