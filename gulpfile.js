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

/*elixir(function(mix) {
    mix.sass('app.scss');
});*/

/*elixir(function(mix){
    mix.styles(['bootstrap.css','carousel.css','main.css'],'public/build/css/all.css', 'public/css');
});
*/

/*elixir(function(mix){
    mix.stylesIn('public/css');
});*/

elixir(function(mix){
    mix.stylesIn('public/css','public/css/all.css');
});

elixir(function(mix) {
    mix.scriptsIn('public/scripts','public/scripts/all.js');
});

elixir(function(mix){
    mix.version(['public/css/all.css', 'public/scripts/all.js']);
});