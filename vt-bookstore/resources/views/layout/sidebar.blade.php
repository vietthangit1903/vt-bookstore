<aside id="sidebarContent2" class="u-sidebar u-sidebar__md u-sidebar--left" aria-labelledby="sidebarNavToggler2">
    <div class="u-sidebar__scroller js-scrollbar">
        <div class="u-sidebar__container">
            <div class="u-header-sidebar__footer-offset">

                <div class="u-sidebar__body">
                    <div class="u-sidebar__content u-header-sidebar__content">

                        <header
                            class="border-bottom px-4 px-md-5 py-4 d-flex align-items-center justify-content-between">
                            @if (Str::of(url()->current())->contains('admin'))
                                <h2 class="font-size-3 mb-0">ADMIN DASHBOARD</h2>
                            @else
                                <h2 class="font-size-3 mb-0">SHOP BY CATEGORY</h2>
                            @endif

                            <div class="d-flex align-items-center">
                                <button type="button" class="close ml-auto" aria-controls="sidebarContent2"
                                    aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                                    data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarContent2"
                                    data-unfold-type="css-animation" data-unfold-animation-in="fadeInLeft"
                                    data-unfold-animation-out="fadeOutLeft" data-unfold-duration="500">
                                    <span aria-hidden="true"><i class="fas fa-times ml-2 font-size-5"></i></span>
                                </button>
                            </div>

                        </header>

                        <div class="border-bottom">
                            <div class="zeynep pt-4">
                                <ul>
                                    <li>
                                        <a href="{{ route('home') }}">Home Page</a>
                                    </li>
                                    @if (Str::of(url()->current())->contains('admin'))
                                        <li>
                                            <a href="{{ route('admin.categories') }}">Mange Categories</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.authors') }}">Mange Authors</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.publishers') }}">Mange Publishers</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.books') }}">Mange Books</a>
                                        </li>
                                    @else
                                    <li>
                                        <a href="{{ route('my-account') }}">My Account</a>
                                    </li>
                                    <li class="has-submenu">
                                        <a href="#" data-submenu="off-shop-pages">Shop Pages</a>
                                        <div id="off-shop-pages" class="submenu js-scrollbar">
                                            <div class="submenu-header" data-submenu-close="off-shop-pages">
                                                <a href="#">Shop Pages</a>
                                            </div>
                                            <ul class="">
                                                <li>
                                                    <a href="./cart.html">Shop cart</a>
                                                </li>
                                                <li>
                                                    <a href="./checkout.html">Checkout</a>
                                                </li>
                                                <li>
                                                    <a href="./order-received.html">Order Received</a>
                                                </li>
                                                <li>
                                                    <a href="./order-tracking.html">Order Tracking</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{ route('book-list') }}">Book List</a>
                                    </li>
                                    
                                    <li class="has-submenu">
                                        <a href="#" data-submenu="book-categories">Book Categories</a>
                                        <div id="book-categories" class="submenu js-scrollbar">
                                            <div class="submenu-header" data-submenu-close="book-categories">
                                                <a href="#">Book Categories</a>
                                            </div>
                                            <ul class="book-categories">
                                                
                                            </ul>
                                        </div>
                                    </li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                        <div class="px-4 px-md-5 pt-5 pb-4 border-bottom">
                            <h2 class="font-size-3 mb-3">HELP & SETTINGS </h2>
                            <ul class="list-group list-group-flush list-group-borderless">
                                @auth
                                <li class="list-group-item px-0 py-2 border-0"><a href="{{ route('my-account') }}" class="h-primary">My Account</a></li>
                                <li class="list-group-item px-0 py-2 border-0"><a href="{{ route('auth.logout') }}" class="h-primary">Log out</a></li>
                                    
                                @endauth
                                @guest
                                <li class="list-group-item px-0 py-2 border-0"><a href="{{ route('auth.login') }}" class="h-primary">Sign in</a></li>
                                <li class="list-group-item px-0 py-2 border-0"><a href="{{ route('guest.register') }}" class="h-primary">Register</a></li>
                                @endguest
                            </ul>
                        </div>
                        <div class="px-4 px-md-5 py-5">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a class="h-primary pr-2 font-size-2" href="#">
                                        <span class="fab fa-facebook-f btn-icon__inner"></span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="h-primary pr-2 font-size-2" href="#">
                                        <span class="fab fa-google btn-icon__inner"></span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="h-primary pr-2 font-size-2" href="#">
                                        <span class="fab fa-twitter btn-icon__inner"></span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="h-primary pr-2 font-size-2" href="#">
                                        <span class="fab fa-github btn-icon__inner"></span>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</aside>
