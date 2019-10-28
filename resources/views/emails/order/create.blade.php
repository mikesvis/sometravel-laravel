@component('mail::message')

@if ($is_for_admin)
# Новый заказ на сайте {{ config('app.name') }} #{{ $order->order_number }} <br />от {{ $order->created_at_date_simple }}
@else
# Заказ на сайте {{ config('app.name') }} #{{ $order->order_number }} <br />от {{ $order->created_at_date_simple }} принят в обработку.

Спасибо за Ваш заказ. Наш менеджер свяжется с Вами в ближайшее время.<br />
@endif


## Контактные данные

{{ $order->json_parameters['user']['surname'] ?? null }} {{ $order->json_parameters['user']['name'] ?? null }} {{ $order->json_parameters['user']['patronymic'] ?? null }} <br />
@isset($order->json_parameters['user']['phone'])
Телефон: {{ \App\Helpers\PhoneHelper::beautifyPhone($order->json_parameters['user']['phone']) }}<br />
@endisset
@isset($order->json_parameters['user']['phone'])
E-mail: {{ $order->json_parameters['user']['email'] }}
@endisset

## Данные о заказе
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

@if (isset($order->json_parameters['parameter']) && count($order->json_parameters['parameter']))
## Параметры визы
@foreach ($order->json_parameters['parameter'] as $parameter)
{{ $parameter['name'] }}: {{ $parameter['value'] }}<br />
@endforeach
@endif

@if (isset($order->json_parameters['parameter_regular']) && count($order->json_parameters['parameter_regular']))
## Дополнительные сервисы
@foreach ($order->json_parameters['parameter_regular'] as $parameter)
@if ($parameter['value'] != null && $parameter['value'] != '0')
{{ $parameter['name'] }}: {{ $parameter['value'] }}<br />
@endif
@endforeach
@endif

## Итог
@isset($order->appliance_date)
Дата подачи документов: {{ $order->appliance_date_simple }}<br />
@endisset
@isset($order->delivery_date)
Ожидаемая дата доставки: {{ $order->delivery_date_simple }}<br />
@endisset
Сумма заказа: {{ number_format($order->total, 0, ".", " ") }} руб.

@if ($is_for_admin)
@component('mail::button', ['url' => route('admin.order.edit', $order)])
Посмотреть
@endcomponent
@else
@component('mail::button', ['url' => route('front.profile.order.show', $order)])
Личный кабинет
@endcomponent
@endif

Спасибо,<br>
{{ config('app.name') }}
@endcomponent
