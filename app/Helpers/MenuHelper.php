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
}
