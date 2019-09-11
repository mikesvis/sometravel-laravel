@extends('layouts.front.index')

@section('content')

@include('front.components.breadcrumbs')

@include('front.components.page-heading', ['heading' => 'Оформление визы: Франция'])

<div class="container">
    <div class="row">
        <div class="col-12">

            <div class="wizard">

                <div class="wizard__steps h4 font-weight-normal">Шаг 2 из 3 <span class="ml-3">Заказ №2394</span></div>

                <!-- wizard form -->
                <form action="">

                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 col-xl-6 col-xxl-5 col-xxxl-4">

                            <div class="wizard__section vpm__my">

                                <div class="section-heading wizard__section-heading-wrapper d-flex align-items-center vpm__mb">
                                    <div class="section-heading__name h4 m-0">Введите даты поездки</div>
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

                                <div class="row vpm__mb">
                                    <div class="col-12 col-sm-6">
                                        <label for="">Начало поездки</label>
                                        <div class="input-group mt-1">
                                            <input type="text" value="" class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary btn--rounded px-4" onclick="return false">
                                                    <em class="fas fa-calendar"></em>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                        <label for="">Окончание поездки</label>
                                        <div class="input-group mt-1">
                                            <input type="text" value="" class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary btn--rounded px-4" onclick="return false">
                                                    <em class="fas fa-calendar"></em>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row vpm__mb">
                                    <div class="col-12">
                                        <label for="">У вас уже есть билеты?</label>
                                        <div class="radioButtons row  mt-1">
                                            <div class="col-6 col-sm-3">
                                                <div class="radioButtons__item">
                                                    <input type="radio" name="rad1" id="r11" class="d-none" value="1" />
                                                    <label for="r11" class="radioButtons__label btn btn-outline-primary btn-block btn--rounded px-0 border-primary mb-0">да</label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-3">
                                                <div class="radioButtons__item">
                                                    <input type="radio" name="rad1" id="r12" class="d-none" value="2" />
                                                    <label for="r12" class="radioButtons__label btn btn-outline-primary btn-block btn--rounded px-0 border-primary mb-0">нет</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-12">
                                        <label for="">Есть ли бронь гостиницы?</label>
                                        <div class="radioButtons row mt-1">
                                            <div class="col-6 col-sm-3">
                                                <div class="radioButtons__item">
                                                    <input type="radio" name="rad2" id="r21" class="d-none" value="1" />
                                                    <label for="r21" class="radioButtons__label btn btn-outline-primary btn-block btn--rounded px-0 border-primary mb-0">да</label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-3">
                                                <div class="radioButtons__item">
                                                    <input type="radio" name="rad2" id="r22" class="d-none" value="2" />
                                                    <label for="r22" class="radioButtons__label btn btn-outline-primary btn-block btn--rounded px-0 border-primary mb-0">нет</label>
                                                </div>
                                            </div>
                                        </div>
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
