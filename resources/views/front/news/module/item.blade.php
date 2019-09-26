<div class="listingCard listing__item panelRounded panelShadow d-flex flex-column h-100">
    <!-- image -->
    <div class="listingVisual listingCard__vusialHolder">
        @isset($item->firstEnabledImage)
        <a href="{{ route('front.news.show', $item->slug) }}" class="listingVisual__link d-block">
            {{-- ['w' => 855, 'h'=>320] --}}
            <img src="/timthumb.php?src={{ $item->firstEnabledImage->path }}&w=855&h=320&zc=1" class="listingVisual__image d-block w-100" alt="{{ ($item->firstEnabledImage->alt != '') ? $item->firstEnabledImage->alt : $item->firstEnabledImage->title }}">
        </a>
        @endisset
    </div>
    <!-- /image -->
    <!-- text -->
    <div class="listingText listingCard__textHolder p-4 d-flex flex-column flex-grow-1">
        <div class="listingText__heading">{{ $item->country }}</div>
        <div class="listingText__date mt-2 mb-3">{{ (new Carbon\Carbon($item->date))->format('d.m.Y') }}</div>
        <div class="listingText__description flex-grow-1">{{ $item->excerpt }}</div>
        <div class="mt-4">
            <a href="{{ route('front.news.show', $item->slug) }}" class="{{ $moreLinkClass }}">Подробнее</a>
        </div>
    </div>
    <!-- /text -->
</div>
