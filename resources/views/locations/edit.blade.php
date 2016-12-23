@extends('master.primary')

@section("content")

<div class="content">
    <div class="content-body location edit">

        <form method="post" action="{{ route('campaign::locations::edit.post', [$campaign->id, $location->id]) }}">
            {{ csrf_field() }}

            <div class="edit-group">
                <input type="text" value="{{ $location->name }}" name="newName"/>
            </div>
            <div class="edit-group">
                <input type="text" value="{{$location->content}}" name="newContent"/>
            </div>
            <button type="submit" class="button">
                Submit
            </button>
        </form>

    </div>
</div>

@endsection
