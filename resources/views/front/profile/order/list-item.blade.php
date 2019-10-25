{{-- order-item  --}}
<div class="col-12 col-lg-6 col-xxl-4 mb-4">

    <div class="order-item panelRounded px-4 px-md-5 py-4 pb-5 panelShadow h-100">
        <a href="{{ route('front.profile.order.show', $order->id) }}" class="order-item__link d-block h-100 text-body text-decoration-none">

            <div class="row mb-4 align-items-end justify-content-between">
                <div class="col-12 col-sm order-1 order-sm-0">
                    <div class="order-item__status {{ $order->status_color }}"><strong>{{ $order->status_name }}</strong></div>
                </div>
                <div class="col-12 col-sm-auto mb-2 mb-sm-0 order-0 order-sm-1">
                    <div class="order-item__number h4 m-0 font-weight-normal">Заказ: {{ $order->order_number }}</div>
                </div>
            </div>

            <div class="order-item__name mb-4">Виза {{ $order->json_parameters['visa']['title_to'] }}</div>

            <div class="row mb-1">
                <div class="col-12 col-sm">
                    <div class="order-item__props-label">Дата формирования заказа:</div>
                </div>
                <div class="col-12 col-sm-auto">
                    <div class="order-item__props-value">{{ $order->created_at_date_simple }}</div>
                </div>
            </div>

            @isset($order->appliance_date_simple)
            <div class="row mb-1">
                <div class="col-12 col-sm">
                    <div class="order-item__props-label">Дата подачи документов:</div>
                </div>
                <div class="col-12 col-sm-auto">
                    <div class="order-item__props-value">{{ $order->appliance_date_simple }}</div>
                </div>
            </div>
            @endisset

            @isset($order->delivery_date_simple)
            <div class="row mb-1">
                <div class="col-12 col-sm">
                    <div class="order-item__props-label">Ожидаемая дата доставки:</div>
                </div>
                <div class="col-12 col-sm-auto">
                    <div class="order-item__props-value">{{ $order->delivery_date_simple }}</div>
                </div>
            </div>
            @endisset

            {{-- <div class="row mb-1">
                <div class="col-12 col-sm">
                    <div class="order-item__props-label">Дата подачи документов:</div>
                </div>
                <div class="col-12 col-sm-auto">
                    <div class="order-item__props-value">19.02.2019</div>
                </div>
            </div>

            <div class="row mb-1">
                <div class="col-12 col-sm">
                    <div class="order-item__props-label">Ожидаемая дата доставки:</div>
                </div>
                <div class="col-12 col-sm-auto">
                    <div class="order-item__props-value">29.02.2019</div>
                </div>
            </div> --}}

        </a>
    </div>

</div>
{{-- /order-item  --}}
