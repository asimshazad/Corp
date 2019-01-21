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

    <div class="contact3 spacer">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-t-40">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="card card-shadow aos-init aos-animate" data-aos="fade-right" data-aos-duration="1200">
                                            <div class="card-body d-flex">
                                                <div class="m-r-20 align-self-center">
                                                    <i class="fa fa-map-marker fa-3x"></i>
                                                </div>
                                                <div class="">
                                                    <h6 class="font-medium">Address</h6>
                                                    <p class="">{{$basic->address}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="card card-shadow aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">
                                            <div class="card-body d-flex">
                                                <div class="m-r-20 align-self-center">
                                                    <i class="fa fa-phone fa-3x"></i>
                                                </div>
                                                <div class="">
                                                    <h6 class="font-medium">Phone</h6>
                                                    <p class="">{{$basic->phone}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="card card-shadow aos-init aos-animate" data-aos="fade-left" data-aos-duration="1200">
                                            <div class="card-body d-flex">
                                                <div class="m-r-20 align-self-center">
                                                    <i class="fa fa-send fa-3x"></i>
                                                </div>
                                                <div class="">
                                                    <h6 class="font-medium">Email</h6>
                                                    <p class="">{!! $basic->email !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="col-lg-7">
                            <div class="card-shadow aos-init aos-animate" data-aos="flip-left" data-aos-duration="1200" style="width: 100%;overflow: hidden">
                                {!! $basic->google_map !!}
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="contact-box m-l-30">
                                <form action="{{ url('submitContact') }}" method="post" class="aos-init aos-animate" data-aos="fade-left" data-aos-duration="1200">
                                    {!! csrf_field() !!}
                                    <div class="row">

                                        <div class="col-lg-12">
                                            @if($errors->any())
                                                @foreach ($errors->all() as $error)
                                                    <div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        {!!  $error !!}
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="col-lg-12">
                                            @if(session()->has('message'))
                                                <div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    {!!  session()->get('message') !!}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input name="name" class="form-control" type="text" placeholder="Full Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input name="email" class="form-control" type="email" placeholder="Email address" required> </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input name="phone" class="form-control" type="text" placeholder="Phone Number" required> </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input name="subject" class="form-control m-t-10" type="text" placeholder="Subject" required> </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group m-t-10">
                                                <textarea name="message" class="form-control" rows="3" placeholder="Message" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-info-gradiant btn-md m-t-20 btn-arrow btn-block"><span> SUBMIT <i class="ti-arrow-right"></i></span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection