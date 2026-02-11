@extends('layouts.master')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Actualités</h2>
                    <div class="page_link">
                        <a href="{{ url('/') }}">Accueil</a>
                        <a href="{{ url('/blog') }}">Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Blog Categorie Area =================-->
    <section class="blog_categorie_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="categories_post">
                        <img src="{{ asset('img/blog/cat-post/cat-post-3.jpg') }}" alt="post">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="#">
                                    <h5>Culture Locale</h5>
                                </a>
                                <div class="border_line"></div>
                                <p>Immersion dans les traditions</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories_post">
                        <img src="{{ asset('img/blog/cat-post/cat-post-2.jpg') }}" alt="post">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="#">
                                    <h5>Écotourisme</h5>
                                </a>
                                <div class="border_line"></div>
                                <p>Voyager responsable</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories_post">
                        <img src="{{ asset('img/blog/cat-post/cat-post-1.jpg') }}" alt="post">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="#">
                                    <h5>Gastronomie</h5>
                                </a>
                                <div class="border_line"></div>
                                <p>Saveurs du Bénin</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Categorie Area =================-->

    <!--================Blog Area =================-->
    <section class="blog_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">
                        @foreach($posts as $post)
                        <article class="row blog_item">
                            <div class="col-md-3">
                                <div class="blog_info text-right">
                                    <div class="post_tag">
                                        <a href="#">{{ $post->category->name }}</a>
                                    </div>
                                    <ul class="blog_meta list">
                                        <li><a href="#">{{ $post->author }}<i class="lnr lnr-user"></i></a></li>
                                        <li><a href="#">{{ $post->created_at->format('d M, Y') }}<i class="lnr lnr-calendar-full"></i></a></li>
                                        <li><a href="#">0 Comm.<i class="lnr lnr-bubble"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">
                                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                                    <div class="blog_details">
                                        <a href="{{ route('blog.show', $post->slug) }}">
                                            <h2>{{ $post->title }}</h2>
                                        </a>
                                        <p>{{ $post->excerpt }}</p>
                                        <a href="{{ route('blog.show', $post->slug) }}" class="white_bg_btn">Lire la suite</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                        @endforeach
                        
                        <nav class="blog-pagination justify-content-center d-flex">
                            {{ $posts->links() }}
                        </nav>
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
