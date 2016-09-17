@extends('master.primary')

@section("import")
<link rel="stylesheet" type="text/css" href="{{ url('/css/note.css') }}" />
@endsection

@section("content")

<div class="content">
    <div class="content-body note edit">

        <div class="edit-group">
            <h3 class="title">Name</h1>
        </div>


        <div class="actions">
            <a href="{{ url('/notes/' . $note->id . '/edit/') }}">
                Edit Note
            </a>
        </div>
    </div>
</div>

@endsection
