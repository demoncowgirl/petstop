const mix = require('laravel-mix');
const sass = require('sass');

mix.js('resources/js/app.js', 'public/js')
    .vue();
    mix.css('resources/css/app.css', 'public/css')
    .sass('resources/sass/app.scss', 'public/css')
    .copy('resources/sass/images', 'public/images');
