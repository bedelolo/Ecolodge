@extends('layouts.master')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>À Propos de Nous</h2>
                    <div class="page_link">
                        <a href="{{ url('/') }}">Accueil</a>
                        <a href="{{ url('/about') }}">À Propos</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================About Area =================-->
    <section class="about_area section_gap_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main_title">
                        <div class="top-part">
                            <p>Notre Histoire, Mission & Vision</p>
                        </div>
                        <h2>
                            Une Oasis de Paix <br>
                            Au Cœur du Bénin
                        </h2>
                        <div class="bottom_part">
                            <p>
                                L'Éco-Lodge de la Lagune est né d'une passion commune : faire découvrir la beauté sauvage du littoral béninois tout en préservant son écosystème fragile.
                                Situé entre le fleuve Mono et l'océan Atlantique, notre lodge offre une retraite unique, loin du tumulte urbain,
                                où chaque bungalow en matériaux locaux raconte une histoire.
                            </p>
                        </div>
                        <a href="{{ url('/contact') }}" class="main_btn mt-45">Réserver votre Séjour</a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="video_area" id="video">
                        <img class="img-fluid" src="{{ asset('img/benin_canoe.png') }}" alt="Promenade en pirogue">
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

    <!--================Testimonials Area =================-->
    <section class="testimonials-area section_gap color-bg">
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
                                "Un séjour inoubliable ! Le réveil face à la lagune et les chants des oiseaux sont tout simplement magiques. 
                                L'ambiance est apaisante et le personnel aux petits soins. Je recommande vivement !"
                            </p>
                        </div>
                    </div>
                </div>
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
                                "L'authenticité et le confort se marient à la perfection. J'ai adoré les excursions en pirogue et la cuisine locale 
                                servie au restaurant. Une véritable immersion dans la culture béninoise."
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
                                "Un paradis écologique. C'est l'endroit idéal pour se déconnecter et se ressourcer. 
                                Les bungalows sont magnifiques et respectueux de l'environnement."
                            </p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testi-item">
                        <img src="{{ asset('img/quote.png') }}" alt="">
                        <h4>Koffi Mensah</h4>
                        <ul class="list">
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                        </ul>
                        <div class="wow fadeIn" data-wow-duration="1s">
                            <p>
                                "Excellent accueil et service impeccable. La vue sur le coucher de soleil depuis la terrasse est à couper le souffle.
                                À faire absolument si vous passez par Grand-Popo."
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
@endsection
