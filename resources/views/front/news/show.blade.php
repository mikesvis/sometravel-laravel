@extends('layouts.front.index')

@section('title', $news->siteSeoTitle)
@section('keywords', $news->siteSeoKeywords)
@section('description', $news->siteSeoDescription)

@section('content')

@include('front.components.breadcrumbs', compact('breadcrumbs'))

@include('front.components.page-heading', ['heading' => $news->title])

    <div class="container vpm__pb">
        <div class="row">
            <div class="col-12">

                <div class="newsCard">
                    @isset($news->firstEnabledImage)
                    {{-- ['w' => 870, 'h'=>458] --}}
                    <span class="newsCard__visual">
                        <img src="/timthumb.php?src={{ $news->firstEnabledImage->path }}&w=870&h=458&zc=1" class="w-100 panelRounded panelShadow" alt="{{ ($news->firstEnabledImage->alt != '') ? $news->firstEnabledImage->alt : $news->firstEnabledImage->title }}">
                    </span>
                    @endisset
                    <h4 class="mb-3">{{ $news->country }}</h4>
                    <p>{{ (new Carbon\Carbon($news->date))->format('d.m.Y') }}</p>
                    {!! $news->content !!}
                </div>

            </div>
        </div>
    </div>

    @include('front.news.module.inner', ['news' => $otherNews])

    @include('front.components.forms.visa-question',
                [
                    'heading' => '<span class="text-primary">У вас остались вопросы</span> по оформлению визы?',
                    'subHeading' => 'Оставьте номер телефона и наши специалист вам перезвонит'
                ]
            )

@endsection
