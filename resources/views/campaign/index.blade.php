@extends('master.primary')

@section("content")

<div class="content">
  <div class="content-body">
    <div class="campaign-name">{{$campaign->name}}</div>
    <div class="campaign-dm">{{ $campaign->dungeonMaster()->name }}</div>

    <div>
        <h2>Notes</h2>

        <div>
            <!-- notes list -->
        </div>

        <a href="{{ url("/campaigns/" . $campaign->id . "/notes/new") }}">
            Write New Note
        </a>
    </div>
  </div>
</div>


@endsection
