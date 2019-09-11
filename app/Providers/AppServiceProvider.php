<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Validator::extend('mailorphone', function ($attribute, $value, $parameters, $validator) {

            if(filter_var($value, FILTER_VALIDATE_EMAIL))
                return true;

            if(\App\Helpers\PhoneHelper::isCorrectPhoneNumber($value))
                return true;

            return false;

        });
    }
}
