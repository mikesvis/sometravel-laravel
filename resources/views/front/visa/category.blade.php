@extends('layouts.front.index')

@section('title', $category->siteSeoTitle)
@section('keywords', $category->siteSeoKeywords)
@section('description', $category->siteSeoDescription)

@section('content')

@include('front.components.breadcrumbs', compact('breadcrumbs'))

@include('front.components.page-heading', ['heading' => $category->title])

<div class="container vpm__mb">
    <div class="row">
        <div class="col-12">

            <div class="row listing">

                @forelse ($paginator as $item)
                <!-- listing item -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-4 mb-sm-5">
                    <div class="listingCard listing__item panelRounded panelShadow h-100">
                        <a href="{{ route('front.visa.show', $item->slug) }}" class="listingVisual__link listingVisual__link--fullBlock d-flex flex-column h-100">
                            <!-- image -->
                            {{-- ['w' => 270*2, 'h'=>132*2] --}}
                            @isset($item->firstEnabledImage)
                            <div class="listingVisual listingCard__vusialHolder">
                                <img src="/timthumb.php?src={{ $item->firstEnabledImage->path }}&w=540&h=264&zc=1" class="listingVisual__image d-block w-100" alt="{{ ($item->firstEnabledImage->alt != '') ? $item->firstEnabledImage->alt : $item->firstEnabledImage->title }}">
                            </div>
                            @endisset
                            <!-- /image -->
                            <!-- text -->
                            <div class="listingText listingCard__textHolder px-4 py-4 flex-grow-1 d-flex align-items-center">
                                <div class="listingText__heading text-center my-3 flex-fill">{{ $item->title }}</div>
                            </div>
                            <!-- /text -->
                        </a>
                    </div>
                </div>
                <!-- listing item -->
                @empty
                <div class="col-12 mb-4 mb-lg-5 text-center">Направлений пока нет</div>
                @endforelse

            </div>

            <div class="text-center">
                @include('front.components.pagination', ['items'=>$paginator])
            </div>

        </div>
    </div>
</div>

@include('front.forms.inline.usual', [
    'heading' => '<span class="text-primary">У вас остались вопросы</span> по оформлению визы?',
    'subHeading' => 'Оставьте номер телефона и наши специалист вам перезвонит',
    'formId' => 'visaFilterFeedbackForm',
    'formTitle' => 'Форма обратной связи на странице с фильтром визы'
])

@include('front.visa.module.other', ['items' => $otherVisas])

@endsection
