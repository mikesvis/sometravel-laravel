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

    <form action="{{ route('front.visa.checkout', $visa->slug) }}" method="POST" id="calculatorForm">

        @csrf

        <input type="hidden" name="visa_id" value="{{ $visa->id }}">

        <!-- block heading -->
        <div class="container">
            <div class="heading row mt-3 mb-2 justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-12">
                    <div class="heading__text text-center"><span class="text-primary">Расчёт стоимости</span> визы {{ $visa->title_to }}</div>
                </div>
            </div>
        </div>
        <!-- block heading -->

        {!! $calculator !!}

    </form>
</div>


<div class="container vpm__mt vpm__pt">
    <div class="row">
        @if (!empty($visa->documents))
            <div class="col-12 col-xl">
                {!! $visa->documents_text !!}
            </div>
            <div class="col-12 col-xl-6 col-xxl-7 col-xxxl-8 mt-4 mt-xl-0">
                <div class="row justify-content-center justify-content-xl-end">
                @foreach ($visa->documents as $document)
                    <div class="col-6 col-sm-4 col-md-3 col-xl-3 col-xxl-3 col-xxxl-3 mb-4">
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
