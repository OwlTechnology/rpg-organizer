@extends('master.primary')

@section("content")
<div class="content">
    <div class="content-body">
        <div class="section">
            <h2>{{ $npc->name }}</h2>

            <p>
                {{ $npc->short_description }}
            </p>

            <a href="{{ url('/campaign/' . $campaign->id . '/npc/' . $npc->id . '/edit') }}" class="button blue">
                Edit
            </a>
        </div>
    </div>
</div>
@endsection