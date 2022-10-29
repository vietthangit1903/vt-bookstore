@extends('layout.master')

@section('title')
    My address
@endsection

@section('breadcrumb')
    <div class="page-header border-bottom">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-center py-4">
                <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">My address</h1>
                <nav class="woocommerce-breadcrumb font-size-2">
                    <a href="{{ route('home') }}" class="h-primary">Home</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                    <a href="{{ route('my-account') }}" class="h-primary">My Account</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                    My address
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <main id="content">
        <div class="container col-lg-6 col-md-8 col-sm-12">
            <form
                @isset($address)
                    action="{{ route('user-address', ['id' => $address->id]) }}"
                @else
                    action="{{ route('user-address') }}"
                @endisset
                id="user-address" method="POST" novalidate>

                <header class="border-bottom px-4 px-md-6 py-4">
                    <h2 class="font-size-3 mb-0 d-flex align-items-center">
                        <i class="fa-regular fa-map mr-3 font-size-5"></i>
                        @isset($address)
                            Edit Address
                        @else
                            Add New Address
                        @endisset
                    </h2>
                </header>

                <div class="p-4 p-md-6">

                    @csrf
                    @isset($address)
                        <input type="hidden" name="id" value="{{ $address->id }}">
                    @endisset
                    <div class="form-group mb-4">
                        <div class="js-form-message js-focus-state">
                            <label id="addressNameLabel" class="form-label" for="addressName">Address Name
                                <span class="text-red-1">*</span></label>
                            <input type="text"
                                class="form-control rounded-0 height-4 px-4 @error('addressName') is-invalid @enderror"
                                name="addressName" id="addressName" aria-describedby="addressNameLabel"
                                @if (old('addressName')) value="{{ old('addressName') }}"
                                @else 
                                    @isset($address)
                                    value="{{ $address->name }}"
                                    @endisset @endif
                                required>
                            <div class="form-message @error('addressName') invalid-feedback @enderror">
                                @error('addressName')
                                    {{ $message }}
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="js-form-message js-focus-state">
                            <label id="addressDetailLabel" class="form-label" for="addressDetail">Address Detail
                                <span class="text-red-1">*</span></label>
                            <input type="text"
                                class="form-control height-4 rounded-0 px-4 @error('addressDetail') is-invalid @enderror"
                                name="addressDetail" id="addressDetail" aria-describedby="addressDetailLabel"
                                @if (old('addressDetail')) value="{{ old('addressDetail') }}"
                                @else 
                                    @isset($address)
                                    value="{{ $address->address }}"
                                    @endisset @endif
                                required>
                            <div class="form-message @error('addressDetail') invalid-feedback @enderror">
                                @error('addressDetail')
                                    {{ $message }}
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-block py-3 rounded-0 btn-dark">
                            @isset($address)
                                Save changes
                            @else
                                Create new address
                            @endisset
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </main>
@endsection

@section('custom_js')
    <script>
        Validator({
            form: '#user-address',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#addressName', 'Please enter your address name'),
                Validator.maxLength('#addressName', 255, 'Your address name length must not exceed 255 words'),

                Validator.isRequired('#addressDetail', 'Please enter your address detail'),
                Validator.maxLength('#addressName', 255,
                'Your address detail length must not exceed 255 words'),

            ]
        });
    </script>
@endsection
