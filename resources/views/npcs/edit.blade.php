@extends('master.primary')

@section("content")
<div class="content">
    <div class="content-body">
        <div class="breadcrumbs spaced">
            /
            <a class="breadcrumb" href="{{ url("/campaign/" . $campaign->id . "/") }}">{{ $campaign->name }}</a>
            /
            <a class="breadcrumb" href="{{ url("/campaign/" . $campaign->id . "/npcs/") }}">NPCs</a>
            /
            <a class="breadcrumb" href="{{ url("/campaign/" . $campaign->id . "/npc/" . $npc->id . "/") }}">
                {{ $npc->name }}
            </a>
            /
            <span class="breadcrumb">
                Edit
            </span>
        </div>

        <div class="section">
            <form action="{{ '/campaign/' . $campaign->id . '/npc/' . $npc->id . '/edit' }}" method="post">
                {{ csrf_field() }}

                <h2>
                    <input type="text" name="name" value="{{ $npc->name }}" />
                </h2>

                <textarea name="short_description">{{ $npc->short_description }}</textarea>

                <div>
                    <button type="submit" class="button blue">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
