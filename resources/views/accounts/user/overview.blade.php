@extends('master.primary')

@section("content")

<div class="content">
    <div class="content-body">
        <h1>My Account</h1>

        <div>
            Name: {{ Auth::user()->name }}
        </div>

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
                  <input type="text" placeholder="{{$campaign->name}}"name="name"/>
                  <button type="submit">Update Name</button>
                </form>
                </div>
            </div>
            @endforeach
        </div>
        <div>
            <a href="{{ url('/campaigns/new') }}">Create New Campaign</a>
        </div>

    </div>
</div>

@endsection
