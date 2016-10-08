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

            <div class="list">
                <div class="letter">C</div>
            </div>
        </div>
        <div>
            <a href="{{ url('/campaigns/new') }}">Create New Campaign</a>
        </div>

    </div>
</div>

@endsection
