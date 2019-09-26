@extends('layouts.front.index')

@section('content')

<!-- slider -->
@include('front.components.sliders.main-slider', ['sliders'=>$data['sliders']])
<!-- /slider -->

<!-- popular directions -->
<div class="travelDirections vpm__pt">
    <div class="container">

        <!-- block heading -->
        <div class="heading row vpm__my">
            <div class="col-12 col-lg">
                <div class="heading__text text-center text-lg-left"><span class="text-primary">Популярные</span> направления</div>
            </div>
            <div class="col-auto mt-3 mt-lg-0 d-none d-lg-block">
                <a href="" class="heading__listLink">Все направления</a>
            </div>
        </div>
        <!-- block heading -->

        <!-- listing -->
        <div class="listing row">

            <!-- listing item -->
            <div class="col-12 col-md-6 col-xxl-4 mb-4 mb-lg-5">
                <div class="listingCard listing__item panelRounded panelShadow d-flex flex-column h-100">
                    <!-- image -->
                    <div class="listingVisual listingCard__vusialHolder">
                        <a href="" class="listingVisual__link d-block"><img src="@include('front.components.dummyImage', ['w' => 855, 'h'=>320])" class="listingVisual__image d-block w-100" alt=""></a>
                    </div>
                    <!-- /image -->
                    <!-- text -->
                    <div class="listingText listingCard__textHolder p-4 d-flex flex-column flex-grow-1">
                        <div class="listingText__heading mb-3">Франция</div>
                        <div class="listingText__description flex-grow-1">Компенсация умышленно индоссирует Кодекс. Страховой полис правомерно законодательно подтверждает взаимозачет. Умысел требует юридический штраф.</div>
                        <div class="row align-items-center justify-content-center">
                            <div class="col-auto col-sm-6 col-md-12 col-lg-6 mt-3 mt-sm-4 mt-md-3 mt-lg-4 order-1 order-sm-0 order-md-1 order-lg-0"><a class="listingText__button btn btn-primary btn-block rounded-pill py-2 py-md-3 px-5 px-sm-4 text-white">Заказать визу</a></div>
                            <div class="col-12 col-sm col-md-12 col-lg-6 text-center text-sm-right text-md-center text-lg-right mt-4 order-0 order-sm-1 order-md-0 order-lg-1"><span class="listingText__price text-primary">от 13500 ₽</span></div>
                        </div>
                    </div>
                    <!-- /text -->
                </div>
            </div>
            <!-- listing item -->

            <!-- listing item -->
            <div class="col-12 col-md-6 col-xxl-4 mb-4 mb-lg-5">
                <div class="listingCard listing__item panelRounded panelShadow d-flex flex-column h-100">
                    <!-- image -->
                    <div class="listingVisual listingCard__vusialHolder">
                        <a href="" class="listingVisual__link d-block"><img src="@include('front.components.dummyImage', ['w' => 855, 'h'=>320])" class="listingVisual__image d-block w-100" alt=""></a>
                    </div>
                    <!-- /image -->
                    <!-- text -->
                    <div class="listingText listingCard__textHolder p-4 d-flex flex-column flex-grow-1">
                        <div class="listingText__heading mb-3">Британия</div>
                        <div class="listingText__description flex-grow-1">Компенсация умышленно индоссирует Кодекс. Страховой полис правомерно законодательно подтверждает взаимозачет. Умысел требует юридический штраф.</div>
                        <div class="row align-items-center justify-content-center">
                            <div class="col-auto col-sm-6 col-md-12 col-lg-6 mt-3 mt-sm-4 mt-md-3 mt-lg-4 order-1 order-sm-0 order-md-1 order-lg-0"><a class="listingText__button btn btn-primary btn-block rounded-pill py-2 py-md-3 px-5 px-sm-4 text-white">Заказать визу</a></div>
                            <div class="col-12 col-sm col-md-12 col-lg-6 text-center text-sm-right text-md-center text-lg-right mt-4 order-0 order-sm-1 order-md-0 order-lg-1"><span class="listingText__price text-primary">от 3500 ₽</span></div>
                        </div>
                    </div>
                    <!-- /text -->
                </div>
            </div>
            <!-- listing item -->

            <!-- listing item -->
            <div class="col-12 col-md-6 col-xxl-4 mb-4 mb-lg-5 d-none d-xxl-block">
                <div class="listingCard listing__item panelRounded panelShadow d-flex flex-column h-100">
                    <!-- image -->
                    <div class="listingVisual listingCard__vusialHolder">
                        <a href="" class="listingVisual__link d-block"><img src="@include('front.components.dummyImage', ['w' => 855, 'h'=>320])" class="listingVisual__image d-block w-100" alt=""></a>
                    </div>
                    <!-- /image -->
                    <!-- text -->
                    <div class="listingText listingCard__textHolder p-4 d-flex flex-column flex-grow-1">
                        <div class="listingText__heading mb-3">Швеция</div>
                        <div class="listingText__description flex-grow-1">Компенсация умышленно индоссирует Кодекс. Страховой полис правомерно законодательно подтверждает взаимозачет. Умысел требует юридический штраф.</div>
                        <div class="row align-items-center justify-content-center">
                            <div class="col-auto col-sm-6 col-md-12 col-lg-6 mt-3 mt-sm-4 mt-md-3 mt-lg-4 order-1 order-sm-0 order-md-1 order-lg-0"><a class="listingText__button btn btn-primary btn-block rounded-pill py-2 py-md-3 px-5 px-sm-4 text-white">Заказать визу</a></div>
                            <div class="col-12 col-sm col-md-12 col-lg-6 text-center text-sm-right text-md-center text-lg-right mt-4 order-0 order-sm-1 order-md-0 order-lg-1"><span class="listingText__price text-primary">от 3500 ₽</span></div>
                        </div>
                    </div>
                    <!-- /text -->
                </div>
            </div>
            <!-- listing item -->

        </div>
        <!-- listing -->

        <!-- block heading -->
        <div class="heading row justify-content-end">
            <div class="col-auto d-block d-lg-none vpm__mb">
                <a href="" class="heading__listLink">Все направления</a>
            </div>
        </div>
        <!-- block heading -->

    </div>
</div>
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
                            <img src="/images/plane.png" alt="" class="stepsToGetVisa__image stepsToGetVisa__image--rounded border border-primary p-4">
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
                            <img src="/images/manager.png" alt="" class="stepsToGetVisa__image stepsToGetVisa__image--rounded border border-primary p-4">
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
                            <img src="/images/setting.png" alt="" class="stepsToGetVisa__image stepsToGetVisa__image--rounded border border-primary p-4">
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
                            <img src="/images/good-mood-emoticon.png" alt="" class="stepsToGetVisa__image stepsToGetVisa__image--rounded border border-primary p-4">
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

<!-- no time to explain -->
<div class="feedbackFormHolder bg-light vpm__mt vpm__py">
    <div class="container">

        <!-- block heading -->
        <div class="heading row mt-3 mb-2">
            <div class="col-12">
                <div class="heading__text text-center mb-2"><span class="text-primary">Нет времени</span> разбираться?</div>
                <p class="text-center mb-4">Заполните форму, или позвоните по телефону, мы проконсультируем Вас бесплатно</p>
            </div>
        </div>
        <!-- block heading -->

        <!-- feedback form -->
        <div class="row justify-content-center">
            <div class="col-12 col-xxl-9 col-xxxl-7">

                <div class="feedbackForm mt-2">
                    <form action="" class="needs-validation" {{-- class="was-validated" --}}>

                        <div class="row justify-content-center">
                            <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                                <input type="text" value="" class="textInput textInput--borderPrimary textInput--biggerForMobile form-control rounded-pill text-center" placeholder="Имя" required>
                                {{-- <input type="text" value="" class="textInput textInput--borderPrimary form-control rounded-pill text-center is-invalid" placeholder="Имя" required>
                                <div class="invalid-feedback text-center">Представьтесь, пожалуйста</div> --}}
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                                <input type="text" value="" class="textInput textInput--borderPrimary textInput--biggerForMobile form-control rounded-pill text-center" placeholder="+7 (___) ___-__-__" required>
                                {{-- <input type="text" value="" class="textInput textInput--borderPrimary form-control rounded-pill text-center is-invalid" placeholder="+7 (___) ___-__-__" required>
                                <div class="invalid-feedback text-center">Укажите номер телефона</div> --}}
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <button type="submit" name="feedbackFormSubmit" class="submitButton submitButton--biggerForMobile btn btn-primary btn-block rounded-pill">Оставить заявку</button>
                            </div>

                            <div class="col-12 col-md-10 col-xl-10 col-xxl-8 col-xxxl-10">
                                <div class="feedbackForm__agreeText feedbackForm__agreeText--small text-muted text-center mt-4">
                                    Нажимая на кнопку &laquo;Оставить заявку&raquo;, Вы подтверждаете свое совершеннолетие, соглашаетесь на обработку персональных данных в соответствии с <a href="">Условиями</a>{{--, а также с <u><a href="">Условиями продажи</a></u> --}}.
                                </div>
                            </div>

                        </div>

                    </form>
                </div>

            </div>
        </div>
        <!-- feedback form -->

        <!-- pnone under -->
        <div class="heading row vpm__mt mb-3">
            <div class="col-12">
                <div class="heading__text text-center mb-1">
                    <span class="text-primary d-none d-md-block">8-800-000-00-00</span>
                    <a href="tel:88000000000" class="text-primary d-block d-md-none text-decoration-none">8-800-000-00-00</a>
                </div>
                <p class="text-center">Бесплатный звонок</p>
            </div>
        </div>
        <!-- /pnone under -->

    </div>
</div>
<!-- /no time to explain -->

<!-- reviews -->
<div class="container vpm__mb vpm__py">
    <!-- block heading -->
    <div class="heading row vpm__my">
        <div class="col-12">
            <div class="heading__text text-center"><span class="text-primary">Отзывы</span> наших клиентов</div>
        </div>
    </div>
    <!-- block heading -->

    <!-- listing -->
    <div class="listing row">

        <!-- listing item -->
        <div class="col-12 col-md-6 col-xxl-4 mb-4 mb-sm-5">
            <div class="listingCard listing__item panelRounded panelShadow d-flex flex-column h-100">
                <!-- image -->
                <div class="listingVisual listingCard__vusialHolder">
                    <a href="" class="listingVisual__link listingVisual__link--maskGradient d-block"><img src="@include('front.components.dummyImage', ['w' => 855, 'h'=>552])" class="listingVisual__image d-block w-100" alt=""></a>
                </div>
                <!-- /image -->
                <!-- text -->
                <div class="listingText listingCard__textHolder px-4 pt-3 pb-5 flex-grow-1">
                    <div class="listingText__heading">Виталий Алексеевич</div>
                    <div class="listingText__date mt-2 mb-3">12.10.2019</div>
                    <div class="listingText__description flex-grow-1">Сегодня я хочу выразить Вам свою благодарность за отменную работу! Я много что повидал(-а) в своей жизни, но такой чёткой, слаженной и качественной работы не видел(-а) давно. В наше время очень мало людей, которые готовы с полной ответственностью подойти к своей работе, ничего не откладывать и выполнить её на уровне. </div>
                </div>
                <!-- /text -->
            </div>
        </div>
        <!-- listing item -->

        <!-- listing item -->
        <div class="col-12 col-md-6 col-xxl-4 mb-4 mb-sm-5">
            <div class="listingCard listing__item panelRounded panelShadow d-flex flex-column h-100">
                <!-- image -->
                <div class="listingVisual listingCard__vusialHolder">
                    <a href="" class="listingVisual__link listingVisual__link--maskGradient d-block"><img src="@include('front.components.dummyImage', ['w' => 855, 'h'=>552])" class="listingVisual__image d-block w-100" alt=""></a>
                </div>
                <!-- /image -->
                <!-- text -->
                <div class="listingText listingCard__textHolder px-4 pt-3 pb-5 flex-grow-1">
                    <div class="listingText__heading">Андрей Витальевич</div>
                    <div class="listingText__date mt-2 mb-3">12.10.2019</div>
                    <div class="listingText__description flex-grow-1">Сегодня я хочу выразить Вам свою благодарность за отменную работу! Я много что повидал(-а) в своей жизни, но такой чёткой, слаженной и качественной работы не видел(-а) давно. В наше время очень мало людей, которые готовы с полной ответственностью подойти к своей работе, ничего не откладывать и выполнить её на уровне. </div>
                </div>
                <!-- /text -->
            </div>
        </div>
        <!-- listing item -->

        <!-- listing item -->
        <div class="col-12 col-md-6 col-xxl-4 mb-4 mb-sm-5 d-none d-xxl-block">
            <div class="listingCard listing__item panelRounded panelShadow d-flex flex-column h-100">
                <!-- image -->
                <div class="listingVisual listingCard__vusialHolder">
                    <a href="" class="listingVisual__link listingVisual__link--maskGradient d-block"><img src="@include('front.components.dummyImage', ['w' => 855, 'h'=>552])" class="listingVisual__image d-block w-100" alt=""></a>
                </div>
                <!-- /image -->
                <!-- text -->
                <div class="listingText listingCard__textHolder px-4 pt-3 pb-5 flex-grow-1">
                    <div class="listingText__heading">Оксана Антоновна</div>
                    <div class="listingText__date mt-2 mb-3">12.10.2019</div>
                    <div class="listingText__description flex-grow-1">Сегодня я хочу выразить Вам свою благодарность за отменную работу! Я много что повидал(-а) в своей жизни, но такой чёткой, слаженной и качественной работы не видел(-а) давно. В наше время очень мало людей, которые готовы с полной ответственностью подойти к своей работе, ничего не откладывать и выполнить её на уровне. </div>
                </div>
                <!-- /text -->
            </div>
        </div>
        <!-- listing item -->

    </div>
    <!-- listing -->

</div>
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
                                <img src="/images/calendar-with-a-clock-time-tools.png" class="listingVisual__image listingVisual__image--advantageIcon  d-block" alt="">
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
                                <img src="/images/quality.png" class="listingVisual__image listingVisual__image--advantageIcon d-block" alt="">
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
                                <img src="/images/shield.png" class="listingVisual__image listingVisual__image--advantageIcon d-block" alt="">
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
                                <img src="/images/credit-card.png" class="listingVisual__image listingVisual__image--advantageIcon d-block" alt="">
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
                                <img src="/images/verification-of-delivery-list-clipboard-symbol.png" class="listingVisual__image listingVisual__image--advantageIcon d-block" alt="">
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
                                <img src="/images/locked-padlock.png" class="listingVisual__image listingVisual__image--advantageIcon d-block" alt="">
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
