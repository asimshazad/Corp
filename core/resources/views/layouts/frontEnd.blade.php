<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Open Graph Information -->
    <meta property="og:title" content="{{$basic->site_title}}">
    <!-- CSS links -->
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
    <title>{{$site_title}}</title>
</head>

<body>
<!-- Preloader -->
<div id="loader">
    <div class="laoder-frame">
        <img class="svg-loader" src="{{ asset('assets/images/loader.svg') }}" alt="circle-loader">
    </div>
</div>
<div class="homepage">
    <nav class="navbar navbar-head navbar-fixed-top">
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
                    <li><a class="local-scroll" href="#home">HOME</a></li>
                    <li><a class="local-scroll" href="#speciality">SPECIALITY</a></li>
                    <li><a class="local-scroll" href="#history">HISTORY</a></li>
                    <li><a class="local-scroll" href="#about">ABOUT US</a></li>
                    <li><a class="local-scroll" href="#testimonial">TESTIMONIAL</a></li>
                    <li><a class="local-scroll" href="#contact-field">CONTACT US</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
    <section id="home" class="hero-slider">
        <div class="container-fluid main-container">
            <div id="hero-carousel" class="carousel fade-carousel-slides slide" data-interval="3500" data-pause="false">
                <ol class="carousel-indicators">
                    @foreach($slider as $key => $s)
                        <li data-target="#hero-carousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner" role="listbox">
                    <!-- First slide -->

                    @foreach($slider as $key => $s)
                        <div class="item {{ ++$key == 1 ? 'active' : '' }}" style="background-image: url('{{ asset('assets/images/slider') }}/{{$s->image}}') ">
                            <div class="homeslider-overlay">
                                <div class="info-carousel main">
                                    <h1 data-animation="animated fadeInDown" class="emphasis">{{$s->main_title}}</h1>
                                    <h2 data-animation="animated fadeInUp" class="text-light">{{ $s->sub_title }}</h2>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#hero-carousel" role="button" data-slide="prev">
                    <span class="ion-ios-arrow-left icon-2x"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#hero-carousel" role="button" data-slide="next">
                    <span class="ion-ios-arrow-right icon-2x"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!-- carousel end -->
        </div>
    </section>
    <!-- About Our Skills -->
    <section id="speciality" class="p-t-b-80">
        <div class="container">
            <div>
                <h1 class="text-dark text-center">Our <span class="text-colored emphasis">Speciality</span></h1>
            </div>
            @foreach($speciality->chunk(3) as $fPro)
                <div class="row">
                    @foreach($fPro as $ffp)
                        <div class="col-sm-4 col-xs-12 m-t-b-30">
                    <span class="icon-3x text-colored col-xs-1 col-sm-1 col-md-2 col-lg-2">
                        {!! $ffp->icon !!}
                    </span>
                            <div class="col-xs-11 col-sm-11 col-md-10 col-lg-10">
                                <h4 class="emphasis">{{ $ffp->name }}</h4>
                                <p>{!! $ffp->description !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>

    <section id="history" class="bg-light-gray p-t-b-80">
        <div class="container">
            <div class="row">
                <h1 class="text-colored text-center emphasis">Our History</h1>
            </div>
            <div class="row">
                <div class="col-md-3 col-xs-12 p-t-b-40 text-center">
                    <span class="ion-ios-people icon-5x icon-blue"></span>
                    <h2 class="counter emphasis text-colored">{{ $total_customer }}</h2>
                    <p>Total Customer</p>
                </div>
                <div class="col-md-3 col-xs-12 p-t-b-40 text-center">
                    <span class="ion-briefcase icon-5x icon-blue"></span>
                    <h2 class="counter emphasis text-colored">{{ $total_company }}</h2>
                    <p>Product Provider</p>
                </div>
                <div class="col-md-3 col-xs-12 p-t-b-40 text-center">
                    <span class="ion-ios-list-outline icon-5x icon-blue"></span>
                    <h2 class="counter emphasis text-colored">{{ $total_category }}</h2>
                    <p>Product Category</p>
                </div>
                <div class="col-md-3 col-xs-12 p-t-b-40 text-center">
                    <span class="ion-ios-box icon-5x icon-blue"></span>
                    <h2 class="counter emphasis text-colored">{{ $total_product }}</h2>
                    <p>Total Product</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Promo Section -->
    <section id="about" class="border-top-gray p-t-b-80">
        <div class="container">
            <div class="row">
                <h1 class="text-colored text-center emphasis">About Our Company</h1>
            </div>
            <div class="row promo-section1">
                <div class="col-md-6">
                    <div class="p-t-b-40" data-aos="fade-right">
                        <img class="img-responsive" src="{{ asset('assets/images') }}/{{$basic->short_about_img}}" alt="Promo image">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-t-b-40 services-text" data-aos="fade">
                        <div>
                            <div>
                                <h4 class="emphasis">{{ $basic->short_title }}</h4>
                                <p class="text-justify">{!! $basic->short_about !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonial" class="parallax parallax4" style="background: url('{{ asset('assets/images') }}/{{$basic->counter_bg}}') 50% 0 no-repeat fixed;">
        <div class="dark-overlay p-t-b-40" data-overlay-opacity="0.75">
            <div>
                <h1 class="text-light text-center" data-aos="fade" data-aos-delay="0">Client Said</h1>
            </div>
            <div class="container">
                <div id="testimonials" class="row carousel slide" data-interval="3500" data-pause="false">
                    <div class="carousel-inner" role="listbox">
                        @foreach($testimonial as $key => $t)
                            <div class="item p-b-10 {{++$key == 1 ? 'active' : ''}}">
                                <div class="text-light text-center">
                                    <p class="text-light p-t-10" data-animation="animated fadeInUp">{{$t->message}}</p>
                                    <img class="img-responsive clients" src="{{ asset('assets/images/testimonial') }}/{{ $t->image }}" alt="testimonial-client">
                                    <h4 class="text-light p-t-10" data-animation="animated fadeInUp">{{ $t->name }}</h4>
                                    <p class="text-light" data-animation="animated fadeInUp">{{ $t->position }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Info -->
    <section class="p-t-b-80 bg-colored">
        <div class="container">
            <div>
                <h2 class="text-light text-center"><span class="emphasis">{{$basic->phone}}</span></h2>
                <h2 class="text-light text-center"><span class="emphasis">{{$basic->email}}</span></h2>
                <h3 class="text-light text-center">{{$basic->address}}</h3>
            </div>
        </div>
    </section>
    <!-- Contact Form -->
    <section id="contact-field" class="p-t-b-80">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="text-center">
                    <div>
                        <h1>Contact <span class="emphasis text-colored">US</span></h1>
                    </div>
                    @if(session()->has('message'))
                        <br>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {!!  session()->get('message') !!}
                        </div>
                    @endif
                </div>
                <form method="post" action="{{ url('/submitContact') }}" data-toggle="validator">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" id="name" name="name" placeholder="Name*" required data-error="Please fill in your name">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" id="subject" name="subject" placeholder="Subject*" required data-error="Please fill Subject">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="email" class="form-control input-lg" name="email" placeholder="Email*" required data-error="Please enter a valid e-mail address">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" id="phone" name="phone" placeholder="Phone" required data-error="Please enter a valid Phone Number">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea id="comments" rows="10" class="form-control input-lg" name="message" placeholder="Message*" required data-error="Please write your message"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-colored btn-lg center-block m-t-20" value="SEND">
                </form>
            </div>
        </div>
    </section>
    <!-- Map -->
    <section class="maps">
        {!! $basic->google_map !!}
    </section>
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


</body>

</html>