const mix = require('laravel-mix');
const sass = require('sass');
const tailwindcss = require('tailwindcss');

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
 require('laravel-mix-purgecss');

    mix.js('resources/js/app.js', 'public/js')
      .sass('resources/sass/app.scss', 'public/css')
      .options({
        processCssUrls: false,
        postCss: [tailwindcss('./tailwind.config.js')],
      })
        // .postCss('resources/css/app.css', 'public/css', [
        //     require('postcss-import'),
        //     require('tailwindcss'),
        // ])
        .purgeCss();


        // require('laravel-mix-purgecss');
        //
        //
        // mix.js('src/js/app.js', 'public/js')
        //     .sass('src/sass/app.scss', 'public/css')
        //     .options({
        //         processCssUrls: false,
        //         postCss: [tailwindcss('./tailwind.config.js')],
        //     })
        //     .purgeCss();
