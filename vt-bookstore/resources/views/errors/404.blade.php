<!DOCTYPE html>
<html lang="en">

<head>

    <title>404 | VT Bookstore</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="./assets/img/header-logo-2.png" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    {{-- <link rel="stylesheet" href="./assets/vendor/fontawesome-free-6.2.0-web/css/all.min.css"> --}}
    {{-- <!-- <link rel="stylesheet" href="./assets/vendor/flaticon/font/flaticon.css"> -->
    <link rel="stylesheet" href="./assets/vendor/animate.css/animate.css">
    <link rel="stylesheet" href="./assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="./assets/vendor/slick-carousel/slick/slick.css" />
    <link rel="stylesheet" href="./assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css"> --}}

    <link rel="stylesheet" href="{{ url('') }}/assets/css/theme.css">
</head>

<body>
    <main id="content">
        <div class="container">
            <div class="space-bottom-1 space-top-xl-2 space-bottom-xl-4">
                <div class="d-flex flex-column align-items-center pt-lg-7 pb-lg-4 pb-lg-6"> 
                    <div class="font-weight-bold font-size-200 font-size-xs-170 text-lh-sm mt-xl-1 text-red-1">404</div>
                    <h6 class="font-size-6 font-weight-medium mb-2">Woops, looks like this page does not exist</h6>
                    <span class="font-size-3 mb-6">You could either go back or go to homepage</span>
                    <div class="d-flex align-items-center flex-column justify-content-around">
                        <a href="{{url()->previous()}}"
                            class="btn btn-primary rounded-full btn-wide height-60 width-250 font-weight-medium mb-2">Go Back
                        </a>
                        <a href="{{route('home')}}"
                            class="btn btn-dark rounded-full btn-wide height-60 width-250 font-weight-medium">Go to Homepage
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
