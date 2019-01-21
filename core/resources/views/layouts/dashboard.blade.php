<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="{{ $basic->meta_tag }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $site_title }} | {{ $page_title }}</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/global_assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">


    <!-- Core JS files -->

    <script src="{{ asset('assets/global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <script src="{{ asset('assets/global_assets/js/plugins/ui/slinky.min.js') }}"></script>
    <script src="{{ asset('assets/global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/global_assets/js/demo_pages/datatables_basic.js') }}"></script>

    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('assets/global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script src="{{ asset('assets/global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
    <script src="{{ asset('assets/global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script src="{{ asset('assets/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
    <script src="{{ asset('assets/global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/global_assets/js/demo_pages/dashboard.js') }}"></script>
    <!--<script src="{{ asset('assets/js/custom.js') }}"></script>-->


@yield('scripts')

    <!-- /theme JS files -->

</head>

<body>

<!-- Top header navbar -->
@include('partials.top_header')
<!-- /Top header navbar -->


<!-- Top navbar -->
@include('partials.top_nav')
<!-- /Top navbar -->


<!-- Page header -->
@include('partials.page_header')
<!-- /page header -->


<!-- Page content -->
@yield('content')
<!-- /page content -->


<!-- Footer -->
@include('partials.footer')
<!-- /footer -->

</body>
</html>
