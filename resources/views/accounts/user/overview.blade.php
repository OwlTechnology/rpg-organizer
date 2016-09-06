@extends('master.primary')

@section("content")

<div class="content">
    <div class="content-body">
        <h1>My Account</h1>

        Name: {{ Auth::user()->name }}<br />

    </div>
</div>

@endsection
