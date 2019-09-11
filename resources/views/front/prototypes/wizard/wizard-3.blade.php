@extends('layouts.front.index')

@section('content')

@include('front.components.breadcrumbs')

@include('front.components.page-heading', ['heading' => 'Оформление визы: Франция'])

<div class="container">
    <div class="row">
        <div class="col-12">

            <div class="wizard">

                <div class="wizard__steps h4 font-weight-normal">Шаг 3 из 3 <span class="ml-3">Заказ №2394</span></div>

                <!-- wizard form -->
                <form action="">

                    <div class="row">
                        <div class="col-12">

                            <div class="wizard__section vpm__my">

                                <div class="section-heading wizard__section-heading-wrapper d-flex align-items-center justify-content-between justify-content-sm-start mb-3 mb-lg-4">
                                    <div class="section-heading__name h4 m-0">Выберите количество получателей</div>
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

                                <div class="row align-items-center mb-5">
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xxxl-2">
                                        <label for="" class="h2 visaCalcForm__label font-weight-normal mb-0">Количество</label>
                                    </div>
                                    <div class="col-7 col-sm-6 col-md-4 col-lg-3 col-xxxl-2 mt-2 mt-sm-0">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-primary btn--rounded px-3 px-xl-4" onclick="return false"><em class="fas fa-minus"></em></button>
                                            </div>
                                            <input type="text" class="textInput--quantity form-control border-primary text-center" value="0" placeholder="Кол-во">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary btn--rounded px-3 px-xl-4" onclick="return false"><em class="fas fa-plus"></em></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="section-heading wizard__section-heading-wrapper d-flex align-items-center justify-content-between justify-content-sm-start pt-lg-3 mb-3 mb-lg-4">
                                    <div class="section-heading__name h4 m-0">Выберите тип визы</div>
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

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <div class="radioButtons row mt-1">
                                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xxxl-2">
                                                <div class="radioButtons__item">
                                                    <input type="radio" name="rad1" id="r11" class="d-none" value="1" />
                                                    <label for="r11" class="radioButtons__label btn btn-outline-primary btn-block btn--rounded px-0 border-primary mb-0">Туристическая</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xxxl-2 mt-2 mt-sm-0">
                                                <div class="radioButtons__item">
                                                    <input type="radio" name="rad1" id="r12" class="d-none" value="2" />
                                                    <label for="r12" class="radioButtons__label btn btn-outline-primary btn-block btn--rounded px-0 border-primary mb-0">Бизнес</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="section-heading wizard__section-heading-wrapper d-flex align-items-center justify-content-between justify-content-sm-start pt-lg-3 mb-3 mb-lg-4">
                                    <div class="section-heading__name h4 m-0">На какое количество посещений</div>
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

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <div class="radioButtons row mt-1">
                                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xxxl-2">
                                                <div class="radioButtons__item">
                                                    <input type="radio" name="rad2" id="r21" class="d-none" value="1" />
                                                    <label for="r21" class="radioButtons__label btn btn-outline-primary btn-block btn--rounded px-0 border-primary mb-0">Однократное</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xxxl-2 mt-2 mt-sm-0">
                                                <div class="radioButtons__item">
                                                    <input type="radio" name="rad2" id="r22" class="d-none" value="2" />
                                                    <label for="r22" class="radioButtons__label btn btn-outline-primary btn-block btn--rounded px-0 border-primary mb-0">Многократное</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="section-heading wizard__section-heading-wrapper d-flex align-items-center justify-content-between justify-content-sm-start pt-lg-3 mb-3 mb-lg-4">
                                    <div class="section-heading__name h4 m-0">Пожелания по сроку визы</div>
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

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <div class="radioButtons row mt-1">
                                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xxxl-2">
                                                <div class="radioButtons__item">
                                                    <input type="radio" name="rad3" id="r31" class="d-none" value="1" />
                                                    <label for="r31" class="radioButtons__label btn btn-outline-primary btn-block btn--rounded px-0 border-primary mb-0">Месяц</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xxxl-2 mt-2 mt-sm-0">
                                                <div class="radioButtons__item">
                                                    <input type="radio" name="rad3" id="r32" class="d-none" value="2" />
                                                    <label for="r32" class="radioButtons__label btn btn-outline-primary btn-block btn--rounded px-0 border-primary mb-0">Пол года</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="section-heading wizard__section-heading-wrapper d-flex align-items-center justify-content-between justify-content-sm-start pt-lg-3 mb-3 mb-lg-4">
                                    <div class="section-heading__name h4 m-0">Выберите срок изготовления визы</div>
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

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <div class="radioButtons row mt-1">
                                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xxxl-2">
                                                <div class="radioButtons__item">
                                                    <input type="radio" name="rad4" id="r41" class="d-none" value="1" />
                                                    <label for="r41" class="radioButtons__label btn btn-outline-primary btn-block btn--rounded px-0 border-primary mb-0">Экспресс 7 дней</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xxxl-2 mt-2 mt-sm-0">
                                                <div class="radioButtons__item">
                                                    <input type="radio" name="rad4" id="r42" class="d-none" value="2" />
                                                    <label for="r42" class="radioButtons__label btn btn-outline-primary btn-block btn--rounded px-0 border-primary mb-0">Стандарт 14 дней</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="section-heading wizard__section-heading-wrapper d-flex align-items-center justify-content-between justify-content-sm-start pt-lg-3 mb-3 mb-lg-4">
                                    <div class="section-heading__name h4 m-0">Дополнительные сервисы</div>
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

                                <div class="row align-items-center mb-4">
                                    <div class="col-12 col-sm-8 col-md-6 col-lg-6 col-xl-5 col-xxl-4">
                                        <label for="" class="h2 visaCalcForm__label font-weight-normal m-0">Страховка</label>
                                    </div>
                                    <div class="col-7 col-sm-4 col-md-4 col-lg-3 col-xxl-2 col-xxxl-2 mt-2 mt-sm-0">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-primary btn--rounded px-3 px-xl-4" onclick="return false"><em class="fas fa-minus"></em></button>
                                            </div>
                                            <input type="text" class="textInput--quantity form-control border-primary text-center" value="0" placeholder="Кол-во">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary btn--rounded px-3 px-xl-4" onclick="return false"><em class="fas fa-plus"></em></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row align-items-center mb-4">
                                    <div class="col-9 col-sm-8 col-md-6 col-lg-6 col-xl-5 col-xxl-4">
                                        <label for="customCheck1" class="h3 visaCalcForm__label font-weight-normal m-0 mt-2">Забор документов курьером</label>
                                    </div>
                                    <div class="col-3 col-sm-4 col-md-4 col-lg-3 col-xxl-3 col-xxxl-2 mt-2 mt-sm-0">
                                        <div class="custom-control custom-control--big-checks custom-checkbox custom-checkbox--big-checks">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label custom-control-label--big-checks h3 m-0 " for="customCheck1">&nbsp;</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row align-items-center mb-5">
                                    <div class="col-9 col-sm-8 col-md-6 col-lg-6 col-xl-5 col-xxl-4">
                                        <label for="customCheck2" class="h3 visaCalcForm__label font-weight-normal m-0 mt-2">Доставка документов курьером</label>
                                    </div>
                                    <div class="col-3 col-sm-4 col-md-4 col-lg-3 col-xxxl-2 mt-2 mt-sm-0">
                                        <div class="custom-control custom-control--big-checks custom-checkbox custom-checkbox--big-checks">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label custom-control-label--big-checks h3 m-0" for="customCheck2">&nbsp;</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="wizard__totals vpm__my">
                                <div class="row">

                                    <div class="col-12 col-lg-6 col-xl-5 col-xxl-4 col-xxxl-3">

                                        <div class="section-heading wizard__section-heading-wrapper d-flex align-items-center justify-content-between justify-content-sm-start pt-lg-3">
                                            <div class="section-heading__name h4 m-0">Стоимость услуги</div>
                                            <div class="ml-4">
                                                <span
                                                class="section-heading__hint-toggle btn btn-outline-secondary p-0 rounded-circle invisible">&nbsp;</span>
                                            </div>
                                        </div>

                                        <div class="wizard__price">
                                            <span class="wizard__price-value">3 500</span>
                                            <span class="wizard__price-currency">руб.</span>
                                        </div>

                                    </div>

                                    <div class="col-auto col-xxxl-auto mt-4 mt-lg-0">

                                        <div class="section-heading wizard__section-heading-wrapper d-flex align-items-center justify-content-between justify-content-sm-start pt-lg-3 mb-3">
                                            <div class="section-heading__name h4 m-0">Выберите способ оплаты</div>
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

                                        <div class="wizard__pay-selector">

                                            <div class="d-inline-block border border-primary btn--rounded position-relative py-2 py-md-3 px-4 mb-2">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked="checked">
                                                            <label class="custom-control-label custom-control-label--pay-radio m-0 cursor-pointer" for="customRadio1"></label>
                                                        </div>
                                                    </div>
                                                    <div class="ml-2 pt-1">
                                                        <label for="customRadio1" class="h4 font-weight-light m-0 cursor-pointer">Картой онлайн <em class="far fa-credit-card text-primary ml-2"></em></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <span class="wizard__pay-spolier-toggle cursor-pointer d-block mb-2 spoiler-toggle"><u>Все способы оплаты</u></span>

                                            <div class="wizard__pay-spolier-body d-none spoiler-body">

                                                <div class="d-inline-block border border-primary btn--rounded position-relative py-2 py-md-3 px-4 mb-2">
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                                                <label class="custom-control-label custom-control-label--pay-radio m-0 cursor-pointer" for="customRadio2"></label>
                                                            </div>
                                                        </div>
                                                        <div class="ml-2 pt-1">
                                                            <label for="customRadio2" class="h4 font-weight-light m-0 cursor-pointer">Наличными <em class="fas fa-wallet text-primary ml-2"></em></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="clearfix"></div>

                                                <div class="d-inline-block border border-primary btn--rounded position-relative py-2 py-md-3 px-4 mb-2">
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                                                <label class="custom-control-label custom-control-label--pay-radio m-0 cursor-pointer" for="customRadio3"></label>
                                                            </div>
                                                        </div>
                                                        <div class="ml-2 pt-1">
                                                            <label for="customRadio3" class="h4 font-weight-light m-0 cursor-pointer">Другим способом <em class="fas fa-university text-primary ml-2"></em></label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="row vpm__my vpm__pb">

                        <div class="col-12">
                            {{-- col-xl-8 col-xxl-8 col-xxxl-6 --}}
                            <div class="row">
                                <div class="col-12 col-sm-6 col-xl-4 col-xxxl-3 order-2 order-sm-0 order-md-0 mt-4 mt-sm-0">
                                    <a href="" class="btn btn-outline-primary btn-block rounded-pill"><span class="h4 font-weight-normal m-0">Назад</span></a>
                                </div>
                                <div class="col-12 col-sm-6 col-xl-4 col-xxxl-3 order-0 order-sm-1 order-md-1">
                                    <div class="h3 m-0">
                                        <button type="submit" class="btn btn-primary btn-block rounded-pill"><span class="h4 font-weight-normal m-0">Завершить</span></button>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-xxxl-3 mt-4 mt-xl-0 order-1 order-sm-1 order-md-2">
                                    <div class="border border-primary p-4 fs16 btn--rounded">
                                        Нажимая на кнопку, вы подтверждаете свое совершеннолетие, соглашаетесь на обработку персональных данных в соответствии с <a href=""><u>Условиями</u></a>, а также с <a href=""><u>Условиями продажи</u></a>.
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
