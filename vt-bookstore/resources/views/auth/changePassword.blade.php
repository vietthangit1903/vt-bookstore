@extends('layout.master')

@section('title')
    Change password
@endsection

@section('content')
    <main id="content">
        <div class="container col-lg-6 col-md-8 col-sm-12">
            <form action="{{ route('change-password') }}" id="changePasswordForm" method="POST" novalidate>

                <header class="border-bottom px-4 px-md-6 py-4">
                    <h2 class="font-size-3 mb-0 d-flex align-items-center"><i
                            class="fa-regular fa-user mr-3 font-size-5"></i>Change password</h2>
                </header>

                <div class="p-4 p-md-6">
                    @csrf
                    <div class="form-group mb-4">
                        <div class="js-form-message js-focus-state">
                            <label id="currentPasswordLabel" class="form-label" for="currentPassword">Current Password
                                <span class="text-red-1">*</span></label>
                            <input type="password"
                                class="form-control rounded-0 height-4 px-4 @error('currentPassword') is-invalid @enderror"
                                name="currentPassword" id="currentPassword" placeholder="" aria-label=""
                                aria-describedby="currentPasswordLabel" required>
                            <div class="form-message @error('currentPassword') invalid-feedback @enderror">
                                @error('currentPassword')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="form-group mb-4">
                        <div class="js-form-message js-focus-state">
                            <label id="newPasswordLabel" class="form-label" for="newPassword">New Password <span
                                    class="text-red-1">*</span></label>
                            <input type="password"
                                class="form-control rounded-0 height-4 px-4 @error('newPassword') is-invalid @enderror"
                                name="newPassword" id="newPassword" placeholder="" aria-label=""
                                aria-describedby="newPasswordLabel" required>
                            <div class="form-message @error('newPassword') invalid-feedback @enderror">
                                @error('newPassword')
                                    {{ $message }}
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="form-group mb-5">
                        <div class="js-form-message js-focus-state">
                            <label id="confirmNewPasswordLabel" class="form-label" for="confirmNewPassword">Confirm
                                New Password <span class="text-red-1">*</span></label>
                            <input type="password"
                                class="form-control rounded-0 height-4 px-4 @error('confirmNewPassword') is-invalid @enderror"
                                name="confirmNewPassword" id="confirmNewPassword" placeholder="" aria-label=""
                                aria-describedby="confirmNewPasswordLabel" required>
                            <div class="form-message @error('confirmNewPassword') invalid-feedback @enderror">
                                @error('confirmNewPassword')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-4d75">
                        <button type="submit" class="btn btn-block py-3 rounded-0 btn-dark">Save changes</button>
                    </div>

                </div>

            </form>
        </div>
    </main>
@endsection

@section('custom_js')
    <script>
        Validator({
            form: '#changePasswordForm',
            errorSelector: '.form-message',
            rules: [

                Validator.isRequired('#currentPassword', 'Please enter your current password'),
                Validator.isPassword('#currentPassword'),

                Validator.isRequired('#newPassword', 'Please enter your new password'),
                Validator.isPassword('#newPassword'),

                Validator.isRequired('#confirmNewPassword', 'Please enter your new password confirmation'),
                Validator.isConfirmed('#confirmNewPassword', function() {
                    return document.querySelector('#changePasswordForm #newPassword').value;
                }, 'Password confirmation is not match')
            ]
        });
    </script>
@endsection
