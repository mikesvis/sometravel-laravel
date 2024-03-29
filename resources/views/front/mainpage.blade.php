@extends('layouts.front.index')

@section('title', 'Виза Интеграл')
@section('keywords', 'Виза Интеграл')
@section('description', 'Виза Интеграл')

@section('content')

<!-- slider -->
@include('front.components.sliders.main-slider', ['sliders'=>$data['sliders']])
<!-- /slider -->

<!-- popular directions -->
@include('front.visa.module.popular', ['items' => $data['popularVisas']])
<!-- /popular directions -->

<!-- steps to get visa -->
<div class="container">
    <!-- block heading -->
    <div class="heading row vpm__mt mb-5">
        <div class="col-12">
            <div class="heading__text text-center"><span class="text-primary">4 шага</span> получения визы</div>
        </div>
    </div>
    <!-- block heading -->

    <div class="stepsToGetVisa row justify-content-center vpm__pb">


        <div class="col-6 col-sm-5 col-lg-3 mb-4 mb-sm-5 mb-lg-0">
            <div class="stepsToGetVisa__item stepsToGetVisa__item--nextArrow">
                <div class="row">
                    <div class="col-12 col-xxxl-12 mb-4">
                        <div class="stepsToGetVisa__imageHolder text-center">
                            <img src="/images/plane.png" alt="Самолёт" class="stepsToGetVisa__image stepsToGetVisa__image--rounded border border-primary p-4">
                        </div>
                    </div>
                    <div class="col-12 col-xxxl-12">
                        <div class="stepsToGetVisa__text text-center">Оставляете заявку</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-sm-5 col-lg-3 mb-4 mb-sm-5 mb-lg-0">
            <div class="stepsToGetVisa__item stepsToGetVisa__item--nextArrow">
                <div class="row">
                    <div class="col-12 col-xxxl-12 mb-4">
                        <div class="stepsToGetVisa__imageHolder text-center">
                            <img src="/images/manager.png" alt="Менеджер" class="stepsToGetVisa__image stepsToGetVisa__image--rounded border border-primary p-4">
                        </div>
                    </div>
                    <div class="col-12 col-xxxl-12">
                        <div class="stepsToGetVisa__text text-center">Менеджер<br/> связывается с вами</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-sm-5 col-lg-3 mb-4 mb-sm-5 mb-lg-0">
            <div class="stepsToGetVisa__item stepsToGetVisa__item--nextArrow">
                <div class="row">
                    <div class="col-12 col-xxxl-12 mb-4">
                        <div class="stepsToGetVisa__imageHolder text-center">
                            <img src="/images/setting.png" alt="Процесс" class="stepsToGetVisa__image stepsToGetVisa__image--rounded border border-primary p-4">
                        </div>
                    </div>
                    <div class="col-12 col-xxxl-12">
                        <div class="stepsToGetVisa__text text-center">Мы начинаем процесс<br /> оформления</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-sm-5 col-lg-3 mb-4 mb-sm-5 mb-lg-0">
            <div class="stepsToGetVisa__item">
                <div class="row">
                    <div class="col-12 col-xxxl-12 mb-4">
                        <div class="stepsToGetVisa__imageHolder text-center">
                            <img src="/images/good-mood-emoticon.png" alt="Получение виза" class="stepsToGetVisa__image stepsToGetVisa__image--rounded border border-primary p-4">
                        </div>
                    </div>
                    <div class="col-12 col-xxxl-12">
                        <div class="stepsToGetVisa__text text-center">Вы получаете визу</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /steps to get visa -->

@include('front.forms.inline.main', [
    'heading' => '<span class="text-primary">Нет времени</span> разбираться?',
    'subHeading' => 'Заполните форму, или позвоните по телефону, мы проконсультируем Вас бесплатно',
    'formId' => 'mainFeedbackForm',
    'formTitle' => 'Форма обратной связи на главной странице'
])

<!-- reviews -->
@include('front.review.module', ['reviews'=>$data['reviews']])
<!-- /reviews -->

<!-- news -->
@include('front.news.module.main', ['news'=>$data['news']])
<!-- /news -->

<!-- advantages -->
<div class="advantages bg-light vpm__mt vpm__py">
    <div class="container">

        <!-- block heading -->
        <div class="heading row vpm__my">
            <div class="col-12">
                <div class="heading__text text-center">Почему <span class="text-primary">мы лучшие</span></div>
            </div>
        </div>
        <!-- block heading -->

        <div class="listing row vpm__pb">

            <!-- listing item -->
            <div class="col-12 col-md-6 col-xxl-4 mb-4 mb-sm-5">
                <div class="listingCard listing__item panelRounded panelShadow d-flex aligh-items-center h-100 px-4 py-4 py-xl-5 bg-white">

                    <div class="row align-items-center">
                        <div class="col-12 col-sm-auto col-md-12 col-lg-auto align-self-center">
                            <div class="listingVisual listingCard__vusialHolder text-center">
                                <img src="/images/calendar-with-a-clock-time-tools.png" class="listingVisual__image listingVisual__image--advantageIcon  d-block" alt="Гарантированые сроки">
                            </div>
                        </div>
                        <div class="col-12 col-sm col-md-12 col-lg">
                            <div class="listingText listingCard__textHolder">
                                <div class="listingText__heading mb-3">Гарантированые сроки</div>
                                <div class="listingText__description">Благодаря отлаженной логистике доставка в намеченные сроки без перебоев.</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- listing item -->

            <!-- listing item -->
            <div class="col-12 col-md-6 col-xxl-4 mb-4 mb-sm-5">
                <div class="listingCard listing__item panelRounded panelShadow d-flex aligh-items-center h-100 px-4 py-4 py-xl-5 bg-white">

                    <div class="row align-items-center">
                        <div class="col-12 col-sm-auto col-md-12 col-lg-auto align-self-center">
                            <div class="listingVisual listingCard__vusialHolder text-center">
                                <img src="/images/quality.png" class="listingVisual__image listingVisual__image--advantageIcon d-block" alt="Надёжность">
                            </div>
                        </div>
                        <div class="col-12 col-sm col-md-12 col-lg">
                            <div class="listingText listingCard__textHolder">
                                <div class="listingText__heading mb-3">Надёжно</div>
                                <div class="listingText__description">Вся продукция сделана по Гостам и имеет полный пакет документов сертификатов.</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- listing item -->

            <!-- listing item -->
            <div class="col-12 col-md-6 col-xxl-4 mb-4 mb-sm-5">
                <div class="listingCard listing__item panelRounded panelShadow d-flex aligh-items-center h-100 px-4 py-4 py-xl-5 bg-white">

                    <div class="row align-items-center">
                        <div class="col-12 col-sm-auto col-md-12 col-lg-auto align-self-center">
                            <div class="listingVisual listingCard__vusialHolder text-center">
                                <img src="/images/shield.png" class="listingVisual__image listingVisual__image--advantageIcon d-block" alt="Легальность">
                            </div>
                        </div>
                        <div class="col-12 col-sm col-md-12 col-lg">
                            <div class="listingText listingCard__textHolder">
                                <div class="listingText__heading mb-3">Легально</div>
                                <div class="listingText__description">Мы предлагаем лучшие цены на рынке комбикормов при гарантированном качестве.</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- listing item -->

            <!-- listing item -->
            <div class="col-12 col-md-6 col-xxl-4 mb-4 mb-sm-5">
                <div class="listingCard listing__item panelRounded panelShadow d-flex aligh-items-center h-100 px-4 py-4 py-xl-5 bg-white">

                    <div class="row align-items-center">
                        <div class="col-12 col-sm-auto col-md-12 col-lg-auto align-self-center">
                            <div class="listingVisual listingCard__vusialHolder text-center">
                                <img src="/images/credit-card.png" class="listingVisual__image listingVisual__image--advantageIcon d-block" alt="Удобная оплата">
                            </div>
                        </div>
                        <div class="col-12 col-sm col-md-12 col-lg">
                            <div class="listingText listingCard__textHolder">
                                <div class="listingText__heading mb-3">Удобная оплата</div>
                                <div class="listingText__description">Удобная доставка по предварительному согласованию.</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- listing item -->

            <!-- listing item -->
            <div class="col-12 col-md-6 col-xxl-4 mb-4 mb-sm-5">
                <div class="listingCard listing__item panelRounded panelShadow d-flex aligh-items-center h-100 px-4 py-4 py-xl-5 bg-white">

                    <div class="row align-items-center">
                        <div class="col-12 col-sm-auto col-md-12 col-lg-auto align-self-center">
                            <div class="listingVisual listingCard__vusialHolder text-center">
                                <img src="/images/verification-of-delivery-list-clipboard-symbol.png" class="listingVisual__image listingVisual__image--advantageIcon d-block" alt="Договор">
                            </div>
                        </div>
                        <div class="col-12 col-sm col-md-12 col-lg">
                            <div class="listingText listingCard__textHolder">
                                <div class="listingText__heading mb-3">Заключаем договор</div>
                                <div class="listingText__description">Удобная доставка по предварительному согласованию.</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- listing item -->

            <!-- listing item -->
            <div class="col-12 col-md-6 col-xxl-4 mb-4 mb-sm-5">
                <div class="listingCard listing__item panelRounded panelShadow d-flex aligh-items-center h-100 px-4 py-4 py-xl-5 bg-white">

                    <div class="row align-items-center">
                        <div class="col-12 col-sm-auto col-md-12 col-lg-auto align-self-center">
                            <div class="listingVisual listingCard__vusialHolder text-center">
                                <img src="/images/locked-padlock.png" class="listingVisual__image listingVisual__image--advantageIcon d-block" alt="Безопасность">
                            </div>
                        </div>
                        <div class="col-12 col-sm col-md-12 col-lg">
                            <div class="listingText listingCard__textHolder">
                                <div class="listingText__heading mb-3">Безопасность данных</div>
                                <div class="listingText__description">Готовы преложить индивидуальные условия работы и сотрудничества.</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- listing item -->

        </div>

    </div>
</div>
<!-- /advantages -->

@endsection
