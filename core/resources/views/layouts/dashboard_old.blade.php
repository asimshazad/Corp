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
    <link rel="stylesheet" href="{{ asset('assets/admin/css/responsive.dataTables.css') }}">

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
                    <a href="{{ route('dashboard') }}" class="navbar-brand">
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
                        <a href="{{ route('upcoming-instalment-repayment') }}" class="nav-link nav-link-label" title="Instalment Repayment"><i class="ficon ft-sliders"></i>
                            <span class="badge badge-pill badge-default badge-danger badge-default badge-up" >{{ $instalmentCount }}</span>
                        </a>
                    </li>

                    <li class="dropdown dropdown-notification nav-item">
                        <a href="{{ route('upcoming-due-repayment') }}" class="nav-link nav-link-label" title="Due Repayment"><i class="ficon ft-copy"></i>
                            <span class="badge badge-pill badge-default badge-danger badge-default badge-up" >{{ $dueCount }}</span>
                        </a>
                    </li>

                    <li class="dropdown dropdown-user nav-item">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link">
                <span class="avatar avatar-online">
                  <img src="{{ asset('assets/images') }}/{{ Auth::user()->image }}" alt="avatar"><i></i></span>
                            <span class="user-name">{{ Auth::user()->name }} - {{ $basic->symbol }}{{ $basic->balance }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a href="{{ route('edit-profile') }}" class="dropdown-item"><i class="ft-edit-3"></i> Edit Profile</a>
                            <a href="{{ route('admin-change-password') }}" class="dropdown-item"><i class="ft-check-square"></i> Change Password</a>
                            <div class="dropdown-divider"></div><a href="{{ route('admin.logout') }}" class="dropdown-item"><i class="ft-power"></i> Logout</a>
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
            <!--
            <li class=" navigation-header">
                <span>General</span><i data-toggle="tooltip" data-placement="right" data-original-title="General" class=" ft-minus"></i>
            </li>
            -->
            <li class="{{ Request::is('admin-dashboard') ? 'active' : '' }} nav-item">
                <a href="{{ route('dashboard') }}"><i class="ft-home"></i><span data-i18n="" class="menu-title">{{ __('sidebar.dashboard') }}</span></a>
            </li>


           {{-- <li class="{{ Request::is('admin/manage-instalment') ? 'active' : '' }} nav-item">
                <a href="{!! route('manage-instalment') !!}"><i class="ft-sliders"></i><span data-i18n="" class="menu-title">{{ __('sidebar.manage_installment') }}</span></a>
            </li>
--}}

            <li class="{{ Request::is('admin/instalment-repayment-history') ? 'active' : '' }} nav-item">
                <a href="{!! route('instalment-repayment-history') !!}"><i class="ft-sliders"></i><span data-i18n="" class="menu-title">{{ __('sidebar.payment_history') }}</span></a>
            </li>


            <li class="{{ Request::is('admin/due-repayment-history') ? 'active' : '' }} nav-item">
                <a href="{{ route('due-repayment-history') }}"><i class="ft-copy"></i><span data-i18n="" class="menu-title">{{ __('sidebar.due_payment') }}</span></a>
            </li>


            <li class="{{ Request::is('admin/sell-history') ? 'active' : '' }} nav-item">
                <a href="{{ route('sell-history') }}"><i class="ft-shopping-cart"></i><span data-i18n="" class="menu-title">{{ __('sidebar.sell_history') }}</span></a>
            </li>




            <li class="{{ Request::is('admin/customer-history') ? 'active' : '' }} nav-item">
                <a href="{{ route('customer-history') }}"><i class="ft-users"></i><span data-i18n="" class="menu-title">{{ __('sidebar.manage_customer') }}</span></a>
            </li>


            <li class="{{ Request::is('admin/account-history') ? 'active' : '' }} nav-item">
                <a href="{{ route('account-history') }}"><i class="ft-credit-card"></i><span data-i18n="" class="menu-title">{{ __('sidebar.account_history') }}</span></a>
            </li>


            <li class="{{ Request::is('admin/product-history') ? 'active' : '' }} nav-item">
                <a href="{{ route('product-history') }}"><i class="ft-box"></i><span data-i18n="" class="menu-title">{{ __('sidebar.product_history') }}</span></a>
            </li>



            <li class="{{ Request::is('admin/store-history') ? 'active' : '' }} nav-item">
                <a href="{{ route('store-history') }}"><i class="ft-layers"></i><span data-i18n="" class="menu-title">{{ __('sidebar.store_history') }}</span></a>
            </li>

            <li class="{{ Request::is('admin/payment-history') ? 'active' : '' }} nav-item">
                <a href="{{ route('payment-history') }}"><i class="ft-server"></i><span data-i18n="" class="menu-title">{{ __('sidebar.company_payments') }}</span></a>
            </li>


            <!--

 <li class=" nav-item"><a href="#"><i class="ft-grid"></i><span data-i18n="" class="menu-title">{{ __('sidebar.instalment_payment') }} </span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('admin/manage-instalment') ? 'active' : '' }}"><a href="{{ route('manage-instalment') }}" class="menu-item">{{ __('sidebar.manage_installment') }}</a></li>
                    <li class="{{ Request::is('admin/upcoming-instalment-repayment') ? 'active' : '' }}"><a href="{{ route('upcoming-instalment-repayment') }}" class="menu-item">{{ __('sidebar.upcoming_payment') }}</a></li>
                    <li class="{{ Request::is('admin/instalment-repayment') ? 'active' : '' }}"><a href="{{ route('instalment-repayment') }}" class="menu-item">{{ __('sidebar.new_payment') }}</a></li>
                    <li class="{{ Request::is('admin/instalment-repayment-history') ? 'active' : '' }}"><a href="{{ route('instalment-repayment-history') }}" class="menu-item">{{ __('sidebar.payment_history') }}</a></li>
                </ul>
            </li>


  <li class=" nav-item"><a href="#"><i class="ft-copy"></i><span data-i18n="" class="menu-title">{{ __('sidebar.due_payment') }}</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('admin/upcoming-due-repayment') ? 'active' : '' }}"><a href="{{ route('upcoming-due-repayment') }}" class="menu-item">{{ __('sidebar.upcoming_repayment') }}</a></li>
                    <li class="{{ Request::is('admin/due-repayment') ? 'active' : '' }}"><a href="{{ route('due-repayment') }}" class="menu-item">{{ __('sidebar.due_repayment') }}</a></li>
                    <li class="{{ Request::is('admin/due-repayment-history') ? 'active' : '' }}"><a href="{{ route('due-repayment-history') }}" class="menu-item">{{ __('sidebar.repayment_history') }}</a></li>
                </ul>
            </li>


  <li class="nav-item"><a href="#"><i class="ft-server"></i><span data-i18n="" class="menu-title"> {{ __('sidebar.manage_company') }} </span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('admin/manage-company') ? 'active' : '' }}"><a href="{{ route('manage-company') }}" class="menu-item">{{ __('sidebar.manage_company') }} </a></li>
                    <li class="{{ Request::is('admin/payment-new') ? 'active' : '' }}"><a href="{{ route('payment-new') }}" class="menu-item">{{ __('sidebar.new_payment') }} </a></li>
                    <li class="{{ Request::is('admin/payment-history') ? 'active' : '' }}"><a href="{{ route('payment-history') }}" class="menu-item">{{ __('sidebar.payment_history') }}</a></li>
                </ul>
            </li>


              <li class=" nav-item"><a href="#"><i class="ft-layers"></i><span data-i18n="" class="menu-title">{{ __('sidebar.manage_store') }} </span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('admin/current-store') ? 'active' : '' }}"><a href="{{ route('current-store') }}" class="menu-item">{{ __('sidebar.current_store') }} </a></li>
                    <li class="{{ Request::is('admin/store-new') ? 'active' : '' }}"><a href="{{ route('store-new') }}" class="menu-item">{{ __('sidebar.new_store') }} </a></li>
                    <li class="{{ Request::is('admin/store-history') ? 'active' : '' }}"><a href="{{ route('store-history') }}" class="menu-item">{{ __('sidebar.store_history') }}</a></li>
                </ul>
            </li>


             <li class=" nav-item"><a href="#"><i class="ft-box"></i><span data-i18n="" class="menu-title">{{ __('sidebar.manage_product') }} </span></a>
                <ul class="menu-content">

                    <li class="{{ Request::is('admin/manage-category') ? 'active' : '' }}"><a href="{{ route('manage-category') }}" class="menu-item"> {{ __('sidebar.product_category') }}</a></li>
                    <li class="{{ Request::is('admin/product-new') ? 'active' : '' }}"><a href="{{ route('product-new') }}" class="menu-item"> {{ __('sidebar.new_product') }}</a></li>
                    <li class="{{ Request::is('admin/product-history') ? 'active' : '' }}"><a href="{{ route('product-history') }}" class="menu-item"> {{ __('sidebar.product_history') }}</a></li>
                </ul>
            </li>

            <li class=" nav-item" style="display: none"><a href="#"><i class="ft-shopping-cart"></i><span data-i18n="" class="menu-title">{{ __('sidebar.sell_product') }} </span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('admin/sell-new') ? 'active' : '' }}"><a href="{{ route('sell-new') }}" class="menu-item">{{ __('sidebar.new_sell') }}</a></li>
                    <li class="{{ Request::is('admin/sell-history') ? 'active' : '' }}"><a href="{{ route('sell-history') }}" class="menu-item">{{ __('sidebar.sell_history') }}</a></li>
                </ul>
            </li>
            <li class=" nav-item" style="display: none">
                <a href="#"><i class="ft-users"></i><span data-i18n="" class="menu-title">{{ __('sidebar.manage_customer') }}</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('admin/customer-new') ? 'active' : '' }}"><a href="{{ route('customer-new') }}" class="menu-item">{{ __('sidebar.new_customer') }}</a></li>
                    <li class="{{ Request::is('admin/customer-history') ? 'active' : '' }}"><a href="{{ route('customer-history') }}" class="menu-item">{{ __('sidebar.customer_history') }}</a></li>
                </ul>
            </li>
            <li class="nav-item" style="display: none;"><a href="#"><i class="ft-credit-card"></i><span data-i18n="" class="menu-title">{{ __('sidebar.manage_account') }}</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('admin/mange-account') ? 'active' : '' }}"><a href="{{ route('mange-account') }}" class="menu-item">{{ __('sidebar.new_action') }} </a></li>
                    <li class="{{ Request::is('admin/account-history') ? 'active' : '' }}"><a href="{{ route('account-history') }}" class="menu-item">{{ __('sidebar.account_history') }}</a></li>
                </ul>
            </li>

            -->



            <!--

            <li class="{{ Request::is('admin/manage-company') ? 'active' : '' }} nav-item">
                <a href="{!! route('manage-company') !!}"><i class="ft-server"></i><span data-i18n="" class="menu-title">{{ __('sidebar.manage_company') }}</span></a>
            </li>
            -->






            <!--
            <li class="{{ Request::is('admin/manage-category') ? 'active' : '' }} nav-item">
                <a href="{!! route('manage-category') !!}"><i class="ft-grid"></i><span data-i18n="" class="menu-title">{{ __('sidebar.product_category') }}</span></a>
            </li>
            -->




            <!--
            <li class="{{ Request::is('admin/manage-staff') ? 'active' : '' }} nav-item">
                <a href="{{ route('manage-staff') }}"><i class="ft-user-check"></i><span data-i18n="" class="menu-title">{{ __('sidebar.manage_staff') }}</span></a>
            </li>
            -->

            <li class="{{ Request::is('transaction-log') ? 'active' : '' }} nav-item">
                <a href="{{ route('transaction-log') }}"><i class="ft-activity"></i><span data-i18n="" class="menu-title">{{ __('sidebar.transaction_log') }}</span></a>
            </li>

            <!--
            <li class="navigation-header">
                <span>Basic Control</span><i data-toggle="tooltip" data-placement="right" data-original-title="Components" class=" ft-minus"></i>
            </li>
            <li class="{{ Request::is('admin/basic-setting') ? 'active' : '' }} nav-item">
                <a href="{!! route('basic-setting') !!}"><i class="fa fa-cogs" aria-hidden="true"></i><span data-i18n="" class="menu-title">{{ __('sidebar.basic_setup') }}</span></a>
            </li>

           <li class="{{ Request::is('admin/email-template') ? 'active' : '' }} nav-item">
                <a href="{!! route('email-template') !!}"><i class="fa fa-envelope-open-o"></i><span data-i18n="" class="menu-title">{{ __('sidebar.email_template') }}</span></a>
            </li>
            <li class="{{ Request::is('admin/sms-setting') ? 'active' : '' }} nav-item">
                <a href="{!! route('sms-setting') !!}"><i class="fa fa-cog"></i><span data-i18n="" class="menu-title">SMS API</span></a>
            </li>
            <li class="{{ Request::is('admin/cron-job') ? 'active' : '' }} nav-item">
                <a href="{!! route('cron-job') !!}"><i class="fa fa-comments-o"></i><span data-i18n="" class="menu-title">Cron Config</span></a>
            </li>
            <li class=" navigation-header">
                <span>Web Control</span><i data-toggle="tooltip" data-placement="right" data-original-title="Components" class=" ft-minus"></i>
            </li>
            <li class="{{ Request::is('admin/manage-logo') ? 'active' : '' }} nav-item">
                <a href="{!! route('manage-logo') !!}"><i class="fa fa-picture-o"></i><span data-i18n="" class="menu-title">{{ __('sidebar.manage_logo') }}</span></a>
            </li>
            <li class="{{ Request::is('admin/manage-footer') ? 'active' : '' }} nav-item">
                <a href="{!! route('manage-footer') !!}"><i class="fa fa-sitemap"></i><span data-i18n="" class="menu-title">{{ __('sidebar.manage_footer') }}</span></a>
            </li>
            -->
            {{--<li class="{{ Request::is('admin/manage-shortAbout') ? 'active' : '' }} nav-item">
                <a href="{!! route('manage-shortAbout') !!}"><i class="fa fa-address-card-o"></i><span data-i18n="" class="menu-title">Short About</span></a>
            </li>
            <li class="{{ Request::is('admin/manage-social') ? 'active' : '' }} nav-item">
                <a href="{!! route('manage-social') !!}"><i class="fa fa-share-square-o"></i><span data-i18n="" class="menu-title">Manage Social</span></a>
            </li>
            <li class="{{ Request::is('admin/manage-slider') ? 'active' : '' }} nav-item">
                <a href="{!! route('manage-slider') !!}"><i class="fa fa-sliders"></i><span data-i18n="" class="menu-title">Manage Slider</span></a>
            </li>
            <li class="{{ Request::is('admin/manage-parallax') ? 'active' : '' }} nav-item">
                <a href="{!! route('manage-parallax') !!}"><i class="fa fa-file-image-o"></i><span data-i18n="" class="menu-title">Parallex Image</span></a>
            </li>
            <li class="{{ Request::is('admin/speciality-control') ? 'active' : '' }} nav-item">
                <a href="{!! route('speciality-control') !!}"><i class="ft-grid"></i><span data-i18n="" class="menu-title">Manage Speciality</span></a>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-monitor"></i><span data-i18n="" class="menu-title">Testimonial</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('admin/testimonial-create') ? 'active' : '' }}"><a href="{{ route('testimonial-create') }}" class="menu-item">New Testimonial</a></li>
                    <li class="{{ Request::is('admin/testimonial-all') ? 'active' : '' }}"><a href="{{ route('testimonial-all') }}" class="menu-item">All Testimonial</a></li>
                </ul>
            </li>--}}

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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('sidebar.dashboard') }}</a>
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
      <span class="float-md-right d-block d-md-inline-block">0304-7799234</span>
    </p>
</footer>

<script src="{{ asset('assets/admin/js/vendors.min.js') }}" type="text/javascript"></script>
@yield('vendors')
<script src="{{ asset('assets/admin/js/app-menu.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js/toastr.js') }}"></script>
<script src="{{ asset('assets/admin/js/dataTables.responsive.js') }}"></script>
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