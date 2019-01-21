<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="keywords" content="{{ $basic->meta_tag }}">
    <title>{{ $site_title }} | Log In</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
          rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/custom.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/app.css') }}">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/login-register.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style.css') }}">
    <!-- END Custom CSS-->
</head>
<body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column   menu-expanded blank-page blank-page">

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-4 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 m-0">
                            <div class="card-header border-0">
                                <div class="card-title text-center">
                                    <div class="p-1">
                                        <img src="{{ asset('assets/images/logo.png') }}" alt="branding logo">
                                    </div>
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span>Enter Email Address To Reset Password </span>
                                </h6>
                            </div>

                            <div class="card-content">

                                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    @if (session()->has('message'))
                                        <div class="alert alert-{{ session()->get('type') }} alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            {{ session()->get('message') }}
                                        </div>
                                    @endif
                                    @if($errors->any())
                                        @foreach ($errors->all() as $error)

                                            <div class="alert alert-danger alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                {!!  $error !!}
                                            </div>
                                        @endforeach
                                    @endif
                                    <form class="form-horizontal form-simple" action="{{ route('staff.password.email') }}" method="post" novalidate>
                                        {!! csrf_field() !!}
                                        <fieldset class="form-group position-relative has-icon-left mb-0">
                                            <input type="email" name="email" class="form-control form-control-lg input-lg" id="user-name" placeholder="Enter Email" required>
                                            <div class="form-control-position">
                                                <i class="ft-mail"></i>
                                            </div>
                                        </fieldset>
                                        <br>
                                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="ft-unlock"></i> Reset Password</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<!-- BEGIN VENDOR JS-->
<script src="{{ asset('assets/admin/js/vendors.min.js') }}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ asset('assets/admin/js/icheck.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js/jqBootstrapValidation.js') }}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN STACK JS-->
<script src="{{ asset('assets/admin/js/app-menu.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js/app.js') }}" type="text/javascript"></script>
<!-- END STACK JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ asset('assets/admin/js/form-login-register.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</body>
</html>


