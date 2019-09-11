<header class="header pb-md-4 pb-xl-5">

    <div class="topPanel header__topPanelWrapper">
        <div class="container">

            <div class="topPanel__fixedBg"></div>

            <div class="topPanel__row topPanel__row--stick row align-items-center">

                <div class="col-2 col-sm-2 col-md-4 col-lg-3 d-xl-none">
                    <div class="topPanel__burgerWrapper">
                        <button class="hamburger hamburger--spring" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>

                <!-- top menu -->
                <div class="d-none col-xl d-xl-block col-xxl-5 col-xxxl-6">
                    <div class="topPanel__menuWrapper">
                        <ul class="topMenu p-0 m-0 pr-xxxl-5">
                            <li class="topMenu__item"><a href="" class="topMenu__link">Главная</a></li>
                            <li class="topMenu__item"><span class="topMenu__link">Услуги</span></li>
                            {{-- <li class="topMenu__item"><span class="topMenu__link topMenu__link--active">Услуги</span></li> --}}
                            <li class="topMenu__item"><a href="" class="topMenu__link">Новости</a></li>
                            <li class="topMenu__item"><a href="" class="topMenu__link">Купить франшизу</a></li>
                            {{-- <li class="topMenu__item"><a href="" class="topMenu__link topMenu__link--active">Купить франшизу</a></li> --}}
                            <li class="topMenu__item"><a href="" class="topMenu__link">О нас</a></li>
                            <li class="topMenu__item"><a href="" class="topMenu__link">Контакты</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /top menu -->

                <!-- sm logo -->
                <div class="col-sm d-none d-sm-block d-md-none text-center">
                    <a href="/" class="topLogo"><img src="/images/logo.svg"></a>
                    {{-- <span class="topLogo"><img src="/images/logo.svg"></span> --}}
                </div>
                <!-- /sm logo -->

                <!-- top address, phone & login -->
                <div class="col col-sm-auto col-md col-xl-6 col-xxl-7 col-xxxl-6">

                    <div class="topPanel__elements d-flex justify-content-end justify-content-md-between align-items-center pl-xl-5 pl-xxxl-0">

                        <!-- address -->
                        <div class="topAddress topPanel__addressWrapper d-none d-lg-block d-xl-none d-xxl-block">
                            <div class="topAddress__item">
                                <span class="topAddress__text"><em class="topAddress__icon fas fa-map-marker-alt mr-2"><!-- icon --></em> ул. Садовая д1 оф 418</span>
                            </div>
                        </div>
                        <!-- /address -->

                        <!-- phone -->
                        <div class="topPhone topPanel__phoneWrapper mr-2 mr-md-0">
                            <div class="topPhone__item">
                                <span class="topPhone__text d-none d-lg-block"><em class="topPhone__icon fas fa-mobile-alt mr-2"><!-- icon --></em> 8 (800) 000-00-00</span>
                                <a class="topPhone__text d-lg-none" href="tel:88000000000">
                                    <em class="topPhone__icon fas fa-mobile-alt mr-md-2"><!-- icon --></em>
                                    <span class="d-none d-md-inline-block"> 8 (800) 000-00-00</span>
                                </a>
                            </div>
                        </div>
                        <!-- /phone -->

                        <!-- account -->
                        <div class="topAccount topPanel__accountWrapper d-none d-md-flex justify-content-end align-items-center">
                            <div class="topAccount__text align-middle mr-md-3 order-2 order-md-1">
                                @auth
                                    <a href="{{ url(Auth::user()->userable->cabinet_link) }}" class="topAccount__link">{{ Auth::user()->name }}</a>
                                    <span>|</span>
                                    <a href="{{ route('logout') }}" class="topAccount__link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выход</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="topAccount__link">Вход</a>
                                    @if (Route::has('register'))
                                        <span>|</span>
                                        <a href="{{ route('register') }}" class="topAccount__link">Регистрация</a>
                                    @endif
                                @endauth
                                {{-- <a href="" class="topAccount__link">Mysablaalhalsdlasdsadasdasd as dasd asdasd asasd</a> --}}
                            </div>
                            <em class="topAccount__icon fas fa-user-circle d-block align-middle mr-3 mr-md-0 order-1 order-md-2"></em>
                        </div>
                        <!-- /account -->

                        <div class="searchToggler topPanel__searchTogglerWrapper d-block d-md-none">
                            <div class="searchToggler__text">
                                <span class="searchToggler__hidden fas fa-search d-block"><!-- icon --></span>
                                <span class="searchToggler__shown fas fa-times d-block"><!-- icon --></span>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /top address, phone & login -->
            </div>
            <div class="topPanel__rowLower row align-items-center">
                <!-- top logo -->
                <div class="col-md-6 col-lg-auto d-none d-md-block">
                    <div class="header__logoWrapper">
                        <a href="/" class="topLogo"><img src="/images/logo.svg"></a>
                        {{-- <span class="topLogo"><img src="/images/logo.svg"></span> --}}
                    </div>
                </div>
                <!-- /top logo -->
                <!-- top countries buttons -->
                <div class="col-lg d-none d-lg-block">
                    <div class="countriesButtons header__buttonsWrapper row">
                        <div class="col-12 col-xl-4 col-xxl-4"><a href="" class="countriesButtons__button btn btn-primary btn-block btn--rounded font-weight-bold">Все страны</a></div>
                        <div class="col-12 d-lg-none col-xl-4 d-xl-block col-xxl-2"><a href="" class="countriesButtons__button btn btn-outline-primary btn-block btn--rounded font-weight-bold">ТОП 10</a></div>
                        <div class="col-12 d-lg-none col-xl-4 d-xl-block col-xxl-2"><a href="" class="countriesButtons__button btn btn-outline-primary btn-block btn--rounded font-weight-bold">Шенген</a></div>
                        <div class="col-xl-auto d-lg-none col-xxl-2 d-xxl-block"><a href="" class="countriesButtons__button btn btn-outline-primary btn-block btn--rounded font-weight-bold">Азия</a></div>
                        <div class="col-xl-auto d-lg-none col-xxl-2 d-xxl-block"><a href="" class="countriesButtons__button btn btn-outline-primary btn-block btn--rounded font-weight-bold">Америка</a></div>
                    </div>
                </div>
                <!-- /top countries buttons -->
                <!-- top search -->
                <div class="col-12 col-md-6 col-lg-5 col-xl-4 col-xxl-3 col-xxxl-4">
                    <div class="searchModule header__searchModuleWrapper">
                        <form class="pb-3 pt-2 py-md-0">
                            <div class="input-group">
                                <input type="text" class="searchModule__input textInput textInput--rounded form-control" placeholder="Введите название страны" aria-label="Введите название страны" aria-describedby="buttonSearchModule">
                                <div class="input-group-append">
                                    <button class="searchModule__button btn btn-primary btn--rounded" type="submit" id="buttonSearchModule"><em class="fas fa-search"></em></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- top search -->
            </div>
        </div>
    </div>

</header>
