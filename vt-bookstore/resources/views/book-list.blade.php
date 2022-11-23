@extends('layout.master')

@section('title')
    Book List
@endsection

@section('breadcrumb')
    <div class="page-header border-bottom mb-8">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-center py-4">
                <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Book List</h1>
                <nav class="woocommerce-breadcrumb font-size-2">
                    <a href="{{ route('home') }}" class="h-primary">Home</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                    Shop
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                    Book List
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="site-content space-bottom-3" id="content">
        <div class="container">
            <div class="row">
                <div id="primary" class="content-area order-2">
                    <div
                        class="shop-control-bar d-lg-flex justify-content-between align-items-center mb-5 text-center text-md-left">
                        <div class="shop-control-bar__left mb-4 m-lg-0">
                            @php
                                $total = $paginator->total();
                                $end = $paginator->currentPage() * $paginator->perPage();
                                if ($end > $total) {
                                    $end = $total;
                                    $r = $total % $paginator->perPage();
                                    $start = $end - $r + 1;
                                } else {
                                    $start = $end - $paginator->perPage() + 1;
                                }
                            @endphp
                            <p class="woocommerce-result-count m-0">Showing {{ $start }}–{{ $end }} of
                                {{ $total }} results</p>
                        </div>
                        <div class="shop-control-bar__right d-md-flex align-items-center">
                            Sort by:
                            <form class="woocommerce-ordering mb-4 m-md-0" method="get" action="{{ url()->full() }}"
                                id="sort-form">

                                <select class="js-select selectpicker dropdown-select orderby" name="sort" id="sort-select"
                                    data-style="border-bottom shadow-none outline-none py-2">
                                    <option value="default" @selected($sort == 'default')>Default</option>
                                    <option value="date" @selected($sort == 'date')>Newness</option>
                                    <option value="price" @selected($sort == 'price')>Price: low to high</option>
                                    <option value="price-desc" @selected($sort == 'price-desc')>Price: high to low</option>
                                </select>

                            </form>
                            <form class="number-of-items ml-md-4 mb-4 m-md-0 d-none d-xl-block" action="{{ url()->full() }}"
                                method="get" id="per-page-form">

                                <select class="js-select selectpicker dropdown-select orderby" name="per-page"
                                    id="per-page-select" data-style="border-bottom shadow-none outline-none py-2"
                                    data-width="fit">
                                    <option value="3" @selected($perPage == 3)>Show 3</option>
                                    <option value="4" @selected($perPage == 4)>Show 4</option>
                                    <option value="6" @selected($perPage == 6)>Show 6</option>
                                    <option value="12" @selected($perPage == 12)>Show 12</option>
                                </select>

                            </form>
                            <ul class="nav nav-tab ml-lg-4 justify-content-center justify-content-md-start ml-md-auto"
                                id="pills-tab" role="tablist">
                                <li class="nav-item border">
                                    <a class="nav-link p-0 height-38 width-38 justify-content-center d-flex align-items-center active"
                                        id="pills-one-example1-tab" data-toggle="pill" href="#pills-one-example1"
                                        role="tab" aria-controls="pills-one-example1" aria-selected="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="17px" height="17px">
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                                d="M-0.000,0.000 L3.000,0.000 L3.000,3.000 L-0.000,3.000 L-0.000,0.000 Z" />
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                                d="M7.000,0.000 L10.000,0.000 L10.000,3.000 L7.000,3.000 L7.000,0.000 Z" />
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                                d="M14.000,0.000 L17.000,0.000 L17.000,3.000 L14.000,3.000 L14.000,0.000 Z" />
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                                d="M-0.000,7.000 L3.000,7.000 L3.000,10.000 L-0.000,10.000 L-0.000,7.000 Z" />
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                                d="M7.000,7.000 L10.000,7.000 L10.000,10.000 L7.000,10.000 L7.000,7.000 Z" />
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                                d="M14.000,7.000 L17.000,7.000 L17.000,10.000 L14.000,10.000 L14.000,7.000 Z" />
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                                d="M-0.000,14.000 L3.000,14.000 L3.000,17.000 L-0.000,17.000 L-0.000,14.000 Z" />
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                                d="M7.000,14.000 L10.000,14.000 L10.000,17.000 L7.000,17.000 L7.000,14.000 Z" />
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                                d="M14.000,14.000 L17.000,14.000 L17.000,17.000 L14.000,17.000 L14.000,14.000 Z" />
                                        </svg>
                                    </a>
                                </li>
                                <li class="nav-item border">
                                    <a class="nav-link p-0 height-38 width-38 justify-content-center d-flex align-items-center"
                                        id="pills-two-example1-tab" data-toggle="pill" href="#pills-two-example1"
                                        role="tab" aria-controls="pills-two-example1" aria-selected="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="23px" height="17px">
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                                d="M-0.000,0.000 L3.000,0.000 L3.000,3.000 L-0.000,3.000 L-0.000,0.000 Z" />
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                                d="M7.000,0.000 L23.000,0.000 L23.000,3.000 L7.000,3.000 L7.000,0.000 Z" />
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                                d="M-0.000,7.000 L3.000,7.000 L3.000,10.000 L-0.000,10.000 L-0.000,7.000 Z" />
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                                d="M7.000,7.000 L23.000,7.000 L23.000,10.000 L7.000,10.000 L7.000,7.000 Z" />
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                                d="M-0.000,14.000 L3.000,14.000 L3.000,17.000 L-0.000,17.000 L-0.000,14.000 Z" />
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                                d="M7.000,14.000 L23.000,14.000 L23.000,17.000 L7.000,17.000 L7.000,14.000 Z" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-one-example1" role="tabpanel"
                            aria-labelledby="pills-one-example1-tab">

                            <ul
                                class="products list-unstyled row no-gutters row-cols-2 row-cols-lg-3 row-cols-wd-4 border-top border-left mb-6">
                                @foreach ($paginator as $book)
                                    <li class="product col">
                                        <div class="product__inner overflow-hidden p-3 p-md-4d875">
                                            <div
                                                class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                                <div class="woocommerce-loop-product__thumbnail">
                                                    <a href="#" class="d-block"><img
                                                            src="{{ asset($book->bookImages[0]->image_path) }}"
                                                            class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                            alt="image-description"
                                                            style="width: 150px; height: 226px; object-fit: contain"></a>
                                                </div>
                                                <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                                    <h2
                                                        class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                                        <a href="#">{{ $book->name }}</a>
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
                                                    <a href="#"
                                                        class="text-uppercase text-dark h-dark font-weight-medium mr-auto"
                                                        data-toggle="tooltip" data-placement="right" title=""
                                                        data-original-title="ADD TO CART">
                                                        <span class="product__add-to-cart">ADD TO CART</span>
                                                        <span class="product__add-to-cart-icon font-size-4"><i
                                                                class="flaticon-icon-126515"></i></span>
                                                    </a>
                                                    <a href="#"
                                                        class="mr-1 h-p-bg btn btn-outline-primary border-0">
                                                        <i class="flaticon-switch"></i>
                                                    </a>
                                                    <a href="#" class="h-p-bg btn btn-outline-primary border-0">
                                                        <i class="flaticon-heart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach


                            </ul>

                        </div>
                        <div class="tab-pane fade" id="pills-two-example1" role="tabpanel"
                            aria-labelledby="pills-two-example1-tab">

                            <ul class="products list-unstyled mb-6">
                                @foreach ($paginator as $book)
                                    <li class="product product__list">
                                        <div class="product__inner overflow-hidden p-3 p-md-4d875">
                                            <div
                                                class="woocommerce-LoopProduct-link woocommerce-loop-product__link row position-relative">
                                                <div class="col-md-auto woocommerce-loop-product__thumbnail mb-3 mb-md-0">
                                                    <a href="#" class="d-block"><img
                                                            src="{{ asset($book->bookImages[0]->image_path) }}"
                                                            class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                            alt="image-description"
                                                            style="width: 150px; height: 226px; object-fit: contain"></a>
                                                </div>
                                                <div
                                                    class="col-md woocommerce-loop-product__body product__body pt-3 bg-white mb-3 mb-md-0">
                                                    <h2
                                                        class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 crop-text-2 h-dark">
                                                        <a href="#" tabindex="0">{{ $book->name }}</a>
                                                    </h2>
                                                    <div class="font-size-2  mb-2 text-truncate"><a href="#"
                                                            class="text-gray-700">{{ $book->author->name }}</a></div>
                                                    <p class="font-size-2 mb-2 crop-text-2">{{ $book->description }}</p>
                                                    <div
                                                        class="price d-flex align-items-center font-weight-medium font-size-3">
                                                        <span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol">$</span>{{ $book->price }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-auto d-flex align-items-center">
                                                    <a href="#"
                                                        class="text-uppercase text-dark h-dark font-weight-medium mr-4"
                                                        data-toggle="tooltip" data-placement="right" title=""
                                                        data-original-title="ADD TO CART">
                                                        <span class="product__add-to-cart">ADD TO CART</span>
                                                        <span class="product__add-to-cart-icon font-size-4"><i
                                                                class="flaticon-icon-126515"></i></span>
                                                    </a>
                                                    <a href="#"
                                                        class="mr-1 h-p-bg btn btn-outline-primary border-0">
                                                        <i class="flaticon-switch"></i>
                                                    </a>
                                                    <a href="#" class="h-p-bg btn btn-outline-primary border-0">
                                                        <i class="flaticon-heart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>

                        </div>
                    </div>

                    @include('layout.pagination')

                </div>
                <div id="secondary" class="sidebar widget-area order-1" role="complementary">
                    <div id="widgetAccordion">
                        <div id="woocommerce_product_categories-2"
                            class="widget p-4d875 border woocommerce widget_product_categories">
                            <div id="widgetHeadingOne" class="widget-head">
                                <a class="d-flex align-items-center justify-content-between text-dark" href="#"
                                    data-toggle="collapse" data-target="#widgetCollapseOne" aria-expanded="true"
                                    aria-controls="widgetCollapseOne">
                                    <h3 class="widget-title mb-0 font-weight-medium font-size-3">Categories</h3>
                                    <svg class="mins" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                            d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                    </svg>
                                    <svg class="plus" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                            d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                    </svg>
                                </a>
                            </div>
                            <div id="widgetCollapseOne" class="mt-3 widget-content collapse show"
                                aria-labelledby="widgetHeadingOne" data-parent="#widgetAccordion">
                                <ul class="product-categories" id="product-categories">
                                    {{-- <li class="cat-item cat-item-9 cat-parent">
                                        <a href="../shop/v3.html">Clothing</a>
                                    </li> --}}
                                    
                                </ul>
                            </div>
                        </div>
                        <div id="Authors" class="widget widget_search widget_author p-4d875 border">
                            <div id="widgetHeading21" class="widget-head">
                                <a class="d-flex align-items-center justify-content-between text-dark" href="#"
                                    data-toggle="collapse" data-target="#widgetCollapse21" aria-expanded="false"
                                    aria-controls="widgetCollapse21">
                                    <h3 class="widget-title mb-0 font-weight-medium font-size-3">Author</h3>
                                    <svg class="mins" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                            d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                    </svg>
                                    <svg class="plus" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                            d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                    </svg>
                                </a>
                            </div>
                            <div id="widgetCollapse21" class="mt-4 widget-content collapse"
                                aria-labelledby="widgetHeading21" data-parent="#widgetAccordion">
                                <ul class="product-categories">
                                    <li class="cat-item cat-item-9 cat-parent">
                                        <a href="#">A. J. Finn</a>
                                    </li>
                                    <li class="cat-item cat-item-69 cat-parent">
                                        <a href="#">Anne Frank</a>
                                    </li>
                                    <li class="cat-item cat-item-65 cat-parent">
                                        <a href="#">Camille Pagán</a>
                                    </li>
                                    <li class="cat-item cat-item-11 cat-parent"><a href="#">Daniel H. Pink</a>
                                    </li>
                                    <li class="cat-item cat-item-12"><a href="#">Danielle
                                            Steel</a></li>
                                    <li class="cat-item cat-item-31"><a href="#">David
                                            Quammen</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
    <script>
        var perPage = {{$perPage}};
        var sort = "{{$sort}}";
        $('#per-page-select').change(function(){
            perPage = $(this).val();
            window.location = "{{url()->current()}}?sort=" + sort + "&per-page=" + perPage;
        });
        $('#sort-select').change(function(){
            sort = $(this).val();
            window.location = "{{url()->current()}}?sort=" + sort + "&per-page=" + perPage;
        });
    </script>
@endsection
