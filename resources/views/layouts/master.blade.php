<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">
    <title>Éco-Lodge de la Lagune</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/lightbox/simpleLightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/nice-select/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/animate-css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/popup/magnific-popup.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}_3">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom-carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carousel-fix.css') }}">
    <style>
        .auth-btn {
            line-height: 30px !important;
            margin-top: 35px;
            padding: 0 20px !important;
            border-radius: 5px;
            display: inline-block !important;
            font-size: 13px !important;
        }
        .btn-outline {
            border: 1px solid #4d8eff !important;
            color: #4d8eff !important;
            margin-left: 20px;
        }
        .btn-primary-yellow {
            background: #f3c300 !important;
            color: #fff !important;
            border: none !important;
            margin-left: 10px;
        }
        @media (max-width: 991px) {
            .auth-btn {
                margin-top: 10px;
                margin-bottom: 10px;
                margin-left: 0 !important;
                line-height: 40px !important;
                display: block !important;
                text-align: center;
            }
            .header_area .navbar .nav .nav-item {
                margin-right: 0;
            }
            .section_gap {
                padding: 60px 0;
            }
            h1 { font-size: 32px !important; }
            h2 { font-size: 28px !important; }
        }
        
        /* Fix for horizontal scroll on mobile */
        html, body {
            overflow-x: hidden;
            width: 100%;
        }
    </style>
</head>

<body>

    <!--================Header Menu Area =================-->
    <header class="header_area">
        <div class="top_menu row m0">
            <div class="container">
                <div class="float-left">
                    <ul class="list header_social">
                        <li><a href="#">Contactez-nous +229 21 00 00 00</a></li>
                    </ul>
                </div>
                <div class="float-right">
                    <select class="nice-select">
                        <option value="1">XOF</option>
                        <option value="1">EUR</option>
                        <option value="1">USD</option>
                    </select>
                    <select class="nice-select">
                        <option value="1">FR</option>
                        <option value="1">EN</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                     aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item active"><a class="nav-link" href="{{ url('/') }}">Accueil</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">À Propos</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/gallery') }}">Galerie</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                 aria-expanded="false">Hébergements</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="{{ url('/rooms') }}">Vue d'ensemble</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Détails</a></li>
                                </ul>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                 aria-expanded="false">Actualités</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="{{ url('/blog') }}">Blog</a></li>
                                    <!-- <li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li> -->
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link auth-btn btn-outline" href="{{ route('login') }}">Connexion</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link auth-btn btn-primary-yellow" href="{{ route('register') }}">S'inscrire</a>
                                </li>
                            @else
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                     aria-expanded="false">{{ Auth::user()->name }}</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="{{ route('bookings.my') }}">Mes Réservations</a></li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->

    @yield('content')

    <!--================ start footer Area  =================-->
    <footer class="footer-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>À Propos de l'Éco-Lodge</h6>
                        <p>
                            Profitez d'une expérience authentique au cœur du Bénin. 
                            Nous allions confort, tradition et respect de l'environnement pour un séjour inoubliable.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Liens Rapides</h6>
                        <div class="row">
                            <ul class="col footer-nav">
                                <li><a href="#">Plan du site</a></li>
                                <li><a href="#">Hébergements</a></li>
                                <li><a href="#">Activités</a></li>
                                <li><a href="#">Mentions Légales</a></li>
                            </ul>
                            <ul class="col footer-nav">
                                <li><a href="#">Politique de Confidentialité</a></li>
                                <li><a href="{{ route('admin.dashboard') }}">Administration</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Newsletter</h6>
                        <p>Inscrivez-vous pour recevoir nos offres spéciales et actualités sur le tourisme au Bénin.</p>
                        <div class="" id="mc_embed_signup">

                            <form target="_blank" novalidate="true" action="#"
                             method="get" class="form-inline">

                                <div class="d-flex flex-row">

                                    <input class="form-control" name="EMAIL" placeholder="Votre Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre Email '"
                                     required="" type="email">


                                    <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                                    <div style="position: absolute; left: -5000px;">
                                        <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                    </div>
                                </div>
                                <div class="info"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget mail-chimp">
                        <h6 class="mb-20">Instagram</h6>
                        <ul class="instafeed d-flex flex-wrap">
                            <li><img src="{{ asset('img/instagram/Image-01.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('img/instagram/Image-02.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('img/instagram/Image-03.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('img/instagram/Image-04.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('img/instagram/Image-05.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('img/instagram/Image-06.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('img/instagram/Image-07.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('img/instagram/Image-08.jpg') }}" alt=""></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-bottom d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous droits réservés | Template adapté pour l'Éco-Lodge de la Lagune
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
                <div class="footer-social d-flex align-items-center">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-tripadvisor"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!--================ End footer Area  =================-->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/stellar.js') }}"></script>
    <script src="{{ asset('vendors/lightbox/simpleLightbox.min.js') }}"></script>
    <script src="{{ asset('vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendors/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/owl-carousel-thumb.min.js') }}"></script>
    <script src="{{ asset('vendors/popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('vendors/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('vendors/counter-up/jquery.counterup.js') }}"></script>
    <script src="{{ asset('js/mail-script.js') }}"></script>
    <script src="{{ asset('js/booking-modal.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
</body>

</html>
