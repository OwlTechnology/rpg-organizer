@extends('master.primary')

@section("content")

<div class="content">
    <div class="content-body">
        <h1>Login</h1>

        <form class="form login">
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
