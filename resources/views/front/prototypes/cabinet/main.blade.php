@extends('layouts.front.index')

@section('content')

    @include('front.components.breadcrumbs')

    @include('front.components.page-heading', ['heading' => 'Добро пожаловать, Алексей!'])

    @include('front.components.cabinet-menu', ['activeIndex' => 0])

    <div class="border-top py-3 pb-5">
        <div class="container">

            <!-- block heading -->
            <div class="heading row vpm__my">
                <div class="col-12 col-lg">
                    <div class="heading__text text-center text-lg-left">Последние активные заказы</div>
                </div>
                <div class="col-auto mt-3 mt-lg-0 d-none d-lg-block">
                    <a href="" class="heading__listLink">Все заказы</a>
                </div>
            </div>
            <!-- block heading -->

            <!-- listing -->
            <div class="listing row">

                {{-- order-item  --}}
                <div class="col-12 col-lg-6 col-xxl-4 mb-4">

                    <div class="order-item panelRounded px-4 px-md-5 py-4 pb-5 panelShadow h-100">
                        <a href="" class="order-item__link d-block h-100 text-body text-decoration-none">

                            <div class="row mb-4 align-items-end justify-content-between">
                                <div class="col-12 col-sm order-1 order-sm-0">
                                    <div class="order-item__status text-primary"><strong>В очереди</strong></div>
                                </div>
                                <div class="col-12 col-sm-auto mb-2 mb-sm-0 order-0 order-sm-1">
                                    <div class="order-item__number h4 m-0 font-weight-normal">Заказ: 09812093</div>
                                </div>
                            </div>

                            <div class="order-item__name mb-4">Виза в Европу</div>

                            <div class="row mb-1">
                                <div class="col-12 col-sm">
                                    <div class="order-item__props-label">Дата подачи документов:</div>
                                </div>
                                <div class="col-12 col-sm-auto">
                                    <div class="order-item__props-value">19.02.2019</div>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-12 col-sm">
                                    <div class="order-item__props-label">Ожидаемая дата доставки:</div>
                                </div>
                                <div class="col-12 col-sm-auto">
                                    <div class="order-item__props-value">29.02.2019</div>
                                </div>
                            </div>

                        </a>
                    </div>

                </div>
                {{-- /order-item  --}}

                {{-- order-item  --}}
                <div class="col-12 col-lg-6 col-xxl-4 mb-4">
                    <div class="order-item panelRounded px-4 px-md-5 py-4 pb-5 panelShadow h-100">
                        <a href="" class="order-item__link d-block h-100 text-body text-decoration-none">

                            <div class="row mb-4 align-items-end justify-content-between">
                                <div class="col-12 col-sm order-1 order-sm-0">
                                    <div class="order-item__status text-warning"><strong>Выполняется</strong></div>
                                </div>
                                <div class="col-12 col-sm-auto mb-2 mb-sm-0 order-0 order-sm-1">
                                    <div class="order-item__number h4 m-0 font-weight-normal">Заказ: 09812093</div>
                                </div>
                            </div>

                            <div class="order-item__name mb-4">Виза в Европу</div>

                             <div class="row mb-1">
                                <div class="col-12 col-sm">
                                    <div class="order-item__props-label">Дата подачи документов:</div>
                                </div>
                                <div class="col-12 col-sm-auto">
                                    <div class="order-item__props-value">19.02.2019</div>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-12 col-sm">
                                    <div class="order-item__props-label">Ожидаемая дата доставки:</div>
                                </div>
                                <div class="col-12 col-sm-auto">
                                    <div class="order-item__props-value">29.02.2019</div>
                                </div>
                            </div>

                        </a>
                    </div>
                </div>
                {{-- /order-item  --}}

                {{-- order-item  --}}
                <div class="col-12 col-lg-6 col-xxl-4 mb-4">
                    <div class="order-item panelRounded px-4 px-md-5 py-4 pb-5 panelShadow h-100">
                        <a href="" class="order-item__link d-block h-100 text-body text-decoration-none">

                            <div class="row mb-4 align-items-end justify-content-between">
                                <div class="col-12 col-sm order-1 order-sm-0">
                                    <div class="order-item__status text-success"><strong>Выполнен</strong></div>
                                </div>
                                <div class="col-12 col-sm-auto mb-2 mb-sm-0 order-0 order-sm-1">
                                    <div class="order-item__number h4 m-0 font-weight-normal">Заказ: 09812093</div>
                                </div>
                            </div>

                            <div class="order-item__name mb-4">Виза в Европу</div>

                             <div class="row mb-1">
                                <div class="col-12 col-sm">
                                    <div class="order-item__props-label">Дата подачи документов:</div>
                                </div>
                                <div class="col-12 col-sm-auto">
                                    <div class="order-item__props-value">19.02.2019</div>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-12 col-sm">
                                    <div class="order-item__props-label">Ожидаемая дата доставки:</div>
                                </div>
                                <div class="col-12 col-sm-auto">
                                    <div class="order-item__props-value">29.02.2019</div>
                                </div>
                            </div>

                        </a>
                    </div>
                </div>
                {{-- /order-item  --}}

            </div>
            <!-- /listing -->

            <!-- block heading -->
            <div class="heading row justify-content-end">
                <div class="col-auto d-block d-lg-none vpm__mb">
                    <a href="" class="heading__listLink">Все заказы</a>
                </div>
            </div>
            <!-- block heading -->

        </div>
    </div>

@endsection
