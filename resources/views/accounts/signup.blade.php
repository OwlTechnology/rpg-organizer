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
                    Username<br />
                    <input type="text" class="text-input mtrl" name="username" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Email Address<br />
                    <input type="text" class="text-input mtrl" name="email" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Password<br />
                    <input type="password" class="text-input mtrl" name="password" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Confirm Password<br />
                    <input type="password" class="text-input mtrl" name="confirm-password" />
                </label>
            </div>
            <div class="submit">
                <button class="button blue" type="submit">
                    <i class="material-icons">check</i>
                    Sign Up
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
