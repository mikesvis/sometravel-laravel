@extends('layouts.front.index')

@section('title', 'Новости')

@section('content')

    @include('front.components.breadcrumbs')

    @include('front.components.page-heading', ['heading' => 'Новости'])

    <div class="container vpm__mb">
        <div class="row">
            <div class="col-12">

                <div class="row listing">

                    @for ($i = 0; $i < 12; $i++)
                        <!-- listing item -->
                            <div class="col-12 col-md-6 col-xxl-4 col-xxxl-3 mb-4 mb-lg-5">
                                <div class="listingCard listing__item panelRounded panelShadow d-flex flex-column h-100">
                                    <!-- image -->
                                    <div class="listingVisual listingCard__vusialHolder">
                                        <a href="" class="listingVisual__link d-block"><img src="@include('front.components.dummyImage', ['w' => 855, 'h'=>320])" class="listingVisual__image d-block w-100" alt=""></a>
                                    </div>
                                    <!-- /image -->
                                    <!-- text -->
                                    <div class="listingText listingCard__textHolder p-4 d-flex flex-column flex-grow-1">
                                        <div class="listingText__heading">Франция</div>
                                        <div class="listingText__date mt-2 mb-3">12.10.2019</div>
                                        <div class="listingText__description flex-grow-1">Компенсация умышленно индоссирует Кодекс. Страховой полис правомерно законодательно подтверждает взаимозачет. Умысел требует юридический штраф.</div>
                                        <div class="mt-4">
                                            <a href="" class="listingText__moreLink listingText__moreLink--smaller">Подробнее</a>
                                        </div>
                                    </div>
                                    <!-- /text -->
                                </div>
                            </div>
                        <!-- listing item -->
                    @endfor


                </div>

            </div>
        </div>
    </div>

    @include('front.components.forms.visa-question',
                [
                    'heading' => '<span class="text-primary">У вас остались вопросы</span> по оформлению визы?',
                    'subHeading' => 'Оставьте номер телефона и наши специалист вам перезвонит'
                ]
            )

    @include('front.components.listings.directions', compact('otherVisas'))

    {{-- @include('front.components.listings.news') --}}

@endsection
