@extends('master.primary')

@section("content")

<div class="content">
    <div class="content-body">
        <h1>My Account</h1>

        <div>
            Name: {{ Auth::user()->name }}
        </div>

        <h4>Your Campaigns</h4>

        <div class="campaigns collection">
            @foreach($campaigns as $campaign)
                <div class="campaign">
                    <div class="name">
                    <a href="{{ url('/campaign/' . $campaign->id) }}">{{ $campaign->name }}</a>
                    <form class="form campaignDelete" method="post" action="{{url('/campaign/delete?id='.$campaign->id)}}">
                      {{ csrf_field() }}
                      <button type="submit">Delete</button>
                    </form>
                    <form class="form campaignUpdate" method="post" action="{{url('/campaign/update?id='.$campaign->id)}}">
                      {{ csrf_field() }}
                      <input type="text" placeholder="{{$campaign->name}}" name="name"/>
                      <button type="submit">Update Name</button>
                    </form>
                    </div>
                </div>
            @endforeach

            <h4>Campaigns You Are In</h4>

            <?php $campaignsUserIsIn = Auth::user()->campaignsUserIsIn; ?>
            @if(count($campaignsUserIsIn) > 0)
                @foreach($campaignsUserIsIn as $campaignAssociation)
                    <?php $campaign = $campaignAssociation->campaign; ?>
                    <div class="campaign">
                        <div class="name">
                            <a href="{{ url('/campaign/' . $campaign->id) }}">{{ $campaign->name }}</a>
                        </div>
                    </div>
                @endforeach
            @else
            <p class="info-panel info">
                You are not in anyone else's campaigns at the moment.
            </p>
            @endif
        </div>
        <div>
            <a href="{{ url('/campaigns/new') }}">Create New Campaign</a>
        </div>

    </div>
</div>

@endsection
