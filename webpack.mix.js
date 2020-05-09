const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');


mix.styles([
    'public/css/bootstrap.css',
    'public/css/font-awesome.min.css',
    'public/css/slick.css',
    'public/css/slick-theme.css',
    'public/css/skdslider.css',
    'public/css/sweetalert2.css',
    'public/css/style.css'
], 'public/css/bookshop.bundle.css');

mix.scripts([
    'public/js/jquery-3.2.1.min.js',
    'public/js/popper.min.js',
    'public/js/bootstrap.min.js',
    'public/js/pace.min.js',
    'public/js/slick.js',
    'public/js/skdslider.js',
    'public/js/sweetalert2.min.js',
    'public/js/chart.min.js'
], 'public/js/bookshop.bundle.js');