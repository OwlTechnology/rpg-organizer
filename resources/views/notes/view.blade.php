@extends('master.primary')

@section("import")
<link rel="stylesheet" type="text/css" href="{{ url('/css/note.css') }}" />
<script type="text/javascript" src="{{ url('/js/notes/viewNote.js') }}"></script>
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
            <button onclick="toggleDeleteModal(true)">
                Delete Note
            </button>
        </div>
    </div>
</div>

<div class="modal-wrapper" id="delete-modal">
    <div class="modal">
        <p>
            Are you sure you want to delete {{$note->name}}?
        </p>
        <div class="actions">
            <a class="button" href="{{ url("/campaign/" . $campaign->id . "/note/" . $note->id . "/delete/") }}">
                Yes
            </a>
            <button class="button" onclick="toggleDeleteModal(false)">
                No
            </button>
        </div>
    </div>
</div>

@endsection
