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

mix.scripts([
        'resources/js/core/jquery.min.js',
        'resources/js/core/popper.min.js',
        'resources/js/core/bootstrap-material-design.min.js',
        'resources/js/core/moment.min.js',
        'resources/js/core/nouislider.min.js',
        'resources/js/core/modernizr.js',
        'resources/js/core/vertical-nav.js',
        'resources/js/core/bootstrap-notify.js',
        'resources/js/core/material-kit.js',
        'resources/js/api.js',
        'resources/js/render.js',
        'resources/js/basket.js',
        'resources/js/actions.js',
    ], 'public/js/script.js')
    .styles([
        'resources/css/material-kit.css',
        'resources/css/vertical-nav.css',
    ], 'public/css/style.css')
;

