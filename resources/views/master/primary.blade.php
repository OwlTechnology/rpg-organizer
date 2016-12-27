<!DOCTYPE html>

<html lang="en">
    <head>
        <title>RPG Organizer</title>

        <meta name="viewport" content="width=device-width">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Slabo+27px|Josefin+Slab|Roboto|Cutive+Mono" rel="stylesheet">
        <link rel='stylesheet' type='text/css' href='{{ url('css/app.css') }}' />
        @stack('stylesheets')

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

        @if(Auth::user())
        <script src="{{ url('/js/UserController.js') }}"></script>
        @endif

        @yield("import")
    </head>
    <body>
        <div class="header">
            <div class="left">
                <span class="title">RPG Organizer</span>
            </div>
            <div class="nav">
                @if(Auth::user())
                <div class="notifications">
                    <div class="tray" id="notifications_invites_tray">
                        <button class="icon" onclick="userController.openNotifications('invites', this)">
                            <i class="material-icons">notifications_none</i>
                            <span class="indicator"></span>
                        </button>

                        <div class="list">
                            <div class="title">
                                Invites
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <ul class="nav-list">
                    @if(Auth::user())
                    <li>
                        <a href="{{ route('profile::overview') }}">
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
