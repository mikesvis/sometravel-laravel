@if (count($items))
<div class="travelDirections vpm__pt vpm__mb">
    <div class="container">

        <!-- block heading -->
        <div class="heading row vpm__my">
            <div class="col-12 col-lg">
                <div class="heading__text text-center text-lg-left"><span class="text-primary">Другие</span> направления</div>
            </div>
            <div class="col-auto mt-3 mt-lg-0 d-none d-lg-block">
                <a href="{{ route('front.visa.index') }}" class="heading__listLink">Все направления</a>
            </div>
        </div>
        <!-- block heading -->

        <!-- listing -->
        <div class="listing row">

            @foreach ($items as $item)
            <!-- listing item -->
            <div class="col-12 col-md-6 col-xxl-4 col-xxxl-3 mb-4 mb-lg-5">
                <div class="listingCard listing__item panelRounded panelShadow d-flex flex-column h-100">
                    <!-- image -->
                    <div class="listingVisual listingCard__vusialHolder">
                        {{-- ['w' => 855, 'h'=>320] --}}
                        @isset($item->firstEnabledImage)
                        <a href="" class="listingVisual__link d-block"><img src="/timthumb.php?src={{ $item->firstEnabledImage->path }}&w=855&h=320&zc=1" class="listingVisual__image d-block w-100" alt="{{ ($item->firstEnabledImage->alt != '') ? $item->firstEnabledImage->alt : $item->firstEnabledImage->title }}"></a>
                        @endisset
                    </div>
                    <!-- /image -->
                    <!-- text -->
                    <div class="listingText listingCard__textHolder p-4 d-flex flex-column flex-grow-1">
                        <div class="listingText__heading mb-3">{{ $item->title }}</div>
                        <div class="listingText__description flex-grow-1">{{ $item->excerpt }}</div>
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
