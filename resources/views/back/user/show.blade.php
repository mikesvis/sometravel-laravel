@extends('layouts.back.index')

@section('header', 'Просмотр данных пользоателя "'.$user->full_name.'"')

@section('content')

@php
$tabToGo = (old('tabToGo') != null) ? old('tabToGo') : '#'.$tabToGo;
@endphp

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
                <a class="nav-link {{ (($tabToGo == '#orders') ? "active":"") }}" data-toggle="pill" href="#orders" role="tab" aria-controls="orders" aria-selected="{{ (($tabToGo == '#orders') ? "true":"false") }}">
                    <em class="fas fa-cash-register"></em>
                    <span class="d-none d-md-inline-block">Заказы</span>
                </a>
            </li>
        </ul>

        <div class="tab-content px-3 py-4">

            {{-- primary --}}
            <div class="tab-pane fade {{ (($tabToGo == '#primary') ? "active show":"") }}" id="primary" role="tabpanel" aria-labelledby="primary">

                <div class="form-group row">
                    <label class="col-form-label col-lg-3 col-xl-2">ФИО</label>
                    <div class="col-lg-4 col-xl-10">
                        <div class="form-control">
                            <span class="d-block">{{ $user->full_name }}</span>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-3 col-xl-2">E-mail</label>
                    <div class="col-lg-4 col-xl-10">
                        <div class="form-control">
                            <span class="d-block">{{ $user->email }}</span>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-3 col-xl-2">Телефон</label>
                    <div class="col-lg-4 col-xl-10">
                        <div class="form-control">
                            <span class="d-block">
                                @isset($user->phone)
                                {{ \App\Helpers\PhoneHelper::beautifyPhone($user->phone) }}
                                @endisset
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-3 col-xl-2">Дата создания</label>
                    <div class="col-lg-4 col-xl-10">
                        <div class="form-control border-0">{{ $user->created_at_human }}</div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-3 col-xl-2">Последнее изменение</label>
                    <div class="col-lg-4 col-xl-10">
                        <div class="form-control border-0">{{ $user->updated_at_human }}</div>
                    </div>
                </div>

            </div>
            {{-- /primary --}}

            {{-- seo --}}
            <div class="tab-pane {{ (($tabToGo == '#orders') ? "active show":"") }}" id="orders" role="tabpanel" aria-labelledby="orders">

                <table class="table table-hover table-bordered layout-fixed">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 160px" class="text-center">№ и Дата</th>
                            <th style="width: 150px">Статус</th>
                            <th style="width: 100px">Оплата</th>
                            <th>Виза</th>
                            <th style="width: 80px" class="text-center">Шагов</th>
                            <th style="width: 160px" class="text-center">Дата подачи</th>
                            <th style="width: 160px" class="text-center">Дата доставки</th>
                            <th style="width: 160px" class="text-center">Изменен</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $item)
                        <tr>
                            <td>
                                <a href="{{ route('admin.order.edit', $item) }}" title="Просмотр" target="_blank"><em class="fas fa-edit"></em></a>
                                <strong>#{{ $item->order_number }}</strong>
                                <span class="d-block">от {{ $item->created_at_date_simple }}</span>
                            </td>
                            <td class="text-center">
                                <strong class="{{ $item->status_color }}">{{ $item->status_name }}</strong>
                            </td>
                            <td class="text-center">
                                {!! $item->payment_icon !!}
                                <nobr>{{ number_format($item->total, 0, ".", " ") }} руб.</nobr>
                            </td>
                            <td>
                                @if ($item->has_visa)
                                    <a href="{{ route('admin.visa.edit', $item->visa) }}" class="d-block">{{ $item->visa_title }}</a>
                                @else
                                    <span class="d-block">{{ $item->visa_title }}</span>
                                @endif

                                @isset($item->json_parameters['date_start'])
                                    <span class="d-block">Начало: {{ $item->json_parameters['date_start']}}</span>
                                @endisset

                                @isset($item->json_parameters['date_end'])
                                    <span class="d-block">Окончание: {{ $item->json_parameters['date_end']}}</span>
                                @endisset

                            </td>
                            <td class="text-center"> {{ $item->steps_completed }}&nbsp;/&nbsp;{{ $stepsTotal }}</td>
                            <td class="text-center">
                                {{ $item->appliance_date_simple }}
                            </td>
                            <td class="text-center">
                                {{ $item->delivery_date_simple }}
                            </td>
                            <td class="text-center">{{ $item->updated_at }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Заказов пока нет</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                @include('back.components.pagination', ['items'=>$orders])

            </div>
            {{-- /seo --}}


        </div>

        <div class="form-group row mb-0">
            <div class="col-12">
                <a href="{{ route('admin.user.index') }}" class="btn btn-success text-white"><i class="fas fa-sign-out-alt mr-1"></i> Назад</a>
            </div>
        </div>

    </div>
</div>

@endsection
