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

                <div class="wizard__steps h4 font-weight-normal">Шаг 2 из 3 <span class="ml-3">Заказ №{{ $order->order_number }}</span></div>

                <!-- wizard form -->
                <form action="{{ route('front.order.step-2-store') }}" method="POST">

                    @csrf

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
                                        data-content="Укажите даты вашей поездки"
                                        >?</span>
                                    </div>
                                </div>


                                <div class="row vpm__mb">

                                    <div class="col-12 col-sm-6">
                                        <label class="control-label" for="input-date-start">Начало поездки <span class="text-danger">*</span></label>
                                        <div class="form-group mt-1">
                                            <div class="input-group is-datepicker" id="datepicker_date_start" data-date-format="DD.MM.YYYY" data-target-input="nearest" data-date-defaultDate="false" data-date-min-date="{{ \Carbon\Carbon::now()->format('Y-m-d\TH:i:s.u\Z') }}">
                                                <input
                                                type="text"
                                                name="date_start"
                                                value="{{ old('date_start') }}"
                                                id="input-date-start"
                                                class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center datetimepicker-input @error('date_start')is-invalid @enderror"
                                                data-target="#datepicker_date_start"
                                                autocomplete="off"
                                                />
                                                <div class="input-group-append" data-target="#datepicker_date_start" data-toggle="datetimepicker">
                                                    <span class="btn btn-primary btn--rounded px-4"><em class="fas fa-calendar"></em></span>
                                                </div>
                                            </div>
                                            @error('date_start')
                                                <span class="invalid-feedback text-center d-block" role="message">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <label class="control-label" for="input-date-end">Окончание поездки <span class="text-danger">*</span></label>
                                        <div class="form-group mt-1">
                                            <div class="input-group is-datepicker" id="datepicker_date_end" data-date-format="DD.MM.YYYY" data-target-input="nearest" data-date-defaultDate="false" data-date-min-date="{{ \Carbon\Carbon::now()->format('Y-m-d\TH:i:s.u\Z') }}">
                                                <input
                                                type="text"
                                                name="date_end"
                                                value="{{ old('date_end') }}"
                                                id="input-date-end"
                                                class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center datetimepicker-input @error('date_end')is-invalid @enderror"
                                                data-target="#datepicker_date_end"
                                                autocomplete="off"
                                                />
                                                <div class="input-group-append" data-target="#datepicker_date_end" data-toggle="datetimepicker">
                                                    <span class="btn btn-primary btn--rounded px-4"><em class="fas fa-calendar"></em></span>
                                                </div>
                                            </div>
                                            @error('date_end')
                                                <span class="invalid-feedback text-center d-block" role="message">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row vpm__mb">
                                    <div class="col-12">
                                        <label>У вас уже есть билеты? <span class="text-danger">*</span></label>

                                        <div class="radioButtons row  mt-1">

                                            <div class="col-6 col-sm-3">
                                                <div class="radioButtons__item">
                                                    <input
                                                    type="radio"
                                                    name="tickets"
                                                    value="1"
                                                    id="tickets-1"
                                                    class="d-none"
                                                    @if (old('tickets') === '1') checked @endif
                                                    />
                                                    <label for="tickets-1" class="radioButtons__label btn btn-outline-primary btn-block btn--rounded px-0 border-primary mb-0">да</label>
                                                </div>
                                            </div>

                                            <div class="col-6 col-sm-3">
                                                <div class="radioButtons__item">
                                                    <input
                                                    type="radio"
                                                    name="tickets"
                                                    value="0"
                                                    id="tickets-0"
                                                    class="d-none"
                                                    @if (old('tickets') === '0') checked @endif
                                                    />
                                                    <label for="tickets-0" class="radioButtons__label btn btn-outline-primary btn-block btn--rounded px-0 border-primary mb-0">нет</label>
                                                </div>
                                            </div>

                                        </div>

                                        @error('tickets')
                                        <div class="row mt-1">
                                            <div class="col-12 col-sm-6">
                                                <span class="invalid-feedback text-center d-block" role="message">{{ $message }}</span>
                                            </div>
                                        </div>
                                        @enderror

                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-12">
                                        <label>Есть ли бронь гостиницы? <span class="text-danger">*</span></label>

                                        <div class="radioButtons row mt-1">

                                            <div class="col-6 col-sm-3">
                                                <div class="radioButtons__item">
                                                    <input
                                                    type="radio"
                                                    name="hotel"
                                                    value="1"
                                                    id="hotel-1"
                                                    class="d-none"
                                                    @if (old('hotel') === '1') checked @endif
                                                    />
                                                    <label for="hotel-1" class="radioButtons__label btn btn-outline-primary btn-block btn--rounded px-0 border-primary mb-0">да</label>
                                                </div>
                                            </div>

                                            <div class="col-6 col-sm-3">
                                                <div class="radioButtons__item">
                                                    <input
                                                    type="radio"
                                                    name="hotel"
                                                    value="0"
                                                    id="hotel-0"
                                                    class="d-none"
                                                    @if (old('hotel') === '0') checked @endif
                                                    />
                                                    <label for="hotel-0" class="radioButtons__label btn btn-outline-primary btn-block btn--rounded px-0 border-primary mb-0">нет</label>
                                                </div>
                                            </div>

                                        </div>

                                        @error('hotel')
                                        <div class="row mt-1">
                                            <div class="col-12 col-sm-6">
                                                <span class="invalid-feedback text-center d-block" role="message">{{ $message }}</span>
                                            </div>
                                        </div>
                                        @enderror

                                    </div>
                                </div>


                            </div>


                        </div>
                    </div>

                    <div class="row vpm__my vpm__pb">
                        <div class="col-12 col-xl-8 col-xxl-8 col-xxxl-6">
                            <div class="row">
                                <div class="col-12 col-sm-6 order-1 order-sm-0 mt-4 mt-sm-0">
                                    <a href="{{ route('front.visa.show', $visa->slug) }}" class="btn btn-outline-primary btn-block rounded-pill"><span class="h4 font-weight-normal m-0">Назад</span></a>
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
