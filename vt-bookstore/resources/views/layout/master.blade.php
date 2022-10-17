<!DOCTYPE html>
<html lang="en">

<head>

    <title>@yield('title') | VT Bookstore</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="{{ url('') }}/assets/img/header-logo-2.png" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./assets/vendor/fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="./assets/vendor/animate.css/animate.css">
    <link rel="stylesheet" href="./assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="./assets/vendor/slick-carousel/slick/slick.css" />
    <link rel="stylesheet" href="./assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">


    <link rel="stylesheet" href="./assets/css/loader.css">
    <link rel="stylesheet" href="./assets/css/theme.css">
</head>

<body @class([
    'right-sidebar' => route('cart') === url()->current(),
    'woocommerce-cart' => route('cart') === url()->current(),
])>

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

    @include('layout.header')

    @include('layout.login')


    @include('layout.cart')


    @include('layout.sidebar')

    @yield('breadcrumb')

    @yield('content')


    @include('layout.footer')

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

    <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="./assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <script src="./assets/vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="./assets/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="./assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="./assets/vendor/slick-carousel/slick/slick.min.js"></script>
    <script src="./assets/vendor/multilevel-sliding-mobile-menu/dist/jquery.zeynep.js"></script>
    <script src="./assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

    <script src="./assets/js/hs.core.js"></script>
    <script src="./assets/js/components/hs.unfold.js"></script>
    <script src="./assets/js/components/hs.malihu-scrollbar.js"></script>
    <script src="./assets/js/components/hs.header.js"></script>
    <script src="./assets/js/components/hs.slick-carousel.js"></script>
    <script src="./assets/js/components/hs.selectpicker.js"></script>
    <script src="./assets/js/components/hs.show-animation.js"></script>


    <script>
        $(document).on('ready', function() {
            // initialization of unfold component
            $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

            // initialization of slick carousel
            $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

            // initialization of header
            $.HSCore.components.HSHeader.init($('#header'));

            // initialization of malihu scrollbar
            $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

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
    <script>
        // Preloader
        const preloader = document.querySelector('#preloader')
        window.addEventListener('load', function() {
            preloader.style.display = "none";
        })
    </script>
</body>

</html>