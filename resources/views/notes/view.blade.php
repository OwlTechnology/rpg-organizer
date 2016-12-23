@extends('master.primary')

@section("import")
<link rel="stylesheet" type="text/css" href="{{ url('/css/note.css') }}" />
<script type="text/javascript" src="{{ url('/js/notes/viewNote.js') }}"></script>
@endsection

@section("content")



<div class="content">
    <div class="content-body note">

        <div class="breadcrumbs spaced">
            /
            <a class="breadcrumb" href="{{ route('campaign::view', $campaign->id) }}">{{ $campaign->name }}</a>
            /
            <a class="breadcrumb" href="{{ route('campaign::notes::list', $campaign->id) }}">Notes</a>
            /
            <span class="breadcrumb">
                {{ $note->name }}
            </span>
        </div>

        <h1 class="name">{{ $note->name }}</h1>
        <h3 class="description">{{ $note->description }}</h3>
        <p class="content">
            {{$note->content}}
        </p>
        <div class="actions">
            <a class="icon-button blue" href="{{ route('campaign::notes::edit', [$campaign->id, $note->id]) }}">
                <i class="material-icons">edit</i><span class="text">Edit Note</span>
            </a>
            <button class="icon-button red" onclick="toggleDeleteModal(true)">
                <i class="material-icons">delete</i><span class="text">Delete Note</span>
            </button>
        </div>
    </div>
</div>

<div class="modal-wrapper" id="delete-modal">
    <div class="modal">
        <div class="content">
            <p>
                Are you sure you want to delete {{$note->name}}?
            </p>
        </div>
        <div class="actions top-line">
            <a class="button red" href="{{ route('campaign::notes::delete', [$campaign->id, $note->id]) }}">
                Delete
            </a>
            <button class="button" onclick="toggleDeleteModal(false)">
                Cancel
            </button>
        </div>
    </div>
</div>

@endsection
