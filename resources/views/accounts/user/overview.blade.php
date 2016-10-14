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

        <div class="campaigns">
            @foreach($campaigns as $campaign)
            <div class="collection">
                <div class="sidebar">
                    <div class="icon">C</div>
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
        </div>

        <div>
            <a class="icon-button blue" href="{{ url('/campaigns/new') }}">
                <i class="material-icons">add</i><span class="text">Create New Campaign</span>
            </a>
        </div>

    </div>
</div>

@endsection
