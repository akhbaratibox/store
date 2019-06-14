const elixir = require('laravel-elixir-gulp-v4-compat');
elixir.config.sourcemaps = false;

var gulp = require('gulp');

elixir(function (mix) {
    //compile sass to css
    mix.sass('./res/assets/sass/*.scss', './res/assets/css');

    //combine css file
    mix.styles(
        [
            'css/app.css',
            'bower/vendor/slick-carousel/slick/slick.css'

        ], 'public/css/all.css', //output file
        'res/assets');

    var bowerPath = 'bower/vendor';
    mix.scripts(
        [
            //Jquery
            bowerPath + '/jquery/dist/jquery.min.js',
            //foundation js
            bowerPath + '/foundation-sites/dist/js/foundation.min.js',
            //other dependencies
            bowerPath + '/slick-carousel/slick/slick.min.js'
        ], 'public/js/all.js', 'res/assets');
});

