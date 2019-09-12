@extends('layouts.front.index')

@section('content')

@include('front.components.breadcrumbs', compact('breadcrumbs'))

@include('front.components.page-heading', ['heading' => __('Reset Password')])


<div class="container">
    <div class="row">
        <div class="col-12">

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 col-xl-6 col-xxl-5 col-xxxl-4">

                        <div class="form-group mb-4">
                            <label for="resetEmail">{{ __('E-Mail Address') }}</label>
                            <input
                                id="resetEmail"
                                type="email"
                                class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center @error('email')is-invalid @enderror"
                                name="email"
                                value="{{ $email ?? old('email') }}"
                                required
                                autocomplete="email"
                                autofocus
                            >
                            @error('email')
                                <span class="invalid-feedback text-center" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="resetPassword">{{ __('Password') }}</label>
                            <input
                                id="resetPassword"
                                type="password"
                                class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center @error('password') is-invalid @enderror"
                                name="password"
                                required
                                autocomplete="new-password"
                            >
                            @error('password')
                                <span class="invalid-feedback text-center" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="resetPasswordConfirm">{{ __('Confirm Password') }}</label>
                            <input
                                id="resetPasswordConfirm"
                                type="password"
                                class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                            >
                        </div>

                    </div>
                </div>

                <div class="row vpm__my vpm__pb">
                    <div class="col-12 col-xl-8 col-xxl-8 col-xxxl-6">
                        <div class="row">

                            <div class="col-12 col-sm-6">
                                <div class="h3">
                                    <button type="submit" class="btn btn-primary btn-block rounded-pill"><span class="h4 font-weight-normal m-0">{{ __('Reset Password') }}</span></button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection
