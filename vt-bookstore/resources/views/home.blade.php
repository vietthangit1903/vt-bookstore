<!DOCTYPE html>
<html lang="en">

<head>

    <title>VT Bookstore</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="{{ url('') }}/assets/img/header-logo-2.png">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('') }}/assets/vendor/fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/vendor/animate.css/animate.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/vendor/slick-carousel/slick/slick.css" />
    <link rel="stylesheet"
        href="{{ url('') }}/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/loader.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/theme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <div id="preloader">
        <div class="loader">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <header id="site-header" class="site-header__v2 site-header__white-text">
        <div class="masthead">
            <div class="bg-secondary-blue-800">
                <div class="container pt-3 pt-md-4 pb-3 pb-md-5">
                    <div class="d-flex align-items-center position-relative flex-wrap">
                        <div class="offcanvas-toggler mr-4">
                            <a id="sidebarNavToggler2" href="javascript:;" role="button" class="cat-menu"
                                aria-controls="sidebarContent2" aria-haspopup="true" aria-expanded="false"
                                data-unfold-event="click" data-unfold-hide-on-scroll="false"
                                data-unfold-target="#sidebarContent2" data-unfold-type="css-animation"
                                data-unfold-overlay='{
                                "className": "u-sidebar-bg-overlay",
                                "background": "rgba(0, 0, 0, .7)",
                                "animationSpeed": 100
                            }'
                                data-unfold-animation-in="fadeInLeft" data-unfold-animation-out="fadeOutLeft"
                                data-unfold-duration="100">
                                <svg width="20px" height="18px">
                                    <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                                        d="M-0.000,-0.000 L20.000,-0.000 L20.000,2.000 L-0.000,2.000 L-0.000,-0.000 Z" />
                                    <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                                        d="M-0.000,8.000 L15.000,8.000 L15.000,10.000 L-0.000,10.000 L-0.000,8.000 Z" />
                                    <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                                        d="M-0.000,16.000 L20.000,16.000 L20.000,18.000 L-0.000,18.000 L-0.000,16.000 Z" />
                                </svg>
                            </a>
                        </div>
                        <div class="site-branding pr-7">
                            <a href="{{ route('home') }}" class="d-block mb-2">
                                <img src="{{ url('') }}/assets/img/header-logo-2.png" alt=""
                                    style="width: 100px;">
                            </a>
                        </div>
                        <div
                            class="site-search ml-xl-0 ml-md-auto w-r-100 flex-grow-1 mr-md-5 mt-2 mt-md-0 order-1 order-md-0">
                            <form class="form-inline my-2 my-xl-0" method="GET" action="{{ route('search-book') }}">
                                <div class="input-group input-group-borderless w-100" id="search-home">
                                    <input type="text" name="keyword" id="search-input"
                                        class="form-control border-left rounded-left-1 rounded-left-xl-1 px-3"
                                        placeholder="Search for books by keyword"
                                        aria-label="Amount (to the nearest dollar)">
                                    <div class="input-group-append">
                                        <button
                                            class="btn btn-primary-blue px-3 py-2 rounded-right-1 rounded-right-xl-1"
                                            type="submit"><i
                                                class="fa-solid fa-magnifying-glass mx-1 text-white"></i></button>
                                    </div>
                                    <div class="bg-white search-list-container rounded-bottom">

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="d-flex align-items-center">

                            <div class="dropdown">
                                <a href="#" id="userDropdownInvoker" data-toggle="dropdown" aria-expanded="false"
                                    data-unfold-event="click" data-unfold-target="#userDropdownMenu"
                                    data-unfold-type="css-animation" data-unfold-duration="200" data-unfold-delay="50"
                                    data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp"
                                    data-unfold-animation-out="fadeOut">
                                    <div class="d-flex align-items-center text-white font-size-2 text-lh-sm">
                                        <i class="fa-regular fa-user font-size-5"></i>
                                        <div class="ml-2 d-none d-lg-block">
                                            @auth
                                                <span class="text-white font-size-1">Hello</span>
                                                <div class="">{{ Auth()->user()->fullName }}</div>
                                            @endauth
                                            @guest
                                                <span class="text-white font-size-1">Sign In</span>
                                                <div class="">My Account</div>
                                            @endguest
                                        </div>
                                    </div>
                                </a>
                                <ul id="userDropdownMenu"
                                    class="dropdown-unfold dropdown-menu dropdown-menu-right font-size-2 rounded-0 border-gray-900"
                                    aria-labelledby="userDropdownInvoker">
                                    @auth
                                        <li style="text-align: center" class="mb-2">
                                            <a href="{{ route('my-account') }}" title="My account">
                                                <img src="{{ asset(Auth::user()->image) }}"
                                                    style="object-fit: cover; border: 2px solid var(--primary);"
                                                    alt="Profile image" width="48" height="48"
                                                    class="rounded-circle ">
                                            </a>

                                        </li>
                                        <li><a href="{{ route('my-account') }}" class="dropdown-item link-black-100">My
                                                account</a></li>
                                        @if (Session::has('isAdmin'))
                                            <li><a href="{{ route('admin.dashboard') }}"
                                                    class="dropdown-item link-black-100">Admin Page</a></li>
                                        @endif
                                        <li><a href="#" class="dropdown-item link-black-100">Shopping Cart</a></li>
                                        <li><a href="#" class="dropdown-item link-black-100">Wishlist</a></li>
                                        <li><a href="{{ route('change-password') }}"
                                                class="dropdown-item link-black-100">Change password</a></li>
                                        <li><a href="{{ route('auth.logout') }}" class="dropdown-item link-black-100">Log
                                                out</a></li>
                                    @endauth
                                    @guest
                                        <li><a href="{{ route('auth.login') }}" class="dropdown-item link-black-100">Log
                                                in</a></li>
                                        <li><a href="{{ route('guest.register') }}"
                                                class="dropdown-item link-black-100">Register</a></li>
                                        <li><a href="#" class="dropdown-item link-black-100">Forgot Password</a>
                                        </li>
                                    @endguest
                                </ul>
                            </div>


                            <a id="sidebarNavToggler1" href="javascript:;" role="button"
                                class="ml-4 d-none d-lg-block" aria-controls="sidebarContent1" aria-haspopup="true"
                                aria-expanded="false" data-unfold-event="click" data-unfold-hide-on-scroll="false"
                                data-unfold-target="#sidebarContent1" data-unfold-type="css-animation"
                                data-unfold-overlay='{
                                    "className": "u-sidebar-bg-overlay",
                                    "background": "rgba(0, 0, 0, .7)",
                                    "animationSpeed": 500
                                }'
                                data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight"
                                data-unfold-duration="500">
                                <div
                                    class="d-flex align-items-center text-white font-size-2 text-lh-sm position-relative">
                                    @auth
                                        <span id="cart-amount"
                                            class="position-absolute bg-red-1 width-16 height-16 rounded-circle d-flex align-items-center justify-content-center text-white font-size-n9 left-0 top-0 ml-n2 mt-n1">0</span>
                                        <i class="fa-solid fa-bag-shopping font-size-5"></i>
                                        <div class="ml-2">
                                            <span class="text-white font-size-1">Book Cart</span>
                                            <div id="cart-total">$0</div>
                                        </div>
                                    @endauth
                                    @guest
                                        <i class="fa-solid fa-bag-shopping font-size-5"></i>
                                        <div class="ml-2">
                                            <span class="text-white font-size-1">Book Cart</span>
                                            <div class="">Login to use</div>
                                        </div>
                                    @endguest

                                </div>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-secondary-black-200 d-none d-md-block">
                <div class="container">
                    <div class="d-flex align-items-center justify-content-center position-relative">
                        <div class="site-navigation mr-auto d-none d-xl-block">
                            <ul class="nav">
                                <li class="nav-item dropdown">
                                    <a href="{{ route('home') }}"
                                        class="nav-link link-black-100 mx-3 px-0 py-3 font-size-2 font-weight-medium">
                                        Home
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="categoriesDropdownInvoker" href="#"
                                        class="dropdown-toggle nav-link link-black-100 mx-3 px-0 py-3 font-size-2 font-weight-medium d-flex align-items-center"
                                        aria-haspopup="true" aria-expanded="false" data-unfold-event="hover"
                                        data-unfold-target="#categoriesDropdownMenu" data-unfold-type="css-animation"
                                        data-unfold-duration="200" data-unfold-delay="50"
                                        data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp"
                                        data-unfold-animation-out="fadeOut">
                                        Categories
                                    </a>
                                    <ul id="categoriesDropdownMenu"
                                        class="dropdown-unfold dropdown-menu font-size-2 rounded-0 border-gray-900"
                                        aria-labelledby="categoriesDropdownInvoker">
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="shopDropdownInvoker" href="#"
                                        class="dropdown-toggle nav-link link-black-100 mx-3 px-0 py-3 font-size-2 font-weight-medium d-flex align-items-center"
                                        aria-haspopup="true" aria-expanded="false" data-unfold-event="hover"
                                        data-unfold-target="#shopDropdownMenu" data-unfold-type="css-animation"
                                        data-unfold-duration="200" data-unfold-delay="50"
                                        data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp"
                                        data-unfold-animation-out="fadeOut">
                                        Shop
                                    </a>
                                    <ul id="shopDropdownMenu"
                                        class="dropdown-unfold dropdown-menu font-size-2 rounded-0 border-gray-900"
                                        aria-labelledby="shopDropdownInvoker">
                                        <li><a href="{{ route('book-list') }}"
                                                class="dropdown-item link-black-100">Book List </a>
                                        </li>
                                        <li><a href="{{ route('cart') }}" class="dropdown-item link-black-100">Book
                                                cart</a>
                                        </li>
                                        <li><a href="./checkout.html" class="dropdown-item link-black-100">Book
                                                checkout</a></li>
                                        <li><a href="{{ route('my-account') }}"
                                                class="dropdown-item link-black-100">My
                                                Account</a></li>
                                        <li><a href="./order-received.html" class="dropdown-item link-black-100">Order
                                                Received</a></li>
                                        <li><a href="./order-tracking.html" class="dropdown-item link-black-100">Order
                                                Tracking</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="secondary-navigation">
                            <ul class="nav">
                                <li class="nav-item"><a href="#"
                                        class="nav-link link-black-100 mx-2 px-0 py-3 font-size-2 font-weight-medium">Today's
                                        Deals</a></li>
                                <li class="nav-item"><a href="#"
                                        class="nav-link link-black-100 mx-2 px-0 py-3 font-size-2 font-weight-medium">Best
                                        Seller</a></li>
                                <li class="nav-item"><a href="#"
                                        class="nav-link link-black-100 mx-2 px-0 py-3 font-size-2 font-weight-medium">Trending
                                        Books</a>
                                </li>
                                <li class="nav-item"><a href="#"
                                        class="nav-link link-black-100 mx-2 px-0 py-3 font-size-2 font-weight-medium">Gift
                                        Cards</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="user-cart">
            @include('layout.cart')
    </div>


    @include('layout.sidebar')



    <div class="hero-slider-with-banners space-bottom-2 mt-4d875">
        <div class="container">
            <div class="row">
                <div class="col-wd-9 mb-4 mb-xl-0">
                    <div class="bg-gray-200 px-5 px-md-8 px-xl-0 pl-xl-10 pt-6 min-height-530">
                        <div class="js-slick-carousel u-slick"
                            data-pagi-classes="text-center u-slick__pagination u-slick__pagination mt-7">
                            <div class="js-slider">
                                <div class="hero-slider">
                                    <div class="d-block d-xl-flex media">
                                        <div class="hero__body media-body align-self-center mb-4 mb-xl-0">
                                            <div class="hero__pretitle text-uppercase text-gray-400 font-weight-bold mb-3"
                                                data-scs-animation-in="fadeInUp" data-scs-animation-delay="200">
                                                Book Club
                                            </div>
                                            <h2 class="hero__title font-size-10 mb-3" data-scs-animation-in="fadeInUp"
                                                data-scs-animation-delay="300">
                                                <span class="hero__title--1 font-weight-bold d-block">A selection
                                                    with</span>
                                                <span class="hero__title--2 d-block font-weight-normal">only the best
                                                    books</span>
                                            </h2>
                                            <p class="hero__subtitle font-size-2 mb-5"
                                                data-scs-animation-in="fadeInUp" data-scs-animation-delay="400">Sale
                                                Ends Midnight 30th April 2020
                                            </p>
                                            <a href="./v2.html"
                                                class="hero__btn btn btn-primary-blue text-white btn-wide"
                                                data-scs-animation-in="fadeInUp"
                                                data-scs-animation-delay="500">Explore Books
                                            </a>
                                        </div>
                                        <div data-scs-animation-in="fadeInUp" data-scs-animation-delay="600">
                                            <img src="{{ url('') }}/assets/img/500x380/img1.png"
                                                class="img-fluid" alt="image-description">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="js-slider">
                                <div class="hero-slider">
                                    <div class="d-block d-xl-flex media">
                                        <div class="hero__body media-body align-self-center mb-4 mb-xl-0">
                                            <div class="hero__pretitle text-uppercase text-gray-400 font-weight-bold mb-3"
                                                data-scs-animation-in="fadeInUp" data-scs-animation-delay="200">
                                                Book Club
                                            </div>
                                            <h2 class="hero__title font-size-10 mb-3" data-scs-animation-in="fadeInUp"
                                                data-scs-animation-delay="300">
                                                <span class="hero__title--1 font-weight-bold d-block">A selection
                                                    with</span>
                                                <span class="hero__title--2 d-block font-weight-normal">only the best
                                                    books</span>
                                            </h2>
                                            <p class="hero__subtitle font-size-2 mb-5"
                                                data-scs-animation-in="fadeInUp" data-scs-animation-delay="400">Sale
                                                Ends Midnight 30th April 2020
                                            </p>
                                            <a href="./v2.html"
                                                class="hero__btn btn btn-primary-blue text-white btn-wide"
                                                data-scs-animation-in="fadeInUp"
                                                data-scs-animation-delay="500">Explore Books
                                            </a>
                                        </div>
                                        <div data-scs-animation-in="fadeInUp" data-scs-animation-delay="600">
                                            <img src="{{ url('') }}/assets/img/500x380/img1.png"
                                                class="img-fluid" alt="image-description">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="js-slider">
                                <div class="hero-slider">
                                    <div class="d-block d-xl-flex media">
                                        <div class="hero__body media-body align-self-center mb-4 mb-xl-0">
                                            <div class="hero__pretitle text-uppercase text-gray-400 font-weight-bold mb-3"
                                                data-scs-animation-in="fadeInUp" data-scs-animation-delay="200">
                                                Book Club
                                            </div>
                                            <h2 class="hero__title font-size-10 mb-3" data-scs-animation-in="fadeInUp"
                                                data-scs-animation-delay="300">
                                                <span class="hero__title--1 font-weight-bold d-block">A selection
                                                    with</span>
                                                <span class="hero__title--2 d-block font-weight-normal">only the best
                                                    books</span>
                                            </h2>
                                            <p class="hero__subtitle font-size-2 mb-5"
                                                data-scs-animation-in="fadeInUp" data-scs-animation-delay="400">Sale
                                                Ends Midnight 30th April 2020
                                            </p>
                                            <a href="./v2.html"
                                                class="hero__btn btn btn-primary-blue text-white btn-wide"
                                                data-scs-animation-in="fadeInUp"
                                                data-scs-animation-delay="500">Explore Books
                                            </a>
                                        </div>
                                        <div data-scs-animation-in="fadeInUp" data-scs-animation-delay="600">
                                            <img src="{{ url('') }}/assets/img/500x380/img1.png"
                                                class="img-fluid" alt="image-description">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="js-slider">
                                <div class="hero-slider">
                                    <div class="d-block d-xl-flex media">
                                        <div class="hero__body media-body align-self-center mb-4 mb-xl-0">
                                            <div class="hero__pretitle text-uppercase text-gray-400 font-weight-bold mb-3"
                                                data-scs-animation-in="fadeInUp" data-scs-animation-delay="200">
                                                Book Club
                                            </div>
                                            <h2 class="hero__title font-size-10 mb-3" data-scs-animation-in="fadeInUp"
                                                data-scs-animation-delay="300">
                                                <span class="hero__title--1 font-weight-bold d-block">A selection
                                                    with</span>
                                                <span class="hero__title--2 d-block font-weight-normal">only the best
                                                    books</span>
                                            </h2>
                                            <p class="hero__subtitle font-size-2 mb-5"
                                                data-scs-animation-in="fadeInUp" data-scs-animation-delay="400">Sale
                                                Ends Midnight 30th April 2020
                                            </p>
                                            <a href="./v2.html"
                                                class="hero__btn btn btn-primary-blue text-white btn-wide"
                                                data-scs-animation-in="fadeInUp"
                                                data-scs-animation-delay="500">Explore Books
                                            </a>
                                        </div>
                                        <div data-scs-animation-in="fadeInUp" data-scs-animation-delay="600">
                                            <img src="{{ url('') }}/assets/img/500x380/img1.png"
                                                class="img-fluid" alt="image-description">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="js-slider">
                                <div class="hero-slider">
                                    <div class="d-block d-xl-flex media">
                                        <div class="hero__body media-body align-self-center mb-4 mb-xl-0">
                                            <div class="hero__pretitle text-uppercase text-gray-400 font-weight-bold mb-3"
                                                data-scs-animation-in="fadeInUp" data-scs-animation-delay="200">
                                                Book Club
                                            </div>
                                            <h2 class="hero__title font-size-10 mb-3" data-scs-animation-in="fadeInUp"
                                                data-scs-animation-delay="300">
                                                <span class="hero__title--1 font-weight-bold d-block">A selection
                                                    with</span>
                                                <span class="hero__title--2 d-block font-weight-normal">only the best
                                                    books</span>
                                            </h2>
                                            <p class="hero__subtitle font-size-2 mb-5"
                                                data-scs-animation-in="fadeInUp" data-scs-animation-delay="400">Sale
                                                Ends Midnight 30th April 2020
                                            </p>
                                            <a href="./v2.html"
                                                class="hero__btn btn btn-primary-blue text-white btn-wide"
                                                data-scs-animation-in="fadeInUp"
                                                data-scs-animation-delay="500">Explore Books
                                            </a>
                                        </div>
                                        <div data-scs-animation-in="fadeInUp" data-scs-animation-delay="600">
                                            <img src="{{ url('') }}/assets/img/500x380/img1.png"
                                                class="img-fluid" alt="image-description">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-wd-3 d-xl-none d-wd-block">
                    <div class="banners d-md-flex d-xl-block">
                        <div class="slider-banner flex-grow-1 mr-md-3 mr-xl-0 bg-gray-200 p-6 mb-4d875 position-relative overflow-hidden"
                            style="height:250px;">
                            <div class="z-index-2 position-relative">
                                <h2 class="slider-banner__title font-size-4 text-lh-md">
                                    <span class="slider-banner__title--1 d-block font-weight-bold">Best Seller</span>
                                    <span class="slider-banner__title--2">Books</span>
                                </h2>
                                <a href="#"
                                    class="slider-banner__btn text-primary-blue text-uppercase font-weight-medium">Purchase</a>
                            </div>
                            <img src="{{ url('') }}/assets/img/285x240/img1.png"
                                class="img-fluid position-absolute bottom-n60 right-n60" alt="image-description">
                        </div>
                        <div class="slider-banner flex-grow-1 ml-md-3 ml-xl-0 bg-gray-200 p-6 position-relative overflow-hidden"
                            style="height:250px;">
                            <div class="z-index-2 position-relative">
                                <h2 class="slider-banner__title font-size-4 text-lh-md">
                                    <span class="slider-banner__title--1 d-block font-weight-bold">Featured Book</span>
                                    <span class="slider-banner__title--2">of the Month</span>
                                </h2>
                                <a href="#"
                                    class="slider-banner__btn text-primary-blue text-uppercase font-weight-medium">Purchase</a>
                            </div>
                            <img src="{{ url('') }}/assets/img/250x225/img1.png"
                                class="img-fluid position-absolute bottom-0 right-n60" alt="image-description">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="space-bottom-2">
        <div class="container">
            <header class="border-bottom mb-8d75 pb-4d75 d-md-flex justify-content-between align-items-center">
                <h2 class="font-size-7 mb-3 mb-md-0">New Arrival Books</h2>
                <ul class="nav justify-content-md-center nav-gray-700 flex-nowrap flex-md-wrap overflow-auto overflow-md-visible"
                    id="featuredBooks" role="tablist">
                    <li class="nav-item mx-5 mb-1 flex-shrink-0 flex-md-shrink-1">
                        <a class="nav-link px-0 active" id="featured-tab" data-toggle="tab" href="#featured"
                            role="tab" aria-controls="featured" aria-selected="true">Featured</a>
                    </li>
                    <li class="nav-item mx-5 mb-1 flex-shrink-0 flex-md-shrink-1">
                        <a class="nav-link px-0" id="onsale-tab" data-toggle="tab" href="#onsale" role="tab"
                            aria-controls="onsale" aria-selected="false">On Sale</a>
                    </li>
                    <li class="nav-item mx-5 mb-1 flex-shrink-0 flex-md-shrink-1">
                        <a class="nav-link px-0" id="mostviewed-tab" data-toggle="tab" href="#mostviewed"
                            role="tab" aria-controls="mostviewed" aria-selected="false">Most Viewed</a>
                    </li>
                </ul>
            </header>
            <div class="tab-content u-slick__tab space-bottom-2 border-bottom" id="featuredBooksContent">
                <div class="tab-pane fade show active" id="featured" role="tabpanel"
                    aria-labelledby="featured-tab">
                    <div class="js-slick-carousel products list-unstyled no-gutters my-0"
                        data-pagi-classes="d-md-none text-center u-slick__pagination u-slick__pagination mt-5 mb-0"
                        data-arrows-classes="d-none d-md-block u-slick__arrow u-slick__arrow-centered--y rounded-circle"
                        data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-inner u-slick__arrow-inner--left ml-xl-n10"
                        data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-inner u-slick__arrow-inner--right mr-xl-n10"
                        data-slides-show="5"
                        data-responsive='[{
                           "breakpoint": 1500,
                           "settings": {
                             "slidesToShow": 4
                           }
                        }, {
                           "breakpoint": 992,
                           "settings": {
                             "slidesToShow": 3
                           }
                        }, {
                           "breakpoint": 554,
                           "settings": {
                             "slidesToShow": 2
                           }
                        }]'>
                        @foreach ($books as $book)
                            <div class="product product__no-border border-right">
                                <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                    <div
                                        class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            <a href="{{ route('bookDetail', ['book_id' => $book->id]) }}"
                                                class="d-block"><img
                                                    src="{{ asset($book->bookImages[0]->image_path) }}"
                                                    class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                    alt="image-description" height="180" width="120"
                                                    style="width: 120px; height: 180px; object-fit: contain"></a>
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <h2
                                                class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                                <a
                                                    href="{{ route('bookDetail', ['book_id' => $book->id]) }}">{{ $book->name }}</a>
                                            </h2>
                                            <div class="font-size-2  mb-1 text-truncate"><a href="#"
                                                    class="text-gray-700">{{ $book->author->name }}</a></div>
                                            <div
                                                class="price d-flex align-items-center font-weight-medium font-size-3">
                                                <span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">$</span>{{ $book->price }}</span>
                                            </div>

                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            <a href="{{ route('addSingleBook') }}" data-id="{{ $book->id }}" data-quantity="1" data-csrf="{{ csrf_token() }}"
                                                class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i
                                                        class="fa-solid fa-bag-shopping"></i></span>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-solid fa-repeat"></i>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
                <div class="tab-pane fade" id="onsale" role="tabpanel" aria-labelledby="onsale-tab">
                    <div class="js-slick-carousel products list-unstyled no-gutters my-0"
                        data-pagi-classes="d-md-none text-center u-slick__pagination u-slick__pagination mt-5 mb-0"
                        data-arrows-classes="d-none d-md-block u-slick__arrow u-slick__arrow-centered--y rounded-circle"
                        data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-inner u-slick__arrow-inner--left ml-xl-n10"
                        data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-inner u-slick__arrow-inner--right mr-xl-n10"
                        data-slides-show="5"
                        data-responsive='[{
                           "breakpoint": 1500,
                           "settings": {
                             "slidesToShow": 4
                           }
                        }, {
                           "breakpoint": 992,
                           "settings": {
                             "slidesToShow": 3
                           }
                        }, {
                           "breakpoint": 554,
                           "settings": {
                             "slidesToShow": 2
                           }
                        }]'>
                        <div class="product product__no-border border-right">
                            <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                <div
                                    class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="./single-product-v2.html" class="d-block"><img
                                                src="{{ url('') }}/assets/img/120x180/img1.jpg"
                                                class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                href="./single-product-v2.html">Paperback</a></div>
                                        <h2
                                            class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                            <a href="./single-product-v2.html">Think Like a Monk: Train Your Mind for
                                                Peace and Purpose
                                                Everyday</a>
                                        </h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a
                                                href="../others/authors-single.html" class="text-gray-700">Jay
                                                Shetty</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>

                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="./single-product-v2.html"
                                            class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i
                                                    class="fa-solid fa-bag-shopping"></i></span>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-solid fa-repeat"></i>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product product__no-border border-right">
                            <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                <div
                                    class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="./single-product-v2.html" class="d-block"><img
                                                src="{{ url('') }}/assets/img/120x180/img2.jpg"
                                                class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                href="./single-product-v2.html">Kindle
                                                Edition</a></div>
                                        <h2
                                            class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                            <a href="./single-product-v2.html">The Overdue Life of Amy Byler</a>
                                        </h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a
                                                href="../others/authors-single.html" class="text-gray-700">Kelly
                                                Harms</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="./single-product-v2.html"
                                            class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i
                                                    class="fa-solid fa-bag-shopping"></i></span>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-solid fa-repeat"></i>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product product__no-border border-right">
                            <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                <div
                                    class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="./single-product-v2.html" class="d-block"><img
                                                src="{{ url('') }}/assets/img/120x180/img3.jpg"
                                                class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                href="./single-product-v2.html">Paperback</a></div>
                                        <h2
                                            class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                            <a href="./single-product-v2.html">Call Me By Your Name</a>
                                        </h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a
                                                href="../others/authors-single.html" class="text-gray-700">Jay
                                                Shetty</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>

                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="./single-product-v2.html"
                                            class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i
                                                    class="fa-solid fa-bag-shopping"></i></span>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-solid fa-repeat"></i>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product product__no-border border-right">
                            <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                <div
                                    class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="./single-product-v2.html" class="d-block"><img
                                                src="{{ url('') }}/assets/img/120x180/img4.jpg"
                                                class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                href="./single-product-v2.html">Kindle
                                                Edition</a></div>
                                        <h2
                                            class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                            <a href="./single-product-v2.html">Blindside (Michael Bennett)</a>
                                        </h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a
                                                href="../others/authors-single.html" class="text-gray-700">Kelly
                                                Harms</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="./single-product-v2.html"
                                            class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i
                                                    class="fa-solid fa-bag-shopping"></i></span>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-solid fa-repeat"></i>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product product__no-border border-right">
                            <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                <div
                                    class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="./single-product-v2.html" class="d-block"><img
                                                src="{{ url('') }}/assets/img/120x180/img5.jpg"
                                                class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                href="./single-product-v2.html">Paperback</a></div>
                                        <h2
                                            class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                            <a href="./single-product-v2.html">Jesus: The God Who Knows Your Name</a>
                                        </h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a
                                                href="../others/authors-single.html" class="text-gray-700">Jay
                                                Shetty</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>

                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="./single-product-v2.html"
                                            class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i
                                                    class="fa-solid fa-bag-shopping"></i></span>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-solid fa-repeat"></i>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product product__no-border border-right">
                            <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                <div
                                    class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="./single-product-v2.html" class="d-block"><img
                                                src="{{ url('') }}/assets/img/120x180/img6.jpg"
                                                class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                href="./single-product-v2.html">Kindle
                                                Edition</a></div>
                                        <h2
                                            class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                            <a href="./single-product-v2.html">Scot Under the Covers: The Wild
                                                Wicked...</a>
                                        </h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a
                                                href="../others/authors-single.html" class="text-gray-700">Kelly
                                                Harms</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="./single-product-v2.html"
                                            class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i
                                                    class="fa-solid fa-bag-shopping"></i></span>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-solid fa-repeat"></i>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product product__no-border border-right">
                            <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                <div
                                    class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="./single-product-v2.html" class="d-block"><img
                                                src="{{ url('') }}/assets/img/120x180/img7.jpg"
                                                class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                href="./single-product-v2.html">Paperback</a></div>
                                        <h2
                                            class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                            <a href="./single-product-v2.html">Camino Winds</a>
                                        </h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a
                                                href="../others/authors-single.html" class="text-gray-700">Jay
                                                Shetty</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>

                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="./single-product-v2.html"
                                            class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i
                                                    class="fa-solid fa-bag-shopping"></i></span>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-solid fa-repeat"></i>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product product__no-border border-right">
                            <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                <div
                                    class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="./single-product-v2.html" class="d-block"><img
                                                src="{{ url('') }}/assets/img/120x180/img8.jpg"
                                                class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                href="./single-product-v2.html">Kindle
                                                Edition</a></div>
                                        <h2
                                            class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                            <a href="./single-product-v2.html">Broken Faith: Inside the Word of
                                                Faith...</a>
                                        </h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a
                                                href="../others/authors-single.html" class="text-gray-700">Kelly
                                                Harms</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="./single-product-v2.html"
                                            class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i
                                                    class="fa-solid fa-bag-shopping"></i></span>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-solid fa-repeat"></i>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="mostviewed" role="tabpanel" aria-labelledby="mostviewed-tab">
                    <div class="js-slick-carousel products list-unstyled no-gutters my-0"
                        data-pagi-classes="d-md-none text-center u-slick__pagination u-slick__pagination mt-5 mb-0"
                        data-arrows-classes="d-none d-md-block u-slick__arrow u-slick__arrow-centered--y rounded-circle"
                        data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-inner u-slick__arrow-inner--left ml-xl-n10"
                        data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-inner u-slick__arrow-inner--right mr-xl-n10"
                        data-slides-show="5"
                        data-responsive='[{
                           "breakpoint": 1500,
                           "settings": {
                             "slidesToShow": 4
                           }
                        }, {
                           "breakpoint": 992,
                           "settings": {
                             "slidesToShow": 3
                           }
                        }, {
                           "breakpoint": 554,
                           "settings": {
                             "slidesToShow": 2
                           }
                        }]'>
                        <div class="product product__no-border border-right">
                            <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                <div
                                    class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="./single-product-v2.html" class="d-block"><img
                                                src="{{ url('') }}/assets/img/120x180/img1.jpg"
                                                class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                href="./single-product-v2.html">Paperback</a></div>
                                        <h2
                                            class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                            <a href="./single-product-v2.html">Think Like a Monk: Train Your Mind for
                                                Peace and Purpose
                                                Everyday</a>
                                        </h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a
                                                href="../others/authors-single.html" class="text-gray-700">Jay
                                                Shetty</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>

                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="./single-product-v2.html"
                                            class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i
                                                    class="fa-solid fa-bag-shopping"></i></span>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-solid fa-repeat"></i>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product product__no-border border-right">
                            <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                <div
                                    class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="./single-product-v2.html" class="d-block"><img
                                                src="{{ url('') }}/assets/img/120x180/img2.jpg"
                                                class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                href="./single-product-v2.html">Kindle
                                                Edition</a></div>
                                        <h2
                                            class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                            <a href="./single-product-v2.html">The Overdue Life of Amy Byler</a>
                                        </h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a
                                                href="../others/authors-single.html" class="text-gray-700">Kelly
                                                Harms</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="./single-product-v2.html"
                                            class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i
                                                    class="fa-solid fa-bag-shopping"></i></span>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-solid fa-repeat"></i>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product product__no-border border-right">
                            <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                <div
                                    class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="./single-product-v2.html" class="d-block"><img
                                                src="{{ url('') }}/assets/img/120x180/img3.jpg"
                                                class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                href="./single-product-v2.html">Paperback</a></div>
                                        <h2
                                            class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                            <a href="./single-product-v2.html">Call Me By Your Name</a>
                                        </h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a
                                                href="../others/authors-single.html" class="text-gray-700">Jay
                                                Shetty</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>

                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="./single-product-v2.html"
                                            class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i
                                                    class="fa-solid fa-bag-shopping"></i></span>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-solid fa-repeat"></i>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product product__no-border border-right">
                            <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                <div
                                    class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="./single-product-v2.html" class="d-block"><img
                                                src="{{ url('') }}/assets/img/120x180/img4.jpg"
                                                class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                href="./single-product-v2.html">Kindle
                                                Edition</a></div>
                                        <h2
                                            class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                            <a href="./single-product-v2.html">Blindside (Michael Bennett)</a>
                                        </h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a
                                                href="../others/authors-single.html" class="text-gray-700">Kelly
                                                Harms</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="./single-product-v2.html"
                                            class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i
                                                    class="fa-solid fa-bag-shopping"></i></span>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-solid fa-repeat"></i>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product product__no-border border-right">
                            <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                <div
                                    class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="./single-product-v2.html" class="d-block"><img
                                                src="{{ url('') }}/assets/img/120x180/img5.jpg"
                                                class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                href="./single-product-v2.html">Paperback</a></div>
                                        <h2
                                            class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                            <a href="./single-product-v2.html">Jesus: The God Who Knows Your Name</a>
                                        </h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a
                                                href="../others/authors-single.html" class="text-gray-700">Jay
                                                Shetty</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>

                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="./single-product-v2.html"
                                            class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i
                                                    class="fa-solid fa-bag-shopping"></i></span>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-solid fa-repeat"></i>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product product__no-border border-right">
                            <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                <div
                                    class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="./single-product-v2.html" class="d-block"><img
                                                src="{{ url('') }}/assets/img/120x180/img6.jpg"
                                                class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                href="./single-product-v2.html">Kindle
                                                Edition</a></div>
                                        <h2
                                            class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                            <a href="./single-product-v2.html">Scot Under the Covers: The Wild
                                                Wicked...</a>
                                        </h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a
                                                href="../others/authors-single.html" class="text-gray-700">Kelly
                                                Harms</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="./single-product-v2.html"
                                            class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i
                                                    class="fa-solid fa-bag-shopping"></i></span>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-solid fa-repeat"></i>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product product__no-border border-right">
                            <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                <div
                                    class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="./single-product-v2.html" class="d-block"><img
                                                src="{{ url('') }}/assets/img/120x180/img7.jpg"
                                                class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                href="./single-product-v2.html">Paperback</a></div>
                                        <h2
                                            class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                            <a href="./single-product-v2.html">Camino Winds</a>
                                        </h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a
                                                href="../others/authors-single.html" class="text-gray-700">Jay
                                                Shetty</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>

                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="./single-product-v2.html"
                                            class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i
                                                    class="fa-solid fa-bag-shopping"></i></span>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-solid fa-repeat"></i>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product product__no-border border-right">
                            <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                <div
                                    class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="./single-product-v2.html" class="d-block"><img
                                                src="{{ url('') }}/assets/img/120x180/img8.jpg"
                                                class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                href="./single-product-v2.html">Kindle
                                                Edition</a></div>
                                        <h2
                                            class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                            <a href="./single-product-v2.html">Broken Faith: Inside the Word of
                                                Faith...</a>
                                        </h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a
                                                href="../others/authors-single.html" class="text-gray-700">Kelly
                                                Harms</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="./single-product-v2.html"
                                            class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i
                                                    class="fa-solid fa-bag-shopping"></i></span>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-solid fa-repeat"></i>
                                        </a>
                                        <a href="./single-product-v2.html"
                                            class="h-p-bg btn btn-outline-primary-blue border-0">
                                            <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="space-bottom-3">
        <div class="space-1">
            <div class="container">
                <header class="border-bottom mb-8d75 pb-4">
                    <h2 class="font-size-7 mb-0">Deals of the week</h2>
                </header>
                <div class="js-slick-carousel u-slick products bg-white"
                    data-pagi-classes="text-center u-slick__pagination u-slick__pagination mt-6 mb-0 position-absolute right-0 left-0"
                    data-slides-show="2"
                    data-responsive='[{
                       "breakpoint": 1199,
                       "settings": {
                         "slidesToShow": 1
                       }
                    }, {
                       "breakpoint": 768,
                       "settings": {
                         "slidesToShow": 1
                       }
                    }, {
                       "breakpoint": 554,
                       "settings": {
                         "slidesToShow": 1
                       }
                    }]'>
                    <div class="product product__card product__card-v2 border-right">
                        <div class="media d-block d-md-flex px-4 px-md-6 px-xl-8d75">
                            <div class="woocommerce-loop-product__thumbnail mb-4 mb-md-0">
                                <a href="./single-product-v2.html" class="d-block" tabindex="0"><img
                                        src="{{ url('') }}/assets/img/200x327/img1.jpg"
                                        class="attachment-shop_catalog size-shop_catalog wp-post-image d-block mx-auto"
                                        alt="image-description"></a>
                            </div>
                            <div class="woocommerce-loop-product__body media-body ml-md-5d25">
                                <div class="mb-3">
                                    <div class="text-primary text-uppercase font-size-1 mb-1 text-truncate">
                                        <a href="./single-product-v2.html" tabindex="0">Kindle Edition</a>
                                    </div>
                                    <h2
                                        class="woocommerce-loop-product__title font-size-3 text-lh-md mb-2 text-height-2 crop-text-2 h-dark">
                                        <a href="./single-product-v2.html" tabindex="0">Dark in Death: An Eve
                                            Dallas Novel (In Death,
                                            Book 46)</a>
                                    </h2>
                                    <div class="font-size-2 text-gray-700 mb-1 text-truncate"><a
                                            href="../others/authors-single.html" class="text-gray-700"
                                            tabindex="0">Nora Roberts</a>
                                    </div>
                                    <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                        <ins class="text-decoration-none mr-2"><span
                                                class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>79</span></ins>
                                        <del class="font-size-1 font-weight-regular text-gray-700"><span
                                                class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>99</span></del>
                                    </div>
                                </div>
                                <div class="countdown-timer mb-5">
                                    <h5 class="countdown-timer__title font-size-3 mb-3">Hurry Up! <span
                                            class="font-weight-regular">Offer
                                            ends in:</span></h5>
                                    <div class="d-flex align-items-stretch justify-content-between">
                                        <div class="py-2d75">
                                            <span class="font-weight-medium font-size-3">114</span>
                                            <span
                                                class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Days</span>
                                        </div>
                                        <div class="border-left pr-3 pr-md-0">&nbsp;</div>
                                        <div class="py-2d75">
                                            <span class="font-weight-medium font-size-3">03</span>
                                            <span
                                                class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Hours</span>
                                        </div>
                                        <div class="border-left pr-3 pr-md-0">&nbsp;</div>
                                        <div class="py-2d75">
                                            <span class="font-weight-medium font-size-3">60</span>
                                            <span
                                                class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Mins</span>
                                        </div>
                                        <div class="border-left pr-3 pr-md-0">&nbsp;</div>
                                        <div class="py-2d75">
                                            <span class="font-weight-medium font-size-3">25</span>
                                            <span
                                                class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Secs</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="deal-progress">
                                    <div class="d-flex justify-content-between font-size-2 mb-2d75">
                                        <span>Already Sold: 14</span>
                                        <span>Available: 3</span>
                                    </div>
                                    <div class="progress">
                                        <div class="bg-dark progress-bar" role="progressbar" style="width:82%"
                                            aria-valuenow="14" aria-valuemin="0" aria-valuemax="17"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product product__card product__card-v2 border-right">
                        <div class="media d-block d-md-flex px-4 px-md-6 px-xl-8d75">
                            <div class="woocommerce-loop-product__thumbnail mb-4 mb-md-0">
                                <a href="./single-product-v2.html" class="d-block" tabindex="0"><img
                                        src="{{ url('') }}/assets/img/200x327/img2.jpg"
                                        class="attachment-shop_catalog size-shop_catalog wp-post-image d-block mx-auto"
                                        alt="image-description"></a>
                            </div>
                            <div class="woocommerce-loop-product__body media-body ml-md-5d25">
                                <div class="mb-3">
                                    <div class="text-primary text-uppercase font-size-1 mb-1 text-truncate">
                                        <a href="./single-product-v2.html" tabindex="0">Kindle Edition</a>
                                    </div>
                                    <h2
                                        class="woocommerce-loop-product__title font-size-3 text-lh-md mb-2 text-height-2 crop-text-2 h-dark">
                                        <a href="./single-product-v2.html" tabindex="0">Under a Firefly Moon
                                            (Firefly Lake Book 1)</a>
                                    </h2>
                                    <div class="font-size-2 text-gray-700 mb-1 text-truncate"><a
                                            href="../others/authors-single.html" class="text-gray-700"
                                            tabindex="0">Nora Roberts</a>
                                    </div>
                                    <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                        <ins class="text-decoration-none mr-2"><span
                                                class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>79</span></ins>
                                        <del class="font-size-1 font-weight-regular text-gray-700"><span
                                                class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>99</span></del>
                                    </div>
                                </div>
                                <div class="countdown-timer mb-5">
                                    <h5 class="countdown-timer__title font-size-3 mb-3">Hurry Up! <span
                                            class="font-weight-regular">Offer
                                            ends in:</span></h5>
                                    <div class="d-flex align-items-stretch justify-content-between">
                                        <div class="py-2d75">
                                            <span class="font-weight-medium font-size-3">114</span>
                                            <span
                                                class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Days</span>
                                        </div>
                                        <div class="border-left pr-3 pr-md-0">&nbsp;</div>
                                        <div class="py-2d75">
                                            <span class="font-weight-medium font-size-3">03</span>
                                            <span
                                                class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Hours</span>
                                        </div>
                                        <div class="border-left pr-3 pr-md-0">&nbsp;</div>
                                        <div class="py-2d75">
                                            <span class="font-weight-medium font-size-3">60</span>
                                            <span
                                                class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Mins</span>
                                        </div>
                                        <div class="border-left pr-3 pr-md-0">&nbsp;</div>
                                        <div class="py-2d75">
                                            <span class="font-weight-medium font-size-3">25</span>
                                            <span
                                                class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Secs</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="deal-progress">
                                    <div class="d-flex justify-content-between font-size-2 mb-2d75">
                                        <span>Already Sold: 14</span>
                                        <span>Available: 3</span>
                                    </div>
                                    <div class="progress">
                                        <div class="bg-dark progress-bar" role="progressbar" style="width:82%"
                                            aria-valuenow="14" aria-valuemin="0" aria-valuemax="17"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product product__card product__card-v2 border-right">
                        <div class="media d-block d-md-flex px-4 px-md-6 px-xl-8d75">
                            <div class="woocommerce-loop-product__thumbnail mb-4 mb-md-0">
                                <a href="./single-product-v2.html" class="d-block" tabindex="0"><img
                                        src="{{ url('') }}/assets/img/200x327/img3.jpg"
                                        class="attachment-shop_catalog size-shop_catalog wp-post-image d-block mx-auto"
                                        alt="image-description"></a>
                            </div>
                            <div class="woocommerce-loop-product__body media-body ml-md-5d25">
                                <div class="mb-3">
                                    <div class="text-primary text-uppercase font-size-1 mb-1 text-truncate">
                                        <a href="./single-product-v2.html" tabindex="0">Kindle Edition</a>
                                    </div>
                                    <h2
                                        class="woocommerce-loop-product__title font-size-3 text-lh-md mb-2 text-height-2 crop-text-2 h-dark">
                                        <a href="./single-product-v2.html" tabindex="0">Dark in Death: An Eve
                                            Dallas Novel (In Death,
                                            Book 46)</a>
                                    </h2>
                                    <div class="font-size-2 text-gray-700 mb-1 text-truncate"><a
                                            href="../others/authors-single.html" class="text-gray-700"
                                            tabindex="0">Nora Roberts</a>
                                    </div>
                                    <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                        <ins class="text-decoration-none mr-2"><span
                                                class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>79</span></ins>
                                        <del class="font-size-1 font-weight-regular text-gray-700"><span
                                                class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>99</span></del>
                                    </div>
                                </div>
                                <div class="countdown-timer mb-5">
                                    <h5 class="countdown-timer__title font-size-3 mb-3">Hurry Up! <span
                                            class="font-weight-regular">Offer
                                            ends in:</span></h5>
                                    <div class="d-flex align-items-stretch justify-content-between">
                                        <div class="py-2d75">
                                            <span class="font-weight-medium font-size-3">114</span>
                                            <span
                                                class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Days</span>
                                        </div>
                                        <div class="border-left pr-3 pr-md-0">&nbsp;</div>
                                        <div class="py-2d75">
                                            <span class="font-weight-medium font-size-3">03</span>
                                            <span
                                                class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Hours</span>
                                        </div>
                                        <div class="border-left pr-3 pr-md-0">&nbsp;</div>
                                        <div class="py-2d75">
                                            <span class="font-weight-medium font-size-3">60</span>
                                            <span
                                                class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Mins</span>
                                        </div>
                                        <div class="border-left pr-3 pr-md-0">&nbsp;</div>
                                        <div class="py-2d75">
                                            <span class="font-weight-medium font-size-3">25</span>
                                            <span
                                                class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Secs</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="deal-progress">
                                    <div class="d-flex justify-content-between font-size-2 mb-2d75">
                                        <span>Already Sold: 14</span>
                                        <span>Available: 3</span>
                                    </div>
                                    <div class="progress">
                                        <div class="bg-dark progress-bar" role="progressbar" style="width:82%"
                                            aria-valuenow="14" aria-valuemin="0" aria-valuemax="17"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product product__card product__card-v2 border-right">
                        <div class="media d-block d-md-flex px-4 px-md-6 px-xl-8d75">
                            <div class="woocommerce-loop-product__thumbnail mb-4 mb-md-0">
                                <a href="./single-product-v2.html" class="d-block" tabindex="0"><img
                                        src="{{ url('') }}/assets/img/200x327/img4.jpg"
                                        class="attachment-shop_catalog size-shop_catalog wp-post-image d-block mx-auto"
                                        alt="image-description"></a>
                            </div>
                            <div class="woocommerce-loop-product__body media-body ml-md-5d25">
                                <div class="mb-3">
                                    <div class="text-primary text-uppercase font-size-1 mb-1 text-truncate">
                                        <a href="./single-product-v2.html" tabindex="0">Kindle Edition</a>
                                    </div>
                                    <h2
                                        class="woocommerce-loop-product__title font-size-3 text-lh-md mb-2 text-height-2 crop-text-2 h-dark">
                                        <a href="./single-product-v2.html" tabindex="0">Under a Firefly Moon
                                            (Firefly Lake Book 1)</a>
                                    </h2>
                                    <div class="font-size-2 text-gray-700 mb-1 text-truncate"><a
                                            href="../others/authors-single.html" class="text-gray-700"
                                            tabindex="0">Nora Roberts</a>
                                    </div>
                                    <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                        <ins class="text-decoration-none mr-2"><span
                                                class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>79</span></ins>
                                        <del class="font-size-1 font-weight-regular text-gray-700"><span
                                                class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>99</span></del>
                                    </div>
                                </div>
                                <div class="countdown-timer mb-5">
                                    <h5 class="countdown-timer__title font-size-3 mb-3">Hurry Up! <span
                                            class="font-weight-regular">Offer
                                            ends in:</span></h5>
                                    <div class="d-flex align-items-stretch justify-content-between">
                                        <div class="py-2d75">
                                            <span class="font-weight-medium font-size-3">114</span>
                                            <span
                                                class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Days</span>
                                        </div>
                                        <div class="border-left pr-3 pr-md-0">&nbsp;</div>
                                        <div class="py-2d75">
                                            <span class="font-weight-medium font-size-3">03</span>
                                            <span
                                                class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Hours</span>
                                        </div>
                                        <div class="border-left pr-3 pr-md-0">&nbsp;</div>
                                        <div class="py-2d75">
                                            <span class="font-weight-medium font-size-3">60</span>
                                            <span
                                                class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Mins</span>
                                        </div>
                                        <div class="border-left pr-3 pr-md-0">&nbsp;</div>
                                        <div class="py-2d75">
                                            <span class="font-weight-medium font-size-3">25</span>
                                            <span
                                                class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Secs</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="deal-progress">
                                    <div class="d-flex justify-content-between font-size-2 mb-2d75">
                                        <span>Already Sold: 14</span>
                                        <span>Available: 3</span>
                                    </div>
                                    <div class="progress">
                                        <div class="bg-dark progress-bar" role="progressbar" style="width:82%"
                                            aria-valuenow="14" aria-valuemin="0" aria-valuemax="17"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="space-bottom-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 col-lg-4 col-xl-3 mb-4 mb-md-0">
                    <div class="bg-img-hero min-height-440 rounded"
                        style="background-image: url({{ url('') }}/assets/img/300x440/img2.jpg);">
                        <div class="p-5">
                            <h4 class="font-size-22">Romance</h4>
                            <p>Lorem ipsum dolor consectetu eiusmo tempor ametsum.</p>
                            <a href="#"
                                class="text-dark font-weight-medium text-uppercase stretched-link">View
                                All</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-lg-8 col-xl-9">
                    <div class="mx-lg-8 mx-wd-4">
                        <div class="js-slick-carousel products no-gutters"
                            data-pagi-classes="d-lg-none text-center u-slick__pagination u-slick__pagination mt-5 mb-0"
                            data-arrows-classes="d-none d-lg-block u-slick__arrow u-slick__arrow-centered--y rounded-circle"
                            data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-inner u-slick__arrow-inner--left ml-lg-n8 ml-wd-n4"
                            data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-inner u-slick__arrow-inner--right mr-lg-n8 mr-wd-n4"
                            data-slides-show="4"
                            data-responsive='[{
                               "breakpoint": 1500,
                               "settings": {
                                 "slidesToShow": 3
                               }
                            }, {
                               "breakpoint": 1199,
                               "settings": {
                                 "slidesToShow": 2
                               }
                            }, {
                               "breakpoint": 554,
                               "settings": {
                                 "slidesToShow": 2
                               }
                            }]'>
                            <div class="product product__no-border border-right">
                                <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                    <div
                                        class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            <a href="./single-product-v2.html" class="d-block"><img
                                                    src="{{ url('') }}/assets/img/120x180/img1.jpg"
                                                    class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                    alt="image-description"></a>
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                    href="./single-product-v2.html">Paperback</a></div>
                                            <h2
                                                class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                                <a href="./single-product-v2.html">Think Like a Monk: Train Your Mind
                                                    for Peace and
                                                    Purpose Everyday</a>
                                            </h2>
                                            <div class="font-size-2  mb-1 text-truncate"><a
                                                    href="others/authors-single.html" class="text-gray-700">Jay
                                                    Shetty</a></div>
                                            <div
                                                class="price d-flex align-items-center font-weight-medium font-size-3">
                                                <span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">$</span>29</span>
                                            </div>

                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            <a href="./single-product-v2.html"
                                                class="text-uppercase text-dark h-dark font-weight-medium mr-auto"
                                                data-toggle="tooltip" data-placement="right" title="ADD TO CART">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i
                                                        class="fa-solid fa-bag-shopping"></i></span>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-solid fa-repeat"></i>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product product__no-border border-right">
                                <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                    <div
                                        class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            <a href="./single-product-v2.html" class="d-block"><img
                                                    src="{{ url('') }}/assets/img/120x180/img2.jpg"
                                                    class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                    alt="image-description"></a>
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                    href="./single-product-v2.html">Kindle Edition</a></div>
                                            <h2
                                                class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                                <a href="./single-product-v2.html">The Overdue Life of Amy Byler</a>
                                            </h2>
                                            <div class="font-size-2  mb-1 text-truncate"><a
                                                    href="../others/authors-single.html" class="text-gray-700">Kelly
                                                    Harms</a></div>
                                            <div
                                                class="price d-flex align-items-center font-weight-medium font-size-3">
                                                <span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">$</span>29</span>
                                            </div>
                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            <a href="./single-product-v2.html"
                                                class="text-uppercase text-dark h-dark font-weight-medium mr-auto"
                                                data-toggle="tooltip" data-placement="right" title="ADD TO CART">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i
                                                        class="fa-solid fa-bag-shopping"></i></span>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-solid fa-repeat"></i>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product product__no-border border-right">
                                <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                    <div
                                        class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            <a href="./single-product-v2.html" class="d-block"><img
                                                    src="{{ url('') }}/assets/img/120x180/img3.jpg"
                                                    class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                    alt="image-description"></a>
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                    href="./single-product-v2.html">Paperback</a></div>
                                            <h2
                                                class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                                <a href="./single-product-v2.html">Call Me By Your Name</a>
                                            </h2>
                                            <div class="font-size-2  mb-1 text-truncate"><a
                                                    href="others/authors-single.html" class="text-gray-700">Jay
                                                    Shetty</a></div>
                                            <div
                                                class="price d-flex align-items-center font-weight-medium font-size-3">
                                                <span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">$</span>29</span>
                                            </div>

                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            <a href="./single-product-v2.html"
                                                class="text-uppercase text-dark h-dark font-weight-medium mr-auto"
                                                data-toggle="tooltip" data-placement="right" title="ADD TO CART">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i
                                                        class="fa-solid fa-bag-shopping"></i></span>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-solid fa-repeat"></i>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product product__no-border border-right">
                                <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                    <div
                                        class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            <a href="./single-product-v2.html" class="d-block"><img
                                                    src="{{ url('') }}/assets/img/120x180/img4.jpg"
                                                    class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                    alt="image-description"></a>
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                    href="./single-product-v2.html">Kindle Edition</a></div>
                                            <h2
                                                class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                                <a href="./single-product-v2.html">The Cinderella Reversal</a>
                                            </h2>
                                            <div class="font-size-2  mb-1 text-truncate"><a
                                                    href="../others/authors-single.html" class="text-gray-700">Kelly
                                                    Harms</a></div>
                                            <div
                                                class="price d-flex align-items-center font-weight-medium font-size-3">
                                                <span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">$</span>29</span>
                                            </div>
                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            <a href="./single-product-v2.html"
                                                class="text-uppercase text-dark h-dark font-weight-medium mr-auto"
                                                data-toggle="tooltip" data-placement="right" title="ADD TO CART">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i
                                                        class="fa-solid fa-bag-shopping"></i></span>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-solid fa-repeat"></i>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product product__no-border border-right">
                                <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                    <div
                                        class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            <a href="./single-product-v2.html" class="d-block"><img
                                                    src="{{ url('') }}/assets/img/120x180/img5.jpg"
                                                    class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                    alt="image-description"></a>
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                    href="./single-product-v2.html">Paperback</a></div>
                                            <h2
                                                class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                                <a href="./single-product-v2.html">Think Like a Monk: Train Your Mind
                                                    for Peace and
                                                    Purpose Everyday</a>
                                            </h2>
                                            <div class="font-size-2  mb-1 text-truncate"><a
                                                    href="others/authors-single.html" class="text-gray-700">Jay
                                                    Shetty</a></div>
                                            <div
                                                class="price d-flex align-items-center font-weight-medium font-size-3">
                                                <span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">$</span>29</span>
                                            </div>

                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            <a href="./single-product-v2.html"
                                                class="text-uppercase text-dark h-dark font-weight-medium mr-auto"
                                                data-toggle="tooltip" data-placement="right" title="ADD TO CART">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i
                                                        class="fa-solid fa-bag-shopping"></i></span>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-solid fa-repeat"></i>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product product__no-border border-right">
                                <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                    <div
                                        class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            <a href="./single-product-v2.html" class="d-block"><img
                                                    src="{{ url('') }}/assets/img/120x180/img6.jpg"
                                                    class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                    alt="image-description"></a>
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                    href="./single-product-v2.html">Kindle Edition</a></div>
                                            <h2
                                                class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                                <a href="./single-product-v2.html">The Overdue Life of Amy Byler</a>
                                            </h2>
                                            <div class="font-size-2  mb-1 text-truncate"><a
                                                    href="../others/authors-single.html" class="text-gray-700">Kelly
                                                    Harms</a></div>
                                            <div
                                                class="price d-flex align-items-center font-weight-medium font-size-3">
                                                <span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">$</span>29</span>
                                            </div>
                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            <a href="./single-product-v2.html"
                                                class="text-uppercase text-dark h-dark font-weight-medium mr-auto"
                                                data-toggle="tooltip" data-placement="right" title="ADD TO CART">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i
                                                        class="fa-solid fa-bag-shopping"></i></span>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-solid fa-repeat"></i>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product product__no-border border-right">
                                <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                    <div
                                        class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            <a href="./single-product-v2.html" class="d-block"><img
                                                    src="{{ url('') }}/assets/img/120x180/img7.jpg"
                                                    class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                    alt="image-description"></a>
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                    href="./single-product-v2.html">Paperback</a></div>
                                            <h2
                                                class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                                <a href="./single-product-v2.html">Call Me By Your Name</a>
                                            </h2>
                                            <div class="font-size-2  mb-1 text-truncate"><a
                                                    href="others/authors-single.html" class="text-gray-700">Jay
                                                    Shetty</a></div>
                                            <div
                                                class="price d-flex align-items-center font-weight-medium font-size-3">
                                                <span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">$</span>29</span>
                                            </div>

                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            <a href="./single-product-v2.html"
                                                class="text-uppercase text-dark h-dark font-weight-medium mr-auto"
                                                data-toggle="tooltip" data-placement="right" title="ADD TO CART">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i
                                                        class="fa-solid fa-bag-shopping"></i></span>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-solid fa-repeat"></i>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product product__no-border border-right">
                                <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                    <div
                                        class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            <a href="./single-product-v2.html" class="d-block"><img
                                                    src="{{ url('') }}/assets/img/120x180/img8.jpg"
                                                    class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                    alt="image-description"></a>
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                    href="./single-product-v2.html">Kindle Edition</a></div>
                                            <h2
                                                class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                                <a href="./single-product-v2.html">The Cinderella Reversal</a>
                                            </h2>
                                            <div class="font-size-2  mb-1 text-truncate"><a
                                                    href="../others/authors-single.html" class="text-gray-700">Kelly
                                                    Harms</a></div>
                                            <div
                                                class="price d-flex align-items-center font-weight-medium font-size-3">
                                                <span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">$</span>29</span>
                                            </div>
                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            <a href="./single-product-v2.html"
                                                class="text-uppercase text-dark h-dark font-weight-medium mr-auto"
                                                data-toggle="tooltip" data-placement="right" title="ADD TO CART">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i
                                                        class="fa-solid fa-bag-shopping"></i></span>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-solid fa-repeat"></i>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="space-bottom-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 col-lg-4 col-xl-3 mb-4 mb-md-0">
                    <div class="bg-img-hero min-height-440 rounded"
                        style="background-image: url({{ url('') }}/assets/img/300x440/img1.jpg);">
                        <div class="p-5">
                            <h4 class="font-size-22">Health</h4>
                            <p>Lorem ipsum dolor consectetu eiusmo tempor ametsum.</p>
                            <a href="#"
                                class="text-dark font-weight-medium text-uppercase stretched-link">View All</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-lg-8 col-xl-9">
                    <div class="mx-lg-8 mx-wd-4">
                        <div class="js-slick-carousel products no-gutters"
                            data-pagi-classes="d-lg-none text-center u-slick__pagination u-slick__pagination mt-5 mb-0"
                            data-arrows-classes="d-none d-lg-block u-slick__arrow u-slick__arrow-centered--y rounded-circle"
                            data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-inner u-slick__arrow-inner--left ml-lg-n8 ml-wd-n4"
                            data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-inner u-slick__arrow-inner--right mr-lg-n8 mr-wd-n4"
                            data-slides-show="4"
                            data-responsive='[{
                               "breakpoint": 1500,
                               "settings": {
                                 "slidesToShow": 3
                               }
                            }, {
                               "breakpoint": 1199,
                               "settings": {
                                 "slidesToShow": 2
                               }
                            }, {
                               "breakpoint": 554,
                               "settings": {
                                 "slidesToShow": 2
                               }
                            }]'>
                            <div class="product product__no-border border-right">
                                <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                    <div
                                        class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            <a href="./single-product-v2.html" class="d-block"><img
                                                    src="{{ url('') }}/assets/img/120x180/img1.jpg"
                                                    class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                    alt="image-description"></a>
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                    href="./single-product-v2.html">Paperback</a></div>
                                            <h2
                                                class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                                <a href="./single-product-v2.html">Think Like a Monk: Train Your Mind
                                                    for Peace and
                                                    Purpose Everyday</a>
                                            </h2>
                                            <div class="font-size-2  mb-1 text-truncate"><a
                                                    href="others/authors-single.html" class="text-gray-700">Jay
                                                    Shetty</a></div>
                                            <div
                                                class="price d-flex align-items-center font-weight-medium font-size-3">
                                                <span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">$</span>29</span>
                                            </div>

                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            <a href="./single-product-v2.html"
                                                class="text-uppercase text-dark h-dark font-weight-medium mr-auto"
                                                data-toggle="tooltip" data-placement="right" title="ADD TO CART">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i
                                                        class="fa-solid fa-bag-shopping"></i></span>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-solid fa-repeat"></i>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product product__no-border border-right">
                                <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                    <div
                                        class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            <a href="./single-product-v2.html" class="d-block"><img
                                                    src="{{ url('') }}/assets/img/120x180/img2.jpg"
                                                    class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                    alt="image-description"></a>
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                    href="./single-product-v2.html">Kindle Edition</a></div>
                                            <h2
                                                class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                                <a href="./single-product-v2.html">The Overdue Life of Amy Byler</a>
                                            </h2>
                                            <div class="font-size-2  mb-1 text-truncate"><a
                                                    href="../others/authors-single.html" class="text-gray-700">Kelly
                                                    Harms</a></div>
                                            <div
                                                class="price d-flex align-items-center font-weight-medium font-size-3">
                                                <span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">$</span>29</span>
                                            </div>
                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            <a href="./single-product-v2.html"
                                                class="text-uppercase text-dark h-dark font-weight-medium mr-auto"
                                                data-toggle="tooltip" data-placement="right" title="ADD TO CART">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i
                                                        class="fa-solid fa-bag-shopping"></i></span>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-solid fa-repeat"></i>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product product__no-border border-right">
                                <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                    <div
                                        class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            <a href="./single-product-v2.html" class="d-block"><img
                                                    src="{{ url('') }}/assets/img/120x180/img3.jpg"
                                                    class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                    alt="image-description"></a>
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                    href="./single-product-v2.html">Paperback</a></div>
                                            <h2
                                                class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                                <a href="./single-product-v2.html">Call Me By Your Name</a>
                                            </h2>
                                            <div class="font-size-2  mb-1 text-truncate"><a
                                                    href="others/authors-single.html" class="text-gray-700">Jay
                                                    Shetty</a></div>
                                            <div
                                                class="price d-flex align-items-center font-weight-medium font-size-3">
                                                <span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">$</span>29</span>
                                            </div>

                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            <a href="./single-product-v2.html"
                                                class="text-uppercase text-dark h-dark font-weight-medium mr-auto"
                                                data-toggle="tooltip" data-placement="right" title="ADD TO CART">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i
                                                        class="fa-solid fa-bag-shopping"></i></span>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-solid fa-repeat"></i>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product product__no-border border-right">
                                <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                    <div
                                        class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            <a href="./single-product-v2.html" class="d-block"><img
                                                    src="{{ url('') }}/assets/img/120x180/img4.jpg"
                                                    class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                    alt="image-description"></a>
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                    href="./single-product-v2.html">Kindle Edition</a></div>
                                            <h2
                                                class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                                <a href="./single-product-v2.html">The Cinderella Reversal</a>
                                            </h2>
                                            <div class="font-size-2  mb-1 text-truncate"><a
                                                    href="../others/authors-single.html" class="text-gray-700">Kelly
                                                    Harms</a></div>
                                            <div
                                                class="price d-flex align-items-center font-weight-medium font-size-3">
                                                <span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">$</span>29</span>
                                            </div>
                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            <a href="./single-product-v2.html"
                                                class="text-uppercase text-dark h-dark font-weight-medium mr-auto"
                                                data-toggle="tooltip" data-placement="right" title="ADD TO CART">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i
                                                        class="fa-solid fa-bag-shopping"></i></span>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-solid fa-repeat"></i>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product product__no-border border-right">
                                <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                    <div
                                        class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            <a href="./single-product-v2.html" class="d-block"><img
                                                    src="{{ url('') }}/assets/img/120x180/img5.jpg"
                                                    class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                    alt="image-description"></a>
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                    href="./single-product-v2.html">Paperback</a></div>
                                            <h2
                                                class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                                <a href="./single-product-v2.html">Think Like a Monk: Train Your Mind
                                                    for Peace and
                                                    Purpose Everyday</a>
                                            </h2>
                                            <div class="font-size-2  mb-1 text-truncate"><a
                                                    href="others/authors-single.html" class="text-gray-700">Jay
                                                    Shetty</a></div>
                                            <div
                                                class="price d-flex align-items-center font-weight-medium font-size-3">
                                                <span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">$</span>29</span>
                                            </div>

                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            <a href="./single-product-v2.html"
                                                class="text-uppercase text-dark h-dark font-weight-medium mr-auto"
                                                data-toggle="tooltip" data-placement="right" title="ADD TO CART">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i
                                                        class="fa-solid fa-bag-shopping"></i></span>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-solid fa-repeat"></i>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product product__no-border border-right">
                                <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                    <div
                                        class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            <a href="./single-product-v2.html" class="d-block"><img
                                                    src="{{ url('') }}/assets/img/120x180/img6.jpg"
                                                    class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                    alt="image-description"></a>
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                    href="./single-product-v2.html">Kindle Edition</a></div>
                                            <h2
                                                class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                                <a href="./single-product-v2.html">The Overdue Life of Amy Byler</a>
                                            </h2>
                                            <div class="font-size-2  mb-1 text-truncate"><a
                                                    href="../others/authors-single.html" class="text-gray-700">Kelly
                                                    Harms</a></div>
                                            <div
                                                class="price d-flex align-items-center font-weight-medium font-size-3">
                                                <span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">$</span>29</span>
                                            </div>
                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            <a href="./single-product-v2.html"
                                                class="text-uppercase text-dark h-dark font-weight-medium mr-auto"
                                                data-toggle="tooltip" data-placement="right" title="ADD TO CART">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i
                                                        class="fa-solid fa-bag-shopping"></i></span>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-solid fa-repeat"></i>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product product__no-border border-right">
                                <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                    <div
                                        class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            <a href="./single-product-v2.html" class="d-block"><img
                                                    src="{{ url('') }}/assets/img/120x180/img7.jpg"
                                                    class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                    alt="image-description"></a>
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                    href="./single-product-v2.html">Paperback</a></div>
                                            <h2
                                                class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                                <a href="./single-product-v2.html">Call Me By Your Name</a>
                                            </h2>
                                            <div class="font-size-2  mb-1 text-truncate"><a
                                                    href="others/authors-single.html" class="text-gray-700">Jay
                                                    Shetty</a></div>
                                            <div
                                                class="price d-flex align-items-center font-weight-medium font-size-3">
                                                <span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">$</span>29</span>
                                            </div>

                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            <a href="./single-product-v2.html"
                                                class="text-uppercase text-dark h-dark font-weight-medium mr-auto"
                                                data-toggle="tooltip" data-placement="right" title="ADD TO CART">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i
                                                        class="fa-solid fa-bag-shopping"></i></span>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-solid fa-repeat"></i>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product product__no-border border-right">
                                <div class="product__inner overflow-hidden px-3 px-md-4d875">
                                    <div
                                        class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            <a href="./single-product-v2.html" class="d-block"><img
                                                    src="{{ url('') }}/assets/img/120x180/img8.jpg"
                                                    class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                    alt="image-description"></a>
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                    href="./single-product-v2.html">Kindle Edition</a></div>
                                            <h2
                                                class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                                <a href="./single-product-v2.html">The Cinderella Reversal</a>
                                            </h2>
                                            <div class="font-size-2  mb-1 text-truncate"><a
                                                    href="../others/authors-single.html" class="text-gray-700">Kelly
                                                    Harms</a></div>
                                            <div
                                                class="price d-flex align-items-center font-weight-medium font-size-3">
                                                <span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">$</span>29</span>
                                            </div>
                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            <a href="./single-product-v2.html"
                                                class="text-uppercase text-dark h-dark font-weight-medium mr-auto"
                                                data-toggle="tooltip" data-placement="right" title="ADD TO CART">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i
                                                        class="fa-solid fa-bag-shopping"></i></span>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-solid fa-repeat"></i>
                                            </a>
                                            <a href="./single-product-v2.html"
                                                class="h-p-bg btn btn-outline-primary-blue border-0">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="banner space-bottom-3">
        <div class="container">
            <div class="bg-secondary-gray-800 px-xl-10 px-6 py-5 rounded">
                <div class="media d-block d-lg-flex">
                    <div class="media-body align-self-center mb-4 mb-lg-0">
                        <p class="banner__pretitle text-uppercase text-gray-400 font-weight-bold">Available Once a
                            Year</p>
                        <h2 class="banner__title font-size-10 font-weight-bold text-white mb-4">(Black Friday) Get 50%
                            off <br> on orders
                            over $100</h2>
                        <a href="./v2.html" class="banner_btn btn btn-wide btn-primary-blue text-white">Explore
                            Books</a>
                    </div>
                    <img src="{{ url('') }}/assets/img/450x235/img1.png" class="img-fluid"
                        alt="image-description">
                </div>
            </div>
        </div>
    </div>
    <section class="space-bottom-3">
        <div class="container">
            <header class="border-bottom mb-8d75 pb-4d75">
                <h2 class="font-size-7 mb-0">Most Popular Books</h2>
            </header>
            <div class="js-slick-carousel products list-unstyled no-gutters my-0"
                data-pagi-classes="d-lg-none text-center u-slick__pagination u-slick__pagination mt-5 mb-0"
                data-arrows-classes="d-none d-lg-block u-slick__arrow u-slick__arrow-centered--y rounded-circle"
                data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-inner u-slick__arrow-inner--left ml-xl-n10"
                data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-inner u-slick__arrow-inner--right mr-xl-n10"
                data-slides-show="5"
                data-responsive='[{
                   "breakpoint": 1500,
                   "settings": {
                     "slidesToShow": 4
                   }
                }, {
                   "breakpoint": 992,
                   "settings": {
                     "slidesToShow": 3
                   }
                }, {
                   "breakpoint": 554,
                   "settings": {
                     "slidesToShow": 2
                   }
                }]'>
                <div class="product product__no-border border-right">
                    <div class="product__inner overflow-hidden px-3 px-md-4d875">
                        <div
                            class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                            <div class="woocommerce-loop-product__thumbnail">
                                <a href="./single-product-v2.html" class="d-block"><img
                                        src="{{ url('') }}/assets/img/120x180/img1.jpg"
                                        class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                        alt="image-description"></a>
                            </div>
                            <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                        href="./single-product-v2.html">Paperback</a></div>
                                <h2
                                    class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                    <a href="./single-product-v2.html">Blindside (Michael Bennett)</a>
                                </h2>
                                <div class="font-size-2  mb-1 text-truncate"><a href="../others/authors-single.html"
                                        class="text-gray-700">Jay Shetty</a></div>
                                <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                    <span class="woocommerce-Price-amount amount"><span
                                            class="woocommerce-Price-currencySymbol">$</span>29</span>
                                </div>

                            </div>
                            <div class="product__hover d-flex align-items-center">
                                <a href="./single-product-v2.html"
                                    class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                    <span class="product__add-to-cart">ADD TO CART</span>
                                    <span class="product__add-to-cart-icon font-size-4"><i
                                            class="fa-solid fa-bag-shopping"></i></span>
                                </a>
                                <a href="./single-product-v2.html"
                                    class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                    <i class="fa-solid fa-repeat"></i>
                                </a>
                                <a href="./single-product-v2.html"
                                    class="h-p-bg btn btn-outline-primary-blue border-0">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product product__no-border border-right">
                    <div class="product__inner overflow-hidden px-3 px-md-4d875">
                        <div
                            class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                            <div class="woocommerce-loop-product__thumbnail">
                                <a href="./single-product-v2.html" class="d-block"><img
                                        src="{{ url('') }}/assets/img/120x180/img2.jpg"
                                        class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                        alt="image-description"></a>
                            </div>
                            <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                        href="./single-product-v2.html">Kindle
                                        Edition</a></div>
                                <h2
                                    class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                    <a href="./single-product-v2.html">The Overdue Life of Amy Byler</a>
                                </h2>
                                <div class="font-size-2  mb-1 text-truncate"><a href="../others/authors-single.html"
                                        class="text-gray-700">Kelly Harms</a></div>
                                <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                    <span class="woocommerce-Price-amount amount"><span
                                            class="woocommerce-Price-currencySymbol">$</span>29</span>
                                </div>
                            </div>
                            <div class="product__hover d-flex align-items-center">
                                <a href="./single-product-v2.html"
                                    class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                    <span class="product__add-to-cart">ADD TO CART</span>
                                    <span class="product__add-to-cart-icon font-size-4"><i
                                            class="fa-solid fa-bag-shopping"></i></span>
                                </a>
                                <a href="./single-product-v2.html"
                                    class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                    <i class="fa-solid fa-repeat"></i>
                                </a>
                                <a href="./single-product-v2.html"
                                    class="h-p-bg btn btn-outline-primary-blue border-0">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product product__no-border border-right">
                    <div class="product__inner overflow-hidden px-3 px-md-4d875">
                        <div
                            class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                            <div class="woocommerce-loop-product__thumbnail">
                                <a href="./single-product-v2.html" class="d-block"><img
                                        src="{{ url('') }}/assets/img/120x180/img3.jpg"
                                        class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                        alt="image-description"></a>
                            </div>
                            <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                        href="./single-product-v2.html">Paperback</a></div>
                                <h2
                                    class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                    <a href="./single-product-v2.html">Think Like a Monk: Train Your Mind for Peace
                                        and Purpose
                                        Everyday</a>
                                </h2>
                                <div class="font-size-2  mb-1 text-truncate"><a href="../others/authors-single.html"
                                        class="text-gray-700">Jay Shetty</a></div>
                                <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                    <span class="woocommerce-Price-amount amount"><span
                                            class="woocommerce-Price-currencySymbol">$</span>29</span>
                                </div>

                            </div>
                            <div class="product__hover d-flex align-items-center">
                                <a href="./single-product-v2.html"
                                    class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                    <span class="product__add-to-cart">ADD TO CART</span>
                                    <span class="product__add-to-cart-icon font-size-4"><i
                                            class="fa-solid fa-bag-shopping"></i></span>
                                </a>
                                <a href="./single-product-v2.html"
                                    class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                    <i class="fa-solid fa-repeat"></i>
                                </a>
                                <a href="./single-product-v2.html"
                                    class="h-p-bg btn btn-outline-primary-blue border-0">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product product__no-border border-right">
                    <div class="product__inner overflow-hidden px-3 px-md-4d875">
                        <div
                            class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                            <div class="woocommerce-loop-product__thumbnail">
                                <a href="./single-product-v2.html" class="d-block"><img
                                        src="{{ url('') }}/assets/img/120x180/img4.jpg"
                                        class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                        alt="image-description"></a>
                            </div>
                            <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                        href="./single-product-v2.html">Kindle
                                        Edition</a></div>
                                <h2
                                    class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                    <a href="./single-product-v2.html">Until the End of Time: Mind, Matter...</a>
                                </h2>
                                <div class="font-size-2  mb-1 text-truncate"><a href="../others/authors-single.html"
                                        class="text-gray-700">Kelly Harms</a></div>
                                <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                    <span class="woocommerce-Price-amount amount"><span
                                            class="woocommerce-Price-currencySymbol">$</span>29</span>
                                </div>
                            </div>
                            <div class="product__hover d-flex align-items-center">
                                <a href="./single-product-v2.html"
                                    class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                    <span class="product__add-to-cart">ADD TO CART</span>
                                    <span class="product__add-to-cart-icon font-size-4"><i
                                            class="fa-solid fa-bag-shopping"></i></span>
                                </a>
                                <a href="./single-product-v2.html"
                                    class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                    <i class="fa-solid fa-repeat"></i>
                                </a>
                                <a href="./single-product-v2.html"
                                    class="h-p-bg btn btn-outline-primary-blue border-0">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product product__no-border border-right">
                    <div class="product__inner overflow-hidden px-3 px-md-4d875">
                        <div
                            class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                            <div class="woocommerce-loop-product__thumbnail">
                                <a href="./single-product-v2.html" class="d-block"><img
                                        src="{{ url('') }}/assets/img/120x180/img5.jpg"
                                        class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                        alt="image-description"></a>
                            </div>
                            <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                        href="./single-product-v2.html">Paperback</a></div>
                                <h2
                                    class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                    <a href="./single-product-v2.html">Blindside (Michael Bennett)</a>
                                </h2>
                                <div class="font-size-2  mb-1 text-truncate"><a href="../others/authors-single.html"
                                        class="text-gray-700">Jay Shetty</a></div>
                                <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                    <span class="woocommerce-Price-amount amount"><span
                                            class="woocommerce-Price-currencySymbol">$</span>29</span>
                                </div>

                            </div>
                            <div class="product__hover d-flex align-items-center">
                                <a href="./single-product-v2.html"
                                    class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                    <span class="product__add-to-cart">ADD TO CART</span>
                                    <span class="product__add-to-cart-icon font-size-4"><i
                                            class="fa-solid fa-bag-shopping"></i></span>
                                </a>
                                <a href="./single-product-v2.html"
                                    class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                    <i class="fa-solid fa-repeat"></i>
                                </a>
                                <a href="./single-product-v2.html"
                                    class="h-p-bg btn btn-outline-primary-blue border-0">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product product__no-border border-right">
                    <div class="product__inner overflow-hidden px-3 px-md-4d875">
                        <div
                            class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                            <div class="woocommerce-loop-product__thumbnail">
                                <a href="./single-product-v2.html" class="d-block"><img
                                        src="{{ url('') }}/assets/img/120x180/img6.jpg"
                                        class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                        alt="image-description"></a>
                            </div>
                            <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                        href="./single-product-v2.html">Kindle
                                        Edition</a></div>
                                <h2
                                    class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                    <a href="./single-product-v2.html">The Overdue Life of Amy Byler</a>
                                </h2>
                                <div class="font-size-2  mb-1 text-truncate"><a href="../others/authors-single.html"
                                        class="text-gray-700">Kelly Harms</a></div>
                                <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                    <span class="woocommerce-Price-amount amount"><span
                                            class="woocommerce-Price-currencySymbol">$</span>29</span>
                                </div>
                            </div>
                            <div class="product__hover d-flex align-items-center">
                                <a href="./single-product-v2.html"
                                    class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                    <span class="product__add-to-cart">ADD TO CART</span>
                                    <span class="product__add-to-cart-icon font-size-4"><i
                                            class="fa-solid fa-bag-shopping"></i></span>
                                </a>
                                <a href="./single-product-v2.html"
                                    class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                    <i class="fa-solid fa-repeat"></i>
                                </a>
                                <a href="./single-product-v2.html"
                                    class="h-p-bg btn btn-outline-primary-blue border-0">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product product__no-border border-right">
                    <div class="product__inner overflow-hidden px-3 px-md-4d875">
                        <div
                            class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                            <div class="woocommerce-loop-product__thumbnail">
                                <a href="./single-product-v2.html" class="d-block"><img
                                        src="{{ url('') }}/assets/img/120x180/img7.jpg"
                                        class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                        alt="image-description"></a>
                            </div>
                            <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                        href="./single-product-v2.html">Paperback</a></div>
                                <h2
                                    class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                    <a href="./single-product-v2.html">Think Like a Monk: Train Your Mind for Peace
                                        and Purpose
                                        Everyday</a>
                                </h2>
                                <div class="font-size-2  mb-1 text-truncate"><a href="../others/authors-single.html"
                                        class="text-gray-700">Jay Shetty</a></div>
                                <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                    <span class="woocommerce-Price-amount amount"><span
                                            class="woocommerce-Price-currencySymbol">$</span>29</span>
                                </div>

                            </div>
                            <div class="product__hover d-flex align-items-center">
                                <a href="./single-product-v2.html"
                                    class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                    <span class="product__add-to-cart">ADD TO CART</span>
                                    <span class="product__add-to-cart-icon font-size-4"><i
                                            class="fa-solid fa-bag-shopping"></i></span>
                                </a>
                                <a href="./single-product-v2.html"
                                    class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                    <i class="fa-solid fa-repeat"></i>
                                </a>
                                <a href="./single-product-v2.html"
                                    class="h-p-bg btn btn-outline-primary-blue border-0">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product product__no-border border-right">
                    <div class="product__inner overflow-hidden px-3 px-md-4d875">
                        <div
                            class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                            <div class="woocommerce-loop-product__thumbnail">
                                <a href="./single-product-v2.html" class="d-block"><img
                                        src="{{ url('') }}/assets/img/120x180/img8.jpg"
                                        class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                        alt="image-description"></a>
                            </div>
                            <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                        href="./single-product-v2.html">Kindle
                                        Edition</a></div>
                                <h2
                                    class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                    <a href="./single-product-v2.html">Until the End of Time: Mind, Matter...</a>
                                </h2>
                                <div class="font-size-2  mb-1 text-truncate"><a href="../others/authors-single.html"
                                        class="text-gray-700">Kelly Harms</a></div>
                                <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                    <span class="woocommerce-Price-amount amount"><span
                                            class="woocommerce-Price-currencySymbol">$</span>29</span>
                                </div>
                            </div>
                            <div class="product__hover d-flex align-items-center">
                                <a href="./single-product-v2.html"
                                    class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                    <span class="product__add-to-cart">ADD TO CART</span>
                                    <span class="product__add-to-cart-icon font-size-4"><i
                                            class="fa-solid fa-bag-shopping"></i></span>
                                </a>
                                <a href="./single-product-v2.html"
                                    class="mr-1 h-p-bg btn btn-outline-primary-blue border-0">
                                    <i class="fa-solid fa-repeat"></i>
                                </a>
                                <a href="./single-product-v2.html"
                                    class="h-p-bg btn btn-outline-primary-blue border-0">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="space-bottom-2">
        <div class="container">
            <header class="border-bottom d-md-flex justify-content-between align-items-center mb-8 pb-4d75">
                <h2 class="font-size-7 mb-3 mb-md-0">Biographies Book</h2>
                <a href="./v2.html" class="h-primary d-block">View All <i
                        class="fa-solid fa-chevron-right"></i></a>
            </header>
            <div class="js-slick-carousel u-slick products" data-pagi-classes="text-center u-slick__pagination mt-8"
                data-slides-show="3"
                data-responsive='[{
                   "breakpoint": 1199,
                   "settings": {
                     "slidesToShow": 2
                   }
                }, {
                   "breakpoint": 768,
                   "settings": {
                     "slidesToShow": 1
                   }
                }, {
                   "breakpoint": 554,
                   "settings": {
                     "slidesToShow": 1
                   }
                }]'>
                <div class="product product__card product__card-v2 border-right">
                    <div class="media p-3 p-md-4d875">
                        <a href="./single-product-v2.html" class="d-block" tabindex="0"><img
                                src="{{ url('') }}/assets/img/120x180/img1.jpg" alt="image-description"></a>
                        <div class="media-body ml-4d875">
                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                    href="./single-product-v2.html" tabindex="0">Hard Cover</a></div>
                            <h2
                                class="woocommerce-loop-product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                <a href="./single-product-v2.html" tabindex="0">The Ride of a Lifetime: Lessons
                                    Learned from 15
                                    Years as CEO...</a>
                            </h2>
                            <div class="font-size-2 mb-1 text-truncate"><a href="../others/authors-single.html"
                                    class="text-gray-700" tabindex="0">Hillary Burton</a></div>
                            <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                <span class="woocommerce-Price-amount amount"><span
                                        class="woocommerce-Price-currencySymbol">$</span>15</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product product__card product__card-v2 border-right">
                    <div class="media p-3 p-md-4d875">
                        <a href="./single-product-v2.html" class="d-block" tabindex="0"><img
                                src="{{ url('') }}/assets/img/120x180/img2.jpg" alt="image-description"></a>
                        <div class="media-body ml-4d875">
                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                    href="./single-product-v2.html" tabindex="0">Hard Cover</a></div>
                            <h2
                                class="woocommerce-loop-product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                <a href="./single-product-v2.html" tabindex="0">The Rural Diaries: Love,
                                    Livestock, and Big Life
                                    Lessons Down on Mischief Farm</a>
                            </h2>
                            <div class="font-size-2 mb-1 text-truncate"><a href="../others/authors-single.html"
                                    class="text-gray-700" tabindex="0">Hillary Burton</a></div>
                            <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                <span class="woocommerce-Price-amount amount"><span
                                        class="woocommerce-Price-currencySymbol">$</span>15</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product product__card product__card-v2 border-right">
                    <div class="media p-3 p-md-4d875">
                        <a href="./single-product-v2.html" class="d-block" tabindex="0"><img
                                src="{{ url('') }}/assets/img/120x180/img3.jpg" alt="image-description"></a>
                        <div class="media-body ml-4d875">
                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                    href="./single-product-v2.html" tabindex="0">Hard Cover</a></div>
                            <h2
                                class="woocommerce-loop-product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                <a href="./single-product-v2.html" tabindex="0">Russians Among Us: Sleeper Cells,
                                    Ghost Stories,
                                    and the Hunt...</a>
                            </h2>
                            <div class="font-size-2 mb-1 text-truncate"><a href="../others/authors-single.html"
                                    class="text-gray-700" tabindex="0">Hillary Burton</a></div>
                            <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                <span class="woocommerce-Price-amount amount"><span
                                        class="woocommerce-Price-currencySymbol">$</span>15</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product product__card product__card-v2 border-right">
                    <div class="media p-3 p-md-4d875">
                        <a href="./single-product-v2.html" class="d-block" tabindex="0"><img
                                src="{{ url('') }}/assets/img/120x180/img4.jpg" alt="image-description"></a>
                        <div class="media-body ml-4d875">
                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                    href="./single-product-v2.html" tabindex="0">Hard Cover</a></div>
                            <h2
                                class="woocommerce-loop-product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                <a href="./single-product-v2.html" tabindex="0">The Ride of a Lifetime: Lessons
                                    Learned from 15
                                    Years as CEO...</a>
                            </h2>
                            <div class="font-size-2 mb-1 text-truncate"><a href="../others/authors-single.html"
                                    class="text-gray-700" tabindex="0">Hillary Burton</a></div>
                            <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                <span class="woocommerce-Price-amount amount"><span
                                        class="woocommerce-Price-currencySymbol">$</span>15</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product product__card product__card-v2 border-right">
                    <div class="media p-3 p-md-4d875">
                        <a href="./single-product-v2.html" class="d-block" tabindex="0"><img
                                src="{{ url('') }}/assets/img/120x180/img5.jpg" alt="image-description"></a>
                        <div class="media-body ml-4d875">
                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                    href="./single-product-v2.html" tabindex="0">Hard Cover</a></div>
                            <h2
                                class="woocommerce-loop-product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                <a href="./single-product-v2.html" tabindex="0">The Rural Diaries: Love,
                                    Livestock, and Big Life
                                    Lessons Down on Mischief Farm</a>
                            </h2>
                            <div class="font-size-2 mb-1 text-truncate"><a href="../others/authors-single.html"
                                    class="text-gray-700" tabindex="0">Hillary Burton</a></div>
                            <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                <span class="woocommerce-Price-amount amount"><span
                                        class="woocommerce-Price-currencySymbol">$</span>15</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="home-latest-news space-bottom-3">
        <div class="container">
            <header class="border-bottom d-md-flex justify-content-between align-items-center mb-10d75 pb-4d75">
                <h2 class="font-size-7 mb-3 mb-md-0">Latest News</h2>
                <a href="./v2.html" class="h-primary d-block">View All <i
                        class="fa-solid fa-chevron-right"></i></a>
            </header>
            <ul class="blog-posts list-unstyled my-0 row row-cols-md-2 row-cols-lg-3">
                <li class="blog-post col mb-4 mb-lg-0">
                    <div class="blog-post__inner">
                        <a href="../blog/blog-single.html"><img
                                src="{{ url('') }}/assets/img/445x300/img1.jpg"
                                class="img-fluid rounded-md mb-3" alt="image-description"></a>
                        <div class="blog-post__body">
                            <ul class="blog-post__meta list-unstyled d-flex font-size-2 mb-2d75">
                                <li><a href="../blog/blog-single.html" class="text-secondary-gray-700">10 November,
                                        2019</a></li>
                                <li class="ml-3"><a href="../blog/blog-single.html"
                                        class="text-secondary-gray-700">2 Comments</a></li>
                            </ul>
                            <h2 class="blog-post__title text-truncate font-weight-regular h6"><a
                                    href="../blog/blog-single.html">Benefits of Reading: Getting Smart, Thin, Healthy,
                                    Happy</a></h2>
                        </div>
                    </div>
                </li>
                <li class="blog-post col mb-4 mb-lg-0">
                    <div class="blog-post__inner">
                        <a href="../blog/blog-single.html"><img
                                src="{{ url('') }}/assets/img/445x300/img2.jpg"
                                class="img-fluid rounded-md mb-3" alt="image-description"></a>
                        <div class="blog-post__body">
                            <ul class="blog-post__meta list-unstyled d-flex font-size-2 mb-2d75">
                                <li><a href="../blog/blog-single.html" class="text-secondary-gray-700">10 November,
                                        2019</a></li>
                                <li class="ml-3"><a href="../blog/blog-single.html"
                                        class="text-secondary-gray-700">2 Comments</a></li>
                            </ul>
                            <h2 class="blog-post__title text-truncate font-weight-regular h6"><a
                                    href="../blog/blog-single.html">'American Dirt' Invites Readers into the Journey
                                    of Mexican
                                    Migrants</a></h2>
                        </div>
                    </div>
                </li>
                <li class="blog-post col mb-4 mb-lg-0">
                    <div class="blog-post__inner">
                        <a href="../blog/blog-single.html"><img
                                src="{{ url('') }}/assets/img/445x300/img3.jpg"
                                class="img-fluid rounded-md mb-3" alt="image-description"></a>
                        <div class="blog-post__body">
                            <ul class="blog-post__meta list-unstyled d-flex font-size-2 mb-2d75">
                                <li><a href="../blog/blog-single.html" class="text-secondary-gray-700">10 November,
                                        2019</a></li>
                                <li class="ml-3"><a href="../blog/blog-single.html"
                                        class="text-secondary-gray-700">2 Comments</a></li>
                            </ul>
                            <h2 class="blog-post__title text-truncate font-weight-regular h6"><a
                                    href="../blog/blog-single.html">Anne
                                    Bogel's 5 Tips to Restore Your Love of Reading</a></h2>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section> --}}
    <div class="site-features border-top space-1d625">
        <div class="container">
            <ul
                class="list-unstyled my-0 list-features d-flex align-items-center justify-content-xl-between overflow-auto overflow-xl-visible">
                <li class="flex-shrink-0 flex-xl-shrink-1 list-feature">
                    <div class="media">
                        <div class="feature__icon font-size-14 text-primary-blue text-lh-xs">
                            <i class="fa-solid fa-truck"></i>
                        </div>
                        <div class="media-body ml-4">
                            <h4 class="feature__title font-size-3">Free Delivery</h4>
                            <p class="feature__subtitle m-0">Orders over $100</p>
                        </div>
                    </div>
                </li>
                <li class="flex-shrink-0 flex-xl-shrink-1 separator mx-4 mx-xl-0 border-left h-fixed-80"
                    aria-hidden="true" role="presentation"></li>
                <li class="flex-shrink-0 flex-xl-shrink-1 list-feature">
                    <div class="media">
                        <div class="feature__icon font-size-14 text-primary-blue text-lh-xs">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <div class="media-body ml-4">
                            <h4 class="feature__title font-size-3">Secure Payment</h4>
                            <p class="feature__subtitle m-0">100% Secure Payment</p>
                        </div>
                    </div>
                </li>
                <li class="flex-shrink-0 flex-xl-shrink-1 separator mx-4 mx-xl-0 border-left h-fixed-80"
                    aria-hidden="true" role="presentation"></li>
                <li class="flex-shrink-0 flex-xl-shrink-1 list-feature">
                    <div class="media">
                        <div class="feature__icon font-size-14 text-primary-blue text-lh-xs">
                            <i class="fa-regular fa-circle-check"></i>
                        </div>
                        <div class="media-body ml-4">
                            <h4 class="feature__title font-size-3">Money Back Guarantee</h4>
                            <p class="feature__subtitle m-0">Within 30 Days</p>
                        </div>
                    </div>
                </li>
                <li class="flex-shrink-0 flex-xl-shrink-1 separator mx-4 mx-xl-0 border-left h-fixed-80"
                    aria-hidden="true" role="presentation"></li>
                <li class="flex-shrink-0 flex-xl-shrink-1 list-feature">
                    <div class="media">
                        <div class="feature__icon font-size-14 text-primary-blue text-lh-xs">
                            <i class="fa-solid fa-headset"></i>
                        </div>
                        <div class="media-body ml-4">
                            <h4 class="feature__title font-size-3">24/7 Support</h4>
                            <p class="feature__subtitle m-0">Within 1 Business Day</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>


    <footer class="site-footer_v2">
        <div class="space-top-3 bg-gray-850">
            <div class="pb-5 space-bottom-lg-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 mb-6 mb-lg-0">
                            <h4 class="font-size-3 font-weight-medium mb-2 mb-xl-5 pb-xl-1 text-white">Explore</h4>
                            <ul class="list-unstyled mb-0">
                                <li class="h-white pb-2">
                                    <a class="widgets-hover transition-3d-hover font-size-2 text-gray-450"
                                        href="#">About as</a>
                                </li>
                                <li class="h-white py-2">
                                    <a class="font-size-2 text-gray-450 widgets-hover transition-3d-hover"
                                        href="#">Sitemap</a>
                                </li>
                                <li class="h-white py-2">
                                    <a class="font-size-2 text-gray-450 widgets-hover transition-3d-hover"
                                        href="#">Bookmarks</a>
                                </li>
                                <li class="h-white pt-2">
                                    <a class="font-size-2 text-gray-450 widgets-hover transition-3d-hover"
                                        href="#">Sign in/Join</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-2 mb-6 mb-lg-0">
                            <h4 class="font-size-3 font-weight-medium mb-2 mb-xl-5 pb-xl-1 text-white">Customer
                                Service</h4>
                            <ul class="list-unstyled mb-0">
                                <li class="h-white pb-2">
                                    <a class="font-size-2 text-gray-450 widgets-hover transition-3d-hover"
                                        href="#">Help Center</a>
                                </li>
                                <li class="h-white py-2">
                                    <a class="font-size-2 text-gray-450 widgets-hover transition-3d-hover"
                                        href="#">Returns</a>
                                </li>
                                <li class="h-white py-2">
                                    <a class="font-size-2 text-gray-450 widgets-hover transition-3d-hover"
                                        href="#">Product Recalls</a>
                                </li>
                                <li class="h-white py-2">
                                    <a class="font-size-2 text-gray-450 widgets-hover transition-3d-hover"
                                        href="#">Accessibility</a>
                                </li>
                                <li class="h-white py-2">
                                    <a class="font-size-2 text-gray-450 widgets-hover transition-3d-hover"
                                        href="#">Contact Us</a>
                                </li>
                                <li class="h-white pt-2">
                                    <a class="font-size-2 text-gray-450 widgets-hover transition-3d-hover"
                                        href="#">Store Pickup</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-2 mb-6 mb-lg-0">
                            <h4 class="font-size-3 font-weight-medium mb-2 mb-xl-5 pb-xl-1 text-white">Policy</h4>
                            <ul class="list-unstyled mb-0">
                                <li class="h-white pb-2">
                                    <a class="font-size-2 text-gray-450 widgets-hover transition-3d-hover"
                                        href="#">Return Policy</a>
                                </li>
                                <li class="h-white py-2">
                                    <a class="font-size-2 text-gray-450 widgets-hover transition-3d-hover"
                                        href="#">Terms Of Use</a>
                                </li>
                                <li class="h-white py-2">
                                    <a class="font-size-2 text-gray-450 widgets-hover transition-3d-hover"
                                        href="#">Security</a>
                                </li>
                                <li class="h-white pt-2">
                                    <a class="font-size-2 text-gray-450 widgets-hover transition-3d-hover"
                                        href="#">Privacy</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-3 mb-6 mb-lg-0">
                            <div class="pb-lg-6">
                                <h4 class="font-size-3 font-weight-medium mb-2 mb-xl-5 pb-xl-1 text-white">Contact Us
                                </h4>
                                <address class="font-size-2 mb-5">
                                    <span class="mb-2 font-weight-normal text-gray-450">
                                        Khu II, Đ. 3/2, Xuân Khánh, Ninh Kiều, Cần Thơ <br> Vietnam
                                    </span>
                                </address>
                                <div class="mb-4 h-white">
                                    <a href="mailto:vietthang@vtbookstore.com"
                                        class="font-size-2 d-block text-gray-450 mb-1">vietthang@vtbookstore.com</a>
                                    <a href="tel:+1246-345-0695" class="font-size-2 d-block text-gray-450">+84 292 3
                                        734713</a>
                                </div>
                                <ul class="list-unstyled mb-0 d-flex">
                                    <li class="h-white btn pl-0">
                                        <a class="text-gray-450" href="#">
                                            <span class="fab fa-instagram"></span>
                                        </a>
                                    </li>
                                    <li class="h-white btn">
                                        <a class="text-gray-450" href="#">
                                            <span class="fab fa-facebook-f"></span>
                                        </a>
                                    </li>
                                    <li class="h-white btn">
                                        <a class="text-gray-450" href="#">
                                            <span class="fab fa-youtube"></span>
                                        </a>
                                    </li>
                                    <li class="h-white btn">
                                        <a class="text-gray-450" href="#">
                                            <span class="fab fa-twitter"></span>
                                        </a>
                                    </li>
                                    <li class="h-white btn">
                                        <a class="text-gray-450" href="#">
                                            <span class="fab fa-pinterest"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-6 mb-lg-0">

                            <div>
                                <div class="mb-5">
                                    <h5 class="font-size-3 font-weight-medium text-white mb-2 mb-xl-5 pb-xl-1">Join
                                        Our Newsletter
                                    </h5>
                                    <p class="text-gray-450 font-size-2">Signup to be the first to hear about
                                        exclusive deals, special
                                        offers and upcoming collections</p>
                                </div>
                                <form class="js-validate js-form-message" novalidate="novalidate">
                                    <div class="input-group">
                                        <input type="email"
                                            class="form-control height-50 font-size-2 pl-4 border-0 rounded-left-pill"
                                            name="email" id="subscribeSrEmail" placeholder="Enter email"
                                            aria-label="Your email" aria-describedby="subscribeButton"
                                            required="" data-msg="Please enter a valid email address.">
                                        <div class="input-group-append">
                                            <button type="submit"
                                                class="btn btn-primary-blue text-white px-3 py-2 font-size-4 border-0"
                                                id="subscribeButton">
                                                <span class="fa-solid fa-paper-plane mx-1"></span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="space-1 border-top border-gray-750">
                <div class="container">
                    <div class="d-lg-flex text-center text-lg-left justify-content-between align-items-center">

                        <p class="mb-4 mb-lg-0 font-size-2 text-gray-450">©2022 VT Bookstore. All rights reserved</p>

                        <div class="ml-auto d-lg-flex justify-content-xl-end align-items-center">

                            <select class="js-select selectpicker dropdown-select ml-lg-4 mb-3 mb-md-0"
                                data-style="text-white-60 bg-secondary-gray-800 px-4 py-2 rounded-lg height-5 outline-none shadow-none form-control font-size-2"
                                data-dropdown-align-right="true">
                                <option value="one" selected>English (United States)</option>
                                <option value="two">Deutsch</option>
                                <option value="three">Français</option>
                                <option value="four">Español</option>
                            </select>


                            <select class="js-select selectpicker dropdown-select ml-md-3"
                                data-style="text-white-60 bg-secondary-gray-800 px-4 py-2 rounded-lg height-5 outline-none shadow-none form-control font-size-2"
                                data-width="fit" data-dropdown-align-right="true">
                                <option value="one" selected>$ USD</option>
                                <option value="two">€ EUR</option>
                                <option value="three">₺ TL</option>
                                <option value="four">₽ RUB</option>
                            </select>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <button onclick="topFunction()" id="scrollToTopBtn" title="Go to top" class="scrollToTopBtn"><i
            class="fa-solid fa-angle-up"></i></button>

    <script>
        // Scroll to top button function
        let scrollToTopBtn = document.querySelector('#scrollToTopBtn');

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                scrollToTopBtn.style.display = "block";
            } else {
                scrollToTopBtn.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
        // End scroll to top button
    </script>

    <script src="{{ url('') }}/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ url('') }}/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <script src="{{ url('') }}/assets/vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{ url('') }}/assets/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="{{ url('') }}/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="{{ url('') }}/assets/vendor/multilevel-sliding-mobile-menu/dist/jquery.zeynep.js"></script>
    <script src="{{ url('') }}/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js">
    </script>
    <script src="{{ url('') }}/assets/vendor/slick-carousel/slick/slick.min.js"></script>

    <script src="{{ url('') }}/assets/js/hs.core.js"></script>
    <script src="{{ url('') }}/assets/js/validator.js"></script>
    <script src="{{ url('') }}/assets/js/components/hs.unfold.js"></script>
    <script src="{{ url('') }}/assets/js/components/hs.malihu-scrollbar.js"></script>
    <script src="{{ url('') }}/assets/js/components/hs.slick-carousel.js"></script>
    <script src="{{ url('') }}/assets/js/components/hs.show-animation.js"></script>
    <script src="{{ url('') }}/assets/js/components/hs.selectpicker.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).on('ready', function() {
            // initialization of unfold component
            $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

            // initialization of malihu scrollbar
            $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

            // initialization of slick carousel
            $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

            // initialization of show animations
            $.HSCore.components.HSShowAnimation.init('.js-animation-link');

            // init zeynepjs
            var zeynep = $('.zeynep').zeynep({
                onClosed: function() {
                    // enable main wrapper element clicks on any its children element
                    $("body main").attr("style", "");

                    console.log('the side menu is closed.');
                },
                onOpened: function() {
                    // disable main wrapper element clicks on any its children element
                    $("body main").attr("style", "pointer-events: none;");

                    console.log('the side menu is opened.');
                }
            });

            // handle zeynep overlay click
            $(".zeynep-overlay").click(function() {
                zeynep.close();
            });

            // open side menu if the button is clicked
            $(".cat-menu").click(function() {
                if ($("html").hasClass("zeynep-opened")) {
                    zeynep.close();
                } else {
                    zeynep.open();
                }
            });
        });
    </script>
    <script src="{{ url('') }}/assets/js/main.js"></script>
    <script>
        var searchHome = $('#search-home');
        var searchList = $('.search-list-container');
        if (searchHome) {
            $('#search-input').on('input', function(e) {
                console.log($('#search-input').val());
                if ($('#search-input').val() != "") {
                    $.ajax({
                        method: "GET",
                        url: "{{ route('search-book') }}",
                        data: {
                            keyword: $('#search-input').val(),
                        }
                    }).done(function(response) {
                        searchList.html(response.data);
                    });
                } else
                    searchList.html("");

            });
        }
    </script>
    @include('layout.notification')
    @yield('custom_js')
</body>

</html>
