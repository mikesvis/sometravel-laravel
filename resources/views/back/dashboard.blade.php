@extends('layouts.back.index')

@section('header', 'Администрирование')

@section('content')

<div class="row">

    <div class="col col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
        <div class="h-100 bg-light border shadow text-center">
            <a href="{{ route('admin.order.index') }}" class="d-block p-4 h5 m-0">
                <i class="fas fa-cash-register fa-2x"></i>
                <span class="d-block pt-2">Заказы</span>
            </a>
        </div>
    </div>

    <div class="col col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
        <div class="h-100 bg-light border shadow text-center">
            <a href="{{ route('admin.news.index') }}" class="d-block p-4 h5 m-0">
                <i class="far fa-newspaper fa-2x"></i>
                <span class="d-block pt-2">Новости</span>
            </a>
        </div>
    </div>

    <div class="col col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
        <div class="h-100 bg-light border shadow text-center">
            <a href="{{ route('admin.visa.index') }}" class="d-block p-4 h5 m-0">
                <i class="fas fa-plane fa-2x"></i>
                <span class="d-block pt-2">Визы</span>
            </a>
        </div>
    </div>

    <div class="col col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
        <div class="h-100 bg-light border shadow text-center">
            <a href="{{ route('admin.user.index') }}" class="d-block p-4 h5 m-0">
                <i class="fas fa-user fa-2x"></i>
                <span class="d-block pt-2">Пользователи</span>
            </a>
        </div>
    </div>

    <div class="col col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
        <div class="h-100 bg-light border shadow text-center">
            <a href="{{ route('admin.page.index') }}" class="d-block p-4 h5 m-0">
                <i class="far fa-file-alt fa-2x"></i>
                <span class="d-block pt-2">Страницы</span>
            </a>
        </div>
    </div>

    <div class="col col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
        <div class="h-100 bg-light border shadow text-center">
            <a href="{{ route('admin.gallery.index') }}" class="d-block p-4 h5 m-0">
                <i class="fas fa-images fa-2x"></i>
                <span class="d-block pt-2">Галереи</span>
            </a>
        </div>
    </div>

    <div class="col col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
        <div class="h-100 bg-light border shadow text-center">
            <a href="{{ route('admin.review.index') }}" class="d-block p-4 h5 m-0">
                <i class="far fa-newspaper fa-2x"></i>
                <span class="d-block pt-2">Отзывы</span>
            </a>
        </div>
    </div>

    <div class="col col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
        <div class="h-100 bg-light border shadow text-center">
            <a href="{{ route('admin.files') }}" class="d-block p-4 h5 m-0">
                <i class="fas fa-save fa-2x"></i>
                <span class="d-block pt-2">Файловый менеджер</span>
            </a>
        </div>
    </div>

</div>

@endsection

