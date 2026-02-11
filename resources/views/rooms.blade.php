@extends('layouts.master')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Hébergements</h2>
                    <div class="page_link">
                        <a href="{{ url('/') }}">Accueil</a>
                        <a href="{{ url('/rooms') }}">Chambres</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================About Area =================-->
    <section class="about_area section_gap_top rooms">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="video_area" id="video">
                        <img class="img-fluid" src="{{ asset('img/benin_room.png') }}" alt="Chambre traditionnelle">
                        <div class="overlay overlay-bg"></div>
                        <a class="popup-youtube" href="https://www.youtube.com/watch?v=VufDd-QL1c0">
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
                            <p>Nos Chambres</p>
                        </div>
                        <h2>Nos Hébergements</h2>
                        <div class="bottom_part">
                            <p>
                                Découvrez nos bungalows écologiques, conçus pour vous offrir un confort moderne tout en respectant la nature.
                                Chaque chambre est une invitation à la détente, avec une vue imprenable sur la lagune ou la mangrove.
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
                                    <a href="#" class="main_btn w-100 text-center mt-3" 
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
@endsection
