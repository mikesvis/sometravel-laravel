@if (count($items))
<div class="travelDirections vpm__pt">
    <div class="container">

        <!-- block heading -->
        <div class="heading row vpm__my">
            <div class="col-12 col-lg">
                <div class="heading__text text-center text-lg-left"><span class="text-primary">Популярные</span> направления</div>
            </div>
            <div class="col-auto mt-3 mt-lg-0 d-none d-lg-block">
                <a href="{{ route('front.visa.index') }}" class="heading__listLink">Все направления</a>
            </div>
        </div>
        <!-- block heading -->

        <!-- listing -->
        <div class="listing row justify-content-center">

            @foreach ($items as $item)
            <!-- listing item -->
            <div class="col-12 col-md-6 col-xxl-4 mb-4 mb-lg-5">
                <div class="listingCard listing__item panelRounded panelShadow d-flex flex-column h-100">
                    <!-- image -->
                    {{-- ['w' => 855, 'h'=>320] --}}
                    <div class="listingVisual listingCard__vusialHolder">
                        @isset($item->firstEnabledImage)
                        <a href="{{ route('front.visa.show', $item->slug) }}" class="listingVisual__link d-block">
                            <img src="/timthumb.php?src={{ $item->firstEnabledImage->path }}&w=855&h=320&zc=1" class="listingVisual__image d-block w-100" alt="{{ ($item->firstEnabledImage->alt != '') ? $item->firstEnabledImage->alt : $item->firstEnabledImage->title }}">
                        </a>
                        @endisset
                    </div>
                    <!-- /image -->
                    <!-- text -->
                    <div class="listingText listingCard__textHolder p-4 d-flex flex-column flex-grow-1">
                        <div class="listingText__heading mb-3">{{ $item->title }}</div>
                        <div class="listingText__description flex-grow-1">{{ $item->excerpt }}</div>
                        <div class="row align-items-center justify-content-center">
                            <div class="col-auto col-sm-6 col-md-12 col-lg-6 mt-3 mt-sm-4 mt-md-3 mt-lg-4 order-1 order-sm-0 order-md-1 order-lg-0"><a href="{{ route('front.visa.show', $item->slug) }}" class="listingText__button btn btn-primary btn-block rounded-pill py-2 py-md-3 px-5 px-sm-4 text-white">Заказать визу</a></div>
                            <div class="col-12 col-sm col-md-12 col-lg-6 text-center text-sm-right text-md-center text-lg-right mt-4 order-0 order-sm-1 order-md-0 order-lg-1">
                                @if ($item->getPrice() > 0)
                                    <span class="listingText__price text-primary">от {{ $item->getPrice() }} ₽</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /text -->
                </div>
            </div>
            <!-- listing item -->
            @endforeach

        </div>
        <!-- listing -->

        <!-- block heading -->
        <div class="heading row justify-content-end">
            <div class="col-auto d-block d-lg-none vpm__mb">
                <a href="{{ route('front.visa.index') }}" class="heading__listLink">Все направления</a>
            </div>
        </div>
        <!-- block heading -->

    </div>
</div>
@endif
