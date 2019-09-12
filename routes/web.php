<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'SiteController@index');

Auth::routes();

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function(){

    Route::get('/', 'DashboardController@index')->name('admin.dashboard');

});

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'verstka'], function(){

    // visas
    Route::get('visas/france', function () { return view('front.prototypes.visas.france'); });
    Route::get('visas/europe', function () { return view('front.prototypes.visas.europe'); });
    // news
    Route::get('news/listing', function () { return view('front.prototypes.news.listing');});
    Route::get('news/card', function () { return view('front.prototypes.news.card'); });
    // pages
    Route::get('pages/about', function () { return view('front.prototypes.pages.about'); });
    Route::get('pages/contacts', function () { return view('front.prototypes.pages.contacts'); });
    Route::get('pages/franchise', function () { return view('front.prototypes.pages.franchise'); });
    // cabinet
    Route::get('cabinet/main', function () { return view('front.prototypes.cabinet.main'); });
    Route::get('cabinet/orders', function () { return view('front.prototypes.cabinet.orders'); });
    Route::get('cabinet/order', function () { return view('front.prototypes.cabinet.order'); });
    Route::get('cabinet/personal-info', function () { return view('front.prototypes.cabinet.personal-info'); });
    // wizard
    Route::get('wizard/wizard-1', function () { return view('front.prototypes.wizard.wizard-1'); });
    Route::get('wizard/wizard-1-logged', function () {return view('front.prototypes.wizard.wizard-1-logged'); });
    Route::get('wizard/wizard-2', function () { return view('front.prototypes.wizard.wizard-2'); });
    Route::get('wizard/wizard-3', function () { return view('front.prototypes.wizard.wizard-3'); });
    Route::get('wizard/wizard-finish', function () { return view('front.prototypes.wizard.wizard-finish'); });
    // 404
    Route::get('404', function () {return view('front.prototypes.404'); });

});
