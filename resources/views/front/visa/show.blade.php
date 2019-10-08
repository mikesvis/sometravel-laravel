@extends('layouts.front.index')

@section('title', $visa->siteSeoTitle)
@section('keywords', $visa->siteSeoKeywords)
@section('description', $visa->siteSeoDescription)

@section('content')

@include('front.components.breadcrumbs', compact('breadcrumbs'))

@include('front.components.page-heading', ['heading' => 'Виза '.$visa->title_to])

<div class="container">
    <div class="row vpm vpm__pb">

        <div class="col-12 col-xl-6 col-xxl-5 col-xxxl-4">
            {{-- ['w' => 855, 'h'=>458] --}}
            <span><img src="/timthumb.php?src={{ $visa->firstEnabledImage->path }}&w=855&h=458&zc=1" class="w-100 panelRounded panelShadow" alt="{{ ($visa->firstEnabledImage->alt != '') ? $visa->firstEnabledImage->alt : $visa->title }}"></span>
        </div>

        <div class="col-12 col-xl-6 col-xxl-7 col-xxxl-8 mt-4 mt-md-5 mt-xl-0">

            {!! $visa->content !!}

            @if ($visa->getPrice() > 0)
                <div class="h3 vpm__mt"><strong>Стоимость визы от {{ $visa->getPrice() }} ₽</strong></div>
            @endif

        </div>

    </div>
</div>

<div id="calculator"></div>

<div class="visaCalcWrapper bg-light vpm__mt vpm__py">

    <form action="">

        <!-- block heading -->
        <div class="container">
            <div class="heading row mt-3 mb-2 justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-12">
                    <div class="heading__text text-center"><span class="text-primary">Расчёт стоимости</span> визы {{ $visa->title_to }}</div>
                </div>
            </div>
        </div>
        <!-- block heading -->

        <div class="visaCalcForm border-bottom vpm__pb">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-10 col-sm-12 col-lg-6 col-xl-7 col-xxl-6 col-xxxl-6">

                        <div class="row align-items-center vpm__mt">
                            <div class="col-12 col-xxl-7 col-xxxl-6">
                                <label for="" class="h2 visaCalcForm__label mb-0">Количество персон</label>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-6 col-xl-5 col-xxl-5 col-xxxl-4 mt-2 mt-xl-3 mt-xxl-0">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-primary btn--rounded px-4" onclick="return false"><em class="fas fa-minus"></em></button>
                                    </div>
                                    <input type="text" class="textInput--quantity form-control border-primary text-center" value="0" placeholder="Кол-во">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary btn--rounded px-4" onclick="return false"><em class="fas fa-plus"></em></button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row align-items-center vpm__mt">
                            <div class="col-12 col-xxl-7 col-xxxl-6">
                                <label for="" class="h4 mb-0 font-weight-normal">Биометрия за последние 5 лет</label>
                            </div>
                            <div class="col-12 col-xxl-5 col-xxxl-5 mt-2 mt-xl-3 mt-xxl-0">
                                <div class="radioButtons row">
                                    <div class="col-12 col-sm-6 col-xl-5 col-xxl-6 col-xxxl-6">
                                        <div class="radioButtons__item">
                                            <input type="radio" name="rad1" id="r11" class="d-none" value="1" />
                                            <label for="r11" class="radioButtons__label btn btn-outline-primary px-0 border border-primary mb-0">Сдана</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-xl-5 col-xxl-6 col-xxxl-6 mt-2 mt-sm-0">
                                        <div class="radioButtons__item">
                                            <input type="radio" name="rad1" id="r12" class="d-none" value="2" />
                                            <label for="r12" class="radioButtons__label btn btn-outline-primary px-0 border border-primary mb-0">Не сдана</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-10 col-sm-12 col-lg-6 col-xl-5 col-xxl-6 col-xxxl-6">

                        <div class="row align-items-center vpm__mt">
                            <div class="col-12 col-xxl-5 col-xxxl-4 text-xxl-right">
                                <label for="" class="h4 mb-0 font-weight-normal">Срок оформления</label>
                            </div>
                            <div class="col-12 col-lg-12 col-xl-12 col-xxl-7 col-xxxl-8 mt-2 mt-xl-3 mt-xxl-0">
                                <div class="radioButtons row">
                                    <div class="col-12 col-sm-6 col-xl-6 col-xxl-6 col-xxxl-6">
                                        <div class="radioButtons__item">
                                            <input type="radio" name="rad2" id="r21" class="d-none" value="1" />
                                            <label for="r21" class="radioButtons__label btn btn-outline-primary border border-primary mb-0">Срочно</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-xxl-6 col-xxxl-6 mt-2 mt-sm-0">
                                        <div class="radioButtons__item">
                                            <input type="radio" name="rad2" id="r22" class="d-none" value="2" />
                                            <label for="r22" class="radioButtons__label btn btn-outline-primary border border-primary mb-0">Стандарт</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-center vpm__mt">
                            <div class="col-12 col-xxl-5 col-xxxl-4 text-xxl-right">
                                <label for="" class="h4 mb-0 font-weight-normal">Доставка</label>
                            </div>
                            <div class="col-12 col-xxl-7 col-xxxl-8 mt-2 mt-xl-3 mt-xxl-0">
                                <div class="radioButtons row">
                                    <div class="col-12 col-sm-6 col-xxl-6 col-xxxl-6">
                                        <div class="radioButtons__item">
                                            <input type="radio" name="rad3" id="r31" class="d-none" value="1" />
                                            <label for="r31" class="radioButtons__label btn btn-outline-primary border border-primary mb-0">С доставкой</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-xxl-6 col-xxxl-6 mt-2 mt-sm-0">
                                        <div class="radioButtons__item">
                                            <input type="radio" name="rad3" id="r32" class="d-none" value="2" />
                                            <label for="r32" class="radioButtons__label btn btn-outline-primary border border-primary mb-0">Самовывоз</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="visaCalcForm vpm__mb">
            <div class="container">
                <div class="row align-items-end align-items-xxl-center justify-content-center">


                    <div class="col-10 col-sm-12 col-lg-6 col-xl-5 col-xxl-6 col-xxxl-6">

                        <div class="row align-items-center vpm__mt">
                            <div class="col-12 col-xxl-3 col-xxxl-3">
                                <label for="" class="h4 mb-0 font-weight-normal">Тип подачи</label>
                            </div>
                            <div class="col-12 col-xxl-9 col-xxxl-8 mt-2 mt-xl-3 mt-xxl-0">
                                <div class="radioButtons row">
                                    <div class="col-12 col-sm-6 col-xxl-6 col-xxxl-6">
                                        <div class="radioButtons__item">
                                            <input type="radio" name="rad4" id="r41" class="d-none" value="1" />
                                            <label for="r41" class="radioButtons__label btn btn-outline-primary border border-primary mb-0">Личная</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-xxl-6 col-xxxl-6 mt-2 mt-sm-0">
                                        <div class="radioButtons__item">
                                            <input type="radio" name="rad4" id="r42" class="d-none" value="2" />
                                            <label for="r42" class="radioButtons__label btn btn-outline-primary border border-primary mb-0">Без присутствия</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-10 col-sm-12 col-lg-6 col-xl-7 col-xxl-6 col-xxxl-6">

                        <div class="row align-items-center vpm__mt">
                            <div class="col-12 col-xl-4 col-xxl-5 col-xxxl-4 text-center text-lg-right">
                                <div class="h1 mb-3 mb-lg-0 mt-3 mt-lg-0"><strong>0 ₽</strong></div>
                            </div>
                            <div class="col-12 col-xl-8 col-xxl-7 col-xxxl">
                                <div class="radioButtons row justify-content-center">
                                    <div class="col-12 col-sm-6 col-xxl-6 col-xxxl-6">
                                        <button type="submit" name="submit-1" class="btn btn-primary rounded-pill btn-block"><strong>Оформить онлайн</strong></button>
                                    </div>
                                    <div class="col-12 col-sm-6 col-xxl-6 col-xxxl-6 mt-3 mt-sm-0">
                                        <span class="btn btn-outline-primary bg-white text-primary rounded-pill btn-block cursor-pointer"><strong>Оформить в офисе</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>


    </form>
</div>


<div class="container vpm__mt vpm__pt">
    <div class="row">
        @if (!empty($visa->documents))
            <div class="col-12 col-xl">
                {!! $visa->documents_text !!}
            </div>
            <div class="col-12 col-xl-3 col-xxl-7 col-xxxl-8 mt-4 mt-xl-0">
                <div class="row justify-content-end">
                @foreach ($visa->documents as $document)
                    <div class="col-6 col-sm-4 col-md-3 col-xl-6 col-xxl-3 col-xxxl-3 mb-4">
                        <span class="d-block"><img src="{{ $document->path }}" class="w-100 panelRounded panelShadow" alt="{{ ($document->alt != '') ? $document->alt : $document->title }}"></span>
                    </div>
                @endforeach
                </div>
            </div>
        @else
            <div class="col-12">
                {!! $visa->documents_text !!}
            </div>
        @endif
    </div>
</div>

<div class="container vpm__my vpm__pt">

    <!-- block heading -->
    <div class="heading row vpm__mb justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 col-xl-12">
            <div class="heading__text text-center"><span class="text-primary">Способы</span> оформления</div>
        </div>
    </div>
    <!-- block heading -->

    <!-- listing -->
    <div class="listing row justify-content-center">

        <!-- listing item -->
        <div class="col-12 col-md-6 col-xxl-4 mb-4 mb-lg-5">
            <div class="listingCard listing__item panelRounded panelShadow d-flex flex-column h-100">
                <!-- image -->
                <div class="listingVisual listingCard__vusialHolder text-center p-2 pt-5 p-xl-4 pt-xl-5">
                    <img src="/images/building.png" class="listingVisual__image listingVisual__image--waysIcon" alt="Оформить визу в офисе визового центра">
                </div>
                <!-- /image -->
                <!-- text -->
                <div class="listingText listingCard__textHolder p-4 pb-5 d-flex flex-column flex-grow-1">
                    <div class="listingText__heading mb-3">В офисе визового центра</div>
                    <div class="listingText__description flex-grow-1 mb-5">Вы можете оформить визу в нашщем офисе по адресу: Улица, город, дом 18</div>
                    <div class="listingText__buttonWrapper text-center">
                        <span class="listingText__button btn btn-primary rounded-pill py-3 px-5 text-white cursor-pointer"><span class="px-5">Оформить</span></span>
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
                <div class="listingVisual listingCard__vusialHolder text-center p-2 pt-5 p-xl-4 pt-xl-5">
                    <img src="/images/pc.png" class="listingVisual__image listingVisual__image--waysIcon" alt="Оформить визу онлайн">
                </div>
                <!-- /image -->
                <!-- text -->
                <div class="listingText listingCard__textHolder p-4 pb-5 d-flex flex-column flex-grow-1">
                    <div class="listingText__heading mb-3">Онлайн</div>
                    <div class="listingText__description flex-grow-1 mb-5">Вы можете оформить визу онлайн, а затем получить её курьером лично в руки</div>
                    <div class="listingText__buttonWrapper text-center">
                        <a href="#calculator" class="listingText__button btn btn-primary rounded-pill py-3 px-5 text-white"><span class="px-5">Оформить</span></a>
                    </div>
                </div>
                <!-- /text -->
            </div>
        </div>
        <!-- listing item -->

    </div>

</div>

@include('front.components.forms.visa-question',
    [
        'heading' => '<span class="text-primary">У вас остались вопросы</span> по оформлению визы?',
        'subHeading' => 'Оставьте номер телефона и наши специалист вам перезвонит'
    ]
)

@include('front.visa.module.other', ['items' => $otherVisas])

@endsection
