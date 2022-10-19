<aside id="sidebarContent" class="u-sidebar u-sidebar__lg" aria-labelledby="sidebarNavToggler">
    <div class="u-sidebar__scroller">
        <div class="u-sidebar__container">
            <div class="u-header-sidebar__footer-offset">

                <div class="d-flex align-items-center position-absolute top-0 right-0 z-index-2 mt-5 mr-md-6 mr-4">
                    <button type="button" class="close ml-auto" aria-controls="sidebarContent" aria-haspopup="true"
                        aria-expanded="false" data-unfold-event="click" data-unfold-hide-on-scroll="false"
                        data-unfold-target="#sidebarContent" data-unfold-type="css-animation"
                        data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight"
                        data-unfold-duration="500">
                        <span aria-hidden="true">Close <i class="fas fa-times ml-2"></i></span>
                    </button>
                </div>


                <div class="js-scrollbar u-sidebar__body">
                    <div class="u-sidebar__content u-header-sidebar__content">
                        <div>
                            <form action="#" id="login" data-target-group="idForm" novalidate>

                                <header class="border-bottom px-4 px-md-6 py-4">
                                    <h2 class="font-size-3 mb-0 d-flex align-items-center"><i
                                            class="fa-regular fa-user mr-3 font-size-5"></i>Account</h2>
                                </header>

                                <div class="p-4 p-md-6">

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
                                                aria-describedby="signinPasswordLabel" value="{{ old('password') }}"
                                                required>
                                            <div class="form-message @error('password') invalid-feedback @enderror">
                                                @error('password')
                                                    {{ $message }}
                                                @enderror
                                            </div>

                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mb-5 align-items-center">

                                        <div class="js-form-message">
                                            <div
                                                class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="rememberCheckbox" name="rememberMe">
                                                <label class="custom-control-label" for="rememberCheckbox">
                                                    <span class="font-size-2 text-secondary-gray-700">
                                                        Remember me
                                                    </span>
                                                </label>
                                            </div>
                                        </div>

                                        <a class="js-animation-link text-dark font-size-2 t-d-u link-muted font-weight-medium"
                                            href="javascript:;" data-target="#forgotPassword" data-link-group="idForm"
                                            data-animation-in="fadeIn">Forgot Password?</a>
                                    </div>
                                    <div class="mb-4d75">
                                        <button type="submit" class="btn btn-block py-3 rounded-0 btn-dark">Sign
                                            In</button>
                                    </div>
                                    <div class="mb-2">
                                        <a href="javascript:;"
                                            class="js-animation-link btn btn-block py-3 rounded-0 btn-outline-dark font-weight-medium"
                                            data-target="#signup" data-link-group="idForm"
                                            data-animation-in="fadeIn">Create Account</a>
                                    </div>
                                </div>
                            </form>

                            <form action="{{ route('guest.register') }}" id="signup"
                                style="display: none; opacity: 0;" data-target-group="idForm" novalidate method="POST">

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
                                                name="fullName" id="signupFullname"
                                                aria-describedby="signupFullnameLabel" value="{{ old('fullName') }}"
                                                required>
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
                                            <label id="signupPasswordLabel" class="form-label"
                                                for="signupPassword">Password <span
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
                                            <label id="signupConfirmPasswordLabel" class="form-label"
                                                for="signupConfirmPassword">Confirm
                                                Password <span class="text-red-1">*</span></label>
                                            <input type="password"
                                                class="form-control rounded-0 height-4 px-4 @error('confirmPassword') is-invalid @enderror"
                                                name="confirmPassword" id="signupConfirmPassword" placeholder=""
                                                aria-label="" aria-describedby="signupConfirmPasswordLabel" required>
                                            <div
                                                class="form-message @error('confirmPassword') invalid-feedback @enderror">
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
                                        <a class="js-animation-link small" href="javascript:;" data-target="#login"
                                            data-link-group="idForm" data-animation-in="fadeIn">Login
                                        </a>
                                    </div>
                                </div>
                            </form>

                            <form action="#" id="forgotPassword" style="display: none; opacity: 0;"
                                data-target-group="idForm" novalidate>

                                <header class="border-bottom px-4 px-md-6 py-4">
                                    <h2 class="font-size-3 mb-0 d-flex align-items-center">
                                        <i class="fa-regular fa-circle-question mr-3 font-size-5"></i>Forgot Password?
                                    </h2>
                                </header>

                                <div class="p-4 p-md-6">

                                    <div class="form-group mb-4">
                                        <div class="js-form-message js-focus-state">
                                            <label id="forgotPasswordEmailLabel" class="form-label"
                                                for="forgotPasswordEmail">Email
                                                <span class="text-red-1">*</span></label>
                                            <input type="email" class="form-control rounded-0 height-4 px-4"
                                                name="email" id="forgotPasswordEmail"
                                                placeholder="vtbookstore@gmail.com" aria-label="vtbookstore@gmail.com"
                                                aria-describedby="forgotPasswordEmailLabel" required>
                                            <div class="form-message"></div>

                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-block py-3 rounded-0 btn-dark">Recover
                                            Password</button>
                                    </div>
                                    <div class="text-center mb-4">
                                        <span class="small text-muted">Remember your password?</span>
                                        <a class="js-animation-link small" href="javascript:;" data-target="#login"
                                            data-link-group="idForm" data-animation-in="fadeIn">Login
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="social-login p-md-6 border-top">
                            <div class="mt-3">
                                <a href="#" class="btn btn-block btn-fb py-3 rounded-0 pr-3"> <img
                                        src="{{ url('') }}/assets/img/fb-icon-removebg.png" alt=""> Login with
                                    Facebook</a>
                            </div>
                            <div class="mt-3">
                                <a href="#" class="btn btn-block btn-gg py-3 rounded-0 pr-3"> <img
                                        src="{{ url('') }}/assets/img/gg-icon-removebg.png" alt=""> Login with Google</a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</aside>
