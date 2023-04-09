<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} | @yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png')  }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/plyr.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @livewireStyles
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header Section Begin -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="{{ url('') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="{{ url('') }}">Homepage</a></li>
                            <li><a href="{{ url('') }}">Categories <span class="arrow_carrot-down"></span></a>
                                <ul class="dropdown">
                                    <li><a href="{{ url('') }}">Categories</a></li>
                                    <li><a href="{{ url('') }}">Anime Details</a></li>
                                    <li><a href="{{ url('') }}">Anime Watching</a></li>
                                    <li><a href="{{ url('') }}">Blog Details</a></li>
                                    <li><a href="{{ url('') }}">Sign Up</a></li>
                                    <li><a href="{{ url('') }}">Login</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('random') }}">Random</a></li>
                            <li><a href="{{ url('news') }}">News</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="header__right">
                    <a href="#" class="search-switch"><span><i class="fa fa-search"></i></span></a>
                    @guest
                        <a href="{{ url('login') }}"><span><i class="fa fa-user"></i></span></a>
                    @else
                        <a href="{{ url('/') }}"><span><i class="fa fa-user"></i></span></a>
                    @endguest
                    @auth
                        <form action="{{ route('logout') }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn-logout">
                                <span><i class="fa fa-sign-out"></i></span>
                            </button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
<!-- Header End -->

@yield('content')

<!-- Footer Section Begin -->
<footer class="footer">
    <div class="page-up">
        <a href="#" id="scrollToTopButton"><span><i class="fa fa-angle-up"></i></span></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer__logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" alt="Movie-Recommender-Logo"></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer__nav">
                    <ul>
                        <li><a href="{{ url('https://github.com/wiluszdamian/Movie-Recommender') }}"><i class="fa fa-github"></i> GitHub</a></li>
                        <li><a href="{{ url('https://www.linkedin.com/in/damianwilusz/') }}"><i class="fa fa-linkedin"></i> LinkedIn</a></li>
                        <li><a href="{{ url('https://www.wilusz.eu/') }}"><i class="fa fa-wordpress"></i> Portfolio</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search model Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="fa fa-times"></i></div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- Js Plugins -->
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/player.js') }}"></script>
<script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('js/mixitup.min.js') }}"></script>
<script src="{{ asset('js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<!-- Livewire -->
@livewireScripts
</body>

</html>
