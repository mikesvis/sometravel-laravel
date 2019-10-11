@extends('layouts.front.index')

@section('content')

@include('front.components.breadcrumbs', compact('breadcrumbs'))

@include('front.components.page-heading', ['heading' => 'Вход'])

@section('title',  __('Login'))
@section('keywords',  __('Login'))
@section('description',  __('Login'))

<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('login') }}">

                @csrf

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 col-xl-6 col-xxl-5 col-xxxl-4">

                        <div class="form-group mb-4">
                            <label for="loginEmail">{{ __('Email or Phone') }}</label>
                            <input
                                id="loginEmail"
                                type="text"
                                class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center @error('email')is-invalid @enderror"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email"
                                autofocus
                            >
                            @error('email')
                                <span class="invalid-feedback text-center" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="loginPassword">{{ __('Password') }}</label>
                            <input
                                id="loginPassword"
                                type="password"
                                class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center @error('password') is-invalid @enderror"
                                name="password"
                                required
                                autocomplete="current-password"
                            >
                            @error('password')
                                <span class="invalid-feedback text-center" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-4 pt-2">
                            <div class="custom-control custom-control--big-checks custom-checkbox custom-checkbox--big-checks">
                                <input
                                    id="loginRemember"
                                    type="checkbox"
                                    class="custom-control-input"
                                    name="remember"
                                    {{ old('remember') ? 'checked' : '' }}
                                >
                                <label class="custom-control-label custom-control-label--big-checks" for="loginRemember">{{ __('Remember Me') }}</label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row vpm__my vpm__pb">
                    <div class="col-12 col-xl-8 col-xxl-8 col-xxxl-6">
                        <div class="row">

                            <div class="col-12 col-sm-6">
                                <div class="h3">
                                    <button type="submit" class="btn btn-primary btn-block rounded-pill"><span class="h4 font-weight-normal m-0">{{ __('Login') }}</span></button>
                                </div>
                            </div>

                            <div class="col-12 mt-2">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
