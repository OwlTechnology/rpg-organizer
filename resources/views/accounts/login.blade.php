@extends('master.primary')

@section("content")

<div class="content">
    <div class="content-body">
        <h1>Login</h1>

        @if(session("message"))
        <div class="log message">
            {{ session("message") }}
        </div>
        @endif

        <form class="form login" method="post" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <div class="form-element">
                <label>
                    Username<br />
                    <input type="text" class="text-input mtrl" name="username" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Password<br />
                    <input type="password" class="text-input mtrl" name="password" />
                </label>
            </div>
            <div class="submit">
                <button class="button blue" type="submit">Login</button>
            </div>
        </form>
    </div>
</div>

@endsection
