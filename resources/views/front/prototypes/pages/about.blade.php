@extends('layouts.front.index')

@section('title', 'О Нас')

@section('content')

    @include('front.components.breadcrumbs')

    @include('front.components.page-heading', ['heading' => 'О нас'])

    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="row">

                    <div class="col-12 col-xl-7 col-xxl-6">

                        <h3>Виза интеграл</h3>
                        <p>Ваш пропуск в реальный мир</p>

                        <p class="my-4 my-lg-5">У Виза интеграл нет правила первого въезда. То есть вам не нужно будет обязательно ехать в Хельсинки, чтобы «открыть» визу — первое путешествие может быть в любую страну Шенгена. Но если вы планируете получать и следующую визу через финнов, то учитывайте, что посещений Финляндии должно быть больше, чем всех остальных (в идеале — хотя бы на одну поездку). Иначе при получении следующей визы вам выдадут предупреждение или отказ.</p>

                        <div class="row justify-content-between d-none d-xxl-flex">
                            <div class="col-12 col-sm-4 text-center">
                                <div class="text-center mb-4"><img src="/images/quality-black.png" alt=""></div>
                                <div>Мы работаем<br />более 15 лет на рынке</div>
                            </div>
                            <div class="col-12 col-sm-4 text-center">
                                <div class="text-center mb-4"><img src="/images/users-group-black.png" alt=""></div>
                                <div>Мы работаем<br />более 15 лет на рынке</div>
                            </div>
                            <div class="col-12 col-sm-4 text-center">
                                <div class="text-center mb-4"><img src="/images/identity-card-black.png" alt=""></div>
                                <div>Мы работаем<br />более 15 лет на рынке</div>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-xl-5 col-xxl-6">
                        <img src="@include('front.components.dummyImage', ['w' => 855, 'h'=>458])" class="w-100 panelRounded panelShadow" alt="">
                    </div>

                </div>

                <div class="advantagesListing row justify-content-center justify-content-md-between d-xxl-none mt-5 mt-xl-4">
                    <div class="col-6 col-sm-5 col-md-4 text-center mb-4">
                        <div class="text-center mb-3"><img src="/images/quality-black.png" class="advantagesListing__icon" alt=""></div>
                        <div class="advantagesListing__text">Мы работаем<br />более 15 лет на рынке</div>
                    </div>
                    <div class="col-6 col-sm-5 col-md-4 text-center mb-4">
                        <div class="text-center mb-3"><img src="/images/users-group-black.png" class="advantagesListing__icon" alt=""></div>
                        <div class="advantagesListing__text">Мы работаем<br />более 15 лет на рынке</div>
                    </div>
                    <div class="col-6 col-sm-5 col-md-4 text-center mb-4">
                        <div class="text-center mb-3"><img src="/images/identity-card-black.png" class="advantagesListing__icon" alt=""></div>
                        <div class="advantagesListing__text">Мы работаем<br />более 15 лет на рынке</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container vpm__my vpm__pt">

        <!-- block heading -->
        <div class="heading row vpm__mb justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-12">
                <div class="heading__text text-center">Видео о нашей компании</div>
            </div>
        </div>
        <!-- block heading -->

        <div class="row justify-content-center vpm__pb">
            <div class="col-12 col-lg-10 col-xxl-8 col-xxxl-6 vpm__mb">
                <img src="@include('front.components.dummyImage', ['w' => 855, 'h'=>458])" class="w-100 panelRounded panelShadow" alt="">
            </div>
        </div>

    </div>


    {{-- @include('front.components.listings.directions') --}}

    {{-- @include('front.components.listings.news') --}}

    @include('front.components.forms.visa-question',
                [
                    'heading' => '<span class="text-primary">У вас остались вопросы</span> по оформлению визы?',
                    'subHeading' => 'Оставьте номер телефона и наши специалист вам перезвонит'
                ]
            )

@endsection
