@extends('master.primary')

@section("import")
<link rel="stylesheet" type="text/css" href="{{ url('/css/note.css') }}" />
@endsection

@section("content")

<div class="content">
    <div class="content-body note edit">

        <form method="post" action="{{ route('campaign::notes::edit.post', [$campaign->id, $note->id]) }}">
            {{ csrf_field() }}

            <div class="edit-group">
                <input type="text" value="{{ $note->name }}" name="newName"/>
            </div>
            <div class="edit-group">
                <input type="text" value="{{$note->description}}" name="newDescription"/>
            </div>
            <div class="edit-group">
                <input type="text" value="{{$note->content}}" name="newContent"/>
            </div>
            <button type="submit" class="button">
                Submit
            </button>
        </form>

    </div>
</div>

@endsection
