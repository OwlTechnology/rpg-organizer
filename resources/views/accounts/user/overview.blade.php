@extends('master.primary')

@section("import")
<link rel="stylesheet" type="text/css" href="{{ url('/css/me.css') }}" />
@endsection

@section("content")

<div class="content me-page">
    <div class="content-body">

        <div class="me-header">
            <div class="username">{{ Auth::user()->name }}</div>
            <hr class="line" />
            <div class="subtitle">My Account</div>
        </div>

        <div class="home-links">
            <a class="link" href="{{ url('/me/campaigns') }}">My Campaigns</a>
            <a class="link" href="#">Character Sheets</a>
            <a class="link" href="#">Settings</a>
        </div>

    </div>
</div>

@endsection
