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
                <div class="col-md-12">
                    {!! $basic->privacy !!}
                </div>
            </div>
        </div>
    </div>

@endsection