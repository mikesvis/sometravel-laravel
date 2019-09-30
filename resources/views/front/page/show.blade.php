@extends('layouts.front.index')

@section('title', $page->siteSeoTitle)
@section('keywords', $page->siteSeoKeywords)
@section('description', $page->siteSeoDescription)

@section('content')

    @include('front.components.breadcrumbs', compact('breadcrumbs'))

    @include('front.components.page-heading', ['heading' => $page->title])

    {!! $page->content !!}

    @if (request('page') == 'kupit-franshizu')
        {{-- form kupit-franshizu --}}
        @include('front.components.forms.visa-question',
            [
                'heading' => '<span class="text-primary">Получите бизнес план</span> для вашего города',
                'subHeading' => 'Оставьте заявку и мы расскажем о предложении'
            ]
        )
        {{-- /form kupit-franshizu --}}
    @else
        {{-- any other page form --}}
        @include('front.components.forms.visa-question',
            [
                'heading' => '<span class="text-primary">У вас остались вопросы</span> по оформлению визы?',
                'subHeading' => 'Оставьте номер телефона и наши специалист вам перезвонит'
            ]
        )
        {{-- /any other page form --}}
    @endif

@endsection
