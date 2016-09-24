@extends('master.campaign')

@section("campaign-content")
<div class="content">
  <div class="content-body">
      <div class="section">
        <h2>NPCs</h2>

        <p>
            Yay npcs woo yay woo.
        </p>

        <div class="actions">
            <a href="{{ url("/campaigns/" . $campaign->id . "/npcs/new") }}" class="button blue">
                Add New NPC
            </a>
        </div>
    </div>
  </div>
</div>
@endsection
