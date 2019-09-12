@extends('layouts.front.index')

@section('content')

@include('front.components.breadcrumbs', compact('breadcrumbs'))

@include('front.components.page-heading', ['heading' => __('Reset Password')])

<div class="container">
    <div class="row">
        <div class="col-12">

            @if (session('status'))
                <div class="alert alert-success vpm__mb" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 col-xl-6 col-xxl-5 col-xxxl-4">

                        <div class="form-group mb-4">
                            <label for="forgotEmail">{{ __('E-Mail Address') }}</label>
                            <input
                                id="forgotEmail"
                                type="email"
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

                    </div>
                </div>

                <div class="row vpm__my vpm__pb">
                    <div class="col-12 col-md-12 col-lg-8 col-xl-6 col-xxl-5 col-xxxl-4">

                        <div class="h3">
                            <button type="submit" class="btn btn-primary px-5 rounded-pill"><span class="h4 font-weight-normal m-0">{{ __('Send Password Reset Link') }}</span></button>
                        </div>

                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
