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

mix.js('resources/back/js/app.js', 'public/back/js')
   .sass('resources/back/sass/app.sass', 'public/back/css')
   .js('resources/back/js/tiny/tiny.js', 'public/back/js')
   .options({
      processCssUrls: false
   })
   .extract()
   .mergeManifest();
