@extends('layouts.frontEnd')
@section('content')

    <div class="banner-innerpage" style="background-image:url('{{ asset('assets/images') }}/{{$basic->breadcrumb}}')">
        <div class="container">
            <!-- Row  -->
            <div class="row justify-content-center ">
                <!-- Column -->
                <div class="col-md-6 align-self-center text-center" data-aos="fade-down" data-aos-duration="1200">
                    <h1 class="title">{{$page_title}}</h1>
                </div>
                <!-- Column -->
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


    <div class="mini-spacer bg-info feature24">
        <div class="container">
            <!-- Row -->
            <div class="row p-b-20 tclient-box text-white">
                <!-- column  -->
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex no-block">
                        <div class="display-5"><i class="icon-Business-ManWoman"></i></div>
                        <div class="m-l-20">
                            <h1 class="font-light counter m-b-0 text-white">{{$total_user}}</h1>
                            <h6 class="font-13 text-uppercase text-white op-7">Happy user</h6>
                        </div>
                    </div>
                </div>
                <!-- column  -->
                <!-- column  -->
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex no-block">
                        <div class="display-5"><i class="icon-Tag-3"></i></div>
                        <div class="m-l-20">
                            <h1 class="font-light counter m-b-0 text-white">{{$total_category}}</h1>
                            <h6 class="font-13 text-uppercase text-white op-7">Total Category</h6>
                        </div>
                    </div>
                </div>
                <!-- column  -->
                <!-- column  -->
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex no-block">
                        <div class="display-5"><i class="icon-Newspaper"></i></div>
                        <div class="m-l-20">
                            <h1 class="font-light counter m-b-0 text-white">{{$total_blog}}</h1>
                            <h6 class="font-13 text-uppercase text-white op-7">Total Blog</h6>
                        </div>
                    </div>
                </div>
                <!-- column  -->
                <!-- column  -->
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex no-block">
                        <div class="display-5"><i class="icon-Line-Chart"></i></div>
                        <div class="m-l-20">
                            <h1 class="font-light counter m-b-0 text-white">{{$total_signal}}</h1>
                            <h6 class="font-13 text-uppercase text-white op-7">Total Signal</h6>
                        </div>
                    </div>
                </div>
                <!-- column  -->
            </div>
        </div>
    </div>

    <div class="spacer team4">
        <div class="container">
            <div class="row justify-content-center m-b-10">
                <div class="col-md-7 text-center">
                    <h2 class="title">{{$section->team_title}}</h2>
                    <h6 class="subtitle">{{$section->team_description}}</h6>
                </div>
            </div>
            <div class="row m-t-30">
                <!-- column  -->

                @foreach($team as $tm)

                <div class="col-lg-3 m-b-30">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-md-12 pro-pic">
                            <img src="{{ asset('assets/images/member') }}/{{$tm->image}}" alt="{{$tm->name}}" class="img-responsive">
                        </div>
                        <div class="col-md-12">
                            <div class="p-t-10">
                                <h5 class="title font-medium">{{$tm->name}}</h5>
                                <h6 class="subtitle">{{$tm->position}}</h6>
                                <p>{{$tm->details}}</p>
                                <ul class="list-inline">
                                    <li class="list-inline-item"><a target="_blank" href="{{ $tm->facebook }}"><i class="fa fa-facebook"></i></a></li>
                                    <li class="list-inline-item"><a target="_blank" href="{{ $tm->twitter }}"><i class="fa fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a target="_blank" href="{{ $tm->instagram }}"><i class="fa fa-instagram"></i></a></li>
                                    <li class="list-inline-item"><a target="_blank" href="{{ $tm->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Row -->
                </div>
                @endforeach
            </div>
        </div>
    </div>



@endsection