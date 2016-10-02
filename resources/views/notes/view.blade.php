@extends('master.primary')

@section("import")
<link rel="stylesheet" type="text/css" href="{{ url('/css/note.css') }}" />
@endsection

@section("content")



<div class="content">
    <div class="content-body note">

        <div class="breadcrumbs">
            <a class="breadcrumb" href="{{ url("/campaign/" . $campaign->id . "/notes/") }}">
                Back to Campaign
            </a>
        </div>

        <h1 class="name">{{ $note->name }}</h1>
        <h3 class="description">{{ $note->description }}</h3>
        <p class="content">
            {{$note->content}}
        </p>
        <div class="actions">
            <a href="{{ url('/campaign/' . $campaign->id . '/notes/' . $note->id . '/edit/') }}">
                Edit Note
            </a>
        </div>
    </div>
</div>

@endsection
