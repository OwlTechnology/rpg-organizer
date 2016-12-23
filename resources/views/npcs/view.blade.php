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
            <span class="breadcrumb">
                {{ $npc->name }}
            </span>
        </div>

        <div class="section">
            <h2>{{ $npc->name }}</h2>

            <p>
                {{ $npc->short_description }}
            </p>

            <a href="{{ route('campaign::npcs::edit', [$campaign->id, $npc->id]) }}" class="button blue">
                Edit
            </a>
        </div>
    </div>
</div>
@endsection
