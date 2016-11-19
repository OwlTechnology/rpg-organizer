@extends('master.primary')

@section("content")
<div class="content">
    <div class="content-body">
        <div class="section">
            <h2>{{ $npc->name }}</h2>

            <p>
                {{ $npc->short_description }}
            </p>
        </div>
    </div>
</div>
@endsection
