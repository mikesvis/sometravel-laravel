@extends('layouts.front.index')

@section('title',  $heading)
@section('keywords',  $heading)
@section('description',  $heading)

@section('content')

@include('front.components.breadcrumbs', compact('breadcrumbs'))

@include('front.components.page-heading', compact('heading'))

<div class="container">
    <div class="row">
        <div class="col-12">

            <div class="wizard">

                <div class="wizard__steps h4 font-weight-normal">Шаг 3 из 3 <span class="ml-3">Заказ №{{ $order->order_number }}</span></div>

                <!-- wizard form -->
                <form action="" method="POST">

                    @csrf

                    <div class="row">
                        <div class="col-12">

                            <div class="wizard__section vpm__my">

                                {{-- persons --}}
                                {{ $calculator->personsField() }}
                                {{-- /persons --}}

                                {{-- parameters --}}
                                @foreach ($calculator->checkoutParameters as $field)
                                    {{ $field }}
                                @endforeach
                                {{-- /parameters --}}

                                {{-- services --}}
                                @if ($calculator->hasServices())

                                    {{ $calculator->servicesSectionHeading() }}

                                    @foreach ($calculator->checkoutServices as $service)
                                        {{ $service }}
                                    @endforeach

                                @endif
                                {{-- services --}}

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
