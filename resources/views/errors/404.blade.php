@extends('layouts.front.index')

@section('title', '404')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">

            <div class="error-pages">

                <div class="row vpm__my justify-content-center align-items-center">

                    <div class="col-auto text-right pr-0 pr-sm-4">
                        <span class="error-pages__digits text-primary">4</span>
                    </div>
                    <div class="col-auto"><img src="/images/404.png" alt="" class="error-pages__zero-digit-image"></div>
                    <div class="col-auto pl-0 pl-sm-4">
                        <span class="error-pages__digits text-primary">4</span>
                    </div>

                    <div class="col-12 text-center mt-4">
                        <div class="h4">Похоже мы заблудились =(</div>
                        <p class="fs18">Эта страница не существует</p>
                        <hr class="error-pages__separator">
                        <p class="mb-2">Давайте оформим визу с нашим оператором</p>
                        <div class="h4 font-weight-normal">
                            @include('front.components.main-phone', [
                                'aTemplate' => '<a href="tel:!PHONE_NUMBER!" class="d-lg-none text-decoration-none">!PHONE_NUMBER_HUMAN!</a>',
                                'spanTemplate'=> '<span class="d-none d-lg-inline-block text-primary">!PHONE_NUMBER_HUMAN!1</span>'
                            ])
                        </div>
                    </div>

                </div>

                <div class="row vpm__my vpm__pb justify-content-center align-items-center">

                    <div class="col-10 col-sm-6 col-lg-5 col-xl-4 col-xxl-3 col-xxxl-2">
                        <a href="{{ url()->previous() }}" class="btn btn-outline-primary btn-block rounded-pill"><span class="h4 font-weight-normal m-0">Вернуться назад</span></a>
                    </div>
                    <div class="col-10 col-sm-6 col-lg-5 col-xl-4 col-xxl-3 col-xxxl-2 mt-4 mt-sm-0">
                        <a href="/" class="btn btn-primary btn-block rounded-pill"><span class="h4 font-weight-normal m-0">Перейти на главную</span></a>
                    </div>

                </div>

            </div>


        </div>
    </div>
</div>

@endsection

