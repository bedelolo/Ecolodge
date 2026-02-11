@extends('layouts.master')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Galerie Photos</h2>
                    <div class="page_link">
                        <a href="{{ url('/') }}">Accueil</a>
                        <a href="{{ url('/gallery') }}">Galerie</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Gallery Area =================-->
    <section class="gallery_area section_gap" id="gallery">
        <div class="container">
            <div class="filters gallery-filter">
                <ul>
                    <li class="active" data-filter=".all">Tous</li>
                    <li data-filter=".rooms">Chambres</li>
                    <li data-filter=".activities">Activités</li>
                    <li data-filter=".dining">Restaurant</li>
                </ul>
            </div>

            <div class="filters-content">
                <div class="row gallery-grid">
                    <div class="col-lg-4 col-md-6 all rooms">
                        <div class="single-gallery">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="{{ asset('img/benin_room.png') }}" alt="Chambre traditionnelle">
                            <div class="icon">
                                <a href="{{ asset('img/benin_room.png') }}" class="img-pop-home">
                                    <img src="{{ asset('img/zoom-icon.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 all activities">
                        <div class="single-gallery">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="{{ asset('img/benin_canoe.png') }}" alt="Balade en Pirogue">
                            <div class="icon">
                                <a href="{{ asset('img/benin_canoe.png') }}" class="img-pop-home">
                                    <img src="{{ asset('img/zoom-icon.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 all dining">
                        <div class="single-gallery">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="{{ asset('img/benin_food.png') }}" alt="Cuisine Béninoise">
                            <div class="icon">
                                <a href="{{ asset('img/benin_food.png') }}" class="img-pop-home">
                                    <img src="{{ asset('img/zoom-icon.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 all activities">
                        <div class="single-gallery">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="{{ asset('img/benin_safari.png') }}" alt="Safari Pendjari">
                            <div class="icon">
                                <a href="{{ asset('img/benin_safari.png') }}" class="img-pop-home">
                                    <img src="{{ asset('img/zoom-icon.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 all rooms">
                        <div class="single-gallery">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="{{ asset('img/room/room1.jpg') }}" alt="Bungalow vue mer">
                            <div class="icon">
                                <a href="{{ asset('img/room/room1.jpg') }}" class="img-pop-home">
                                    <img src="{{ asset('img/zoom-icon.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 all dining">
                        <div class="single-gallery">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="{{ asset('img/room/room2.jpg') }}" alt="Détente">
                            <div class="icon">
                                <a href="{{ asset('img/room/room2.jpg') }}" class="img-pop-home">
                                    <img src="{{ asset('img/zoom-icon.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Gallery Area =================-->
@endsection
