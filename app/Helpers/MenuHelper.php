<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;

class MenuHelper
{

    public function getItems()
    {

        $result = [
            [
                'name' => 'Главная',
                'url' => route('front.index'),
                'current' => Route::is('front.index'),
                'active' => Route::is('front.index.*'),
            ],
            [
                'name' => 'Новости',
                'url' => route('front.news.index'),
                'current' => Route::is('front.news.index'),
                'active' => Route::is('front.news.*'),
            ],
            [
                'name' => 'Купить франшизу',
                'url' => route('front.page.show', 'kupit-franshizu'),
                'current' => (Route::is('front.page.show') && request('page') == 'kupit-franshizu'),
                'active' => false,
            ],
            [
                'name' => 'О нас',
                'url' => route('front.page.show', 'o-nas'),
                'current' => (Route::is('front.page.show') && request('page') == 'o-nas'),
                'active' => false,
            ],
            [
                'name' => 'Контакты',
                'url' => route('front.page.show', 'kontakty'),
                'current' => (Route::is('front.page.show') && request('page') == 'kontakty'),
                'active' => false,
            ],
        ];

        return $result;
    }

    public function getCountriesItems()
    {

        $result = [
            [
                'name' => 'Все страны',
                'url' => route('front.visa.index'),
                'current' => Route::is('front.visa.index'),
                'divClass' => 'col-12 col-xl-4 col-xxl-4',
                'itemIdleClass' => 'countriesButtons__button btn btn-primary btn-block btn--rounded font-weight-bold',
                'itemCurrentClass' => 'countriesButtons__button btn btn-primary btn-block btn--rounded font-weight-bold',
            ],
            [
                'name' => 'Топ 10',
                'url' => route('front.visa.filter', 'top-10'),
                'current' => (Route::is('front.visa.filter') && request('category') == 'top-10'),
                'divClass' => 'col-12 d-lg-none col-xl-4 d-xl-block col-xxl-2',
                'itemIdleClass' => 'countriesButtons__button btn btn-outline-primary btn-block btn--rounded font-weight-bold',
                'itemCurrentClass' => 'countriesButtons__button btn btn-outline-primary btn-block btn--rounded font-weight-bold',
            ],
            [
                'name' => 'Шенген',
                'url' => route('front.visa.filter', 'shengen'),
                'current' => (Route::is('front.visa.filter') && request('category') == 'shengen'),
                'divClass' => 'col-12 d-lg-none col-xl-4 d-xl-block col-xxl-2',
                'itemIdleClass' => 'countriesButtons__button btn btn-outline-primary btn-block btn--rounded font-weight-bold',
                'itemCurrentClass' => 'countriesButtons__button btn btn-outline-primary btn-block btn--rounded font-weight-bold',
            ],
            [
                'name' => 'Азия',
                'url' => route('front.visa.filter', 'aziya'),
                'current' => (Route::is('front.visa.filter') && request('category') == 'aziya'),
                'divClass' => 'col-xl-auto d-lg-none col-xxl-2 d-xxl-block',
                'itemIdleClass' => 'countriesButtons__button btn btn-outline-primary btn-block btn--rounded font-weight-bold',
                'itemCurrentClass' => 'countriesButtons__button btn btn-outline-primary btn-block btn--rounded font-weight-bold',
            ],
            [
                'name' => 'Америка',
                'url' => route('front.visa.filter', 'amerika'),
                'current' => (Route::is('front.visa.filter') && request('category') == 'amerika'),
                'divClass' => 'col-xl-auto d-lg-none col-xxl-2 d-xxl-block',
                'itemIdleClass' => 'countriesButtons__button btn btn-outline-primary btn-block btn--rounded font-weight-bold',
                'itemCurrentClass' => 'countriesButtons__button btn btn-outline-primary btn-block btn--rounded font-weight-bold',
            ],
        ];

        return $result;
    }
}
