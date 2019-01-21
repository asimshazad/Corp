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
                    <div class="mini-spacer">
                        <img src="{{ asset('assets/images/post') }}/{{$blog->image}}" alt="{{ $blog->title }}" class="img-fluid" />
                        <ul class="text-uppercase m-t-40 list-inline font-13 font-medium">
                            <li><a href="#">{{ \Carbon\Carbon::parse($blog->created_at)->format('M d, Y') }} </a> | </li>
                            <li><a href="#" class="text-info">Category - {{ $blog->category->name }}</a></li>
                        </ul>
                        <h2 class="title font-light"><a href="#" class="link">{{$blog->title}}</a></h2>
                        <p class="m-t-30 m-b-30">
                            {!! $blog->description  !!}
                        </p>
                        <div class="m-t-30">
                            <div class="sharethis-inline-share-buttons st-inline-share-buttons  st-left st-has-labels st-animated" id="st-1">
                                <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5993ef01e2587a001253a261&product=inline-share-buttons"></script>
                            </div>
                        </div>
                    </div>
                    <!-- Blog  -->
                    <hr class="op-5" />
                    <div class="mini-spacer p-b-0">
                        <h3>Comments</h3>
                        <div id="fb-root"></div>
                        <script>(function(d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) return;
                                js = d.createElement(s); js.id = id;
                                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1421567158073949";
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));</script>
                        <div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="5"></div>
                    </div>
                </div>
                <div class="col-lg-4 mini-spacer ml-auto">
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