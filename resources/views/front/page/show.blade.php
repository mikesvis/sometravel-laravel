@extends('layouts.front.index')

@section('title', $page->siteSeoTitle)
@section('keywords', $page->siteSeoKeywords)
@section('description', $page->siteSeoDescription)

@section('content')

    @include('front.components.breadcrumbs', compact('breadcrumbs'))

    @include('front.components.page-heading', ['heading' => $page->title])

    {!! $page->content !!}

    @include('front.components.forms.visa-question',
    [
        'heading' => '<span class="text-primary">У вас остались вопросы</span> по оформлению визы?',
        'subHeading' => 'Оставьте номер телефона и наши специалист вам перезвонит'
    ]
    )

@endsection
