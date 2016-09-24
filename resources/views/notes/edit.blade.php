@extends('master.primary')

@section("import")
<link rel="stylesheet" type="text/css" href="{{ url('/css/note.css') }}" />
@endsection

@section("content")

<div class="content">
    <div class="content-body note edit">

        <form method="post" action="{{ url('/campaign/' . $currentCampaign->id . '/notes/' . $currentNote->id . '/edit')}}">
            {{ csrf_field() }}

            <div class="edit-group">
                <input type="text" value="{{ $currentNote->name }}" name="newName"/>
            </div>
            <div class="edit-group">
                <input type="text" value="{{$currentNote->description}}" name="newDescription"/>
            </div>
            <div class="edit-group">
                <input type="text" value="{{$currentNote->content}}" name="newContent"/>
            </div>
            <button type="submit" class="button">
                Submit
            </button>
        </form>

    </div>
</div>

@endsection
