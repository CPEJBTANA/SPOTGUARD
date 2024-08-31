<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <title>Dreamland</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('template_landing/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('template_landing/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('template_landing/assets/css/templatemo-villa-agency.css') }}">
    <link rel="stylesheet" href="{{ asset('template_landing/assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('template_landing/assets/css/animate.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

</head>
<body>
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <ul class="info">
                        <li><i class="fa fa-envelope"></i> dreamland@gmail.com</li>
                        <li><i class="fa fa-map"></i> Sitio Control Colgante 2016 Apalit, Philippines</li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4">
                    <ul class="social-links">
                        <li><a href="https://www.facebook.com/dreamlandsubd?mibextid=ZbWKwL"><i
                                    class="fab fa-facebook"></i></a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">
                            <h1>Dreamland</h1>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="#" class="active">Home</a></li>

                            @if (Route::has('login'))
                                @auth

                                    @if (Auth::user()->hasRole('Resident'))
                                        <li><a href="{{ url('resident/dashboard') }}">Resident</a></li>
                                    @elseif (Auth::user()->hasRole('Admin'))
                                        <li><a href="{{ url('admin') }}">Admin</a></li>
                                    @endif
                                @else
                                    <li><a href="{{ route('login') }}">Log In</a></li>
                                @endif
                            @endauth

                            @if (Route::has('register'))
                                @guest
                                    <li><a href="{{ url('/register') }}">Register</a>
                                    @endguest
                            @endif
                            <li><a href="#"></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="main-banner">
        <div class="owl-carousel owl-banner">
            <div class="item item-1">
                <div class="header-text">
                    <span class="category">Apalit, <em>Pampanga</em></span>
                    <h2>Welcome to<br>Dreamland Web Portal</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="featured section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-image">
                        <img src="{{ asset('template_landing/assets/images/featured.jpg') }}" alt="">
                        <a href="property-details.html"><img
                                src="{{ asset('template_landing/assets/images/featured-icon.png') }}" alt=""
                                style="max-width: 60px; padding: 0px;"></a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="section-heading">
                        <h6>| About Us</h6>
                        <h2>Empowering Communities with Security Solutions</h2>
                    </div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    At Dreamland, we are committed to enhancing security and fostering a safe
                                    environment for all
                                    residents.
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Our innovative system utilizes cutting-edge technology to recognize car plate
                                    numbers
                                    within the village, providing an added layer of security and peace of mind.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="info-table">
                        <ul>
                            <li>
                                <img src="{{ asset('template_landing/assets/images/info-icon-01.png') }}"
                                    alt="" style="max-width: 52px;">
                                <h4>License Plate Recognition</h4>
                            </li>
                            <li>
                                <img src="{{ asset('template_landing/assets/images/info-icon-02.png') }}"
                                    alt="" style="max-width: 52px;">
                                <h4>Residents & Guests</h4>
                            </li>
                            <li>
                                <img src="{{ asset('template_landing/assets/images/info-icon-03.png') }}"
                                    alt="" style="max-width: 52px;">
                                <h4>User-Friendly Interface</span></h4>
                            </li>
                            <li>
                                <img src="{{ asset('template_landing/assets/images/info-icon-04.png') }}"
                                    alt="" style="max-width: 52px;">
                                <h4>Security Alerts</span></h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="col">
                <p>Copyright © Dreamland. All rights reserved.
                    Designed by: <a rel="nofollow" href="#" target="_blank">BSCpE 4A11</a>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('template_landing/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template_landing/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template_landing/assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('template_landing/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('template_landing/assets/js/counter.js') }}"></script>
    <script src="{{ asset('template_landing/assets/js/custom.js') }}"></script>


</body>

</html>
