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
            <a class="breadcrumb" href="{{ route('campaign::npcs::view', [$campaign->id, $npc->id]) }}">
                {{ $npc->name }}
            </a>
            /
            <span class="breadcrumb">
                Edit
            </span>
        </div>

        <div class="section">
            <form action="{{ route('campaign::npcs::edit.post', [$campaign->id, $npc->id]) }}" method="post">
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
