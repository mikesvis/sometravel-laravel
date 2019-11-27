@extends('layouts.front.index')

@section('title', 'Новости')
@section('keywords', 'Новости')
@section('description', 'Новости')

@section('content')

@include('front.components.breadcrumbs', ['breadcrumbs' => $breadcrumbs ?? null])

@include('front.components.page-heading', ['heading' => 'Новости'])

<div class="container vpm__mb">
    <div class="row">
        <div class="col-12">

            <div class="row listing">

                @forelse ($paginator as $item)
                <div class="col-12 col-md-6 col-xxl-4 col-xxxl-3 mb-4 mb-lg-5">
                    <div class="listingCard listing__item panelRounded panelShadow d-flex flex-column h-100">
                        <!-- image -->
                        <div class="listingVisual listingCard__vusialHolder">
                            @isset($item->firstEnabledImage)
                            <a href="{{ route('front.news.show', $item->slug) }}" class="listingVisual__link d-block">
                                {{-- ['w' => 855, 'h'=>320] --}}
                                <img src="/timthumb.php?src={{ $item->firstEnabledImage->path }}&w=855&h=320&zc=1" class="listingVisual__image d-block w-100" alt="{{ ($item->firstEnabledImage->alt != '') ? $item->firstEnabledImage->alt : $item->firstEnabledImage->title }}">
                            </a>
                            @endisset
                        </div>
                        <!-- /image -->
                        <!-- text -->
                        <div class="listingText listingCard__textHolder p-4 d-flex flex-column flex-grow-1">
                            <div class="listingText__heading">{{ $item->country }}</div>
                            <div class="listingText__date mt-2 mb-3">{{ (new Carbon\Carbon($item->date))->format('d.m.Y') }}</div>
                            <div class="listingText__description flex-grow-1">{{ $item->excerpt }}</div>
                            <div class="mt-4">
                                <a href="{{ route('front.news.show', $item->slug) }}" class="listingText__moreLink listingText__moreLink--smaller">Подробнее</a>
                            </div>
                        </div>
                        <!-- /text -->
                    </div>
                </div>
                @empty
                <div class="col-12 mb-4 mb-lg-5 text-center">Новостей пока нет</div>
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
    'formId' => 'newsFeedbackForm',
    'formTitle' => 'Форма обратной связи на списке новостей'
])

@include('front.visa.module.other', ['items' => $otherVisas])

@endsection
