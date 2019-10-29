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
        @include('front.forms.inline.usual', [
            'heading' => '<span class="text-primary">Получите бизнес план</span> для вашего города',
            'subHeading' => 'Оставьте заявку и мы расскажем о предложении',
            'formId' => 'franchisePageFeedbackForm',
            'formTitle' => 'Форма обратной связи на франшизе'
        ])
        {{-- /form kupit-franshizu --}}

        @include('front.forms.popup.usual', [
            'modalId'=>'getPersonalOfferModal',
            'modalTitle' => 'Получить персональное предложение',
            'formId' => 'getPersonalOfferForm',
            'formDescription'=>'Укажите Ваши контактные данные и наш менеджер свяжется Вами'
        ])

        @include('front.forms.popup.usual', [
            'modalId'=>'getPartipianceOfferModal',
            'modalTitle' => 'Предложение сотрудничества',
            'formId' => 'getPartipianceOfferForm',
            'formDescription'=>'Укажите Ваши контактные данные и наш менеджер свяжется Вами'
        ])

    @else

        {{-- any other page form --}}
        @include('front.forms.inline.usual', [
            'heading' => '<span class="text-primary">У вас остались вопросы</span> по оформлению визы?',
            'subHeading' => 'Оставьте номер телефона и наши специалист вам перезвонит',
            'formId' => 'pageItemFeedbackForm',
            'formTitle' => 'Форма обратной связи на обычных страницах'
        ])
        {{-- /any other page form --}}

    @endif

@endsection
