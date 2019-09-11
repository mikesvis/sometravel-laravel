@extends('layouts.front.index')

@section('content')

    @include('front.components.breadcrumbs')

    @include('front.components.page-heading', ['heading' => 'Виза в Европу'])

    @include('front.components.cabinet-menu', ['activeIndex' => 1])

    <div class="border-top py-3 pb-5">
        <div class="container vpm__mt">

            <!-- listing -->
            <div class="row">

                {{-- order-item  --}}
                <div class="col-12 col-lg-7 col-xl-6 col-xxl-5 col-xxxl-4 mb-4">

                    <div class="order-card panelRounded panelShadow px-4 px-md-5 py-4 h-100">

                            <div class="order-card__number mb-1">Заказ: 09812093</div>
                            <div class="order-card__status mb-1 text-warning"><strong>В обработке</strong></div>
                            <div class="order-card__date">от 19.12.2019</div>

                            <div class="order-card__name my-4">Виза во Францию - Шенгенская виза</div>

                            <div class="order-card__row mb-4">
                                <div class="order-card__row-name mb-1">Паспорт РФ</div>
                                <div class="order-card__detail-text">
                                    <p>
                                        Иванов Иван Иванович 18.04.1985<br />
                                        Серия 0000 номер 9999999<br />
                                        Выдан 13.05.2016 ТП 49 отдела УФМС России по РФ и СПБ
                                    </p>
                                </div>
                            </div>

                            <div class="order-card__row mb-4">
                                <div class="order-card__row-name mb-1">Загран паспорт</div>
                                <div class="order-card__detail-text">
                                    <p>
                                        Ivanov Ivan<br />
                                        Дата начала действия 18.10.2010<br />
                                        Дата окончания действия 18.10.2020
                                    </p>
                                </div>
                            </div>

                            <div class="order-card__row mb-4">
                                <div class="order-card__row-name mb-1">Последняя виза</div>
                                <div class="order-card__detail-text">
                                    <p>
                                        Страна Финляндия<br />
                                        Номер 098098098<br />
                                        Дата начала действия 18.10.2013<br />
                                        Дата окончания действия 18.10.2014
                                    </p>
                                </div>
                            </div>

                            <div class="order-card__row mb-4">
                                <div class="order-card__row-name mb-1">Информация о доставке</div>
                                <div class="order-card__detail-text">
                                    <p>Самовывоз из офиса</p>
                                </div>
                            </div>

                    </div>

                </div>
                {{-- /order-item  --}}

            </div>
            <!-- /listing -->

            <!-- go back button -->
            <div class="row mt-3">
                <div class="col-12">
                    <a href="" class="backLink">Назад</a>
                </div>
            </div>
            <!-- /go back button -->

        </div>
    </div>

@endsection
