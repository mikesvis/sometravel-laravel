@extends('layouts.front.index')

@section('content')

    @include('front.components.breadcrumbs')

    @include('front.components.page-heading', ['heading' => 'Контакты'])

    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="row">

                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-2 mb-4">
                        <div class="h3 mb-4">Телефон</div>
                        <p>
                            <a href="tel: 88000000000" class="d-block d-lg-none text-body">8 (800) 000-00-00</a>
                            <span class="d-none d-lg-block">8 (800) 000-00-00</span>
                        </p>
                        <p>
                            <a href="tel: 88000000000" class="d-block d-lg-none text-body">8 (800) 000-00-00</a>
                            <span class="d-none d-lg-block">8 (800) 000-00-00</span>
                        </p>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-2 mb-4">
                        <div class="h3 mb-4">Адрес</div>
                        <p>
                            г. Уфа, 50 лет октября<br />д 4 оф 418
                        </p>
                        <p>
                            Режим работы: <br />Пн-Пт 10:00-19:00
                        </p>
                    </div>

                    <div class="col-12 col-md-4 col-lg-4 col-xl mb-4">
                        <div class="h3 mb-4">E-mail и соцсети</div>
                        <p>
                            <a href="mailto:info@mail.ru">info@mail.ru</a>
                        </p>
                        <div class="socials">
                            <div class="d-inline-block mr-3"><a href="" class="socials__link"><em class="fab fa-instagram"></em></a></div>
                            <div class="d-inline-block mr-3"><a href="" class="socials__link"><em class="fab fa-vk"></em></a></div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="yandexMap vpm__mt">
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aa49a6723a8a1f13050a840ae9c6bf79eb9e67d478c855d0f78b8a1b33a79110f&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=false"></script>
    </div>



    {{-- @include('front.components.listings.directions') --}}

    {{-- @include('front.components.listings.news') --}}

    @include('front.components.forms.visa-question',
                [
                    'heading' => '<span class="text-primary">У вас остались вопросы</span> по оформлению визы?',
                    'subHeading' => 'Оставьте номер телефона и наши специалист вам перезвонит'
                ]
            )

@endsection
