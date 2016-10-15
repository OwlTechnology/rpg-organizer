<!DOCTYPE html>

<html lang="en">
    <head>
        <title>RPG Organizer</title>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Slabo+27px|Josefin+Slab|Roboto|Cutive+Mono" rel="stylesheet">
        <link rel='stylesheet' type='text/css' href='{{ url('css/app.css') }}' />

        @yield("import")
    </head>
    <body>
        <div class="header">
            <div class="left">
                <span class="title">RPG Organizer</span>
            </div>
            <div class="nav">
                <ul class="nav-list">
                    @if(Auth::user())
                    <li>
                        <a href="{{ url('/me') }}">
                            My Account
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/logout') }}">
                            Logout
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ url('/login') }}">
                            Login
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/signup') }}">
                            Sign Up
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>

        @yield("content")
    </body>
</html>
