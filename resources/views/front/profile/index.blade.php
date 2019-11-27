@extends('layouts.front.index')

@section('title', 'Личный кабинет')
@section('keywords', 'Личный кабинет')
@section('description', 'Личный кабинет')

@section('content')

@include('front.components.breadcrumbs', ['breadcrumbs' => $breadcrumbs ?? null])

@include('front.components.page-heading', ['heading' => 'Добро пожаловать, '.\Auth::user()->name])

@include('front.profile.menu', compact('menuItems'))

@if (count($orders))

<div class="border-top py-3 pb-5">
    <div class="container">

        <!-- block heading -->
        <div class="heading row vpm__my">
            <div class="col-12 col-lg">
                <div class="heading__text text-center text-lg-left">Последние {{-- активные --}}заказы</div>
            </div>
            <div class="col-auto mt-3 mt-lg-0 d-none d-lg-block">
                <a href="{{ route('front.profile.order.index') }}" class="heading__listLink">Все заказы</a>
            </div>
        </div>
        <!-- block heading -->

        <!-- listing -->
        <div class="listing row">

            @foreach ($orders as $order)

                @include('front.profile.order.list-item', compact('order'))

            @endforeach

        </div>
        <!-- /listing -->

        <!-- block heading -->
        <div class="heading row justify-content-end">
            <div class="col-auto d-block d-lg-none vpm__mb">
                <a href="{{ route('front.profile.order.index') }}" class="heading__listLink">Все заказы</a>
            </div>
        </div>
        <!-- block heading -->

    </div>
</div>

@else

<div class="border-top py-3 pb-5">
    <div class="container">

        <!-- block heading -->
        <div class="heading row vpm__my">
            <div class="col-12 col-lg">
                <div class="heading__text text-center text-lg-left">У Вас пока нет заказов</div>
            </div>
        </div>
        <!-- block heading -->
    </div>
</div>

@endif

@endsection
