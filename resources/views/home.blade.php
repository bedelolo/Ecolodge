@extends('layouts.master')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="home_banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="2" data-stellar-vertical-offset="0" data-background="{{ asset('img/video_thumb_custom.jpg') }}" style="background-image: url('{{ asset('img/video_thumb_custom.jpg') }}');"></div>
            <!-- <div class="overlay overlay-bg"></div> -->
            <div class="container">
                <div class="banner_content text-center">
                    <p class="top-text">Bienvenue à</p>
                    <h1>l'Éco-Lodge de la Lagune</h1>
                    <p class="text">Découvrez un havre de paix authentique au cœur du Bénin. 
                        Profitez de la nature, de nos bungalows sur pilotis et de la cuisine locale savoureuse.</p>
                    <a class="play-btn" href="https://www.youtube.com/watch?v=Cbs7VzPQYMw">
                        <img src="{{ asset('img/video-icon.png') }}" class="vdo-btn" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Booking Area =================-->
    <section class="container">
        <div class="booking_area">
            <form action="{{ route('bookings.check') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12 mb-3 mb-lg-0">
                        <div class="booking_item">
                            <p>Arrivée</p>
                            <input type="date" class="form-control" name='check_in' id="check_in" placeholder="Date d'arrivée" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 mb-3 mb-lg-0">
                        <div class="booking_item">
                            <p>Départ</p>
                            <input type="date" class="form-control" name='check_out' id="check_out" placeholder="Date de départ" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6 mb-3 mb-lg-0">
                        <div class="booking_item">
                            <p>Voyageurs</p>
                            <span class="day">02</span>
                            <span class="month">Personnes</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6 coupon-code d-flex align-items-center">
                        <div class="booking_item w-100">
                            <button type="submit" class="main_btn text-uppercase w-100 p-0" style="line-height: 50px;">Vérifier Disp.</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--================End Booking Area =================-->

    <!--================About Area =================-->
    <section class="about_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main_title">
                        <div class="top-part">
                            <p>À Propos de Notre Histoire, Mission & Vision</p>
                        </div>
                        <h2>
                            Une Histoire d'Authenticité <br>
                            Mission & Vision
                        </h2>
                        <div class="bottom_part">
                            <p>
                                L'Éco-Lodge de la Lagune est né d'une passion pour la beauté naturelle du Bénin. 
                                Nous nous engageons à préserver notre environnement tout en offrant un luxe durable. 
                                Notre mission est de vous connecter à la culture locale et à la nature sauvage de manière responsable.
                            </p>
                        </div>
                        <a href="#" class="main_btn mt-45">Demander un Devis</a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="video_area" id="video">
                        <img class="img-fluid" src="{{ asset('img/video-1.jpg') }}" alt="">
                        <div class="overlay overlay-bg"></div>
                        <a class="popup-youtube" href="https://www.youtube.com/watch?v=ARA0AxrnHdM"> <!-- Changed video link placeholder -->
                            <img src="{{ asset('img/video-icon-1.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End About Area =================-->

    <!-- Start Our Room Area -->
    <section class="our_room_area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main_title">
                        <div class="top-part">
                            <p>Nos Hébergements</p>
                        </div>
                        <h2>Nos Chambres & Bungalows</h2>
                        <div class="bottom_part">
                            <p>
                                Reposez-vous dans nos bungalows conçus avec des matériaux locaux, alliant confort moderne et charme traditionnel.
                                Une vue imprenable sur la lagune vous attend à chaque réveil.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel owl-room">
                        @foreach($rooms as $room)
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="room_left">
                                    <img class="img-fluid" src="{{ asset($room->image) }}" alt="{{ $room->name }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="room_right">
                                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                                    <h1 class="price">
                                        {{ number_format($room->price, 0, ',', ' ') }} FCFA<span>/nuit</span>
                                    </h1>
                                    <h1 class="type">
                                        {{ $room->name }}
                                    </h1>
                                    <p>
                                        {{ $room->description }}
                                    </p>
                                    <div class="row">
                                        @php
                                            $amenities = explode(',', $room->amenities);
                                            $chunks = array_chunk($amenities, ceil(count($amenities) / 2));
                                        @endphp
                                        @foreach($chunks as $chunk)
                                        <div class="col-lg-6 col-md-5">
                                            <ul>
                                                @foreach($chunk as $amenity)
                                                <li>{{ trim($amenity) }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="customer_name" value="{{ Auth::check() ? Auth::user()->name : '' }}">
                                    <input type="hidden" name="customer_email" value="{{ Auth::check() ? Auth::user()->email : '' }}">
                                    <a href="#" class="main_btn booking-trigger" 
                                       data-room-id="{{ $room->id }}"
                                       data-room-name="{{ $room->name }}"
                                       data-room-price="{{ $room->price }}"
                                       data-room-description="{{ $room->description }}"
                                       data-room-amenities="{{ $room->amenities }}"
                                       data-user-name="{{ Auth::check() ? Auth::user()->name : '' }}"
                                       data-user-email="{{ Auth::check() ? Auth::user()->email : '' }}"
                                       onclick="event.preventDefault(); openBookingModal({
                                           id: '{{ $room->id }}',
                                           name: '{{ $room->name }}',
                                           price: {{ $room->price }},
                                           description: '{{ addslashes($room->description) }}',
                                           amenities: '{{ $room->amenities }}',
                                           bookingUrl: '{{ route('bookings.store') }}',
                                           userName: '{{ Auth::check() ? Auth::user()->name : '' }}',
                                           userEmail: '{{ Auth::check() ? Auth::user()->email : '' }}'
                                       });">Réserver Maintenant</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Room Area -->

    <!--================Testimonials Area =================-->
    <section class="testimonials-area section_gap_top color-bg">
        <div class="container">
            <div class="text-center">
                <img class="quote-img" src="{{ asset('img/quote.png') }}" alt="">
            </div>
            <div class="testi-slider owl-carousel" data-slider-id="1">
                <div class="item">
                    <div class="testi-item">
                        <h4>Aïcha Koné</h4>
                        <ul class="list">
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                        </ul>
                        <div class="wow fadeIn" data-wow-duration="1s">
                            <p>
                                Ce fut une expérience magique. Dormir au-dessus de l'eau et se réveiller avec le chant des oiseaux
                                est tout simplement inoubliable. Le personnel est d'une gentillesse rare. Je reviendrai !
                            </p>
                        </div>
                    </div>
                </div>
                <!-- ... other items removed for brevity or can be duplicated/translated if needed, keeping one main for now to be safe or duplicating -->
                <div class="item">
                    <div class="testi-item">
                        <h4>Jean-Marc Dossou</h4>
                        <ul class="list">
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                        </ul>
                        <div class="wow fadeIn" data-wow-duration="1s">
                            <p>
                                La cuisine est incroyable, surtout l'Amiwo au poulet ! Un vrai délice.
                                L'ambiance est conviviale et authentique. Merci pour ce séjour mémorable.
                            </p>
                        </div>
                    </div>
                </div>
                 <div class="item">
                    <div class="testi-item">
                        <h4>Sophie Martin</h4>
                        <ul class="list">
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                        </ul>
                        <div class="wow fadeIn" data-wow-duration="1s">
                            <p>
                                Un cadre idyllique pour se ressourcer. J'ai adoré les excursions en pirogue sur la lagune.
                                Je recommande vivement cet éco-lodge à tous les amoureux de la nature.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                <div class="owl-thumb-item">
                    <div>
                        <img class="img-fluid" src="{{ asset('img/testimonial/t1.png') }}" alt="">
                    </div>
                    <div class="overlay overlay-grad"></div>
                </div>
                <div class="owl-thumb-item">
                    <div>
                        <img class="img-fluid" src="{{ asset('img/testimonial/t2.png') }}" alt="">
                    </div>
                    <div class="overlay overlay-grad"></div>
                </div>
                <div class="owl-thumb-item">
                    <div>
                        <img class="img-fluid" src="{{ asset('img/testimonial/t3.png') }}" alt="">
                    </div>
                    <div class="overlay overlay-grad"></div>
                </div>
                <div class="owl-thumb-item">
                    <div>
                        <img class="img-fluid" src="{{ asset('img/testimonial/t4.png') }}" alt="">
                    </div>
                    <div class="overlay overlay-grad"></div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Testimonials Area =================-->

    <!--================Latest Blog Area =================-->
    <section class="latest_blog_area section_gap color-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main_title">
                        <p class="text-uppercase">Notre Blog</p>
                        <h2>
                            Dernières Actualités
                        </h2>
                        <p>
                            Plongez au cœur de la culture béninoise à travers nos articles. 
                            Découvrez nos recettes, nos traditions et les merveilles de notre région.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($posts as $post)
                <div class="single-recent-blog col-lg-4 col-md-6">
                    <div class="thumb">
                        <img class="f-img img-fluid mx-auto" src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                    </div>
                    <div class="bottom d-flex justify-content-between align-items-center flex-wrap">
                        <div>
                            <a href="#" class="main_btn">{{ $post->category->name }}</a>
                        </div>
                        <div class="meta">
                            <span>{{ $post->created_at->format('d M, Y') }}</span>
                            <span>0 Commentaires</span>
                        </div>
                    </div>
                    <a href="{{ route('blog.show', $post->slug) }}">
                        <h4>{{ $post->title }}</h4>
                    </a>
                    <p>
                        {{ $post->excerpt }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--================End Latest Blog Area =================-->
@endsection
