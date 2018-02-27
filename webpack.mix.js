let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
    'resources/assets/css/font-awesome.css',
    'resources/assets/css/bootstrap.min.css',
    'resources/assets/css/animate.min.css',
    'resources/assets/css/owl.carousel.css',
    'resources/assets/css/owl.theme.css'
    'resources/assets/css/style.default.css'
    'resources/assets/css/custom.css'
    'resources/assets/css/respond.min.js'
], 'public/css/all.css');
