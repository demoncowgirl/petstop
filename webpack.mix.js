const mix = require('laravel-mix');
const sass = require('sass');

module.exports = {
  // ...
  resolve: {
    alias: {
      'vue$': 'vue/dist/vue.esm.js' // 'vue/dist/vue.common.js' for webpack 1
    }
  }
}

mix.js('resources/js/app.js', 'public/js');
mix.css('resources/css/app.css', 'public/css');
mix.sass('resources/sass/app.scss', 'public/css');
