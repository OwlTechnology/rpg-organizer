@extends('master.campaign')

@push("stylesheets")
    <link rel="stylesheet" type="text/css" href="/css/list.css" />
@endpush

@section("campaign-content")
<div class="content">
  <div class="content-body">
      <div class="section">
        <h2>NPCs</h2>

        <div class="npcs-list">
            @foreach($npcs as $npc)
                <div class="npc">
                    <div class="image">
                        <img title="NPC picture" src="/img/npc/head-outline.png" />
                    </div>
                    <div class="name">
                        <a href="{{ route('campaign::npcs::view', [$campaign->id, $npc->id]) }}">
                            {{ $npc->name }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="actions">
            <a href="{{ route('campaign::npcs::new', $campaign->id) }}" class="button blue">
                Add New NPC
            </a>
        </div>
    </div>
  </div>
</div>
@endsection
