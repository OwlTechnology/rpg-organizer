@extends('master.primary')

@section("import")
<link rel="stylesheet" type="text/css" href="{{ url('/css/me.css') }}" />
@endsection

@section("content")

<div class="content me-page">
    <div class="content-body">

        <div class="me-header">
            <div class="username">{{ Auth::user()->name }}</div>
            <hr class="line" />
            <div class="subtitle">My Account</div>
        </div>

        <h4 class="section-header">Your Campaigns</h4>

        <div class="campaigns">
            @if(count($campaigns))
                @foreach($campaigns as $campaign)
                <div class="collection">
                    <div class="sidebar">
                        <div class="icon"><i class="material-icons">map</i></div>
                    </div>
                    <div class="content">
                        <div class="title">
                            <a href="{{ url('/campaign/' . $campaign->id) }}">{{ $campaign->name }}</a>
                        </div>
                        <div class="description">
                            This is a campaign that the player can play where they
                            can campaign to their heart's content. Indeed, it is a
                            true campaign. Very awesome.
                        </div>
                    </div>
                    <div class="right-sidebar">
                        <div class="actions">
                            <button type="button"><i class="material-icons">share</i></button>
                            <button type="button"><i class="material-icons">edit</i></button>
                            <form class="form campaignDelete" method="post" action="{{url('/campaign/delete?id='.$campaign->id)}}">
                              {{ csrf_field() }}
                              <button type="submit"><i class="material-icons">delete</i></button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p class="info-panel info spaced medium">
                    You have not created any campaigns yet!
                </p>
            @endif
        </div>

        <h4 class="section-header">Campaigns You Are In</h4>

        <?php $campaignsUserIsIn = Auth::user()->campaignsUserIsIn; ?>
        @if(count($campaignsUserIsIn) > 0)
            @foreach($campaignsUserIsIn as $campaignAssociation)
                <?php $campaign = $campaignAssociation->campaign; ?>
                <div class="collection">
                    <div class="sidebar">
                        <div class="icon"><i class="material-icons">map</i></div>
                    </div>
                    <div class="content">
                        <div class="title">
                            <a href="{{ url('/campaign/' . $campaign->id) }}">{{ $campaign->name }}</a>
                        </div>
                        <div class="description">
                            This is a campaign that the player can play where they
                            can campaign to their heart's content. Indeed, it is a
                            true campaign. Very awesome.
                        </div>
                    </div>
                    <div class="right-sidebar">
                        <div class="actions">
                            <button type="button"><i class="material-icons">share</i></button>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
        <p class="info-panel info spaced medium">
            You are not in anyone else's campaigns at the moment.
        </p>
        @endif

        <div>
            <a class="icon-button blue" href="{{ url('/campaigns/new') }}">
                <i class="material-icons">add</i><span class="text">Create New Campaign</span>
            </a>
        </div>

    </div>
</div>

@endsection
