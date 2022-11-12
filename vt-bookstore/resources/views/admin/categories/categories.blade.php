@extends('layout.master')

@section('title')
    Manage Book Categories
@endsection

@section('breadcrumb')
<div class="page-header border-bottom">
    <div class="container">
        <div class="d-md-flex justify-content-between align-items-center py-4">
            <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Manage Book Categories</h1>
            <nav class="woocommerce-breadcrumb font-size-2">
                <a href="{{route('admin.dashboard')}}" class="h-primary">Admin dashboard</a>
                <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>Manage Book Categories
            </nav>
        </div>
    </div>
</div>
@endsection

@section('content')
    @include('admin.categories.categories-content')
@endsection
