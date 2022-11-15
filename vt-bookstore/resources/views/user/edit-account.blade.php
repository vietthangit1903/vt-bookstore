@extends('layout.master')

@section('title')
    Edit Acount Information
@endsection

@section('breadcrumb')
    <div class="page-header border-bottom">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-center py-4">
                <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Edit Acount Information</h1>
                <nav class="woocommerce-breadcrumb font-size-2">
                    <a href="{{ route('home') }}" class="h-primary">Home</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                    <a href="{{ route('my-account') }}" class="h-primary">My Account</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                    Edit Acount Information
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <main id="content">
        <div class="container col-lg-6 col-md-8 col-sm-12">
            <form action="{{ route('edit-my-account') }}" id="edit-account" method="POST" enctype="multipart/form-data">

                <header class="border-bottom px-4 px-md-6 py-4">
                    <h2 class="font-size-3 mb-0 d-flex align-items-center"><i
                            class="fa-regular fa-user mr-3 font-size-5"></i>Update Account Information</h2>
                </header>

                <div class="p-4 p-md-6">

                    @csrf
                    <div class="form-group mb-4">
                        <label id="fullNameLabel" class="form-label" for="fullName">Fullname <span
                                class="text-red-1">*</span></label>
                        <input type="text"
                            class="form-control rounded-0 height-4 px-4 @error('fullName') is-invalid @enderror"
                            name="fullName" id="fullName"
                            @if (old('fullName')) value="{{ old('fullName') }}"
                        @else 
                            value="{{ Auth()->user()->fullName }}" @endif>
                        <div class="form-message @error('fullName') invalid-feedback @enderror">
                            @error('fullName')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label id="dobLabel" class="form-label" for="dob">Date of birth <span
                                class="text-red-1">*</span></label>
                        <input type="date"
                            class="form-control rounded-0 height-4 px-4 @error('dob') is-invalid @enderror" name="dob"
                            id="dob"
                            @if (old('dob')) value="{{ old('dob') }}"
                        @else 
                            value="{{ Auth()->user()->dob ? Auth()->user()->dob : '' }}" @endif>
                        <div class="form-message @error('dob') invalid-feedback @enderror">
                            @error('dob')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label id="imageLabel" class="form-label " for="image">Avatar Image: </label>
                        <input type="file" class="px-4 @error('image') is-invalid @enderror" name="image"
                            id="image">
                        <div class="form-message @error('image') invalid-feedback @enderror">
                            @error('image')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn py-3 rounded-0 btn-dark w-40 mr-2">Update Account
                            Information</button>
                        <a href="{{ url()->previous() }}" class="btn py-3 rounded-0 btn-primary w-40">Cancel</a>
                    </div>


                </div>
            </form>
        </div>
    </main>
@endsection

@section('custom_js')
    <script>
        Validator({
            form: '#edit-account',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#fullName', 'Please enter your full name'),

                Validator.isRequired('#dob', 'Please enter your date of birth'),
                Validator.isDate('#dob', 'Wrong date format'),

            ]
        });
    </script>
@endsection
