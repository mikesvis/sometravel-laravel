@extends('layouts.front.index')

@section('title', 'Европа')

@section('content')

    @include('front.components.breadcrumbs')

    @include('front.components.page-heading', ['heading' => 'Европа'])

    <div class="container vpm__mb">
        <div class="row">
            <div class="col-12">

                <div class="row listing">

                    @php
                        $counties = ['Франция', 'Британия', 'Швеция', 'Финляндия', 'Италия', 'Голландия',
                                     'Италия', 'Голландия', 'Финляндия', 'Франция', 'Британия', 'Швеция'];
                    @endphp

                    @foreach ($counties as $item)
                        <!-- listing item -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 col-xxxl-2 mb-4 mb-sm-5">
                            <div class="listingCard listing__item panelRounded panelShadow h-100">
                                <a href="" class="listingVisual__link listingVisual__link--fullBlock d-flex flex-column h-100">
                                    <!-- image -->
                                    <div class="listingVisual listingCard__vusialHolder">
                                        <img src="@include('front.components.dummyImage', ['w' => 270*2, 'h'=>132*2])" class="listingVisual__image d-block w-100" alt="">
                                    </div>
                                    <!-- /image -->
                                    <!-- text -->
                                    <div class="listingText listingCard__textHolder px-4 py-4 flex-grow-1 d-flex align-items-center">
                                        <div class="listingText__heading text-center my-3 flex-fill">{{ $item }}</div>
                                    </div>
                                    <!-- /text -->
                                </a>
                            </div>
                        </div>
                        <!-- listing item -->
                    @endforeach

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

    @include('front.components.listings.directions')

    {{-- @include('front.components.listings.news') --}}

@endsection
