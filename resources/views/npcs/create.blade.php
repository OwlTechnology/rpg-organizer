@extends('master.primary')

@section("content")

<div class="content">
    <div class="content-body">
        <div class="breadcrumbs spaced">
            /
            <a class="breadcrumb" href="{{ url("/campaign/" . $campaign->id) }}">{{ $campaign->name }}</a>
            /
            <a class="breadcrumb" href="{{ url("/campaign/" . $campaign->id . "/npcs/") }}">NPCs</a>
            /
            <span class="breadcrumb">Add New NPC</span>
        </div>

        <h1>Add NPC</h1>

        @if(session("message"))
        <div class="log message">
            {{ session("message") }}
        </div>
        @endif

        <form class="form create" method="post" action="{{url('/campaigns/' . $campaign->id . '/npcs/new/')}}">
            {{ csrf_field() }}

            <div class="form-element">
                <label>
                    Name
                    <input type="text" name="name" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Description
                    <input type="text" name="short_description" />
                </label>
            </div>
            <div class="form-element">
                Location:
                @if(count($locations) < 1)
                    <i>None Available</i>
                @else
                    <select name="location_id">
                        <option value="0">None</option>
                        @foreach($locations as $location)
                            <option value="{{ $location->id }}">
                                {{ $location->name }}
                            </option>
                        @endforeach
                    </select>
                @endif
            </div>
            <div class="submit">
                <button type="submit">Add NPC</button>
            </div>
        </form>

    </div>
</div>

@endsection
