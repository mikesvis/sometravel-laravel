@extends('layouts.front.index')

@section('title', 'Личный кабинет / Персональные данные')
@section('keywords', 'Личный кабинет / Персональные данные')
@section('description', 'Личный кабинет / Персональные данные')

@section('content')

    @include('front.components.breadcrumbs', compact('breadcrumbs'))

    @include('front.components.page-heading', ['heading' => 'Добро пожаловать, '.Auth::user()->name])

    @include('front.profile.menu', compact('menuItems'))

    <div class="border-top py-3 pb-5">
        <div class="container vpm__mt">

            <!-- block heading -->
            <div class="heading row vpm__my">
                <div class="col-12 col-lg">
                    <div class="h2 font-weight-normal m-0 text-center text-lg-left">Персональные данные</div>
                </div>
            </div>
            <!-- block heading -->

            <div class="row">
                <div class="col-12">

                    <form action="{{ route('front.profile.update') }}" method="POST">

                        @csrf
                        @method('patch')

                        <!-- form -->
                        <div class="cabinet-form row">

                            {{-- info panel item  --}}
                            <div class="col-12 col-md-6 col-xxl-4 col-xxxl-3 mb-4">

                                <div class="cabinet-form__panel panelRounded p-4 panelShadow">

                                    <div class="cabinet-form__name mb-4"><strong>ФИО и Дата рождения</strong></div>

                                    <div class="form-group mb-4">
                                        <label for="surname">Фамилия</label>
                                        <input
                                        type="text"
                                        name="surname"
                                        value="{{ old('surname', $user->surname) }}"
                                        id="surname"
                                        {{-- required --}}
                                        autocomplete="surname"
                                        autofocus
                                        class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center @error('surname')is-invalid @enderror">
                                        @error('surname')
                                            <span class="invalid-feedback text-center" role="surname">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="name">Имя</label>
                                        <input
                                        type="text"
                                        name="name"
                                        value="{{ old('name', $user->name) }}"
                                        id="name"
                                        required
                                        autocomplete="name"
                                        class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center @error('name')is-invalid @enderror">
                                        @error('name')
                                            <span class="invalid-feedback text-center" role="name">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="patronymic">Отчество</label>
                                        <input
                                        type="text"
                                        name="patronymic"
                                        value="{{ old('patronymic', $user->patronymic) }}"
                                        id="patronymic"
                                        {{-- required --}}
                                        autocomplete="patronymic"
                                        class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center @error('patronymic')is-invalid @enderror">
                                        @error('patronymic')
                                            <span class="invalid-feedback text-center" role="patronymic">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    @if ($user->isAdmin() == false)

                                        <div class="form-group mb-4">
                                            <label class="control-label" for="input-birthday">Дата рождения</label>
                                            <div class="form-group">
                                                <div class="input-group is-datepicker" id="datepicker_birthday" data-date-format="DD.MM.YYYY" data-target-input="nearest" data-date-defaultDate="false" data-date-use-current="false">
                                                    <input
                                                    type="text"
                                                    name="birthday"
                                                    value="{{ old('birthday', $user->birthday_human) }}"
                                                    id="input-birthday"
                                                    class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center datetimepicker-input"
                                                    data-target="#datepicker_birthday"
                                                    />
                                                    <div class="input-group-append" data-target="#datepicker_birthday" data-toggle="datetimepicker">
                                                        <span class="btn btn-primary btn--rounded px-4"><em class="fas fa-calendar"></em></span>
                                                    </div>
                                                    @error('birthday')
                                                        <span class="invalid-feedback text-center" role="message">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                    @endif

                                </div>

                            </div>
                            {{-- /info panel item  --}}

                            {{-- info panel item  --}}
                            <div class="col-12 col-md-6 col-xxl-4 col-xxxl-3 mb-4">

                                <div class="cabinet-form__panel panelRounded p-4 panelShadow">

                                    <div class="cabinet-form__name mb-4"><strong>Пароль</strong></div>

                                    <div class="form-group mb-4">
                                        <label for="password">Новый пароль</label>
                                        <input
                                        type="password"
                                        name="password"
                                        id="password"
                                        class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center @error('password') is-invalid @enderror"
                                        autocomplete="password-new"
                                        >
                                        @error('password')
                                            <span class="invalid-feedback text-center" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="password-confirm">Повторите новый пароль</label>
                                        <input
                                        type="password"
                                        name="password_confirmation"
                                        id="password-confirm"
                                        class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center"
                                        autocomplete="password-new"
                                        >
                                    </div>

                                </div>

                            </div>
                            {{-- /info panel item  --}}

                            {{-- info panel item  --}}
                            <div class="col-12 col-md-6 col-xxl-4 col-xxxl-3 mb-4">

                                <div class="cabinet-form__panel panelRounded p-4 panelShadow mb-4">

                                    <div class="cabinet-form__name mb-4"><strong>Почта</strong></div>

                                    <div class="form-group mb-4">
                                        <label for="email">Основная почта</label>
                                        <input
                                        type="email"
                                        name="email"
                                        value="{{ old('email', $user->email) }}"
                                        id="email"
                                        required
                                        autocomplete="email"
                                        class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center @error('email')is-invalid @enderror"
                                        >
                                        @error('email')
                                            <span class="invalid-feedback text-center" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- <div class="form-group mb-4">
                                        <label for="">Запасная почта</label>
                                        <input type="email" value="ivan@gmail.com" class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center">
                                    </div> --}}

                                </div>

                                @if ($user->isAdmin() == false)

                                    <div class="cabinet-form__panel panelRounded p-4 panelShadow">

                                        <div class="cabinet-form__name mb-4"><strong>Согласие на рассылку</strong></div>

                                        <p>Я согласен получать информацию по акциям и персональным предложениям.</p>

                                        <div>
                                            <div class="radioButtons__item mr-2 d-inline-block">
                                                <input
                                                type="radio"
                                                name="subscribe"
                                                id="subscribe_yes"
                                                class="d-none"
                                                value="1"
                                                @if (old('subscribe', $user->userable->subscribe) == true) checked @endif
                                                />
                                                <label for="subscribe_yes" class="radioButtons__labelSmall btn btn-outline-primary btn--rounded border border-primary mb-0 py-2 px-4">Да</label>
                                            </div>
                                            <div class="radioButtons__item mr-2 d-inline-block">
                                                <input
                                                type="radio"
                                                name="subscribe"
                                                id="subscribe_no"
                                                class="d-none"
                                                value="0"
                                                @if (old('subscribe', $user->userable->subscribe) == false) checked @endif
                                                />
                                                <label for="subscribe_no" class="radioButtons__labelSmall btn btn-outline-primary btn--rounded border border-primary mb-0 py-2 px-4">Нет</label>
                                            </div>
                                        </div>


                                    </div>

                                @endif

                            </div>
                            {{-- /info panel item  --}}


                        </div>
                        <!-- /form -->

                        <div class="row vpm__my">
                            <div class="col-12 col-xl-8 col-xxl-8 col-xxxl-6">
                                <div class="row">
                                    <div class="col-12 col-sm-6 d-none d-sm-block">
                                        <a href="{{ route('front.profile.index') }}" class="btn btn-outline-primary btn-block rounded-pill"><span class="h4 font-weight-normal m-0">Назад</span></a>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="h3">
                                            <button type="submit" class="btn btn-primary btn-block rounded-pill"><span class="h4 font-weight-normal m-0">Сохранить изменения</span></button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </form>

                </div>
            </div>



        </div>
    </div>

@endsection
