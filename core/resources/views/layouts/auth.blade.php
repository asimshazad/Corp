<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{--<title>{{ $site_title }} | {{ $page_title }}</title>--}}
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/global_assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('assets/global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

</head>
<body>
<div class="page-content">
    <div class="content-wrapper">
        <div class="content d-flex justify-content-center align-items-center">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
