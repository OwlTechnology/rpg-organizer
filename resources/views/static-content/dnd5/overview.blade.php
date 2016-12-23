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
            <div class="subtitle">D&amp;D 5 | Static Content</div>
        </div>

        <div class="home-links">
            <a class="link" href="{{ route('static::dnd5::monsters-manual::list') }}">Monster's Manual</a>
            <a class="link" href="#">Classes</a>
            <a class="link" href="#">Races</a>
            <a class="link" href="#">Weapons</a>
            <a class="link" href="#">Armor/Shields</a>
            <a class="link" href="#">Items</a>
        </div>

    </div>
</div>

@endsection
