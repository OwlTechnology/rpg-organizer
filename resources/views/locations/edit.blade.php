@extends('master.primary')

@section("content")

<div class="content">
    <div class="content-body location edit">

        <form method="post" action="{{ url('/campaign/' . $currentCampaign->id . '/location/' . $currentLocation->id . '/edit')}}">
            {{ csrf_field() }}

            <div class="edit-group">
                <input type="text" value="{{ $currentLocation->name }}" name="newName"/>
            </div>
            <div class="edit-group">
                <input type="text" value="{{$currentLocation->content}}" name="newContent"/>
            </div>
            <button type="submit" class="button">
                Submit
            </button>
        </form>

    </div>
</div>

@endsection
