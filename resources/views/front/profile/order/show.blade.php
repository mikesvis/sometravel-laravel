@extends('layouts.front.index')

@section('title', 'Личный кабинет')
@section('keywords', 'Личный кабинет')
@section('description', 'Личный кабинет')

@section('content')

@include('front.components.breadcrumbs', compact('breadcrumbs'))

@include('front.components.page-heading', ['heading' => 'Виза '.$order->json_parameters['visa']['title_to']])

@include('front.profile.menu', compact('menuItems'))

<div class="border-top py-3 pb-5">
    <div class="container vpm__mt">

        <!-- listing -->
        <div class="row">

            {{-- order-item  --}}
            <div class="col-12 col-lg-7 col-xl-6 col-xxl-5 col-xxxl-4 mb-4">

                <div class="order-card panelRounded panelShadow px-4 px-md-5 py-4 h-100">

                    <div class="order-card__number mb-1">Заказ: {{ $order->ordernumber }}</div>
                    <div class="order-card__status mb-1 {{ $order->status_color }}"><strong>{{ $order->status_name }}</strong></div>
                    <div class="order-card__date">от {{ $order->created_at_date_simple }}</div>

                    <div class="order-card__name my-4">Виза {{ $order->json_parameters['visa']['title_to'] }}</div>
                    <div class="order-card__row mb-4">
                        <div class="order-card__row-name mb-1">Контактные данные</div>
                        <div class="order-card__detail-text">
                            <p>
                                {{ $order->json_parameters['user']['surname'] ?? null }}
                                {{ $order->json_parameters['user']['name'] ?? null }}
                                {{ $order->json_parameters['user']['patronymic'] ?? null }} <br>
                                @isset($order->json_parameters['user']['phone'])
                                    Телефон: {{ \App\Helpers\PhoneHelper::beautifyPhone($order->json_parameters['user']['phone']) }}<br />
                                @endisset
                                @isset($order->json_parameters['user']['phone'])
                                    E-mail: {{ $order->json_parameters['user']['email'] }}<br />
                                @endisset
                            </p>
                        </div>
                    </div>

                    <div class="order-card__row mb-4">
                        <div class="order-card__row-name mb-1">Данные о заказе</div>
                        <div class="order-card__detail-text">
                            <p>
                                {{-- @isset($order->json_parameters['hotel'])
                                    Наличие брони в гостинице: {{ ((bool)$order->json_parameters['hotel']) ? 'Да' : 'Нет' }}<br />
                                @endisset  --}}
                                @isset($order->json_parameters['persons'])
                                    Количество персон: {{ $order->json_parameters['persons'] }}<br />
                                @endisset
                                @isset($order->json_parameters['date_start'])
                                    Начало поездки: {{ $order->json_parameters['date_start'] }}<br />
                                @endisset
                                @isset($order->json_parameters['date_end'])
                                    Окончание поездки: {{ $order->json_parameters['date_end'] }}<br />
                                @endisset
                                @isset($order->json_parameters['tickets'])
                                    Наличие билетов: {{ ((bool)$order->json_parameters['tickets']) ? 'Да' : 'Нет' }}<br />
                                @endisset
                                @isset($order->json_parameters['hotel'])
                                    Наличие брони в гостинице: {{ ((bool)$order->json_parameters['hotel']) ? 'Да' : 'Нет' }}<br />
                                @endisset
                            </p>
                        </div>
                    </div>

                    @if (isset($order->json_parameters['parameter']) && count($order->json_parameters['parameter']))
                    <div class="order-card__row mb-4">
                        <div class="order-card__row-name mb-1">Параметры визы</div>
                        <div class="order-card__detail-text">
                            <p>
                                @foreach ($order->json_parameters['parameter'] as $parameter)
                                    {{ $parameter['name'] }}: {{ $parameter['value'] }}<br />
                                @endforeach
                            </p>
                        </div>
                    </div>
                    @endif

                    @if (isset($order->json_parameters['parameter_regular']) && count($order->json_parameters['parameter_regular']))
                    <div class="order-card__row mb-4">
                        <div class="order-card__row-name mb-1">Дополнительные сервисы</div>
                        <div class="order-card__detail-text">
                            <p>
                                @foreach ($order->json_parameters['parameter_regular'] as $parameter)
                                    @if ($parameter['value'] != null && $parameter['value'] != '0')
                                        {{ $parameter['name'] }}: {{ $parameter['value'] }}<br />
                                    @endif
                                @endforeach
                            </p>
                        </div>
                    </div>
                    @endif

                    @if (isset($order->json_parameters['parameter_regular']) && count($order->json_parameters['parameter_regular']))
                    <div class="order-card__row mb-4">
                        <div class="order-card__row-name mb-1">Итог</div>
                        <div class="order-card__detail-text">
                            <p>
                                Сумма заказа: {{ number_format($order->total, 0, ".", " ") }} руб.
                            </p>
                        </div>
                    </div>
                    @endif

                </div>

            </div>
            {{-- /order-item  --}}

        </div>
        <!-- /listing -->

        <!-- go back button -->
        <div class="row mt-3">
            <div class="col-12">
                <a href="{{ route('front.profile.order.index') }}" class="backLink">Назад</a>
            </div>
        </div>
        <!-- /go back button -->

    </div>
</div>

@endsection
