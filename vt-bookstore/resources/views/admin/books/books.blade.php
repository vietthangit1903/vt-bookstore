@extends('layout.master')

@section('title')
    Manage Books
@endsection

@section('breadcrumb')
    <div class="page-header border-bottom">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-center py-4">
                <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Manage Books</h1>
                <nav class="woocommerce-breadcrumb font-size-2">
                    <a href="{{ route('admin.dashboard') }}" class="h-primary">Admin dashboard</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>Manage Books
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <main id="content">
        <div class="container col-lg-8 col-md-8 col-sm-12 my-5">
            <div class="text-center mb-5">
                <h5 class="font-size-7 font-weight-medium">Manage Books</h5>
            </div>
            <div class="mb-3">
                <a href="{{ route('admin.add-book') }}" class="btn btn-dark rounded-0 btn-wide py-3 mr-2 font-weight-medium">Add new book</a>
            </div>
            {{-- Table --}}
            @include('admin.books.books-table')
            {{-- End table --}}
        </div>
    </main>
@endsection
