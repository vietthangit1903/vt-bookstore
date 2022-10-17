<header id="site-header" class="u-header site-header__v1">
    <div class="topbar border-bottom d-none d-md-block">
        <div class="container-fluid px-2 px-md-5 px-xl-8d75">
            <div class="topbar__nav d-md-flex justify-content-between align-items-center">
                <ul class="topbar__nav--left nav ml-md-n3">
                    <li class="nav-item"><a href="#" class="nav-link link-black-100"><i
                                class="fa-regular fa-circle-question mr-2"></i>Can we help you?</a></li>
                    <li class="nav-item"><a href="tel:+1246-345-0695" class="nav-link link-black-100"><i
                                class="fa-solid fa-mobile-screen mr-2"></i>+84 292 3 734713</a></li>
                </ul>
                <ul class="topbar__nav--right nav mr-md-n3">
                    <li class="nav-item"><a href="#" class="nav-link link-black-100"><i
                                class="fa-solid fa-location-dot"></i></a></li>
                    <li class="nav-item"><a href="#" class="nav-link link-black-100"><i
                                class="fa-regular fa-heart"></i></a></li>
                    <li class="nav-item">

                        <a id="sidebarNavToggler" href="javascript:;" role="button" class="nav-link link-black-100"
                            aria-controls="sidebarContent" aria-haspopup="true" aria-expanded="false"
                            data-unfold-event="click" data-unfold-hide-on-scroll="false"
                            data-unfold-target="#sidebarContent" data-unfold-type="css-animation"
                            data-unfold-overlay='{
                                "className": "u-sidebar-bg-overlay",
                                "background": "rgba(0, 0, 0, .7)",
                                "animationSpeed": 500
                            }'
                            data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight"
                            data-unfold-duration="500">
                            <i class="fa-regular fa-user"></i>
                        </a>

                    </li>
                    <li class="nav-item">

                        <a id="sidebarNavToggler1" href="javascript:;" role="button"
                            class="nav-link link-black-100 position-relative" aria-controls="sidebarContent1"
                            aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                            data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarContent1"
                            data-unfold-type="css-animation"
                            data-unfold-overlay='{
                                "className": "u-sidebar-bg-overlay",
                                "background": "rgba(0, 0, 0, .7)",
                                "animationSpeed": 500
                            }'
                            data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight"
                            data-unfold-duration="500">
                            <span
                                class="position-absolute bg-dark width-16 height-16 rounded-circle d-flex align-items-center justify-content-center text-white font-size-n9 right-0">3</span>
                            <i class="fa-solid fa-bag-shopping"></i>
                        </a>

                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="masthead border-bottom position-relative" style="margin-bottom: -1px;">
        <div class="container-fluid px-3 px-md-5 px-xl-8d75 py-2 py-md-0">
            <div class="d-flex align-items-center position-relative flex-wrap">
                <div class="offcanvas-toggler mr-4 mr-lg-8">
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
                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                d="M-0.000,-0.000 L20.000,-0.000 L20.000,2.000 L-0.000,2.000 L-0.000,-0.000 Z" />
                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                d="M-0.000,8.000 L15.000,8.000 L15.000,10.000 L-0.000,10.000 L-0.000,8.000 Z" />
                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                d="M-0.000,16.000 L20.000,16.000 L20.000,18.000 L-0.000,18.000 L-0.000,16.000 Z" />
                        </svg>
                    </a>
                </div>
                <div class="site-branding pr-md-4">
                    <a href="{{ route('home') }}" class="d-block mb-1">
                        <img src="./assets/img/header-logo-2.png" alt="" style="width: 100px;">
                    </a>
                </div>
                <div class="site-navigation mr-auto d-none d-xl-block">
                    <ul class="nav">
                        <li class="nav-item dropdown">
                            <a href="{{ route('home') }}"
                                class="nav-link link-black-100 mx-3 px-0 py-3 font-weight-medium d-flex align-items-center">
                                Home
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="categoriesDropdownInvoker" href="#"
                                class="dropdown-toggle nav-link link-black-100 mx-3 px-0 py-3 font-weight-medium d-flex align-items-center"
                                aria-haspopup="true" aria-expanded="false" data-unfold-event="hover"
                                data-unfold-target="#categoriesDropdownMenu" data-unfold-type="css-animation"
                                data-unfold-duration="200" data-unfold-delay="50" data-unfold-hide-on-scroll="true"
                                data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                                Categories
                            </a>
                            <ul id="categoriesDropdownMenu"
                                class="dropdown-unfold dropdown-menu rounded-0 border-gray-900"
                                aria-labelledby="categoriesDropdownInvoker">
                                <li><a href="#" class="dropdown-item link-black-100">Children's books</a></li>
                                <li><a href="#" class="dropdown-item link-black-100">Computers & Technology</a>
                                </li>
                                <li><a href="#" class="dropdown-item link-black-100">Education & Teaching</a>
                                </li>
                                <li><a href="#" class="dropdown-item link-black-100">History</a></li>
                                <li><a href="#" class="dropdown-item link-black-100">Travel</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="shopDropdownInvoker" href="#"
                                class="dropdown-toggle nav-link link-black-100 mx-3 px-0 py-3 font-weight-medium d-flex align-items-center"
                                aria-haspopup="true" aria-expanded="false" data-unfold-event="hover"
                                data-unfold-target="#shopDropdownMenu" data-unfold-type="css-animation"
                                data-unfold-duration="200" data-unfold-delay="50" data-unfold-hide-on-scroll="true"
                                data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                                Shop
                            </a>
                            <ul id="shopDropdownMenu" class="dropdown-unfold dropdown-menu rounded-0 border-gray-900"
                                aria-labelledby="shopDropdownInvoker">
                                <li><a href="./v1.html" class="dropdown-item link-black-100">Book List </a></li>
                                <li><a href="{{route('cart')}}" class="dropdown-item link-black-100">Book cart</a></li>
                                <li><a href="./checkout.html" class="dropdown-item link-black-100">Book checkout</a>
                                </li>
                                <li><a href="./my-account.html" class="dropdown-item link-black-100">My Account</a>
                                </li>
                                <li><a href="./order-received.html" class="dropdown-item link-black-100">Order
                                        Received</a></li>
                                <li><a href="./order-tracking.html" class="dropdown-item link-black-100">Order
                                        Tracking</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <ul class="d-md-none nav mr-md-n3 ml-auto">
                    <li class="nav-item">

                        <a id="sidebarNavToggler9" href="javascript:;" role="button"
                            class="px-2 nav-link link-black-100" aria-controls="sidebarContent9" aria-haspopup="true"
                            aria-expanded="false" data-unfold-event="click" data-unfold-hide-on-scroll="false"
                            data-unfold-target="#sidebarContent9" data-unfold-type="css-animation"
                            data-unfold-overlay='{
                                "className": "u-sidebar-bg-overlay",
                                "background": "rgba(0, 0, 0, .7)",
                                "animationSpeed": 500
                            }'
                            data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight"
                            data-unfold-duration="500">
                            <i class="glph-icon fa-regular fa-user"></i>
                        </a>

                    </li>
                </ul>
                <div class="site-search ml-xl-0 ml-md-auto w-r-100 my-2 my-xl-0">
                    <form class="form-inline">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <i
                                    class="fa-solid fa-magnifying-glass input-group px-2d75 py-2d75 bg-white-100 border-white-100"></i>
                            </div>
                            <input class="form-control bg-white-100 min-width-380 py-2d75 height-4 border-white-100"
                                type="search" placeholder="Search for Books by Keyword ..." aria-label="Search">
                        </div>
                        <button class="btn btn-outline-success my-2 my-sm-0 sr-only" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
