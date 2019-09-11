@extends('layouts.front.index')

@section('content')

@include('front.components.breadcrumbs', compact('breadcrumbs'))

@include('front.components.page-heading', ['heading' => 'Вход'])

<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('login') }}">

                @csrf

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 col-xl-6 col-xxl-5 col-xxxl-4">

                            <div class="form-group mb-4">
                                <label for="loginEmailOrPhone">{{ __('Email or Phone') }}</label>
                                <input
                                    id="loginEmailOrPhone"
                                    type="text"
                                    class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center @error('emailOrPhone')is-invalid @enderror"
                                    name="emailOrPhone"
                                    value="{{ old('emailOrPhone') }}"
                                    {{-- required --}}
                                    autocomplete="email"
                                    autofocus
                                >
                                @error('emailOrPhone')
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
                                    {{-- required --}}
                                    autocomplete="current-password"
                                >
                                @error('password')
                                    <span class="invalid-feedback text-center" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                    </div>
                </div>

                <div class="row vpm__my vpm__pb">
                    <div class="col-12 col-xl-8 col-xxl-8 col-xxxl-6">
                        <div class="row">

                            <div class="col-12 col-sm-6 order-0 order-sm-1">
                                <div class="h3">
                                    <button type="submit" class="btn btn-primary btn-block rounded-pill"><span class="h4 font-weight-normal m-0">{{ __('Login') }}</span></button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
