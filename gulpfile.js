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

elixir(function(mix) {
    mix.sass('app.scss');
    mix.sass('sections/notes/note.scss');
    mix.sass('sections/notes/notes.scss');
    mix.sass('sections/notes/newNote.scss');
    mix.sass('campaign.scss');

    mix.version([
        "css/app.css",
        "css/note.css",
        "css/notes.css",
        "css/newNote.scss",
        "css/campaign.css"
    ]);
});
