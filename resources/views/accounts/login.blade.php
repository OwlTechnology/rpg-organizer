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
                    Username
                    <input type="text" name="username" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Password
                    <input type="password" name="password" />
                </label>
            </div>
            <div class="submit">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</div>

@endsection
