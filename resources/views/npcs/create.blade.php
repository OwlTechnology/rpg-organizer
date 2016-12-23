@extends('master.primary')

@section("content")

<div class="content">
    <div class="content-body">
        <div class="breadcrumbs spaced">
            /
            <a class="breadcrumb" href="{{ route('campaign::view', $campaign->id) }}">{{ $campaign->name }}</a>
            /
            <a class="breadcrumb" href="{{ route('campaign::npcs::list', $campaign->id) }}">NPCs</a>
            /
            <span class="breadcrumb">Add New NPC</span>
        </div>

        <h1>Add NPC</h1>

        @if(session("message"))
        <div class="log message">
            {{ session("message") }}
        </div>
        @endif

        <form class="form create" method="post" action="{{ route('campaign::npcs::new.post', $campaign->id) }}">
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
                    <input type="hidden" name="location_id" value="0" />
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
