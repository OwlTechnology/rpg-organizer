@extends('master.primary')

@section("content")

<div class="content">
  <div class="content-body">
    <div class="campaign-name">{{$campaign->name}}</div>
    <div class="campaign-dm">{{ $campaign->dungeonMaster()->name }}</div>
  </div>
</div>


@endsection
