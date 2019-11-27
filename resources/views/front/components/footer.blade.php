<footer class="footer py-4 py-md-4 py-xxl-5 border-top">
    <div class="container">

        <div class="row align-items-center justify-content-between">
            <div class="col-md-auto col-xxl-auto order-md-1 order-xxl-1 d-none d-md-block">
                <div class="footer__logoWrapper">
                    <a href="/" class="footerLogo"><img src="/images/logo.svg" class="footerLogo__image"  alt="Виза интергал"></a>
                    {{-- <span class="footerLogo"><img src="/images/logo.svg" class="footerLogo__image"></span> --}}
                </div>
            </div>
            <div class="col-12 col-md-12 col-xxl-7 order-md-3 order-xxl-2 mt-0 mt-md-4 mt-xxl-0">
                <div class="footer__menuWrapper">
                    <ul class="footerMenu d-block d-md-flex justify-content-between mx-xl-0 mx-xxl-5">
                        @foreach ( app('App\Helpers\MenuHelper')->getItems() as $item)
                        <li class="footerMenu__item my-2">
                            @if ($item['current'])
                            <span class="footerMenu__link footerMenu__link--active">{{ $item['name'] }}</span>
                            @else
                            <a href="{{ $item['url'] }}" class="footerMenu__link @if ($item['active']) footerMenu__link--active @endif">{{ $item['name'] }}</a>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-auto col-xxl-auto order-md-2 order-xxl-3">
                <div class="footer_addressWrapper mt-4 mt-md-0">
                    <div class="footerAddress">
                        <div class="footerAddress__item">
                            <p>
                                {!! @env('ADDRESS_FOOTER', '') !!}
                            </p>
                        </div>
                        <div class="footerAddress__phone">
                            <p class="mb-md-0">
                                    @include('front.components.main-phone', [
                                        'aTemplate' => '<a href="tel:!PHONE_NUMBER!" class="footerAddress__phoneLink d-block d-md-none">!PHONE_NUMBER_HUMAN!</a>',
                                        'spanTemplate'=> '<span class="footerAddress__phoneLink d-none d-md-block">!PHONE_NUMBER_HUMAN!</span>'
                                    ])
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
