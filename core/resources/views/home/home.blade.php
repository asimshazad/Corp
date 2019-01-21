@extends('layouts.frontEnd')
@section('content')

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Slider  -->
        <!-- ============================================================== -->
        <div class="bg-light">

            <section id="slider-sec" class="slider7">
                <div id="slider7" class="carousel bs-slider slide  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="7000">
                    <ol class="carousel-indicators">
                        <li data-target="#slider7" data-slide-to="0" class="active"></li>
                        <li data-target="#slider7" data-slide-to="1"></li>
                    </ol>
                    <!-- Wrapper For Slides -->
                    <div class="carousel-inner" role="listbox">

                        @foreach($slider as $key => $s)

                            <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                                <!-- Slide Background --><img src="{{ asset('assets/images/slider') }}/{{ $s->image }}" alt="We are Digital Agency" class="slide-image" />
                                <!-- Slide Text Layer -->
                                <div class="slide-text slide_style_left">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-10 col-md-8 col-lg-5" data-animation="animated slideInDown">
                                                <div class="bg-info-gradiant text-center slide-content po-relative">
                                                    <label class="label text-primary font-14 m-0 label-rounded bg-white">{{ $s->main_title }}</label>
                                                    <h2 data-animation="animated flipInX" class="title m-b-0 text-white">{{ $s->sub_title }}</h2>
                                                    <p data-animation="animated fadeInLeft" class="m-t-30 text-white op-7">{!! $s->slider_text !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Slide -->
                        @endforeach
                        <div class="slider-control hide">
                            <!-- Left Control -->
                            <a class="left carousel-control-prev text-danger font-14" href="#slider7" role="button" data-slide="prev"> <span class="bg-white text-center ti-arrow-left" aria-hidden="true"></span> <b class="sr-only font-normal">Previous</b> </a>
                            <!-- Right Control -->
                            <a class="right carousel-control-next text-danger font-14" href="#slider7" role="button" data-slide="next"> <span class="bg-white text-center ti-arrow-right" aria-hidden="true"></span> <b class="sr-only font-normal">Next</b> </a>
                        </div>
                        <!-- End of Slider Control -->
                    </div>
                </div>
                <!-- End Slider -->
            </section>
        </div>
        <!-- ============================================================== -->
        <!-- End Slider 1  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Slider code  -->
        <!-- ============================================================== -->
        <div class="bg-light spacer feature5">
            <div class="container">
                <!-- Row  -->
                <div class="row justify-content-center">
                    <div class="col-md-7 text-center">
                        <h2 class="title">{{$section->speciality_title}}</h2>
                        <h6 class="subtitle">{{$section->speciality_description}}</h6>
                    </div>
                </div>
                <!-- Row  -->

                <div class="row m-t-40">
                    <!-- Column -->
                    @foreach($speciality as $key => $sp)
                        <div class="col-md-4 wrap-feature5-box">
                            @if($key == 0)
                                <div class="card card-shadow" data-aos="fade-right" data-aos-duration="1200">
                                    @elseif($key == 1)
                                        <div class="card card-shadow" data-aos="fade-down" data-aos-duration="1200">
                                            @elseif($key == 2)
                                                <div class="card card-shadow" data-aos="fade-left" data-aos-duration="1200">
                                                    @elseif($key == 3)
                                                        <div class="card card-shadow" data-aos="fade-right" data-aos-duration="1200">
                                                            @elseif($key == 4)
                                                                <div class="card card-shadow" data-aos="fade-up" data-aos-duration="1200">
                                                                    @elseif($key == 5)
                                                                        <div class="card card-shadow" data-aos="fade-left" data-aos-duration="1200">
                                                                            @endif
                                                                            <div class="card-body d-flex">
                                                                                <div class="icon-space">{!! $sp->icon !!}</div>
                                                                                <div class="">
                                                                                    <h6 class="font-medium"><a href="javascript:void(0)" class="linking">{{$sp->name}}</a></h6>
                                                                                    <p class="m-t-20">{{ strip_tags($sp->description) }}</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <!-- Column -->
                                                                @endforeach
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="spacer feature32 ">
                                            <div class="container">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-8 text-center">
                                                        <h2 class="title">{{$section->currency_title}}</h2>
                                                        <h6 class="subtitle">{{$section->currency_description}}</h6>
                                                    </div>
                                                </div>
                                                <div class="row wrap-feature-32 m-t-40">
                                                    <div class="col-md-6 align-self-center text-center" data-aos="fade-right" data-aos-duration="3000" data-aos-offset="300">
                                                        {!! $section->currency_live !!}
                                                    </div>
                                                    <div class="col-md-6 align-self-center" data-aos="fade-left" data-aos-duration="3000" data-aos-offset="300">
                                                        {!! $section->currency_cal !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pricing1 spacer bg-light">
                                            <div class="container">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-8 text-center">
                                                        <h2 class="title">{{$section->price_title}}</h2>
                                                        <h6 class="subtitle">{{$section->price_description}}</h6>
                                                    </div>
                                                </div>
                                                <!-- Row  -->
                                                <div class="row m-t-40">
                                                    <!-- Column -->
                                                    @foreach($plan as $pl)
                                                        <div class="col-lg-4 col-md-12 aos-init aos-animate" data-aos="fade-right" data-aos-duration="1200">
                                                            <div class="card text-center card-shadow">
                                                                <div class="card-body p-40 font-14">
                                                                    <h3 class="title">{{$pl->name}}</h3>
                                                                    @if($pl->price_type == 0)
                                                                        <div class="pricing">
                                                                            <span class="monthly display-5">FREE</span>
                                                                            @if($pl->plan_type == 0)
                                                                                <small class="monthly">/{{$pl->duration}} days</small>
                                                                            @else
                                                                                <small class="monthly">/Unlimited</small>
                                                                            @endif
                                                                        </div>
                                                                    @else
                                                                        <div class="pricing">
                                                                            <sup>{{$basic->symbol}}</sup>
                                                                            <span class="monthly display-5">{{$pl->price}}</span>
                                                                            @if($pl->plan_type == 0)
                                                                                <small class="monthly">/{{$pl->duration}} days</small>
                                                                            @else
                                                                                <small class="monthly">/Unlimited</small>
                                                                            @endif
                                                                        </div>
                                                                    @endif
                                                                    <ul class="list-inline text-center">
                                                                        <li class="font-weight-normal">Support - {{ $pl->support }}</li>
                                                                        <li class="font-weight-normal">Telegram Alert - {{ $pl->telegram_status == 1 ? 'YES' : 'NO' }}</li>
                                                                        <li class="font-weight-normal">Email Alert - {{ $pl->email_status == 1 ? 'YES' : 'NO' }}</li>
                                                                        <li class="font-weight-normal">SMS Alert - {{ $pl->sms_status == 1 ? 'YES' : 'NO' }}</li>
                                                                        <li class="font-weight-normal">Coaching Status - {{ $pl->coaching_status == 1 ? 'YES' : 'NO' }}</li>
                                                                        <li class="font-weight-normal">Call Consulting - {{ $pl->call_status == 1 ? 'YES' : 'NO' }}</li>
                                                                    </ul>
                                                                    <div class="bottom-btn">
                                                                        <a class="btn btn-info-gradiant btn-md btn-arrow" href="{{ route('register') }}"><span>Start Now<i class="ti-arrow-right"></i></span></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>


                                        <div class="spacer feature32">
                                            <div class="container">
                                                <div class="row wrap-feature-32">
                                                    <div class="col-md-6"> <img src="{{asset('assets/images')}}/{{$section->about_image}}" class="img-responsive" data-aos="fade-right" data-aos-duration="3000" data-aos-offset="300"> </div>
                                                    <div class="col-md-6 align-self-center" data-aos="fade-left" data-aos-duration="3000" data-aos-offset="300">
                                                        <h2 class="title m-t-20">{{$section->about_title}}</h2>
                                                        <p class="m-t-30">{{$section->about_description}}.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="mini-spacer bg-light c2a3">
                                            <div class="container">
                                                <div class="d-flex">
                                                    <div class="display-7 align-self-center">
                                                        <h3 class="">{{$section->coupon_title}}</h3>
                                                        <h6 class="font-16 subtitle">{{$section->coupon_description}}</h6>
                                                    </div>
                                                    <div class="ml-auto m-t-10 m-b-10"><button class="btn btn-info-gradiant btn-md" data-clipboard-text="{{$coupon->code}}" data-clipboard-action="copy" id="myInput" data-original-title="Copy to clipboard">{{ $coupon->code }}</button></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="spacer">
                                            <div class="container">
                                                <!-- Row -->
                                                <div class="row justify-content-center">
                                                    <div class="col-md-12 text-center"></div>
                                                    <div class="col-md-7 text-center">
                                                        <h2 class="title">{{$section->counter_title}}</h2>
                                                        <h6 class="subtitle">{{$section->counter_description}}</h6>
                                                    </div>
                                                </div>
                                                <!-- Row -->
                                                <div class="row m-t-30 p-t-30 client-box">
                                                    <!-- column  -->
                                                    <div class="col-lg-3 col-md-6">
                                                        <div class="d-flex no-block">
                                                            <div class="display-5"><i class="icon-Business-ManWoman"></i></div>
                                                            <div class="m-l-20">
                                                                <h1 class="font-light counter m-b-0">{{$total_user}}</h1>
                                                                <h6 class="text-muted font-13 text-uppercase">Happy User</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- column  -->
                                                    <!-- column  -->
                                                    <div class="col-lg-3 col-md-6">
                                                        <div class="d-flex no-block">
                                                            <div class="display-5"><i class="icon-Tag-3"></i></div>
                                                            <div class="m-l-20">
                                                                <h1 class="font-light counter m-b-0">{{$total_category}}</h1>
                                                                <h6 class="text-muted font-13 text-uppercase">Total Category</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- column  -->
                                                    <!-- column  -->
                                                    <div class="col-lg-3 col-md-6">
                                                        <div class="d-flex no-block">
                                                            <div class="display-5"><i class="icon-Newspaper"></i></div>
                                                            <div class="m-l-20">
                                                                <h1 class="font-light counter m-b-0">{{$total_blog}}</h1>
                                                                <h6 class="text-muted font-13 text-uppercase">Total Blog</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- column  -->
                                                    <!-- column  -->
                                                    <div class="col-lg-3 col-md-6">
                                                        <div class="d-flex no-block">
                                                            <div class="display-5"><i class="icon-Line-Chart"></i></div>
                                                            <div class="m-l-20">
                                                                <h1 class="font-light counter m-b-0">{{$total_signal}}</h1>
                                                                <h6 class="text-muted font-13 text-uppercase">Total Signal</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- column  -->
                                                </div>
                                            </div>
                                        </div>



                                        <div class="testimonial1 spacer bg-light aos-init" data-aos="fade-up" data-aos-duration="1200">
                                            <div class="container">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-7 text-center">
                                                        <h2 class="title">{{$section->testimonial_title}}</h2>
                                                        <h6 class="subtitle">{{$section->testimonial_description}}</h6>
                                                    </div>
                                                </div>
                                                <!-- Row  -->
                                                <div class="owl-carousel owl-theme testi1 m-t-40">
                                                    <!-- item -->
                                                    @foreach($testimonial as $key => $t)

                                                        @if($key == 0)
                                                            <div class="item" data-aos="fade-right" data-aos-duration="1200">
                                                                @elseif($key == 1)
                                                                    <div class="item" data-aos="fade-left" data-aos-duration="1200">
                                                                        @else
                                                                            <div class="item" data-aos="fade-right" data-aos-duration="1200">
                                                                                @endif
                                                                                <div class="card card-shadow">
                                                                                    <div class="card-body">
                                                                                        <div class="thumb bg-success-gradiant"><img src="{{asset('assets/images/testimonial')}}/{{ $t->image }}" alt="{{ $t->name }}" class="thumb-img circle" /> {{$t->name}}</div>
                                                                                        <h5 class="font-light">{{$t->message}}</h5>
                                                                                        <span class="devider"></span>
                                                                                        <h6>{{ $t->position }}</h6>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            @endforeach
                                                                    </div>
                                                            </div>
                                                </div>


                                                <div class="spacer feature7">
                                                    <div class="container">
                                                        <!-- Row  -->
                                                        <div class="row justify-content-center">
                                                            <div class="col-md-7 text-center">
                                                                <h2 class="title">{{$section->blog_title}}</h2>
                                                                <h6 class="subtitle">{{$section->blog_description}}</h6>
                                                            </div>
                                                        </div>
                                                        <!-- Row  -->
                                                        <div class="row m-t-40">
                                                            <!-- Column -->
                                                            @foreach($blog as $b)
                                                                <div class="col-md-4 wrap-feature7-box">
                                                                    <div class="" data-aos="flip-left" data-aos-duration="1200">
                                                                        <img class="rounded img-responsive" src="{{ asset('assets/images/post') }}/{{ $b->image }}" alt="{{$b->title}}" />
                                                                        <div class="m-t-30">
                                                                            <h5 class="font-medium">{{ substr($b->title,0,33) }}{{ strlen($b->title) > 33 ? '...' : '' }}</h5>
                                                                            <p class="m-t-20">{{ substr(strip_tags($b->description),0,120) }}</p>
                                                                            <a href="javascript:void(0)" class="linking">Learn More <i class="ti-arrow-right"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

@endsection