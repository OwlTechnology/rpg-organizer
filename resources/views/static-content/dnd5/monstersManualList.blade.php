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
            <div class="subtitle">D&amp;D 5 | Monster's Manual</div>
        </div>

        <div class="home-links">
            <a class="link" href="#">Add New Monster</a>
        </div>

    </div>
</div>

@endsection
