@php
    $items = [
        'Личный кабинет',
        'Мои заказы',
        'Персональные данные'
    ];
@endphp

<div class="container mt-0 mt-md-2 mb-4 mb-md-3">
    <div class="row">
        <div class="col-12 col-lg-10 col-xl-8 col-xxl-6 col-xxxl-5">

            <div class="btn-group d-flex d-md-none">
                <button class="btn btn-outline-primary btn-block text-left py-2 dropdown-toggle d-flex justify-content-between align-items-center" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ $items[$activeIndex] }}
                </button>
                <div class="account-menu-dropdown dropdown-menu w-100">
                    @foreach ($items as $k => $item)
                        <a class="account-menu-dropdown__link {{ $k == $activeIndex ? 'account-menu-dropdown__link--active' : '' }} dropdown-item {{ $k == $activeIndex ? 'bg-light text-primary' : '' }}" href="">{{ $item }}</a>
                    @endforeach
                </div>
            </div>

            <ul class="account-menu list-unstyled d-none d-md-flex justify-content-between mb-0">
                @foreach ($items as $k => $item)
                    <li class="account-menu__item d-block">
                        <a href="" class="account-menu__link {{ $k == $activeIndex ? 'account-menu__link--active' : '' }}">{{ $item }}</a>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
</div>
