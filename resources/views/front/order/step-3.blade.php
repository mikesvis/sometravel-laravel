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
                <form action="{{ route('front.order.step-3-store') }}" method="POST" id="checkoutForm">

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
                                            <span class="wizard__price-value" id="checkoutCalculatedPrice">{{ number_format($calculator->getComplexPrice(), 0, ".", " ") }}</span>
                                            <span class="wizard__price-currency">руб.</span>
                                        </div>

                                    </div>

                                    {!! $calculator->wizard->paymentMethodsView() !!}

                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="row vpm__my vpm__pb">

                        <div class="col-12">
                            {{-- col-xl-8 col-xxl-8 col-xxxl-6 --}}
                            <div class="row">
                                <div class="col-12 col-sm-6 col-xl-4 col-xxxl-3 order-2 order-sm-0 order-md-0 mt-4 mt-sm-0">
                                    <a href="{{ route('front.order.step-2') }}" class="btn btn-outline-primary btn-block rounded-pill"><span class="h4 font-weight-normal m-0">Назад</span></a>
                                </div>
                                <div class="col-12 col-sm-6 col-xl-4 col-xxxl-3 order-0 order-sm-1 order-md-1">
                                    <div class="h3 m-0">
                                        <button type="submit" class="btn btn-primary btn-block rounded-pill"><span class="h4 font-weight-normal m-0">Завершить</span></button>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-xxxl-3 mt-4 mt-xl-0 order-1 order-sm-1 order-md-2">
                                    <div class="border border-primary p-4 fs16 btn--rounded">
                                        Нажимая на кнопку, вы подтверждаете свое совершеннолетие, соглашаетесь на обработку персональных данных в соответствии с <a href="{{ route('front.page.show', ['page'=>'usloviya']) }}" target="_blank"><u>Условиями</u></a>, а также с <a href="{{ route('front.page.show', ['page'=>'usloviya-prodazhi']) }}" target="_blank"><u>Условиями продажи</u></a>.
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
