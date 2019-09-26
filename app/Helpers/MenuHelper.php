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
                'url' => '/',
                'current' => false,
                'active' => false,
            ],
            [
                'name' => 'О нас',
                'url' => '/',
                'current' => false,
                'active' => false,
            ],
            [
                'name' => 'Контакты',
                'url' => '/',
                'current' => false,
                'active' => false,
            ],
        ];

        return $result;
    }
}
