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
    .js('resources/js/show-hide-form.js', 'public/js')
    .js('resources/js/s-h-task.js', 'public/js')
    .js('resources/js/accordion.js', 'public/js')
    .js('resources/js/detail-project.js', 'public/js')
    .css('resources/css/app.css', 'public/css')
    .css('resources/css/auth.css', 'public/css')
    .css('resources/css/header.css', 'public/css')
    .css('resources/css/aside.css', 'public/css')
    .css('resources/css/form_add.css', 'public/css')
    .css('resources/css/worker.css', 'public/css')
    .css('resources/css/edit.css', 'public/css')
    .css('resources/css/edit-task.css', 'public/css')
    .css('resources/css/welcome.css', 'public/css')
    .css('resources/css/form-project.css', 'public/css')
    .css('resources/css/project.css', 'public/css')
    .sourceMaps();
