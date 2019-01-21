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

    <div class="spacer">
        <div class="container">
            <!-- Row  -->
            <div class="row">
                <div class="col-lg-8">
                    <!-- Blog  -->
                    @if(count($blog) == 0)
                        <h3 class="text-center">No Blog Found..!</h3>
                    @else
                    @foreach($blog as $b)
                    <div class="">
                        <a href="{{ route('blog-details',$b->slug) }}"><img src="{{ asset('assets/images/post') }}/{{$b->image}}" alt="wrapkit" class="img-fluid"/></a>
                        <ul class="text-uppercase m-t-40 list-inline font-13 font-medium">
                            <li><a href="#" class="text-info">{{ \Carbon\Carbon::parse($b->created_at)->format('M d, Y') }} </a> | </li>
                            <li><a href="{{ route('category-blog',$b->category->slug) }}" class="text-info">Category : {{$b->category->name}}</a></li>
                        </ul>
                        <h2 class="title font-light">
                            <a href="{{ route('blog-details',$b->slug) }}" class="link">{{ substr($b->title,0,45) }}{{strlen($b->title) > 45 ? '...' : ''}}</a>
                        </h2>
                        <p class="m-t-30 m-b-30">
                            {{ substr(strip_tags($b->description),0,240) }}{{ strlen($b->description) > 240 ? '...' : '' }}
                        </p>
                        <a href="{{ route('blog-details',$b->slug) }}" class="font-13">CONTINUE READING</a>
                    </div>
                    <!-- Blog  -->
                    <hr class="op-5" />
                    @endforeach
                    <!-- Blog  -->
                    <div class="mini-spacer">
                        <div class=" text-center font-13">
                            {!! $blog->links('basic.pagination') !!}
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-lg-4 ml-auto">
                    <div class="d-flex b-b p-b-20 no-block font-medium text-uppercase">
                        <h6 class="no-shrink font-medium align-self-center m-b-0">Popular Blog</h6>
                    </div>
                    @foreach($popular as $p)
                    <div class="row blog-row m-t-20">
                        <div class="col-md-4">
                            <a href="{{ route('blog-details',$p->slug) }}"><img src="{{ asset('assets/images/post') }}/{{$p->image}}" alt="{{$p->title}}" class="img-responsive" /></a>
                        </div>
                        <div class="col-md-8">
                            <h5><a href="{{ route('blog-details',$p->slug) }}">{{ substr($p->title,0,20) }}..</a></h5>
                            <p>At <a href="{{ route('category-blog',$p->category->slug) }}">{{$p->category->name}}</a>  |  {{ \Carbon\Carbon::parse($p->created_at)->format('d M, Y') }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- Row  -->
        </div>
    </div>






@endsection