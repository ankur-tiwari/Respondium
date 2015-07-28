var elixir = require('laravel-elixir');

elixir(function(mix) {

    mix.sass('app.scss');

    mix.scripts(['vendor/mustache.min.js', 'vendor/jquery.timeago.js', 'functions.js', 'script.js']);

    mix.browserify('app.js');

});
