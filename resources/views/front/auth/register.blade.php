@extends('layouts.front.index')

@section('title',  __('Register'))
@section('keywords',  __('Register'))
@section('description',  __('Register'))

@section('content')

@include('front.components.breadcrumbs', compact('breadcrumbs'))

@include('front.components.page-heading', ['heading' => __('Register') ])

<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('register') }}" id="registerForm">

                @csrf

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 col-xl-6 col-xxl-5 col-xxxl-4">

                        <div class="wizard__section vpm__my">

                            <div class="section-heading wizard__section-heading-wrapper d-flex align-items-center vpm__mb">
                                <div class="section-heading__name h4 m-0">Укажите Ваши данные</div>
                                {{-- <div class="ml-4">
                                    <span
                                    class="section-heading__hint-toggle btn btn-outline-secondary p-0 rounded-circle"
                                    role="button"
                                    tabindex="0"
                                    data-trigger="hover"
                                    data-container="body"
                                    data-toggle="popover"
                                    data-placement="top"
                                    data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."
                                    >?</span>
                                </div> --}}
                            </div>

                            <div class="row mb-4">
                                <div class="col-12"><label for="phone">Номер телефона</label></div>
                                <div class="col-12 col-sm-6">
                                    <input
                                    type="text"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    id="phone"
                                    {{-- placeholder="+7 (000) 000-00-00" --}}
                                    required
                                    autocomplete="phone"
                                    autofocus
                                    class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center @error('phone')is-invalid @enderror"
                                    >
                                    @error('phone')
                                    <span class="invalid-feedback text-center" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <span class="submitButton submitButton--responsive btn btn-primary btn-block btn--rounded d-flex justify-content-around align-items-center" id="verify">
                                        <span class="h5 font-weight-normal p-0 m-0">Получить код</span>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="email">Ваш e-mail</label>
                                <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                id="email"
                                required
                                autocomplete="email"
                                class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center @error('email')is-invalid @enderror"
                                >
                                @error('email')
                                    <span class="invalid-feedback text-center" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-4">

                                <div class="col-12 col-sm-6">
                                    <label for="surname">Фамилия</label>
                                    <input
                                    type="text"
                                    name="surname"
                                    value="{{ old('surname') }}"
                                    id="surname"
                                    required
                                    autocomplete="surname"
                                    class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center @error('surname')is-invalid @enderror"
                                    >
                                    @error('surname')
                                        <span class="invalid-feedback text-center" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                    <label for="name">Имя</label>
                                    <input
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    id="name"
                                    required
                                    autocomplete="name"
                                    class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center @error('name')is-invalid @enderror"
                                    >
                                    @error('name')
                                        <span class="invalid-feedback text-center" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group mb-4">
                                <label for="patronymic">Отчество</label>
                                <input
                                type="text"
                                name="patronymic"
                                value="{{ old('patronymic') }}"
                                id="patronymic"
                                required
                                autocomplete="patronymic"
                                class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center @error('patronymic')is-invalid @enderror"
                                >
                                @error('patronymic')
                                    <span class="invalid-feedback text-center" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-4">
                                <div class="col-12 col-sm-6">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    required
                                    autocomplete="new-password"
                                    class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center @error('password')is-invalid @enderror"
                                    >
                                    @error('password')
                                        <span class="invalid-feedback text-center" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <input
                                    type="password"
                                    name="password_confirmation"
                                    id="password-confirm"
                                    required
                                    autocomplete="new-password"
                                    class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center"
                                    >
                                </div>
                            </div>

                            <div class="form-group mb-4 pt-2">
                                <div class="custom-control custom-control--big-checks custom-checkbox custom-checkbox--big-checks">
                                    <input type="hidden" name="subscribe" value="0">
                                    <input
                                    type="checkbox"
                                    name="subscribe"
                                    value="1"
                                    {{ old('remember', true) ? 'checked' : '' }}
                                    id="subscribe"
                                    class="custom-control-input"
                                    >
                                    <label class="custom-control-label custom-control-label--big-checks" for="subscribe">Хочу получать персональные предложения и скидки по электронной почте</label>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="row vpm__my vpm__pb">
                    <div class="col-12 col-xl-8 col-xxl-8 col-xxxl-6">

                        <div class="row">

                            <div class="col-12 col-sm-6">
                                <div class="h3">
                                    <button type="submit" class="btn btn-primary btn-block rounded-pill" id="register"><span class="h4 font-weight-normal m-0">{{ __('Register') }}</span></button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- sms modal -->
<div class="modal fade" id="verificationModal" tabindex="-1" role="dialog" aria-labelledby="Подтверждение номера телефона" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="{{ route('verify.code') }}" method="get" id="checkCodeForm">
        @csrf
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="h4 text-center font-weight-normal mt-4 mb-4" id="beautifulPhone">+7 (000) 000-00-00</div>
                <p class="fs18 font-weight-light text-center mb-4" id="codeTextLegend"></p>
                <div class="form-group text-center mb-4">
                    <input type="hidden" name="phone" id="verificationPhone" value="" />
                    <input
                    type="text"
                    name="smsCode"
                    id="smsCode"
                    value=""
                    placeholder="Введите код"
                    class="form-control border-bottom w-50 mx-auto text-center px-3 fs18 font-weight-light"
                    required
                    >
                </div>
                <p class="text-muted text-center" id="countdownText"><small>Отправить код повторно можно будет через: <span id="countdownTimer">30</span> сек.</small></p>
                <p class="text-muted text-center d-none user-select-none" id="resendText"><small class="text-primary cursor-pointer user-select-none" id="resendCode"><u>Отправить код повторно</u></small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary rounded-pill py-2 px-4" data-dismiss="modal">Закрыть</button>
                <button type="submit" class="btn btn-primary py-2 px-4 rounded-pill ml-auto">Подтвердить</button>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- /sms modal -->

@endsection
