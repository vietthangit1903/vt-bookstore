@extends('layout.master')

@section('title')
    Log in
@endsection

@section('content')
    <main id="content">
        <div class="container col-lg-6 col-md-8 col-sm-12">
            <form action="{{ route('guest.register') }}" id="signup" method="POST" novalidate>

                <header class="border-bottom px-4 px-md-6 py-4">
                    <h2 class="font-size-3 mb-0 d-flex align-items-center">
                        <i class="fa-regular fa-pen-to-square mr-3 font-size-5"></i>Create Account
                    </h2>
                </header>

                <div class="p-4 p-md-6">

                    @csrf
                    <div class="form-group mb-4">
                        <div class="js-form-message js-focus-state">
                            <label id="signupFullnameLabel" class="form-label" for="signupFullname">Full
                                Name <span class="text-red-1">*</span></label>
                            <input type="text"
                                class="form-control rounded-0 height-4 px-4 @error('fullName') is-invalid @enderror"
                                name="fullName" id="signupFullname" aria-describedby="signupFullnameLabel"
                                value="{{ old('fullName') }}" required>
                            <div class="form-message @error('fullName') invalid-feedback @enderror">
                                @error('fullName')
                                    {{ $message }}
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="js-form-message js-focus-state">
                            <label id="signupEmailLabel" class="form-label" for="signupEmail">Email
                                <span class="text-red-1">*</span></label>
                            <input type="email"
                                class="form-control rounded-0 height-4 px-4 @error('email') is-invalid @enderror"
                                name="email" id="signupEmail" placeholder="vtbookstore@gmail.com"
                                aria-label="vtbookstore@gmail.com" aria-describedby="signupEmailLabel"
                                value="{{ old('email') }}" required>
                            <div class="form-message @error('email') invalid-feedback @enderror">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="js-form-message js-focus-state">
                            <label id="signupPasswordLabel" class="form-label" for="signupPassword">Password <span
                                    class="text-red-1">*</span></label>
                            <input type="password"
                                class="form-control rounded-0 height-4 px-4 @error('password') is-invalid @enderror"
                                name="password" id="signupPassword" placeholder="" aria-label=""
                                aria-describedby="signupPasswordLabel" required>
                            <div class="form-message @error('password') invalid-feedback @enderror">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="js-form-message js-focus-state">
                            <label id="signupConfirmPasswordLabel" class="form-label" for="signupConfirmPassword">Confirm
                                Password <span class="text-red-1">*</span></label>
                            <input type="password"
                                class="form-control rounded-0 height-4 px-4 @error('confirmPassword') is-invalid @enderror"
                                name="confirmPassword" id="signupConfirmPassword" placeholder="" aria-label=""
                                aria-describedby="signupConfirmPasswordLabel" required>
                            <div class="form-message @error('confirmPassword') invalid-feedback @enderror">
                                @error('confirmPassword')
                                    {{ $message }}
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-block py-3 rounded-0 btn-dark">Create
                            Account</button>
                    </div>
                    <div class="text-center mb-4">
                        <span class="small text-muted">Already have an account?</span>
                        <a class="small" href="{{ route('auth.login') }}"
                            data-animation-in="fadeIn">Login
                        </a>
                    </div>
                    <div class="social-login pt-4d75 border-top ">
                        <div class="mt-2">
                            <a href="#" class="btn btn-block btn-gg py-3 rounded-0 pr-3"> <img
                                    src="{{ url('') }}/assets/img/gg-icon-removebg.png" alt=""> Login with
                                Google</a>
                        </div>

                    </div>
                </div>

            </form>
        </div>
    </main>
@endsection

@section('custom_js')
    <script>
        Validator({
            form: '#signup',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#signupFullname', 'Please enter your full name'),

                Validator.isRequired('#signupEmail', 'Please enter your email address'),
                Validator.isEmail('#signupEmail'),

                Validator.isRequired('#signupPassword', 'Please enter your password'),
                Validator.isPassword('#signupPassword'),

                Validator.isRequired('#signupConfirmPassword', 'Please enter your password confirmation'),
                Validator.isConfirmed('#signupConfirmPassword', function() {
                    return document.querySelector('#signup #signupPassword').value;
                }, 'Password confirmation is not match')
            ]
        });
    </script>
@endsection
