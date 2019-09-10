@extends('front.layouts.inner')

@section('content')

@include('front.components.breadcrumbs')

@include('front.components.page-heading', ['heading' => 'Добро пожаловать, Алексей!'])

@include('front.components.cabinet-menu', ['activeIndex' => 2])

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

                <form action="" class="needs-validation" {{-- class="was-validated" --}}>

                    <!-- form -->
                    <div class="cabinet-form row">

                        {{-- info panel item  --}}
                        <div class="col-12 col-md-6 col-xxl-4 col-xxxl-3 mb-4">

                            <div class="cabinet-form__panel panelRounded p-4 panelShadow">

                                <div class="cabinet-form__name mb-4"><strong>ФИО и Дата рождения</strong></div>

                                <div class="form-group mb-4">
                                    <label for="">Фамилия</label>
                                    <input type="text" value="Иванов" class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center">
                                    {{-- <input type="text" value="Иванов" class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center is-invalid" required>
                                    <div class="invalid-feedback mt-2">Укажите Ваше имя</div> --}}
                                </div>

                                <div class="form-group mb-4">
                                    <label for="">Имя</label>
                                    <input type="text" value="Иван" class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center">
                                </div>

                                <div class="form-group mb-4">
                                    <label for="">Отчество</label>
                                    <input type="text" value="Иванович" class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center">
                                </div>

                                <div class="form-group mb-4">
                                    <label for="">Дата рождения</label>
                                    <div class="input-group mb-3">
                                        <input type="text" value="17.06.1992" class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary btn--rounded px-4" onclick="return false">
                                                <em class="fas fa-calendar"></em>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        {{-- /info panel item  --}}

                        {{-- info panel item  --}}
                        <div class="col-12 col-md-6 col-xxl-4 col-xxxl-3 mb-4">

                            <div class="cabinet-form__panel panelRounded p-4 panelShadow">

                                <div class="cabinet-form__name mb-4"><strong>Пароль</strong></div>

                                <div class="form-group mb-4">
                                    <label for="">Новый пароль</label>
                                    <input type="password" class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center">
                                </div>

                                <div class="form-group mb-4">
                                    <label for="">Повторите новый пароль</label>
                                    <input type="password" type="text" class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center">
                                </div>

                            </div>

                        </div>
                        {{-- /info panel item  --}}

                        {{-- info panel item  --}}
                        <div class="col-12 col-md-6 col-xxl-4 col-xxxl-3 mb-4">

                            <div class="cabinet-form__panel panelRounded p-4 panelShadow mb-4">

                                <div class="cabinet-form__name mb-4"><strong>Почта</strong></div>

                                <div class="form-group mb-4">
                                    <label for="">Основная почта</label>
                                    <input type="email" value="ivan@mail.ru" class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center">
                                </div>

                                <div class="form-group mb-4">
                                    <label for="">Запасная почта</label>
                                    <input type="email" value="ivan@gmail.com" class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center">
                                </div>

                            </div>

                            <div class="cabinet-form__panel panelRounded p-4 panelShadow">

                                <div class="cabinet-form__name mb-4"><strong>Согласие на рассылку</strong></div>

                                <p>Я согласен получать информацию по акциям и персональным предложениям.</p>

                                <div>
                                    <div class="radioButtons__item mr-2 d-inline-block">
                                        <input type="radio" name="rad1" id="r11" class="d-none" value="1" />
                                        <label for="r11" class="radioButtons__labelSmall btn btn-outline-primary btn--rounded border border-primary mb-0 py-2 px-4">Да</label>
                                    </div>
                                    <div class="radioButtons__item mr-2 d-inline-block">
                                        <input type="radio" name="rad1" id="r12" class="d-none" value="2" />
                                        <label for="r12" class="radioButtons__labelSmall btn btn-outline-primary btn--rounded border border-primary mb-0 py-2 px-4">Нет</label>
                                    </div>
                                </div>


                            </div>

                        </div>
                        {{-- /info panel item  --}}


                    </div>
                    <!-- /form -->

                    <div class="row vpm__my">
                        <div class="col-12 col-xl-8 col-xxl-8 col-xxxl-6">
                            <div class="row">
                                <div class="col-12 col-sm-6 d-none d-sm-block">
                                    <a href="" class="btn btn-outline-primary btn-block rounded-pill"><span class="h4 font-weight-normal m-0">Назад</span></a>
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
