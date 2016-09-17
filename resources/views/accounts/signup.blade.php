@extends('master.primary')

@section("content")

<div class="content">
    <div class="content-body">
        <h1>Sign Up</h1>

        @if(session('error'))
        <div class="error">
            {{ session('message') }}
        </div>
        @endif

        <form class="form login" method="post" action="{{ url('/signup') }}">
            {{ csrf_field() }}

            <div class="form-element">
                <label>
                    Username
                    <input type="text" name="username" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Email Address
                    <input type="text" name="email" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Password
                    <input type="password" name="password" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Confirm Password
                    <input type="password" name="confirm-password" />
                </label>
            </div>
            <div class="submit">
                <button type="submit">Sign Up</button>
            </div>
        </form>
    </div>
</div>

@endsection
