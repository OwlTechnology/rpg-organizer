@extends('master.primary')

@section("import")
    @yield("import")
@endsection

@section("content")
<div class="campaign-header content">
    <div class="content-body">
        <div class="campaign-name">
            <i class="material-icons">map</i>
            {{$campaign->name}}
        </div>
        <div class="campaign-dm">
            <span class="label">GM:</span>
            <span class="name">{{ $campaign->dungeonMaster()->name }}</span>
        </div>
    </div>
</div>
<div class="campaign-content">
    @yield("campaign-content")
</div>
@endsection
