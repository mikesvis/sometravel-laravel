<div class="col-12 col-md-6 col-lg-5 col-xl-4 col-xxl-3 col-xxxl-4">
    <div class="searchModule header__searchModuleWrapper">
        <form action="{{ route('front.search.index') }}" class="pb-3 pt-2 py-md-0" method="GET">
            <div class="input-group">
                <input
                type="text"
                name="search"
                value="@isset($searchWord){{ $searchWord }}@endisset"
                class="searchModule__input textInput textInput--rounded form-control"
                placeholder="Введите название страны"
                aria-label="Введите название страны"
                aria-describedby="buttonSearchModule">
                <div class="input-group-append">
                    <button class="searchModule__button btn btn-primary btn--rounded" type="submit" id="buttonSearchModule"><em class="fas fa-search"></em></button>
                </div>
            </div>
        </form>
    </div>
</div>
