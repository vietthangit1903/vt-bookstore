@extends('layout.master')

@section('title')
    My account
@endsection

@section('breadcrumb')
    <div class="page-header border-bottom">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-center py-4">
                <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">My account</h1>
                <nav class="woocommerce-breadcrumb font-size-2">
                    <a href="{{ route('home') }}" class="h-primary">Home</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                    My account
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <main id="content">
        <div class="container col-lg-8 col-md-8 col-sm-12">
            <div class="mb-4 pb-4 mb-lg-4 pb-lg-5">
                <div class="pt-5 pl-md-5 pt-lg-8 pl-lg-9 space-bottom-1 mb-lg-4 border-bottom">
                    <h5 class="font-weight-medium font-size-9 ml-lg-1 mb-lg-8 pb-xl-1 text-center">Account Details
                    </h5>
                    <h6 class="font-weight-medium font-size-7 mb-2 mb-lg-2 pb-xl-1 text-primary">Basic information</h6>
                    <div class="row pb-xl-1">
                        <div class="col-5 ">
                                <h6 class="font-weight-medium font-size-26 mb-3">Full name: {{ Auth()->user()->fullName }}
                                </h6>
                                <p class="font-weight-medium font-size-22 mb-0">Email: {{ Auth()->user()->email }}</p>
                                <p class="font-weight-medium font-size-22 mb-0">Date of birth: {{ Auth()->user()->dob ? date('d/m/Y', strtotime(Auth()->user()->dob)) : '--/--/----' }}</p>
                                <p class="font-weight-medium font-size-22">Role: {{ Auth()->user()->role }}</p>
                        </div>
                        <div class="col-5 d-flex justify-content-center">
                            <img src="{{asset(Auth::user()->image)}}" style="object-fit: cover; border: 2px solid var(--primary)" alt="Profile image" width="160" height="160"
                                class="rounded-circle ">
                        </div>
                    </div>
                    <a class="btn btn-dark rounded-0 font-weight-medium text-white w-30 mt-2"
                    href="{{ route('edit-my-account') }}"><i class="fa-solid fa-pen mr-2"></i>Edit basic information</a>


                </div>
                <div class="pt-5 pl-md-5 pt-lg-8 pl-lg-9 space-bottom-1 mb-lg-4">
                    <h6 class="font-weight-medium font-size-7 ml-lg-1 mb-5 mb-lg-8 pb-xl-1 text-primary">Addresses</h6>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                        @foreach ($user_addresses as $address)
                            <div class="col mb-4">
                                <div class="mb-6 mb-md-0 p-4 border height-400 d-flex flex-column justify-content-between">
                                    <h6 class="font-weight-medium font-size-22 mb-3 text-center">{{ $address->name }}
                                    </h6>
                                    <address class="d-flex flex-column align-items-center mb-4">
                                        <span class="text-gray-600 font-size-2">{{ $address->address }}</span>
                                    </address>
                                    <div class="d-flex justify-content-around flex-wrap">
                                        <a class="btn btn-dark rounded-0 font-weight-medium text-white w-100 m-2"
                                            href="{{ route('user-address', ['id' => $address->id]) }}">Edit</a>
                                        <a class="btn btn-dark rounded-0 font-weight-medium text-white w-100 m-2 delete"
                                            href="{{ route('user-delete-address') }}" data-csrf="{{ csrf_token() }}"
                                            data-id="{{ $address->id }}" title="Remove {{ $address->name }}"
                                            data-name="{{ $address->name }}"
                                            data-redirect="{{ route('my-account') }}">Remove</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <div class="col mb-4 align-self-center">
                            <a class="mb-6 mb-md-0 p-4 border d-flex flex-column text-dark justify-content-center"
                                href="{{ route('user-address') }}">
                                <h6 class="font-weight-medium font-size-22 mb-3 text-center"> Add new address
                                </h6>
                                <i class="fa-solid fa-plus  font-size-14 text-center"></i>
                            </a>
                        </div>


                    </div>

                </div>
            </div>

        </div>
    </main>
@endsection

@section('custom_js')
@endsection
