@extends('layout.master')

@section('title')
    Shop Cart
@endsection

@section('breadcrumb')
    <div class="page-header border-bottom">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-center py-4">
                <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Book Cart</h1>
                <nav class="woocommerce-breadcrumb font-size-2">
                    <a href="{{ route('home') }}" class="h-primary">Home</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                    <a href="#" class="h-primary">Shop</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>Book Cart
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="site-content bg-blue-light overflow-hidden" id="content">
           @include('user.cart-body')
    </div>
@endsection
