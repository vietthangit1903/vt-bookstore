@extends('layout.master')

@section('title')
    Log in
@endsection

@section('content')
    <main id="content">
        <div class="container col-lg-6 col-md-8 col-sm-12">
            <form action="{{ route('auth.login') }}" id="login" method="POST" novalidate>

                <header class="border-bottom px-4 px-md-6 py-4">
                    <h2 class="font-size-3 mb-0 d-flex align-items-center"><i
                            class="fa-regular fa-user mr-3 font-size-5"></i>Log in</h2>
                </header>

                <div class="p-4 p-md-6">
                    @csrf
                    <div class="form-group mb-4">
                        <div class="js-form-message js-focus-state">
                            <label id="signinEmailLabel" class="form-label" for="signinEmail">Email
                                address <span class="text-red-1">*</span></label>
                            <input type="email"
                                class="form-control rounded-0 height-4 px-4 @error('email') is-invalid @enderror"
                                name="email" id="signinEmail" placeholder="vtbookstore@gmail.com"
                                aria-label="vtbookstore@gmail.com" aria-describedby="signinEmailLabel"
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
                            <label id="signinPasswordLabel" class="form-label"
                                for="signinPassword">Password <span class="text-red-1">*</span></label>
                            <input type="password"
                                class="form-control rounded-0 height-4 px-4 @error('password') is-invalid @enderror"
                                name="password" id="signinPassword" placeholder="" aria-label=""
                                aria-describedby="signinPasswordLabel"
                                required>
                            <div class="form-message @error('password') invalid-feedback @enderror">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="d-flex justify-content-between mb-5 align-items-center">
                        <div class="form-check custom-checkbox">
                            <input class="form-check-input custom-control-input" type="checkbox" value="{{ old('rememberMe') }}"
                                id="flexCheckDefault" name="rememberMe">
                            <label class="form-check-label font-size-2 text-secondary-gray-700 custom-control-label"
                                for="flexCheckDefault">
                                Remember me
                            </label>
                        </div>

                        <a class="text-dark font-size-2 t-d-u link-muted font-weight-medium" href="#">Forgot
                            Password?</a>
                    </div>
                    <div class="mb-4d75">
                        <button type="submit" class="btn btn-block py-3 rounded-0 btn-dark">Sign In</button>
                    </div>
                    <div class="mb-4d75">
                        <a href="{{ route('guest.register') }}" class="btn btn-block py-3 rounded-0 btn-outline-dark font-weight-medium">Or
                            Create Account</a>
                    </div>
                    <div class="social-login pt-4d75 border-top ">
                        <div class="mt-2">
                            <a href="{{ route('auth.google') }}" class="btn btn-block btn-gg py-3 rounded-0 pr-3"> <img
                                    src="{{ url('') }}/assets/img/gg-icon-removebg.png" alt=""> Login with Google</a>
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
            form: '#login',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#signinEmail', 'Please enter your email address'),
                Validator.isEmail('#signinEmail'),

                Validator.isRequired('#signinPassword', 'Please enter your password'),
            ]
        });
    </script>
@endsection
