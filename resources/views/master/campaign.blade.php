@extends('master.primary')

@section("import")
    <link rel="stylesheet" type="text/css" href="{{ url('/css/campaign.css') }}" />
    @yield("campaign-import")
@endsection

@section("content")
<div class="campaign-header content">
    <div class="campaign-header-wrapper">
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

        <div class="campaign-tabs">
            <div class="tab-container">
                <ul>
                    <li>
                        <a href="{{ url('/campaign/' . $campaign->id) }}" class='{{ $activeTab === "home" ? "active" : "" }}'>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/campaign/' . $campaign->id . '/notes/') }}" class='{{ $activeTab === "notes" ? "active" : "" }}'>
                            Notes
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="campaign-content">
    @yield("campaign-content")
</div>
@endsection
