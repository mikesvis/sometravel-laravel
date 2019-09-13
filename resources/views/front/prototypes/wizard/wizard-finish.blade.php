@extends('layouts.front.index')

@section('title', 'Визард - Финиш')

@section('content')

@include('front.components.breadcrumbs')

@include('front.components.page-heading', ['heading' => 'Оформление визы: Франция'])

<div class="container">
    <div class="row">
        <div class="col-12">

            <div class="wizard">

                <div class="wizard__steps h4 font-weight-normal mb-4">Спасибо!</div>

                <div class="wizard__steps h4 font-weight-normal vpm__mb"><strong>Заказ №192837</strong> успешно оформлен, Наш менеджер скоро свяжется с вами.</div>

                <div class="row vpm__my vpm__py">

                    <div class="col-12">
                        {{-- col-xl-8 col-xxl-8 col-xxxl-6 --}}
                        <div class="row align-items-center">
                            <div class="col-12 col-sm-6 col-xl-4 col-xxxl-3 order-2 order-sm-0 order-md-0 mt-4 mt-sm-0">
                                <a href="" class="btn btn-outline-primary btn-block rounded-pill"><span class="h4 font-weight-normal m-0">Вернуться на главную</span></a>
                            </div>
                            <div class="col-12 col-sm-6 col-xl-4 col-xxxl-3 order-0 order-sm-1 order-md-1">
                                <div class="h3 m-0">
                                    <a href="" class="btn btn-primary btn-block rounded-pill"><span class="h4 font-weight-normal m-0">Перейти в личный кабинет</span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


        </div>
    </div>
</div>

@endsection
