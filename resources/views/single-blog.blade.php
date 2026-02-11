@extends('layouts.master')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Détails du Blog</h2>
                    <div class="page_link">
                        <a href="{{ url('/') }}">Accueil</a>
                        <a href="{{ url('/blog') }}">Blog</a>
                        <a href="#">Détails</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <img class="img-fluid" src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                            </div>
                        </div>
                        <div class="col-lg-3  col-md-3">
                            <div class="blog_info text-right">
                                <div class="post_tag">
                                    <a href="#">{{ $post->category->name }}</a>
                                </div>
                                <ul class="blog_meta list">
                                    <li><a href="#">{{ $post->author }}<i class="lnr lnr-user"></i></a></li>
                                    <li><a href="#">{{ $post->created_at->format('d M, Y') }}<i class="lnr lnr-calendar-full"></i></a></li>
                                    <li><a href="#">0 Comm.<i class="lnr lnr-bubble"></i></a></li>
                                </ul>
                                <ul class="social-links">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 blog_details">
                            <h2>{{ $post->title }}</h2>
                            <div class="excert">
                                {!! nl2br(e($post->content)) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    @include('partials.blog_sidebar')
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
@endsection
