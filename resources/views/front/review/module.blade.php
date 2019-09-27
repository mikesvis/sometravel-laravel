@if (count($reviews))
<div class="container vpm__mb vpm__py">

    <!-- block heading -->
    <div class="heading row vpm__my">
        <div class="col-12">
            <div class="heading__text text-center"><span class="text-primary">Отзывы</span> наших клиентов</div>
        </div>
    </div>
    <!-- block heading -->

    <!-- listing -->
    <div class="listing row">

        @foreach ($reviews as $item)
        <!-- listing item -->
        <div class="col-12 col-md-6 col-xxl-4 mb-4 mb-sm-5">
            <div class="listingCard listing__item panelRounded panelShadow d-flex flex-column h-100">
                <!-- image -->
                <div class="listingVisual listingCard__vusialHolder">
                    @isset($item->firstEnabledImage)
                    <span class="listingVisual__link listingVisual__link--maskGradient d-block">
                        {{-- ['w' => 855, 'h'=>552] --}}
                        <img src="/timthumb.php?src={{ $item->firstEnabledImage->path }}&w=855&h=552&zc=1" class="listingVisual__image d-block w-100" alt="{{ ($item->firstEnabledImage->alt != '') ? $item->firstEnabledImage->alt : $item->firstEnabledImage->title }}">
                    </span>
                    @endisset
                </div>
                <!-- /image -->
                <!-- text -->
                <div class="listingText listingCard__textHolder px-4 pt-3 pb-5 flex-grow-1">
                    <div class="listingText__heading">{{ $item->name }}</div>
                    <div class="listingText__date mt-2 mb-3">{{ (new Carbon\Carbon($item->date))->format('d.m.Y') }}</div>
                    <div class="listingText__description flex-grow-1">{{ $item->content }} </div>
                </div>
                <!-- /text -->
            </div>
        </div>
        <!-- listing item -->
        @endforeach

    </div>
    <!-- listing -->

</div>
@endif
