@extends('front.layouts.inner')

@section('content')

@include('front.components.breadcrumbs')

@include('front.components.page-heading', ['heading' => 'Оформление визы: Франция'])

<div class="container">
    <div class="row">
        <div class="col-12">

            <div class="wizard">

                <div class="wizard__steps h4 font-weight-normal">Шаг 1 из 3</div>

                <!-- wizard form -->
                <form action="" class="was-validated">

                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 col-xl-6 col-xxl-5 col-xxxl-4">

                            <div class="wizard__section vpm__my">

                                <div class="section-heading wizard__section-heading-wrapper d-flex align-items-center vpm__mb">
                                    <div class="section-heading__name h4 m-0">Проверьте Ваши данные</div>
                                    <div class="ml-4">
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
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-12"><label for="">Номер телефона</label></div>
                                    <div class="col-12 col-sm-6">
                                        <input type="text" placeholder="+7 (000) 000-00-00" class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center is-valid" disabled>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="">Ваш e-mail</label>
                                    <input type="email" value="ivan@ivanov.com" class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center is-valid" disabled>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-12 col-sm-6">
                                        <label for="">Имя</label>
                                        <input type="text" value="Иванов" class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center is-valid" disabled>
                                    </div>
                                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                        <label for="">Фамилия</label>
                                        <input type="text" value="Иван" class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center is-valid" disabled>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="">Отчество</label>
                                    <input type="text" value="Иванович" class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center is-valid" disabled>
                                </div>

                            </div>


                        </div>
                    </div>

                    <div class="row vpm__my vpm__pb">
                        <div class="col-12 col-xl-8 col-xxl-8 col-xxxl-6">
                            <div class="row">
                                <div class="col-12 col-sm-6 order-1 order-sm-0 mt-4 mt-sm-0">
                                    <a href="" class="btn btn-outline-primary btn-block rounded-pill"><span class="h4 font-weight-normal m-0">Назад</span></a>
                                </div>
                                <div class="col-12 col-sm-6 order-0 order-sm-1">
                                    <div class="h3">
                                        <button type="submit" class="btn btn-primary btn-block rounded-pill"><span class="h4 font-weight-normal m-0">Продолжить</span></button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </form>
                <!-- /wizard form -->

            </div>


        </div>
    </div>
</div>

@endsection
