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


    <div class="spacer form2">
        <div class="container">
            <div class="row justify-content-center">


                <div class="col-lg-6">
                    <div class="text-box">
                        <h1 class="font-light">Verify Your Email Address</h1>

                        <form class="m-t-20" action="{{ route('verification-submit') }}" autocomplete="off" method="post" data-aos="fade-left" data-aos-duration="1200">
                            {!! csrf_field() !!}

                            <div class="row">

                                <div class="col-lg-12">
                                    @if (session()->has('message'))
                                        <div class="alert alert-warning alert-dismissable">
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
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" name="code" type="text" placeholder="Verification Code" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-md btn-block btn-info-gradiant btn-arrow"><span> Verify Now <i class="ti-arrow-right"></i></span></button>
                                    <!--  -->
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-lg-12 text-center m-t-30">
                                <div class="have-ac ml-auto align-self-center">
                                    <form action="{{ route('email-resubmit') }}" method="post">
                                        {!! csrf_field() !!}
                                        <p>Not receive Verification Code. <button type="submit" class="btn btn-xs btn-primary">Resent Email</button></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
