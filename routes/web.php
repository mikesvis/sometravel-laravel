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

Route::get('/', 'SiteController@index')->name('front.index');

Route::get('/register/check-phone', 'Auth\RegisterController@сheckPhone');
Route::get('/register/check-code', 'Auth\RegisterController@checkCode')->name('verify.code');
Route::get('/register/resend-code', 'Auth\RegisterController@resendCode')->name('resend.code');

Auth::routes();

// back routes
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function(){

    // dashboard
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');

    // file manager
    Route::get('/files', 'FilesController@index')->name('admin.files');

    // gallery
    Route::resource('gallery', 'GalleryController', ['as'=>'admin'])->except('show');
    Route::get('gallery/{gallery}/edit/{tabToGo}', 'GalleryController@edit', ['as'=>'admin'])->name('admin.gallery.edit.tabToGo');

    // images
    Route::post('image/{model}/{modelId}', 'ImageController@upload', ['as'=>'admin'])->name('admin.image.upload');
    Route::get('image/{image}/edit', 'ImageController@edit', ['as'=>'admin'])->name('admin.image.edit');
    Route::delete('image/{image}/{model}/{modelId}', 'ImageController@destroy', ['as'=>'admin'])->name('admin.image.destroy');
    Route::patch('image/{image}', 'ImageController@update', ['as'=>'admin'])->name('admin.image.update');

    // news
    Route::resource('news', 'NewsController', ['as'=>'admin']);
    Route::get('news/{news}/edit/{tabToGo}', 'NewsController@edit', ['as'=>'admin'])->name('admin.news.edit.tabToGo');

    // reviews
    Route::resource('review', 'ReviewController', ['as'=>'admin']);
    Route::get('review/{review}/edit/{tabToGo}', 'ReviewController@edit', ['as'=>'admin'])->name('admin.review.edit.tabToGo');

    // pages
    Route::resource('page', 'PageController', ['as'=>'admin']);
    Route::get('page/{page}/edit/{tabToGo}', 'PageController@edit', ['as'=>'admin'])->name('admin.page.edit.tabToGo');

    // visa & categories
    Route::namespace('Visa')->group(function () {
        // visa
        Route::resource('visa', 'VisaController', ['as'=>'admin']);
        Route::get('visa/{visa}/edit/{tabToGo}', 'VisaController@edit', ['as'=>'admin'])->name('admin.visa.edit.tabToGo');

        // category
        Route::resource('category', 'CategoryController', ['as'=>'admin']);
        Route::get('category/{category}/edit/{tabToGo}', 'CategoryController@edit', ['as'=>'admin'])->name('admin.category.edit.tabToGo');

        // parameter
        Route::resource('parameter', 'ParameterController', ['as'=>'admin'])->except(['index', 'create', 'show']);
        Route::get('parameter/create/{visa}', 'ParameterController@create', ['as'=>'admin'])->name('admin.parameter.create');

        // value
        Route::resource('value', 'ValueController', ['as'=>'admin'])->except(['index', 'create', 'show']);
        Route::get('value/create/{parameter}', 'ValueController@create', ['as'=>'admin'])->name('admin.value.create');

    });

    // orders
    Route::resource('order', 'OrderController', ['as'=>'admin']);
    Route::get('order/{order}/edit/{tabToGo}', 'OrderController@edit', ['as'=>'admin'])->name('admin.order.edit.tabToGo');

    // users
    Route::resource('user', 'UserController', ['as'=>'admin']);
    Route::get('user/{user}/edit/{tabToGo}', 'UserController@edit', ['as'=>'admin'])->name('admin.user.edit.tabToGo');

});

// front routes
Route::group(['namespace' => 'Front'], function(){

    // order
    Route::get('/order/step/1', 'OrderController@step1')->name('front.order.step-1');

    Route::group(['middleware' => ['auth']], function () {

        // profile
        Route::get('/profile', 'ClientController@index')->name('front.profile.index');
        Route::get('/profile/order', 'ClientController@orders')->name('front.profile.order.index');
        Route::get('/profile/order/{order}', 'ClientController@order')->name('front.profile.order.show');
        Route::get('/profile/edit', 'ClientController@edit')->name('front.profile.edit');
        Route::patch('/profile', 'ClientController@update')->name('front.profile.update');

        //order proceed
        Route::get('/order/step/2', 'OrderController@step2')->name('front.order.step-2');
        Route::post('/order/step/2', 'OrderController@step2Store')->name('front.order.step-2-store');
        Route::get('/order/step/3', 'OrderController@step3')->name('front.order.step-3');
        Route::post('/order/step/3', 'OrderController@step3Store')->name('front.order.step-3-store');
        Route::get('/order/finish/{order}', 'OrderController@finish')->name('front.order.finish');

        // view mail test
        Route::get('/order/finish-mail/{order}', 'OrderController@testMailView')->name('front.order.finish-mail');

        // order calculate
        Route::post('/order/calculate', 'OrderController@calculate')->name('front.order.calculate');

    });

    // news
    Route::get('/novosti', 'NewsController@index')->name('front.news.index');
    Route::get('/novosti/{news}', 'NewsController@show')->name('front.news.show');

    // countries
    Route::get('/napravlenija', 'VisaController@index')->name('front.visa.index');
    Route::get('/napravlenija/{visa}', 'VisaController@show')->name('front.visa.show');
    Route::post('/napravlenija/{visa}', 'VisaController@checkout')->name('front.visa.checkout');
    Route::post('/napravlenija/calculate/{visaId}', 'VisaController@calculateVisaPage')->name('front.visa.calculate');
    Route::get('/napravlenija/kategorija/{category}', 'VisaController@showByCategory')->name('front.visa.filter');

    // forms
    Route::post('/forms/visa-office', 'FormsController@popupForm')->name('front.forms.visa-office');
    Route::post('/forms/mainpage', 'FormsController@mainpageForm')->name('front.forms.mainpage');
    Route::post('/forms/inline', 'FormsController@inlineForm')->name('front.forms.inline');

    // pages
    Route::get('/{page}', 'PageController@show')->name('front.page.show');


});

// Route::view('/test-middle', 'test')->middleware('auth');

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
