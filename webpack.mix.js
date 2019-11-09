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
mix.options({
    processCssUrls: false
});

mix.copyDirectory('resources/assets/images', 'public/images');
mix.copyDirectory('resources/assets/fonts', 'public/fonts');

mix.js('resources/assets/js/dashboard.js', 'public/js')
    .js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/dashboard.scss', 'public/css')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .version();