const mix = require('laravel-mix');

mix.sass('resources/scss/app.scss', 'public/css');
mix.js('resources/js/app.js', 'public/js');

