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
            <div class="subtitle">Static Content</div>
        </div>

        <div class="home-links">
            <a class="link" href="{{ route('static::dnd5::overview') }}">D&amp;D 5</a>
            <a class="link" href="#">More Coming Soon...</a>
        </div>

    </div>
</div>

@endsection
