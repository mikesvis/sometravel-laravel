@extends('front.layouts.inner')

@section('content')

    @include('front.components.breadcrumbs')

    @include('front.components.page-heading', ['heading' => 'Купить франшизу'])

    <div class="container vpm__mb vpm__pb">
        <div class="row">
            <div class="col-12">

                <div class="row">

                    <div class="col-12 col-xl-7 col-xxl-6">

                        <h3>Почему лучше купить франшизу, чем начинать новый бизнес?</h3>
                        <p class="mt-4">В Петербурге есть Генеральное консульство Финляндии, в котором можно получить визу, заплатив лишь визовый сбор. Звучит слишком хорошо, правда? Проблема с генконсульством в том, что в него почти невозможно попасть — запись открывается заранее и свободное время занимают быстрее, чем места в автозаке на митинге.</p>

                        <p>Поэтому есть второй вариант — подать документы в Визовом Центре Финляндии. Здесь вам придется заплатить 26,75 евро (если вы не ребенок до шести лет, их заявления обрабатываются бесплатно). Из бонусов — возможность сделать фотографию прямо перед подачей визы (за 100 рублей), удобная электронная очередь и милые работники, которым можно задавать беспокоящие вас вопросы (которые касаются визы).</p>

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

    @include('front.components.forms.visa-question',
                [
                    'heading' => '<span class="text-primary">Как купить</span> франшизу?',
                    'subHeading' => 'Оставьте заявку и мы расскажем о предложении'
                ]
            )

    <div class="container vpm__my vpm__pt">

        <!-- block heading -->
        <div class="heading row vpm__mb justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-12">
                <div class="heading__text text-center">Состав франчайзингового пакета</div>
            </div>
        </div>
        <!-- block heading -->

        <div class="row listing justify-content-center">

            <!-- listing item -->
            <div class="col-10 col-sm-6 col-md-6 col-lg-4 col-xxl-2 col-xxxl-2 mb-4">
                <div class="listingCard listing__item panelShadow panelRounded bg-primary d-flex flex-column h-100">
                    <!-- image -->
                    <div class="listingVisual listingCard__vusialHolder text-center pt-5 pt-xl-5">
                        <img src="/images/passport.png" class="listingVisual__image listingVisual__image--packetIcon" alt="">
                    </div>
                    <!-- /image -->
                    <!-- text -->
                    <div class="listingText listingCard__textHolder px-4 py-2 flex-grow-1 d-flex align-items-center">
                        <div class="listingText__text text-center my-3 flex-fill text-white">Предоставление всех материалов по оформлению виз</div>
                    </div>
                    <!-- /text -->
                </div>
            </div>
            <!-- /listing item -->

            <!-- listing item -->
            <div class="col-10 col-sm-6 col-md-6 col-lg-4 col-xxl-2 col-xxxl-2 mb-4">
                <div class="listingCard listing__item panelShadow panelRounded bg-primary d-flex flex-column h-100">
                    <!-- image -->
                    <div class="listingVisual listingCard__vusialHolder text-center pt-5 pt-xl-5">
                        <img src="/images/network.png" class="listingVisual__image listingVisual__image--packetIcon" alt="">
                    </div>
                    <!-- /image -->
                    <!-- text -->
                    <div class="listingText listingCard__textHolder px-4 py-2 flex-grow-1 d-flex align-items-center">
                        <div class="listingText__text text-center my-3 flex-fill text-white">Организация гарантированного потока клиентов</div>
                    </div>
                    <!-- /text -->
                </div>
            </div>
            <!-- /listing item -->

            <!-- listing item -->
            <div class="col-10 col-sm-6 col-md-6 col-lg-4 col-xxl-2 col-xxxl-2 mb-4">
                <div class="listingCard listing__item panelShadow panelRounded bg-primary d-flex flex-column h-100">
                    <!-- image -->
                    <div class="listingVisual listingCard__vusialHolder text-center pt-5 pt-xl-5">
                        <img src="/images/work-team.png" class="listingVisual__image listingVisual__image--packetIcon" alt="">
                    </div>
                    <!-- /image -->
                    <!-- text -->
                    <div class="listingText listingCard__textHolder px-4 py-2 flex-grow-1 d-flex align-items-center">
                        <div class="listingText__text text-center my-3 flex-fill text-white">Персональный менеджер</div>
                    </div>
                    <!-- /text -->
                </div>
            </div>
            <!-- /listing item -->

            <!-- listing item -->
            <div class="col-10 col-sm-6 col-md-6 col-lg-4 col-xxl-2 col-xxxl-2 mb-4">
                <div class="listingCard listing__item panelShadow panelRounded bg-primary d-flex flex-column h-100">
                    <!-- image -->
                    <div class="listingVisual listingCard__vusialHolder text-center pt-5 pt-xl-5">
                        <img src="/images/seo.png" class="listingVisual__image listingVisual__image--packetIcon" alt="">
                    </div>
                    <!-- /image -->
                    <!-- text -->
                    <div class="listingText listingCard__textHolder px-4 py-2 flex-grow-1 d-flex align-items-center">
                        <div class="listingText__text text-center my-3 flex-fill text-white">Настройка рекламы</div>
                    </div>
                    <!-- /text -->
                </div>
            </div>
            <!-- /listing item -->

            <!-- listing item -->
            <div class="col-10 col-sm-6 col-md-6 col-lg-4 col-xxl-2 col-xxxl-2 mb-4">
                <div class="listingCard listing__item panelShadow panelRounded bg-primary d-flex flex-column h-100">
                    <!-- image -->
                    <div class="listingVisual listingCard__vusialHolder text-center pt-5 pt-xl-5">
                        <img src="/images/web-site.png" class="listingVisual__image listingVisual__image--packetIcon" alt="">
                    </div>
                    <!-- /image -->
                    <!-- text -->
                    <div class="listingText listingCard__textHolder px-4 py-2 flex-grow-1 d-flex align-items-center">
                        <div class="listingText__text text-center my-3 flex-fill text-white">Размежение контактов на федеральном сайте</div>
                    </div>
                    <!-- /text -->
                </div>
            </div>
            <!-- /listing item -->

            <!-- listing item -->
            <div class="col-10 col-sm-6 col-md-6 col-lg-4 col-xxl-2 col-xxxl-2 mb-4">
                <div class="listingCard listing__item panelShadow panelRounded bg-primary d-flex flex-column h-100">
                    <!-- image -->
                    <div class="listingVisual listingCard__vusialHolder text-center pt-5 pt-xl-5">
                        <img src="/images/team.png" class="listingVisual__image listingVisual__image--packetIcon" alt="">
                    </div>
                    <!-- /image -->
                    <!-- text -->
                    <div class="listingText listingCard__textHolder px-4 py-2 flex-grow-1 d-flex align-items-center">
                        <div class="listingText__text text-center my-3 flex-fill text-white">Помощь с поиском персонала</div>
                    </div>
                    <!-- /text -->
                </div>
            </div>
            <!-- /listing item -->

        </div>

        <div class="row vpm__my justify-content-center">
            <div class="col-10 col-sm-12 col-md-10 col-lg-8 col-xl-7 col-xxl-7 col-xxxl-6">
                <a href="" class="btn btn-primary btn-block rounded-pill"><span class="h3 font-weight-normal">Получить персональное предложение</span></a>
            </div>
        </div>

    </div>

    <div class="container vpm__mb vpm__py">

        <div class="row align-items-center vpm__mb vpm__pb">

            <div class="col-12 col-xl-7 col-xxl-7 col-xxxl-6">
                <h3>Почему лучше купить франшизу, чем начинать новый бизнес?</h3>
                <p class="mt-4">В Петербурге есть Генеральное консульство Финляндии, в котором можно получить визу, заплатив лишь визовый сбор. Звучит слишком хорошо, правда? Проблема с генконсульством в том, что в него почти невозможно попасть — запись открывается заранее и свободное время занимают быстрее, чем места в автозаке на митинге.</p>

                <p>Поэтому есть второй вариант — подать документы в Визовом Центре Финляндии. Здесь вам придется заплатить 26,75 евро (если вы не ребенок до шести лет, их заявления обрабатываются бесплатно). Из бонусов — возможность сделать фотографию прямо перед подачей визы (за 100 рублей), удобная электронная очередь и милые работники, которым можно задавать беспокоящие вас вопросы (которые касаются визы).</p>
            </div>

            <div class="col-12 col-xl-5 col-xxl-5 col-xxxl-6 align-self-start">
                <img src="@include('front.components.dummyImage', ['w' => 855, 'h'=>458])" class="w-100 panelRounded panelShadow" alt="">
            </div>

        </div>

        <div class="row align-items-center vpm__mb vpm__pb">

            <div class="col-12 col-xl-5 col-xxl-5 col-xxxl-6 align-self-start order-1 order-xl-0">
                <img src="@include('front.components.dummyImage', ['w' => 855, 'h'=>458])" class="w-100 panelRounded panelShadow" alt="">
            </div>

            <div class="col-12 col-xl-7 col-xxl-7 col-xxxl-6 order-0 order-xl-1">
                <h3>Почему лучше купить франшизу, чем начинать новый бизнес?</h3>
                <p class="mt-4">В Петербурге есть Генеральное консульство Финляндии, в котором можно получить визу, заплатив лишь визовый сбор. Звучит слишком хорошо, правда? Проблема с генконсульством в том, что в него почти невозможно попасть — запись открывается заранее и свободное время занимают быстрее, чем места в автозаке на митинге.</p>

                <p>Поэтому есть второй вариант — подать документы в Визовом Центре Финляндии. Здесь вам придется заплатить 26,75 евро (если вы не ребенок до шести лет, их заявления обрабатываются бесплатно). Из бонусов — возможность сделать фотографию прямо перед подачей визы (за 100 рублей), удобная электронная очередь и милые работники, которым можно задавать беспокоящие вас вопросы (которые касаются визы).</p>
            </div>

        </div>

        <div class="row align-items-center vpm__mb">

            <div class="col-12 col-xl-7 col-xxl-7 col-xxxl-6">
                <h3>Почему лучше купить франшизу, чем начинать новый бизнес?</h3>
                <p class="mt-4">В Петербурге есть Генеральное консульство Финляндии, в котором можно получить визу, заплатив лишь визовый сбор. Звучит слишком хорошо, правда? Проблема с генконсульством в том, что в него почти невозможно попасть — запись открывается заранее и свободное время занимают быстрее, чем места в автозаке на митинге.</p>

                <p>Поэтому есть второй вариант — подать документы в Визовом Центре Финляндии. Здесь вам придется заплатить 26,75 евро (если вы не ребенок до шести лет, их заявления обрабатываются бесплатно). Из бонусов — возможность сделать фотографию прямо перед подачей визы (за 100 рублей), удобная электронная очередь и милые работники, которым можно задавать беспокоящие вас вопросы (которые касаются визы).</p>
            </div>

            <div class="col-12 col-xl-5 col-xxl-5 col-xxxl-6 align-self-start">
                <img src="@include('front.components.dummyImage', ['w' => 855, 'h'=>458])" class="w-100 panelRounded panelShadow" alt="">
            </div>

        </div>

    </div>


    {{-- @include('front.components.listings.directions') --}}

    {{-- @include('front.components.listings.news') --}}


    <!-- plans -->
    <div class="container vpm__pb">
        <!-- block heading -->
        <div class="heading row vpm__my">
            <div class="col-12">
                <div class="heading__text text-center">Форматы сотрудничества</div>
            </div>
        </div>
        <!-- block heading -->

        <!-- listing -->
        <div class="listing row justify-content-center">

            <!-- listing item -->
            <div class="col-12 col-md-6 col-xl-4 col-xxl-3 mb-4 mb-sm-5">
                <div class="listingCard listing__item panelRounded panelShadow h-100">
                    <!-- text -->
                    <div class="listingText listingCard__textHolder px-4 py-5 h-100 d-flex flex-column">
                        <div class="listingText__heading">Малый пакет</div>
                        <div class="listingText__description flex-grow-1 mt-4">
                            <p>Далеко-далеко за, словесными горами в стране гласных и согласных живут рыбные тексты.</p>
                            <p>Далеко-далеко за, словесными горами в стране гласных и согласных живут рыбные тексты.</p>
                            <p>Далеко-далеко за, словесными горами в стране гласных и согласных живут рыбные тексты.</p>
                            <p>Далеко-далеко за, словесными горами в стране гласных и согласных живут рыбные тексты.</p>
                        </div>
                        <div class="listingText__price text-center mt-4"><strong>150000 ₽</strong></div>
                        <div class="text-center mt-4"><a href="" class="listingText__button listingText__button--franchise btn btn-primary rounded-pill px-4">Оставить заявку</a></div>
                    </div>
                    <!-- /text -->
                </div>
            </div>
            <!-- listing item -->

            <!-- listing item -->
            <div class="col-12 col-md-6 col-xl-4 col-xxl-3 mb-4 mb-sm-5">
                <div class="listingCard listing__item panelRounded panelShadow h-100">
                    <!-- text -->
                    <div class="listingText listingCard__textHolder px-4 py-5 h-100 d-flex flex-column">
                        <div class="listingText__heading">Средний пакет</div>
                        <div class="listingText__description flex-grow-1 mt-4">
                            <p>Далеко-далеко за, словесными горами в стране гласных и согласных живут рыбные тексты.</p>
                            <p>Далеко-далеко за, словесными горами в стране гласных и согласных живут рыбные тексты.</p>
                            <p>Далеко-далеко за, словесными горами в стране гласных и согласных живут рыбные тексты.</p>
                            <p>Далеко-далеко за, словесными горами в стране гласных и согласных живут рыбные тексты.</p>
                        </div>
                        <div class="listingText__price text-center mt-4"><strong>200000 ₽</strong></div>
                        <div class="text-center mt-4"><a href="" class="listingText__button listingText__button--franchise btn btn-primary rounded-pill px-4">Оставить заявку</a></div>
                    </div>
                    <!-- /text -->
                </div>
            </div>
            <!-- listing item -->

            <!-- listing item -->
            <div class="col-12 col-md-6 col-xl-4 col-xxl-3 mb-4 mb-sm-5">
                <div class="listingCard listing__item panelRounded panelShadow h-100">
                    <!-- text -->
                    <div class="listingText listingCard__textHolder px-4 py-5 h-100 d-flex flex-column">
                        <div class="listingText__heading">Большой пакет</div>
                        <div class="listingText__description flex-grow-1 mt-4">
                            <p>Далеко-далеко за, словесными горами в стране гласных и согласных живут рыбные тексты.</p>
                            <p>Далеко-далеко за, словесными горами в стране гласных и согласных живут рыбные тексты.</p>
                            <p>Далеко-далеко за, словесными горами в стране гласных и согласных живут рыбные тексты.</p>
                            <p>Далеко-далеко за, словесными горами в стране гласных и согласных живут рыбные тексты.</p>
                        </div>
                        <div class="listingText__price text-center mt-4"><strong>300000 ₽</strong></div>
                        <div class="text-center mt-4"><a href="" class="listingText__button listingText__button--franchise btn btn-primary rounded-pill px-4">Оставить заявку</a></div>
                    </div>
                    <!-- /text -->
                </div>
            </div>
            <!-- listing item -->

            <!-- listing item -->
            <div class="col-12 col-md-6 col-xl-4 col-xxl-3 mb-4 mb-sm-5">
                <div class="listingCard listing__item panelRounded panelShadow h-100">
                    <!-- text -->
                    <div class="listingText listingCard__textHolder px-4 py-5 h-100 d-flex flex-column">
                        <div class="listingText__heading">Санкт-Петербург и Москва</div>
                        <div class="listingText__description flex-grow-1 mt-4">
                            <p>Далеко-далеко за, словесными горами в стране гласных и согласных живут рыбные тексты.</p>
                            <p>Далеко-далеко за, словесными горами в стране гласных и согласных живут рыбные тексты.</p>
                            <p>Далеко-далеко за, словесными горами в стране гласных и согласных живут рыбные тексты.</p>
                            <p>Далеко-далеко за, словесными горами в стране гласных и согласных живут рыбные тексты.</p>
                        </div>
                        <div class="listingText__price text-center mt-4"><strong>500000 ₽</strong></div>
                        <div class="text-center mt-4"><a href="" class="listingText__button listingText__button--franchise btn btn-primary rounded-pill px-4">Оставить заявку</a></div>
                    </div>
                    <!-- /text -->
                </div>
            </div>
            <!-- listing item -->

        </div>
        <!-- listing -->

    </div>
    <!-- /plans -->


    @include('front.components.forms.visa-question',
                [
                    'heading' => '<span class="text-primary">Получите бизнес план</span> для вашего города',
                    'subHeading' => 'Оставьте заявку и мы расскажем о предложении'
                ]
            )

@endsection
