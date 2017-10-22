var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix.sass('app.scss');
    mix.scripts([
            '../bower/jquery-3.1.1.min/index.js'
        ], 'public/js/jquery.js')
        .scripts([
            'bootstrap.min.js',
            'bootstrap-notify.js',
            'bootstrap-select.js'
        ], 'public/js/bootstrap.js');
    mix.styles([
        'animate.min.css',
        'bootstrap.min.css',
        'light-bootstrap-dashboard.css',
    ], 'public/css/site.css');
    mix.copy('resources/assets/css/pe-icon-7-stroke.css', 'public/css/pe-icon-7-stroke.css');
    mix.copy('resources/assets/css/light-bootstrap-dashboard.css', 'public/css/light-bootstrap-dashboard.css');
    mix.copy('resources/assets/js/bootstrap-checkbox-radio-switch.js','public/js/bootstrap-checkbox-radio-switch.js')
    mix.webpack('main.js');

});
