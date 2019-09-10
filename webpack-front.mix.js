const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/front/js/app.js', 'public/js')
   .sass('resources/front/sass/app.scss', 'public/css')
//    .sass('resources/front/sass/other-icons.sass', 'public/front/css')
   .options({
      processCssUrls: false
   })
   .extract()
   .mergeManifest();
