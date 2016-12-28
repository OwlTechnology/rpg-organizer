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
            <div class="subtitle">D&amp;D 5 | Races</div>
        </div>

        <div class="home-links">
            <a class="link" href="{{ route('static::dnd5::races::new') }}">
                Add New Race
            </a>
            @foreach($races as $race)
                <a class="link" href="{{ route('static::dnd5::races::view', $race->id) }}">
                    {{ $race->name }}
                </a>
            @endforeach
        </div>

    </div>
</div>

@endsection
