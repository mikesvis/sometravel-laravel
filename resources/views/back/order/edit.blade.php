@extends('layouts.back.index')

@section('header', 'Просмотр заказа "'.$order->order_number.'"')

@section('content')

{{-- @include('back.components.errors') --}}

<form method="POST" action="{{ route('admin.order.update', $order->id) }}" id="mainForm">

    @csrf
    @method('patch')

    @php
    $tabToGo = (old('tabToGo') != null) ? old('tabToGo') : '#'.$tabToGo;
    @endphp

    <input type="hidden" name="tabToGo" value="{{ $tabToGo }}">

    <div class="card">
        <div class="card-body">

            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">

                <li class="nav-item">
                    <a class="nav-link {{ (($tabToGo == '#primary') ? "active":"") }}" data-toggle="pill" href="#primary" role="tab" aria-controls="primary" aria-selected="{{ (($tabToGo == '#primary') ? "true":"false") }}">
                        <em class="fas fa-home"></em>
                        <span class="d-none d-md-inline-block">Основное</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (($tabToGo == '#parameters') ? "active":"") }}" data-toggle="pill" href="#parameters" role="tab" aria-controls="parameters" aria-selected="{{ (($tabToGo == '#parameters') ? "true":"false") }}">
                        <em class="fas fa-cog"></em>
                        <span class="d-none d-md-inline-block">Параметры</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content px-3 py-4">

                {{-- primary --}}
                <div class="tab-pane fade {{ (($tabToGo == '#primary') ? "active show":"") }}" id="primary" role="tabpanel" aria-labelledby="primary">

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2">Виза</label>
                        <div class="col-lg-4 col-xl-10">
                            <div class="form-control border-0">
                            @if ($order->has_visa)
                                <a href="{{ route('admin.visa.edit', $order->visa) }}" class="d-block">{{ $order->visa_title }}</a>
                            @else
                                <span class="d-block">{{ $order->visa_title }}</span>
                            @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2">Пользователь</label>
                        <div class="col-lg-4 col-xl-10">
                            <div class="form-control border-0">
                                @if ($order->has_user)
                                    <a href="{{ route('admin.user.edit', $order->user) }}" class="d-block">{{ implode(" ", $order->user_name) }}</a>
                                @else
                                    <span class="d-block">{{ implode(" ", $order->user_name) }}</span>
                                @endif
                            </div>
                            <div class="form-control border-0 mb-4">
                                {!! implode("<br />", $order->user_contacts) !!}
                            </div>
                        </div>
                    </div>


                    <div class="form-group row align-items-center">
                        <label class="col-form-label col-lg-2 user-select-none" for="status">Статус заказа <span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-xl-3">
                            <select name="status" class="custom-select" id="status" required>
                                @foreach ($statusesList as $key => $status)
                                    <option
                                    value="{{ $key }}"
                                    @if (old('status', $order->status) == $key)
                                        selected
                                    @endif
                                    >{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="appliance_date">Дата подачи док-тов</label>
                        <div class="col-lg-4 col-xl-3">
                            <div class="input-group datepicker">
                                <input
                                type="text"
                                name="appliance_date"
                                value="{{ old('appliance_date', $order->appliance_date) }}"
                                class="form-control {{ $errors->has('appliance_date') ? 'is-invalid':'' }}"
                                id="appliance_date"
                                data-input
                                >
                                <span class="input-group-append">
                                    <span class="input-group-text" data-toggle><i class="far fa-calendar"></i></span>
                                </span>
                                @error('appliance_date')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="delivery_date">Дата доставки</label>
                        <div class="col-lg-4 col-xl-3">
                            <div class="input-group datepicker">
                                <input
                                type="text"
                                name="delivery_date"
                                value="{{ old('delivery_date', $order->delivery_date) }}"
                                class="form-control {{ $errors->has('delivery_date') ? 'is-invalid':'' }}"
                                id="delivery_date"
                                data-input
                                >
                                <span class="input-group-append">
                                    <span class="input-group-text" data-toggle><i class="far fa-calendar"></i></span>
                                </span>
                                @error('delivery_date')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2">Сумма заказа</label>
                        <div class="col-lg-4 col-xl-10">
                            <div class="form-control border-0">{{ number_format($order->total, 0, ".", " ") }} руб.</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2">Дата создания</label>
                        <div class="col-lg-4 col-xl-10">
                            <div class="form-control border-0">{{ $order->created_at }}</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2">Последнее изменение</label>
                        <div class="col-lg-4 col-xl-10">
                            <div class="form-control border-0">{{ $order->updated_at }}</div>
                        </div>
                    </div>

                </div>
                {{-- /primary --}}

                {{-- parameters --}}
                <div class="tab-pane {{ (($tabToGo == '#parameters') ? "active show":"") }}" id="parameters" role="tabpanel" aria-labelledby="parameters">

                    <h3>Данные о заказе</h3>

                    <p>
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

                    <h3>Параметры визы</h3>

                    <p>
                        @foreach ($order->json_parameters['parameter'] as $parameter)
                            {{ $parameter['name'] }}: {{ $parameter['value'] }}<br />
                        @endforeach
                    </p>

                    <h3>Дополнительные сервисы</h3>

                    <p>
                        @foreach ($order->json_parameters['parameter_regular'] as $parameter)
                            @if ($parameter['value'] != null && $parameter['value'] != '0')
                                {{ $parameter['name'] }}: {{ $parameter['value'] }}<br />
                            @endif
                        @endforeach
                    </p>

                </div>
                {{-- /seo --}}

            </div>

            @include('back.components.buttons-save-apply', ['isNew' => false])

        </div>
    </div>

</form>


@endsection
