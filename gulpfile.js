var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass('app.scss');
    mix.sass('sections/notes/note.scss');
    mix.sass('sections/notes/notes.scss');
    mix.sass('sections/notes/newNote.scss');
    mix.sass('sections/me.scss');
    mix.sass('sections/npcs/list.scss');
    mix.sass('campaign.scss');

    mix.version([
        "css/app.css",
        "css/note.css",
        "css/notes.css",
        "css/newNote.css",
        "css/me.css",
        "css/list.css",
        "css/campaign.css"
    ]);
});
