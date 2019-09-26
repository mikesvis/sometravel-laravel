@if (count($news))
<!-- news -->
<div class="news vpm__mb">
    <div class="container">

        <!-- block heading -->
        <div class="heading row vpm__my">
            <div class="col-12 col-lg">
                <div class="heading__text text-center text-lg-left"><span class="text-primary">Другие</span> новости</div>
            </div>
            <div class="col-auto mt-3 mt-lg-0 d-none d-lg-block">
                <a href="{{ route('front.news.index') }}" class="heading__listLink">Все новости</a>
            </div>
        </div>
        <!-- /block heading -->

        <!-- listing -->
        <div class="listing row">
            @foreach ($news as $item)
            <div class="col-12 col-md-6 col-xxl-4 col-xxxl-3 mb-4 mb-lg-5 @if ($loop->last) d-none d-md-block d-xxl-none d-xxxl-block @endif">
                @include('front.news.module.item', ['item' => $item, 'moreLinkClass' => 'listingText__moreLink listingText__moreLink--smaller'])
            </div>
            @endforeach
        </div>
        <!-- /listing -->

        <!-- block heading -->
        <div class="heading row justify-content-end">
            <div class="col-auto d-block d-lg-none vpm__mb">
                <a href="{{ route('front.news.index') }}" class="heading__listLink">Все новости</a>
            </div>
        </div>
        <!-- /block heading -->

    </div>
</div>
<!-- /news -->
@endif
