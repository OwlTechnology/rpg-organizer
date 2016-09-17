@extends('master.primary')

@section("import")
<link rel="stylesheet" type="text/css" href="{{ url('/css/note.css') }}" />
@endsection

@section("content")

<div class="content">
    <div class="content-body note">
        <h1 class="name">{{ $note->name }}</h1>
        <h3 class="description">{{ $note->description }}</h3>

        <div class="actions">
            <a href="{{ url('/notes/' . $note->id . '/edit/') }}">
                Edit Note
            </a>
        </div>
    </div>
</div>

@endsection
