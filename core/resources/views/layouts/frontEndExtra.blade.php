<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Open Graph Information -->
    <meta property="og:title" content="{{$basic->title}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/aos.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/colors/blue.css') }}">
    <!-- Font Family and Favicon-->
    <link href="https://fonts.googleapis.com/css?family=Dosis:400,700,800%7CPoppins:300,400,700" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">
    <!-- Title -->
    <title>{{$site_title}} | {{$page_title}}</title>
</head>

<body>
<!-- Preloader -->
<div id="loader">
    <div class="laoder-frame">
        <img class="svg-loader" src="{{ asset('assets/images/loader.svg') }}" alt="circle-loader">
    </div>
</div>
<div class="post-single">
    <nav class="navbar navbar-head navbar-fixed-top white-bg-nav">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar top-bar"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>
                </button>
                <a class="navbar-brand logo-white" style="padding-top: 10px" href="{{ route('home') }}"><img src="{{ asset('assets/images/logo.png') }}" style="max-height: 40px" alt="logo-white"></a>
                <a class="navbar-brand logo-dark"  style="padding-top: 10px" href="{{ route('home') }}"><img src="{{ asset('assets/images/logo.png') }}" style="max-height: 40px" alt="logo-dark"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                        <li><a class="local-scroll" href="{{url('/')}}#home">HOME</a></li>
                        <li><a class="local-scroll" href="{{url('/')}}#speciality">SPECIALITY</a></li>
                        <li><a class="local-scroll" href="{{url('/')}}#about">ABOUT</a></li>
                        <li><a class="local-scroll" href="{{url('/')}}#team">TEAM MEMBER</a></li>
                        <li><a class="local-scroll" href="{{url('/')}}#price">PRICING</a></li>
                        <li><a class="local-scroll" href="{{ route('blog') }}">BLOG</a></li>
                        <li><a class="local-scroll" href="{{url('/')}}#contact-field">CONTACT</a></li>
                    @if(Auth::check())
                        <li class="megamenu dropdown"><a href="" data-toggle="dropdown" class="dropdown-toggle">Hi, {{Auth::user()->name}}<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('user-dashboard')}}" style="font-size:15px;"><i class="fa fa-dashboard"></i> Dashboard</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" style="font-size:15px;" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </ul>
                        </li>
                    @else
                        <li class="megamenu dropdown"><a href="" data-toggle="dropdown" class="dropdown-toggle">ACCOUNT<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('login')}}" style="font-size:15px;"><i class="fa fa-sign-in"></i> Log In</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}" style="font-size:15px;"><i class="fa fa-user-plus"></i> Register</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer>
        <div class="container footer-widgets">
            <div class="row go-up-frame">
                <p class="go-up"></p>
            </div>
            <div class="row">
                <aside class="col-md-12 text-center" data-aos="fade-up" data-aos-delay="0">
                    <img src="{{ asset('assets/images/logo.png') }}" class="center-block" alt="">
                    <hr>
                    <ul class="list-inline footer-social">
                        @foreach($social as $sc)
                            <li><a href="{{ $sc->link }}"><span class="">{!! $sc->code !!}</span></a></li>
                        @endforeach
                    </ul>
                </aside>
            </div>
        </div>
        <div id="copyright" data-aos="fade" data-aos-delay="0">
            <div class="container">
                <div class="row text-center">
                    {!! $basic->copy_text !!}
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
{!! $basic->google_analytic !!}
{!! $basic->chat !!}

</body>

</html>