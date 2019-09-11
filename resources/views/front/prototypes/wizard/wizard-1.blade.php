@extends('layouts.front.index')

@section('content')

@include('front.components.breadcrumbs')

@include('front.components.page-heading', ['heading' => 'Оформление визы: Франция'])

<div class="container">
    <div class="row">
        <div class="col-12">

            <div class="wizard">

                <div class="wizard__steps h4 font-weight-normal">Шаг 1 из 3</div>

                <!-- wizard form -->
                <form action="">

                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 col-xl-6 col-xxl-5 col-xxxl-4">

                            <div class="wizard__section vpm__my">

                                <div class="section-heading wizard__section-heading-wrapper d-flex align-items-center vpm__mb">
                                    <div class="section-heading__name h4 m-0">Введите Ваши данные</div>
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
                                        <input type="text" placeholder="+7 (000) 000-00-00" class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center">
                                    </div>
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                        <span class="submitButton submitButton--responsive btn btn-primary btn-block btn--rounded d-flex justify-content-around align-items-center"  data-toggle="modal" data-target="#exampleModal">
                                            <span class="h5 font-weight-normal p-0 m-0">Получить код</span>
                                        </span>
                                    </div>
                                </div>

                                <!-- sms modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <div class="h4 text-center font-weight-normal mt-4 mb-4">+7 (000) 000-00-00</div>
                                                <p class="fs18 font-weight-light text-center mb-4">
                                                    Мы выслали СМС код на ваш номер телефона. Пожалуйста введите его в поле ниже
                                                </p>
                                                <div class="form-group text-center mb-4">
                                                    <input type="text" name="smsCode" value="" placeholder="Введите код" class="form-control border-bottom w-50 mx-auto text-center px-3 fs18 font-weight-light">
                                                </div>
                                                <p class="text-muted text-center"><small>Отправить код повторно можно будет через: 30 сек.</small></p>
                                                <p class="text-muted text-center"><small class="text-primary cursor-pointer"><u>Отправить код повторно</u></small></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary rounded-pill py-2 px-4" data-dismiss="modal">Закрыть</button>
                                                <button type="button" class="btn btn-primary py-2 px-4 rounded-pill ml-auto">Подтвердить</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /sms modal -->

                                <div class="form-group mb-4">
                                    <label for="">Ваш e-mail</label>
                                    <input type="email" value="" class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center">
                                </div>

                                <div class="row mb-4">
                                    <div class="col-12 col-sm-6">
                                        <label for="">Имя</label>
                                        <input type="text" value="" class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center">
                                    </div>
                                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                        <label for="">Фамилия</label>
                                        <input type="text" value="" class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center">
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="">Отчество</label>
                                    <input type="text" value="" class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center">
                                </div>

                                <div class="form-group mb-4 pt-2">
                                    <div class="custom-control custom-control--big-checks custom-checkbox custom-checkbox--big-checks">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label custom-control-label--big-checks" for="customCheck1">Хочу получать персональные предложения и скидки по электронной почте</label>
                                    </div>
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
