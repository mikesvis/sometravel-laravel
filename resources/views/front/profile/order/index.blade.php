@extends('layouts.front.index')

@section('title', 'Личный кабинет')
@section('keywords', 'Личный кабинет')
@section('description', 'Личный кабинет')

@section('content')

@include('front.components.breadcrumbs', compact('breadcrumbs'))

@include('front.components.page-heading', ['heading' => 'Добро пожаловать, '.\Auth::user()->name])

@include('front.profile.menu', compact('menuItems'))

@if (count($orders['active']) == 0 && count($orders['active']) == 0)

<div class="border-top py-3 pb-5">
    <div class="container">

        <!-- block heading -->
        <div class="heading row vpm__my">
            <div class="col-12 col-lg">
                <div class="h2 font-weight-normal m-0 text-center text-lg-left">У Вас пока нет заказов</div>
            </div>
        </div>
        <!-- block heading -->

    </div>
</div>

@endif

@if (count($orders['active']))

<div class="border-top py-3 pb-5">
    <div class="container">

        <!-- block heading -->
        <div class="heading row vpm__my">
            <div class="col-12 col-lg">
                <div class="h2 font-weight-normal m-0 text-center text-lg-left">Активные заказы</div>
            </div>
        </div>
        <!-- block heading -->

        <!-- listing -->
        <div class="listing row">

            @foreach ($orders['active'] as $order)

            @include('front.profile.order.list-item', compact('order'))

            @endforeach

        </div>
        <!-- /listing -->

    </div>
</div>

@endif

@if (count($orders['archive']))

<div class="border-top py-3 pb-5">
    <div class="container">

        <!-- block heading -->
        <div class="heading row vpm__my">
            <div class="col-12 col-lg">
                <div class="h2 font-weight-normal m-0 text-center text-lg-left">Архив заказов</div>
            </div>
        </div>
        <!-- block heading -->

        <!-- listing -->
        <div class="listing row">

            @foreach ($orders['archive'] as $order)

            @include('front.profile.order.list-item', compact('order'))

            @endforeach

        </div>
        <!-- /listing -->

    </div>
</div>

@endif

@endsection
